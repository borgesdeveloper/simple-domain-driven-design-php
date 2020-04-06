<?php require_once('vendor/autoload.php');

class Init{
    function __construct(){}
    function get(){}

    function resolve(){
         $container = Viloveul\Container\ContainerFactory::instance();
         $container->set(Domain\Services\Auth\IUserService::class, Services\Auth\AuthService::class);
         $result = $container->make(Services\Auth\AuthService::class);
    }

    public function Run() : void
    {
        Toro::serve(array(
            "/" => "Init",
            "/auth" => "Services\Auth\AuthService"
        ));

        ToroHook::add("before_request", function() {});
        ToroHook::add("before_handler", function() {});
        ToroHook::add("after_handler", function() {});
        ToroHook::add("after_request",  function() {});

        $this->resolve();
    }

}

    $init = new Init();
    $init->Run();
    
?>