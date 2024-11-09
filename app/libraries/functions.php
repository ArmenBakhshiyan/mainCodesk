<?php
     session_start();
     function redirect($url){
          header('Location: '.DOMEN.$url);          
     }

     function set_sesion($ses_name,$ses_value){
          $_SESSION[$ses_name] = $ses_value;
          return true;
     }

     function get_session($ses_value){
          $val ='0';
          if(isset($_SESSION[$ses_value])){
               $val = $_SESSION[$ses_value];
          }
          return $val;
     }

     function remove_session($ses_name){
          unset($_SESSION[$ses_name]);
          return true;
     }

     function isset_session($ses_name){
          return isset($_SESSION[$ses_name]);
     }
     
     function img_delet($url){
          unlink($url);

     }

     function file_upload($arr){
          $rashirenieArray = ['png','jpg', 'jpeg','avi','apv','ogg','mp4'];
          $rezArray['status'] = true;
          $rezArray['href'] = [];
          $fileRash = [];
          foreach($arr['name'] as $key => $value)
          {
               $fileRash[$key] = explode('.',$value)[count(explode('.',$value))-1];
               $allowed = in_array($fileRash[$key],$rashirenieArray);
               if($allowed !== true){
                    $rezArray['status'] = false;
               }
          }
          if($rezArray['status'] == true){
               foreach($arr['tmp_name'] as $key => $value)
               {
                    $newname = md5(date('YmdHis',time()).mt_rand()).'.'.$fileRash[$key];
                    $upload = move_uploaded_file($value, PUBLIC_PATH . 'uploads/mainslider/'.$newname);
                    if($upload){
                         $rezArray['href'][$key] = PUBLIC_PATH . 'uploads/mainslider/'.$newname;
                    }
                    else{
                         foreach($rezArray['href'] as $value){
                              unlink($value);
                         }
                         $rezArray['status'] = false;
                         break;
                    }    
               }
          }
          return $rezArray;
     }
     ?>