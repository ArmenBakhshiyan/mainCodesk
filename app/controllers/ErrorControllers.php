<?php
     class ErrorControllers extends Controller{
          public function error(){
               parent::view('error');
          }
          public function index(){
               parent::view('index');
          }
     }
?>