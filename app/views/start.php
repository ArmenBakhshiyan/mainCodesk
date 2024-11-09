   <?php
     if(!isset($_SESSION['user']))
     {
          redirect('');
     }
?>

<div class="bg-danger  text-center container-fluid p-5" style="height: 100%;">
     <section class="text-center mt-2 h1">
          <p class="">Bari Galust Codesk qnnakan hartak</p>
          <h2 class="text-info mt-3"><?= $_SESSION['user']['name'] .' '. $_SESSION['user']['lastname']?></h2>
          <hr class="mt-5">
     </section>
     <section class="harcashar text-center mt-3  bg-success">
          <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel" data-bs-interval="0">
               <div class="carousel-inner">
                    <?php
                         for($i=0;$i<count($data);$i=$i+4){
                    ?>


                    <div class="carousel-item <?= $i==0 ? ' active' :''?>  text-center "  data-stop = <?= 1+$i/4?>>
                         <p class="h2"><?=$data[$i]['text_area']?></p>
                         <div class=" border d-flex p-2 h3 justify-content-between">
                              <div class="h5 border p-2 col-3"><p><?=$data[$i]['answer']?></p><input type="checkbox" class="ms-3" data-quest_id = <?=$data[$i]['quest_id']?> data-answer_id = <?=$data[$i]['id']?> onchange="clickTrue(this)"></div>
                              <div class="h5 border p-2 col-3"><p><?=$data[$i+1]['answer']?></p><input type="checkbox" class="ms-3" data-quest_id = <?=$data[$i]['quest_id']?> data-answer_id = <?=$data[$i+1]['id']?> onchange="clickTrue(this)" ></div>
                              <div class="h5 border p-2 col-3"><p><?=$data[$i+2]['answer']?></p><input type="checkbox" class="ms-3" data-quest_id = <?=$data[$i]['quest_id']?> data-answer_id = <?=$data[$i+2]['id']?> onchange="clickTrue(this)" ></div>
                              <div class="h5 border p-2 col-3"><p><?=$data[$i+3]['answer']?></p><input type="checkbox" class="ms-3" data-quest_id = <?=$data[$i]['quest_id']?> data-answer_id = <?=$data[$i+3]['id']?> onchange="clickTrue(this)" ></div>
                         </div>
                    </div>

                    <?php
                  
                           }
                    ?>
               </div>
               <div class="position-relative p-5">
                    <button class="position-absolute btn btn-info" style="top:50px;left:150px;"  data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                         <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                         <span class="">Previous</span>
                    </button>
                    <button class="position-absolute btn btn-info" style="top:50px; right:150px;" id='startNext'  data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                         <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                         <span class="">Next</span>
                    </button>
                    <button class="btn btn-info invisible" id = 'sendAnswer'>Ampopel tvyalner@</button>
               </div>
          </div>
     </section>
</div>
<script src='http://maincodesk.am/public/js/start.js'></script>

<?php
  //var_dump($data);
?>