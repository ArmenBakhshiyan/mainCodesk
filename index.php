<?php
     require 'app/configs/config.php';
     
     require 'app/libraries/Controller.php';
     require 'app/libraries/functions.php';
     require 'app/libraries/Database.php';

     
     class Router{

          public $controller = 'IndexControllers';
          public $method = 'index';
          public $dir = 'app/controllers/';

          public function __construct(){
               $url = $this ->getUrl();
               if($url[0] != ""){
                    if($url[0] === 'admin'){
                         $this -> dir .= 'admin/';
                         array_shift($url);
                    }
               }

               if(!empty($url[0])){
                    $this -> controller = ucfirst(ltrim($url[0])).'Controllers';
               }
               
               if(!empty($url[1])){
                    $this -> method = $url[1];
               }
               

               $dirFile = $this -> dir. $this ->controller .'.php';
               
               if(!file_exists($dirFile)){
                    redirect('error');
               }    
               
               require $dirFile;
               
               if(!class_exists($this -> controller)){
                    
                    redirect($url[0].'/error'); 
               }

               $this -> controller = new $this -> controller;
               
               if(!method_exists($this -> controller,$this -> method)){
                    redirect($url[0].'/error');
               }

               call_user_func([$this -> controller,$this -> method]);  
          } 
          
          public function getUrl(){
               $url = $_SERVER['REQUEST_URI'];
               $url = explode('/',$url);
               array_shift($url);
               return $url;
          }
     }
     new Router;
?>