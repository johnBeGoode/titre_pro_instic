<?php
require("RouterException.php");

class Router{
    
    private $url;    
    private $regExpParam = [];
    private $routes = [];
    
    public function __construct($url){
        $this->url = $url;
        
        $routesJsonFile = file_get_contents(__DIR__."/../../config/routes.json");
        $routesJson = json_decode($routesJsonFile, true);
        $this->routes = $routesJson['routes'];
        $this->regExpParam = $routesJson['regexParam'];            
    }
    
    public function getRoute(){
        foreach($this->routes as $routePattern => $templateView){            
            $routePatternRegexp = $this->transformRouteWithRegexp($routePattern);
            // $matches correspond aux différents match de la regExp avec l'url
            if(preg_match('/^'.$routePatternRegexp.'$/', $this->url, $matches)){
                $vars = $this->detectVars($routePattern, $matches); 
                $this->callView($templateView, $vars);
                return;
            }        
        }
        Router::badUrl();
    }
    
    // Transforme les routes pour les rendre compatible avec les regEx
    private function transformRouteWithRegexp($routePattern){
        $routePattern = str_replace("/","\/",$routePattern);
        foreach($this->regExpParam as $param => $regexp) {
           $routePattern = str_replace($param,$regexp,$routePattern);
        }
        return $routePattern;
    }
       
    private function detectVars($routePattern, $matches){
        $vars = [];
        $matches = array_slice($matches, 1); // on fait sauter le 1er param qui correspond a l'url entière qui a matché
        // Détection des mots entre crochets grâce aux parenthèses capturantes
        if(preg_match_all('/{(\w+)}*/', $routePattern, $detected)){
            foreach($detected[1] as $key=>$value){
                $vars[$value]=$matches[$key];                
            }
            return $vars;
        }
    }
    
    public static function badUrl(){
        require_once("../controllers/404Controller.php"); 
    }
    
    private function callView($vue, $vars = null){ 
        // On vérifie que la vue existe           
        if(!@include("../controllers/". $vue ."Controller.php")){            
            throw new RouterException('Le controller '. $vue .'Controller.php n\'existe pas dans le dossier "/controllers/"');
        }
        require_once("../controllers/". $vue ."Controller.php"); 
    }   
}


