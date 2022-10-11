<?php

class Router 
{
    // attributs
    public array $routes = [];
    public string $path;
   
    public function __construct($route)
    {
        $this->path = $route;
    }
   
    public function addRoute($route, $callback): void
    {
        array_push($this->routes, new Route($route, $callback));
    }
   
    public function resolve(): void
    {
        foreach($this->routes as $route):
            
            if (preg_match('/'.$route->path.'/', $this->path, $matches))
            {
                call_user_func($route->callback, $matches);
            } 
           
        endforeach;
        
        // la variable $template est définie pour la route par défaut, le layout
        $template = 'home';
        require_once './src/Templates/layout.php';
        
    }
}

class Route 
{
    public $path;
    public $callback;
    
    public function __construct($route, $callback) 
    {
        $this->path = $route;
        $this->callback = $callback;
    }
    
}