<div id="carouselExampleCaptions" class = "carousel slide position-relative" data-ride="carousel" data-interval="2000">
     <div class=" carousel-indicators left_slayd">

     <?php
          $visible = 'visible';
          $invisible = 'invisible hidden';
          $name = '';
          if(isset($_SESSION['loginName'])){
               $visible = 'invisible hidden';
               $invisible = 'visible';
               $name = ' Hi '.$_SESSION['user']['name'].' '.$_SESSION['user']['lastname'] ;
          }
     $active = 'active';  
      foreach($data as $key => $value){
        
          if($key!==0)
          {
               $active = 'ms-5';
          }
          if($key === 0){

     ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to = <?=$key.""?> class="button <?=$active?>" aria-current="true" aria-label="Slide <?=$key+1?>"></button>
     <?php
          }else{
     ?>
     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to = <?=$key.""?> class="button <?=$active?>"  aria-label="Slide <?=$key+1?>"></button>
     <?php
          }
      }
     ?>     
          <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class = 'button ms-5' aria-label="Slide 2"></button> -->
          <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class = 'button ms-5' aria-label="Slide 3"></button> -->
     </div>

   

     <div class="carousel-inner ">
     <?php
      $active = 'active';
      foreach($data as $key => $value)
      {
          if($key!==0)
          {
               $active = '';
          }
          $x = $value['file_link'];
     ?>
          <div class="carousel-item <?=$active?> ">
                    <img src = <?= $x?> class="d-block w-100 vh-100" alt="...">
                    <div class="carousel-caption  d-none d-md-block ">
                         <div>
                              <p class = "text-start">Some representative placeholder content for the first slide.
                                     : not simultaneous or concurrent in time : not synchronous. asynchronous sound. 2. :
                                  of, used in, or being digital (see digital sense 4) communication (as between computers) in
                                    which there is no timing requirement for
                                     transmission and in which the start of each character is individually signaled by the transmitting ...
                              </p>
                         </div>
                         <div class="position-absolute  d-flex a_href mt-5 ms-2">
                              <div class=" a_hovr  rounded-pill">
                                   <a class="group  inline-block   px-5 py-3  duration-300 bg-lightblack backdrop-blur-md border-transparent  text-white " href="projects/sembla" target="_blank" rel="noopener noreferrer">
                                        <span >SEMBLA</span>
                                        <span class="overflow-hidden inline-flex w-[16px] justify-end pl-4 md:pl-8">
                                             <span class="inline-block duration-200 ease-in-out group-hover:translate-x-full pr-4">→</span>
                                             <!-- <span class="inline-block duration-200 ease-in-out group-hover:translate-x-full">→</span> -->
                                        </span>
                                   </a>
                              </div>
                              <div class="ms-5">
                                   <h5 class="mt-3">Third slide label</h5>
                              </div>     
                         </div>
                    </div>
          </div>

          <?php
}
     ?>
          <div id = 'botCenter' class = " rounded-pill text-white  position-absolute" style="height: 70px;">
               <button id="btn_hover" class="text-white btn btn-outline-primary ">HalloBasis</button>
               <button id="btn_hover" class="text-white btn ">Projects</button>
               <button id="btn_hover" class="text-white btn ">About</button>
               <button id="btn_hover" class="text-white btn ">News <i class="fa fa-circle yel" aria-hidden="true"></i></button>
               <button id="btn_hover" class="text-white btn <?=$visible?>"><a href="<?=DOMEN?>login"> Login</a></button>
               <button id="btn_hover" class="text-white btn hid <?=$invisible?>" onclick="logout(this)" title=""><i class="fa fa-sign-out" aria-hidden="true"><?=$name?></i></button>
               <button id="btn_hover" class="text-white btn <?=$invisible?>"><a href="<?=DOMEN?>admin/quest/quize"> Queze</a></button>
          </div>
     </div>
  <button class="carousel-control-prev  sizeBorder" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next sizeBorder" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>