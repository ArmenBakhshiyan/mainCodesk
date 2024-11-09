<?php
     class LoginControllers extends Controller{
          public function index(){
             //  $data = $this -> model('mainslider') -> select() -> order('position') -> execute() -> array();
               $this -> view('login');
          }
     }
?>