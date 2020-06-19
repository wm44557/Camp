<?php

declare(strict_types=1);

namespace Application;

class Request
{
    private array $get = [];
    private array $post = [];

    public function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    public function requestGet(string $name, $default = null)
    {
        return $this->get[$name] ?? $default;
    }

    public function requestPost(string $name, $default = null)
    {
        return $this->post[$name] ?? $default;
    }
}
