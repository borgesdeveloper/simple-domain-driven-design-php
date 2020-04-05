<?php 

require_once('vendor/autoload.php');

class Init{

    function __construct()
    {
    
    }
   
    public function Run() : void
    {

        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) 
        {
            $r->addRoute('GET', '/users', 'get_all_users_handler');
            $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
            $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
        });

        var_dump($dispatcher);
        
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        $uri = rawurldecode($uri);
        
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                break;
        }
    }

}

    $init = new Init();
    $init->Run();
?>