<?php
     class Controller{
          public function view($view,$data = false){


               $array = explode('/',$view);
               $admin ='';
               if($array[0]=='admin' && $array[1] != 'login'){
                    $admin = 'admin';
               }
               require_once APP_ROOT.'views/'.$admin.'/layouts/header.php';
               require APP_ROOT.'views/'.$view.'.php';
               require_once APP_ROOT.'views/'.$admin.'/layouts/footer.php';

               
          }

          public function model($model){
               $model = ucfirst($model);
               require_once "app/models/".$model.'.php';
               return new $model;

          }

     }
?>