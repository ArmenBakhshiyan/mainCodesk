<?php
     class Db {
          private $con;
          protected $table_name;
          protected $query;
          protected $executed;


          // Create connection
          public function __construct($name){
               $this -> table_name = $name;
               $this -> con = new mysqli(HOST,USER, PASSWORD, DB_NAME);
               // Check connection
               if ($this -> con -> connect_error) {
                    die("Connection failed: " . $this -> con -> connect_error);
               }

               $this -> con -> set_charset("utf8mb4");
             
          }

          public function leftJoin($str_left,$str_left_id,$str_right,$str_right_id){
               $this -> query .= ' LEFT JOIN '.$str_right .' ON '. $str_left.'.'.$str_left_id .'='. $str_right.'.'.$str_right_id;
               return $this;
          }

          public function order($fild,$ask = false){
              $this -> query .= ' ORDER BY ' .  $fild.' ' . $ask;
              return $this;
          }

          public function select($str = '*'){
               $this -> query = "SELECT $str FROM  " . $this -> table_name;
               return $this;
          }

          public function select1($str = '*'){
               $this -> query = "SELECT $str ";
               return $this;
          }

          public function from($str ){
               $this -> query .= " from $str ";
               return $this;
          }

          public function LIMIT ($count){
               $this -> query .= " LIMIT " . $count;
               return $this;  
          }
          
          public function delete(){
               $this -> query = "DELETE  FROM  " . $this -> table_name;
               return $this;
          }

          public function update($arr){
               $str = '';
               foreach($arr as $key => $val){
                    $str .= $key .' = '. "'".$val."'" .',';
               }
               $str = substr($str,0,-1);
               $this -> query = "UPDATE " . $this -> table_name . " SET ".$str;
               return $this;
          }

          public function insert($arr){
               $table_colum_name = '';
               $table_colum_value = '';
               foreach($arr as $key => $val){
                    $table_colum_name .= $key.',';
                    $table_colum_value .= "'".$val."'".',';
               }
               $table_colum_name = substr($table_colum_name,0,-1);
               $table_colum_value = substr($table_colum_value,0,-1);
               $this->query = 'INSERT INTO '. $this -> table_name.'('.$table_colum_name.') VALUES ('.$table_colum_value.')';
               return $this;
          }

          public function where($fieldName, $operator, $value){
               $this -> query .= " WHERE ".$fieldName . $operator . "'". $value. "'";
               return $this;
          }

          public function whereAnd($fieldName, $operator, $value){
               $this -> query .= " AND ".$fieldName . $operator . "'". $value. "'";
               return $this;
          }

          public function whereOr($fieldName, $operator, $value){
               $this -> query .= " OR ".$fieldName . $operator . "'". $value. "'";
               return $this;
          }

          public function execute(){
               $this -> executed = mysqli_query($this -> con, $this -> query);
               return $this;
          }
          
          public function array() {
               $k = 0;
               $arryRow = [];
               
               while($row = mysqli_fetch_assoc ($this -> executed)){
                    $arryRow[$k] = $row;
                    $k++;
               }
               return $arryRow;
          }

          public function numRows(){
               return mysqli_num_rows($this -> executed);
          }
          
        
     }

?>