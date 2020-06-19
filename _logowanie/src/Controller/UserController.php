<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\ConfigurationException;
use Application\Database;
use Application\View;
use Application\debug;
use Application\Exception\OperationException;
use Application\Request;

class UserController
{
    protected const DEFAULT_ACTION = 'login';
    protected static $configuration = [];
    protected Database $database;
    protected Request $request;
    protected View $view;
    protected string $action;
    protected string $page;
    protected array $params = [];
    protected \GuzzleHttp\Client $client;


    public function __construct(Request $request)
    {
        if (empty(self::$configuration['db'])) {
            throw new ConfigurationException('Configuration error');
        }
        $this->database = new Database(self::$configuration['db']);
        $this->request = $request;
        $this->view = new View();
        $this->client = new \GuzzleHttp\Client();
    }

    public function login(): void
    {
        if (!empty($this->request->requestPost('login'))) {
            $result = $this->database->loginPassword($this->request->requestPost('login'), $this->request->requestPost('haslo'));
        }
        if (!empty($result)) {
            if ($result['userName'] == 'admin') {
                $_SESSION['zalogowany'] = 2;
                $this->page = 'panelAdmin';
            } else {
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $result['userName'];
                $_SESSION['pass'] = $result['pass'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['hasz'] = $result['hasz'];
                $login = $_SESSION['user'];
                $key = $result['hasz'];
                dump($_SESSION['hasz']);

                $res = $this->client->request('POST', 'http://tank.iai-system.com/api/user/verify', [
                    'form_params' => [
                        'login' => "$login",
                        'key' => "$key"
                    ]
                ]);
                $json = json_decode((string) $res->getBody());
                if (isset($json->login)) {
                    echo 'zweryfikowano uzytkownika';
                    $_SESSION['zalogowany'] = 1;
                } else {
                    // throw new OperationException('Error');
                    echo $res;
                }
            }
        } else {
            $this->params['login'] = 'fail';
            $this->page = 'login';
        }
    }

    public function logged(): void
    {
        if (isset($_SESSION['zalogowany'])) {
            if ($_SESSION['zalogowany'] == 1) {
                $result = $this->database->loginPassword($_SESSION['user'], $_SESSION['pass']);
                $login = $result['userName'];
                $pass = $result['pass'];
                $hasz = $result['hasz'];
                $email = $result['email'];

                $this->params = ['login' => $login, 'email' => $email];
                $this->client->request('POST', 'http://tank.iai-system.com/api/user/edit', [
                    'form_params' => [
                        'login' => "$login",
                        'key' => "$hasz",
                        'status' => "online"
                    ]
                ]);

                $this->page = 'pageUser';
            } else if ($_SESSION['zalogowany'] == 2) {
                $this->params['tableUsers'] = $this->database->listUsers();
                $this->page = 'panelAdmin';
            } else {
            }
        }
    }

    public function logout(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $pass =  $_SESSION['pass'];
        $this->client->request('POST', 'http://tank.iai-system.com/api/user/edit', [
            'form_params' => [
                'login' => "$login",
                'key' => "$hasz",
                'status' => "offline"
            ]
        ]);
        session_unset();

        header("Location: /_logowanie/");
    }

    public function register(): void
    {
        $this->page = 'register';

        if (!empty($_POST)) {
            $login = $this->request->requestPost('login2');
            $haslo = $this->request->requestPost('haslo2');
            $email = $this->request->requestPost('email2');
            $user = $this->request->requestPost('user2');
            $checkLogin = $this->database->loginPassword($login);

            if (empty($login) || empty($haslo) || empty($email) || empty($user)) {
                $this->params['infoRegister'] = 'two';
            } else if ($checkLogin === true) {
                $this->params['infoRegister'] = 'one';
            } else {

                $this->client->request('POST', 'http://tank.iai-system.com/api/user/add', [
                    'form_params' => [
                        'login' => "$login",
                        'password' => "$haslo"
                    ]
                ]);
                $this->database->register($login, $haslo, $email, $user);
                $this->params['registerInfo'] = 'done';

                $register = 'true';
            }
            if (isset($register)) {
                $this->view->render('login', $this->params);
            } else {
                $this->view->render('register', $this->params);
            }
        }
    }

    public function showRecord(): void
    {
        $this->params['recordOne'] = $this->database->getRecord($this->request->requestGet('id'));
        $this->view->render('showRecord', $this->params);
    }

    public function editRecord(): void
    {

        $editPass = $this->request->requestPost('userPassEdit');
        $editEmail = $this->request->requestPost('userEmailEdit');
        $urlFoto = $this->request->requestPost('urlFoto');
        $requestId = $this->request->requestGet('id');

        $this->params['recordOne'] = $this->database->getRecord($requestId);

        if ((!empty($editLogin)) ||
            (!empty($editPass)) ||
            (!empty($editEmail))
        ) {
            $this->database->editUser($_SESSION['user'], $editPass, $editEmail, $requestId, $_SESSION['hasz'], $urlFoto);
            $_SESSION['pass'] = $editPass;
            $this->params['recordOne'] = $this->database->getRecord($this->request->requestGet('id'));
        }
        $this->view->render('editRecord', $this->params);
    }
    public function users(): void
    {
        $res = $this->client->request('GET', 'http://tank.iai-system.com/api/user/getAll');
        $json = json_decode((string) $res->getBody());
        $this->params = ['json' => $json];
        $this->view->render('users', $this->params);
    }
    public function aktywne(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $res = $this->client->request('POST', 'http://tank.iai-system.com/api/chat/getActive', [
            'form_params' => [
                'login' => "$login",
                'key' => "$hasz"
            ]
        ]);
        $json = json_decode((string) $res->getBody());
        $this->params = ['json' => $json];
        $this->view->render('aktywne', $this->params);
    }
    public function create(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $name = $this->request->requestPost('create');

        if (!empty($name)) {
            $this->client->request('POST', 'http://tank.iai-system.com/api/chat/create', [
                'form_params' => [
                    'login' => "$login",
                    'key' => "$hasz",
                    'name' => "$name"
                ]
            ]);
        }

        $this->view->render('create', $this->params);
    }
    public function join(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $id = (int) $this->request->requestPost('joinId');
        $userName = $this->request->requestPost('joinName');
        if (!empty($id) || !empty($userName)) {
            $this->client->request('POST', 'http://tank.iai-system.com/api/chat/join', [
                'form_params' => [
                    'login' => "$login",
                    'key' => "$hasz",
                    'user' => "$userName",
                    'chat_id' => $id
                ]
            ]);
        }

        $this->view->render('join', $this->params);
    }
    public function leave(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $id = (int) $this->request->requestPost('leaveId');
        if (!empty($id)) {
            $this->client->request('POST', 'http://tank.iai-system.com/api/chat/leave', [
                'form_params' => [
                    'login' => "$login",
                    'key' => "$hasz",
                    'chat_id' => $id
                ]
            ]);
        }

        $this->view->render('leave', $this->params);
    }
    public function conversation(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $id = (int) $this->request->requestGet('id');
        $_SESSION['id'] = $id;
        $message = $this->request->requestPost('send');

        $res = $this->client->request('POST', 'http://tank.iai-system.com/api/chat/get', [
            'form_params' => [
                'login' => "$login",
                'key' => "$hasz",
                'last_id' => $id
            ]
        ]);
        $json = json_decode((string) $res->getBody());
        $this->params = ['json' => $json];

        if (!empty($id) || !empty($message)) {
            $this->client->request('POST', 'http://tank.iai-system.com/api/chat/send', [
                'form_params' => [
                    'login' => "$login",
                    'key' => "$hasz",
                    'chat_id' => $id,
                    'message' => $message
                ]
            ]);
        }
        $this->view->render('conversation', $this->params);
    }

    public function conversationn(): void
    {
        $login = $_SESSION['user'];
        $hasz = $_SESSION['hasz'];
        $id = $_SESSION['id'];

        $res = $this->client->request('POST', 'http://tank.iai-system.com/api/chat/get', [
            'form_params' => [
                'login' => "$login",
                'key' => "$hasz",
                'last_id' => $id
            ]
        ]);

        $json = json_decode((string) $res->getBody());
        $_SESSION['json'] = $json;
        $this->params = ['json' => $json];
        $this->view->render('conversationn', $this->params);
    }
}
