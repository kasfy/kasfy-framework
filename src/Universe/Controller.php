<?php

namespace Universe;

use Universe\Middlewares\BaseMiddleware;

/***
    ꗥ 𝕂𝔸𝕊𝔽𝕐 
    ꗥ 𝕋𝕙𝕖 𝔽𝕣𝕒𝕞𝕖𝕨𝕠𝕣𝕜 𝕗𝕠𝕣 𝕊𝕞𝕒𝕣𝕥 𝔹𝕒𝕔𝕜-𝔼𝕟𝕕 
    ꗥ 𝔸𝕦𝕥𝕙𝕠𝕣: 𝕂𝕒𝕥𝕙𝕖𝕖𝕤𝕜𝕦𝕞𝕒𝕣 𝕊 [𝕙𝕥𝕥𝕡𝕤://𝕜𝕒𝕥𝕙𝕖𝕖𝕤𝕙.𝕛𝕤.𝕠𝕣𝕘]
 ***/

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    protected array $middlewares = [];

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function view($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
