<?php
require("RouterException.php");

class Router{
    
    private $url;    
    private $regExpParam = [];
    private $routes = [];
    
    public function __construct($url){
        $this->url = $url;
        
        $routesJsonFile = file_get_contents(__DIR__."/../../conf/routes.json");
        $routesJson = json_decode($routesJsonFile, true);        
        $this->routes = $routesJson['routes'];
        $this->regExpParam = $routesJson['regexParam'];            
    }
    
    public function getRoute(){
        foreach($this->routes as $routePattern=>$templateView){            
            $routePatternRegexp = $this->transformRouteWithRegexp($routePattern);
                        
            if(preg_match('/^'.$routePatternRegexp.'$/',$this->url,$matches)){
                $vars = $this->detectVars($routePattern, $matches); 
                $this->callView($templateView, $vars);
                return;
            }        
        }
        $this->callView("404.php");
    }
    
    private function transformRouteWithRegexp($routePattern){
        $routePattern = str_replace("/","\/",$routePattern);
        foreach($this->regExpParam as $param=>$regexp){
           $routePattern = str_replace($param,$regexp,$routePattern);
        }
        return $routePattern;
    }
    
    private function detectVars($routePattern, $matches){
        $vars = [];
        $matches = array_slice($matches,1);
        if(preg_match_all('/{(\w+)}*/',$routePattern,$detected)){
            foreach($detected[1] as $key=>$value){
                $vars[$value]=$matches[$key];                
            }
            return $vars;
        }
    }
    
    private function callView($vue, $vars = null){            
        if(!@include("vue/".$vue)){            
            throw new RouterException('La vue '.$vue.' n\'existe pas dans le dossier "/vue/"');
        }
        require_once("vue/".$vue); 
    }
    
}


