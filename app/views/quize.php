
<?php
     if(!isset($_SESSION['user']))
     {
          redirect('');
     }
     $row = $this -> model('login') -> select() -> where('id','=',$_SESSION['user']['id']) -> execute() -> array();
     $today = new DateTime();
     $futureDate = new DateTime($row[0]['date']);
     $interval = $today->diff($futureDate);
     if($row[0]['status'] == 1){
          var_dump('duq ancel eq');
     }else{

          if($interval ->days < 31){
               var_dump('duq chek karox noric handznel, qani vor  chi ancel 1 amis '.$interval->days);
               // sleep(25);
               // set_time_limit(30);
             //  redirect('');
            }
     }
?>

<section class="text-center mt-3 p-1">
     <h2 class="text-primary h1">Pajmanner@</h2>
     <p class="p-4 border">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
     </p>
     <div class="d-grid gap-2 mt-5 ">
          <button class="btn btn-success <?= $interval ->days < 31 ? 'invisible' :''?>" type="button "><a href="<?=DOMEN?>admin/quest/start" class="h1">Start</a></button>
          <button class="btn btn-success <?= $interval ->days < 31 ? '' :'invisible'?>" type="button"><a href="<?=DOMEN?>" class="h1">Start</a></button>
     </div>
</section>