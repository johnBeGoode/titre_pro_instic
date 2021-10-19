<?php
require("RouterException.php");

class Router {
    
    private $url;    
    private $regExpParam = [];
    private $routes = [];
    
    public function __construct($url) {
        $this->url = $url;
        
        $routesJsonFile = file_get_contents(__DIR__ . "/../../config/routes.json");
        $routesJson = json_decode($routesJsonFile, true);
        $this->routes = $routesJson['routes'];
        $this->regExpParam = $routesJson['regexParam'];            
    }
    
    public function getRoute() {
        
        foreach ($this->routes as $routePattern => $templateView) {   
            $routePatternRegexp = $this->transformRouteWithRegexp($routePattern);
            // Si matches est fourni, il sera rempli par les résultats de la recherche
            if (preg_match('#^'. $routePatternRegexp .'$#', $this->url, $matches)) {
                $vars = $this->detectVars($routePattern, $matches); 
                $this->callController($templateView, $vars);
                return;
            }        
        }
        Router::badUrl();
    }
    
    // Transforme les routes pour les rendre compatible avec les regEx
    private function transformRouteWithRegexp($routePattern) { 
        // $routePattern = str_replace("/","\/",$routePattern);
        foreach ($this->regExpParam as $param => $regexp) {
            $routePattern = str_replace($param, $regexp, $routePattern);
        }
        return $routePattern;
    }
       
    private function detectVars($routePattern, $matches) {
        $vars = [];
        // on fait sauter le 1er param qui correspond a l'url entière qui a matché
        // Détection des mots entre accolades grâce aux parenthèses capturantes
        $matches = array_slice($matches, 1);
        // raccourci \w indique un caractère alphanumérique et l'underscore
        // met la correspondance dans $detected (correspond aux param slug, id...)
        if (preg_match_all('/{(\w+)}*/', $routePattern, $detected)) { 
            // $detected[1] = 0 => 'slug' et 1 => 'id' et non 0 => {slug} et 1 => {id}
            foreach ($detected[1] as $key=>$value) {
                $vars[$value] = $matches[$key];                
            }
            return $vars;
        }
    }
    
    public static function badUrl() {
        require_once("../controllers/404Controller.php"); 
    }
    
    private function callController($vue, $vars = null) { 
        // On vérifie que le contrôleur existe           
        if (!@include("../controllers/". $vue ."Controller.php")) {            
            throw new RouterException('Le controller '. $vue .'Controller.php n\'existe pas dans le dossier "/controllers/"');
        }
        require_once("../controllers/". $vue ."Controller.php"); 
    }   
}