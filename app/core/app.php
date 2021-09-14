<?php

    class app{

        protected $controller = 'homeController';
        protected $method = 'index';
        protected $params = [];
        
        function __construct(){
            
            $url = $this->getUrl();
            if(file_exists($url[0])){
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once '../app/controllers/'.$this->controller.'.php';

            if($url[1]){
                if(method_exists($this->controller,$url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            $cont = new $this->controller;
            call_user_func_array([$cont,$this->method],$this->params);
        }

        private function getUrl(){
            if(isset($_GET['url'])){
                $url = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
                return $url;
            }
            
        }
    }
?>