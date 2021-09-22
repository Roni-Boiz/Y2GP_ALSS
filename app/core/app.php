<?php

    class app{

        protected $controller = 'homeController';
        protected $method = 'index';
        protected $params = [];
        
        function __construct(){
            
            $url = $this->getUrl();
            
            // new code
            // if(isset($url[0])){
            //     // session_start();
            //     if(isset($_SESSION['type']) && !empty($_SESSION['type'])){
            //         echo $_SESSION['type'];
            //         $url[0]="adminController";
            //     }   
            // }

            // old code
            $file = '../app/controllers/'.$url[0].'.php';
            if(file_exists($file)){
                $this->controller = $url[0];
                unset($url[0]);
            }
            else{
                echo "Sorry File was Not Exist";
            }

            require_once '../app/controllers/'.$this->controller.'.php';
            $cont = new $this->controller;
            
            if($url[1]){
                if(method_exists($this->controller,$url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
                else{
                    echo "Request Method was Not Found";
                }
            }

            $this->params = $url ? array_values($url) : [];

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