<?php

namespace Universe;

/***
    ꗥ 𝕂𝔸𝕊𝔽𝕐 
    ꗥ 𝕋𝕙𝕖 𝔽𝕣𝕒𝕞𝕖𝕨𝕠𝕣𝕜 𝕗𝕠𝕣 𝕊𝕞𝕒𝕣𝕥 𝔹𝕒𝕔𝕜-𝔼𝕟𝕕 
    ꗥ 𝔸𝕦𝕥𝕙𝕠𝕣: 𝕂𝕒𝕥𝕙𝕖𝕖𝕤𝕜𝕦𝕞𝕒𝕣 𝕊 [𝕙𝕥𝕥𝕡𝕤://𝕜𝕒𝕥𝕙𝕖𝕖𝕤𝕙.𝕛𝕤.𝕠𝕣𝕘]
 ***/

use Universe\DB\Database;

class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static Application $app;
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public View $view;

    public function __construct($rootDir, $config)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();

    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }
}
