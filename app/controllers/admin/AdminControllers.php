<?php
     class AdminControllers extends Controller{
          public function admin(){
               $this -> view('admin/admin');
          }
          public function index(){
               $this -> view('admin/index');
          }
          public function dashboard(){
               $this -> view('admin/dashboard');
          }
     }
?>