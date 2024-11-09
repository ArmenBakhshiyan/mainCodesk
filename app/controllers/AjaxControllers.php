<?php
     class AjaxControllers extends Controller{
          private $obj;


          public function __construct()
          {
               $input = file_get_contents('php://input');
               $this -> obj = json_decode($input);
          }

          public function questDeletRow(){
               $id = $this -> obj -> id;
               $number = $this -> model('quest_answer') -> delete() -> where('quest_id', '=', $id) -> execute() ;
               $number1 = $this -> model('quest') -> delete() -> where('id', '=', $id) -> execute() ;
               echo json_encode('true');
          }

          public function login(){

                $username = $this -> obj->login;
                $password = $this -> obj -> pas;

               $number = $this -> model('users') -> select() -> where('username', '=', $username)-> whereAnd('password', '=', $password) -> execute() -> numRows();
               if($number == 1){    
                   
                    set_sesion('login_admin',$username);
                    set_sesion('login_password',$password);
                    $answer['url'] = DOMEN.'admin/dashboard';
                    $answer['status'] = true;
               }else{
                    set_sesion('error','The imported data is incorrect');
                    $answer['url'] = DOMEN.'admin/login';
                    $answer['status'] = false;

               }     
               echo json_encode($answer);
         }

         public function deletRowUrl(){
               $id = $this -> obj->id;
               $url = $this -> model('mainslider') -> select() ->  where('id', '=', $id) -> execute() -> array() ;
               img_delet($url[0]['file_link']);
               $number = $this -> model('mainslider') -> delete() -> where('id', '=', $id) -> execute() ;
               $answer['url'] = DOMEN.'admin/dashboard';
               echo json_encode($answer);
         }

         public function modelRow(){
          $id = $this -> obj->id;
          $arr = $this -> model('mainslider') -> select() -> where('id','=',$id) -> execute() -> array();
          echo json_encode($arr);
         }
         
         public function updateMove(){
               $arrayId = $this -> obj->position;
               foreach($arrayId as $key => $value){
                    $x['position'] = $value[1];
                    $arr = $this -> model('mainslider') -> update($x) -> where('id','=',$value[0]) -> execute() ;
               }
               echo json_encode(true);    
          }

          public function editRow(){
               $array = [];              
               foreach($_POST as $key => $val){
                    $array[substr($key,0,-1)] = $val;
               }

               if($_FILES['up_load1']['name'][0] != ''){
                    $rezUpload = file_upload($_FILES['up_load1']);
                    img_delet($array['file_link']);
                    $array['file_link'] = $rezUpload["href"][0];                   
               };

               if(($array['arm_title'] == '' or  $array['arm_link'] == '') && ($array['eng_title'] == '' or $array['eng_link'] == '')){
                          $emptiInput = 'Popoxutyun@ chkatarvec toxeri datark linelu pacharov'; 
               }else{
                    $this -> model('mainslider') -> update($array) ->where('id','=',$array['id']) -> execute();
                    unset($_POST);
                    echo json_encode('http://maincodesk.am/admin/dashboard');                    
               }         
          }

          public function addQuest(){
               $arr = [];
               $retArr =[];
               $array =(array)$this -> obj;
               $arr['text_area'] = $array['text_area'];
               $retArr['text_area']= $array['text_area'];
               $this -> model('quest') -> insert($arr) -> execute();
               $x = $this -> model('quest') -> select('MAX(id) as p') -> execute() -> array();
               array_splice($array, 0, 1);
               $retArr['id'] = $x[0]['p'];
               $arr = [];
               for($i = 1;$i < 5; $i++){
                    $arr['quest_id'] = $x[0]['p'];
                    $arr['answer'] = $array['answer'.$i];
                    $retArr['answer'.$i] = $array['answer'.$i];
                    if(isset($array['quest_true'.$i])){
                         $arr['quest_true'] = 1;
                         $retArr['quest_true'.$i] = 1;
                    }
                    $this -> model('quest_answer') -> insert($arr) -> execute();
                    $arr = [];
               }
               echo json_encode($retArr); 
          }

          function loginRegistring(){
               $array =(array)$this -> obj;
               if(!filter_var($array['email'], FILTER_VALIDATE_EMAIL)){
                    $array['status'] = '0';  
                    $array['mes'] = 'email not corect';
               }else{
                    foreach($array as $key => $val){
                         if($key == 'password'){
                              $array[$key] = md5(htmlspecialchars($val));
                         }else{
                              $array[$key] = htmlspecialchars($val);
                         }                         
                    }
                    $Email = $this -> model('login') -> select() -> where('email','=',$array['email']) -> execute() -> numRows();
                    $phone = $this -> model('login') -> select() -> where('phone','=',$array['phone']) -> execute() -> numRows();
                    if($Email == 1 or $phone == 1){
                         $array['status'] = '2';
                         $array['mes'] = 'Are you registered';
                    }else{
                          $this->model('login') -> insert($array) -> execute();
                         $array['status'] = '1'; 
                         $array['mes'] = 'You have successfully registered';
                    }
               }
               echo json_encode($array); 
          }

          function loginEnter(){
               $arr =[];
               $array =(array)$this -> obj;
               $rez = $this -> model('login') -> select() -> where('email','=',htmlspecialchars($array['email'])) -> whereAnd('password','=',md5(htmlspecialchars($array['password'])))  -> execute() -> array();
               if(count($rez) == 1 ){
                    if(isset($array['loginRemembr'])){
                         setcookie("loginName", $rez[0]['name'], time() + (86400 * 30*12), "/");
                    }
                    $_SESSION['loginName'] = $rez[0]['name'];
                    $_SESSION['user'] = $rez[0];
                    $arr['url'] = 'http://maincodesk.am';
                    $arr['mes'] = 'chishta';
                    $arr['status'] = '1';
               }else{
                    $arr['mes'] = 'You are not registring';
                    $arr['status'] = '0';
               }
               echo json_encode($arr); 
          }

          function logout(){
               $array =(array)$this -> obj;
               setcookie("loginName", "", time() - 3600, "/");
               unset($_SESSION['loginName']);
               unset($_SESSION['user']);
               $array['url'] = 'http://maincodesk.am';
               echo json_encode($array);
          }

          function sendQueri(){
               $array = $this -> obj;
               $answerAray = 0;
               foreach($array as $key => $value){
                    $rez = $this -> model('quest_answer') -> select() -> where('quest_id','=',$key) -> whereAnd('quest_true','=','1') -> execute() -> array();
                    if(count($value) == count($rez)){
                         $countValue = 0;
                         foreach($rez as $answerValue){
                              if(array_search($answerValue['id'], $value ) !== false ){
                                   $countValue++;
                              }
                         }
                         if($countValue == count($value)){
                              $answerAray += 10;
                         }
                    }
               }
               $arr['rating'] = $answerAray;
               $arr['date'] = date('Y-m-d'); 
               if($answerAray>=80){
                    $arr['status'] = 1; 
               }
               $array1['name'] =$_SESSION['user']['name'] .' '. $_SESSION['user']['lastname'];
               $array1['rating'] =  $answerAray;
               $this -> model('login') -> update($arr)-> where('id','=',$_SESSION['user']['id']) -> execute();
               $array1['url'] = 'http://maincodesk.am';
               echo json_encode($array1);
          }
     } 
?>