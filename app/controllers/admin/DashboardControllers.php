<?php
     class DashboardControllers extends Controller{

          public function index(){
               $number = $this->model('users')->select()->where('username', '=', get_session('login_admin'))-> whereAnd('password', '=', get_session('login_password'))-> execute() -> numRows();
               if($number == 1){
                   $data = $this -> model('mainslider')-> select() -> order('position') -> execute()->array();
                   $this -> view('admin/dashboard',$data);
               }
               else{
                    $this -> view('admin/login');
               }
          }

          public function addSlider(){
             
               $array = [];
               $empty_am = true;
               $empty_eng = true;
               $empty_f = true;

               $mess = '';
               $fupload = true;
               $amnput = true;
               $enginput = true;
               $_SESSION['error1'] = array();

               if(isset($_POST['submit'])){
                    
                    if(empty($_FILES['up_load']['name'][0]))
                    {
                         $empty_f = false; 
                    }

                    foreach($_POST as $key => $val)
                    {
                         if($key !== 'submit'){
                              $array[$key] = $val;
                              if($val == '' && ( $key == 'arm_title' || $key == 'arm_link')){
                                   $empty_am = false; 
                              }
                              if($val == '' && ( $key == 'eng_title' || $key == 'eng_link')){
                                   $empty_eng = false; 
                              }
                         }
                    }

                    if(!$empty_f){
                         $mess = 'please choose file';
                         $fupload = false;

                    }elseif(!$empty_am && !$empty_eng){
                         $mess = 'please input  am or eng';
                         $amnput = false;
                    }else{
                         $rezUpload = file_upload($_FILES['up_load']);
                         $array['file_link'] = $rezUpload['href'][0];
                         $empty_eng = true;
                         $empty_am = true;
                         if($rezUpload['status'] != true){
                              $empty_f = false;
                              $mess = 'please choose  img or video';
                         }
                    }
                  }
                  if($empty_f && $empty_eng &&  $empty_am && isset($_POST['submit'])){
                        $x = $this -> model('mainslider') -> select('MAX(position) as p') -> execute() -> array();
                        $array['position'] = $x[0]['p'] + 1;
                        $this -> model('mainslider') -> insert($array) -> execute();
                  }
                  array_push($_SESSION['error1'],$mess, $fupload,$amnput,$enginput);
                  unset($_POST['sabmit']);
                   redirect('admin/dashboard');
                 
          }

     }

?>
