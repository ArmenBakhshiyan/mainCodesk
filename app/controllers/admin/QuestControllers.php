<?php
     class QuestControllers extends Controller{
          public function index(){
               $data = $this -> model('quest') -> select() -> leftJoin('quest','id','quest_answer','quest_id') -> execute() -> array();
               $this -> view('admin/quest',$data);
          }

          public function start(){
               //$data = $this -> model('quest') -> select() -> leftJoin('quest','id','quest_answer','quest_id') -> order('RAND()') -> LIMIT(10)  -> execute() -> array();
               $data = $this -> model('quest') -> select1('q.*,quest_answer.*') -> from('(SELECT * FROM quest ORDER BY RAND() LIMIT 5) AS q') -> leftJoin('q','id','quest_answer','quest_id') -> order('quest_id') -> execute() -> array();
               $this -> view('start',$data);
          }

          public function quize(){
               $this -> view('quize');
          }
     }
?>
