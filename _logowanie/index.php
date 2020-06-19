<?php

declare(strict_types=1);

session_start();

require_once realpath("vendor/autoload.php");

use Application\Request;
use Application\Controller\AbstractController;
use Application\Controller\Controller;
use Application\Controller\UserController;
use Application\Exception\ApplicationException;
use Application\Exception\ConfigurationException;
use Application\Exception\ConnectionException;
use Application\Exception\OperationException;

require_once("src/utils/debug.php");


$conn = require_once("config/config.php");
$request = new Request($_GET, $_POST);

try {
  Controller::initConfiguration($conn);
  $controller = new Controller($request);
  $controller->run();
} catch (ConfigurationException $e) {
  echo 'Proszę skontaktować się z administratorem';
} catch (ApplicationException $e) {
  echo '<h1>' . $e->getMessage() . '</h1>';
  echo $e;

} catch (\Throwable $e) {
  echo "<h1> Błąd aplikacji </h1>";
  echo $e;
}
