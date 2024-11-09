
      <div class='content'>
      <div class = 'border border-2 border-black mt-5 bg-danger w-100 text-white h1 text-center'>
              <?php
                  $eng_border = '';
                  $am_border = '';
                  $f_border = '';
                  
                  if(isset($_SESSION['error1'][0]) && $_SESSION['error1'][0] != ''){   
                    if(!$_SESSION['error1'][1]){
                      $f_border = 'border-danger';
                    }
                    if(!$_SESSION['error1'][2]){
                      $am_border = 'border-danger';
                    }
                    if(!$_SESSION['error1'][3]){
                      $eng_border = 'border-danger';
                    }
                    echo ($_SESSION['error1'][0]);
                  }
                  if(isset($_SESSION['error2'][0]) && $_SESSION['error2'][0] != '' ){
                    echo ($_SESSION['error2'][0]);
                  }
              ?>
          </div>
          <form action = '<?= DOMEN ?>admin/dashboard/addSlider' method = 'post' enctype = 'multipart/form-data'>
              <div class = ''>
                <div class = "w-75 d-flex justify-content-between">
                    <input type = 'file' id = 'up_load' class = 'border <?= $f_border?>' name = 'up_load[]' accept=".png,.jpg, .jpeg,.avi,.apv,.ogg,.mp4" multiple>
                    <!-- <a href = "<?=DOMEN?>admin/quest" class="link-opacity-10-hove link-underline-warning link-offset-3">Questionnaire <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                </div>

                <div class = 'd-flex'>
                  <div class = 'mt-5 d-flex flex-column col-5'>
                      <label class = 'text-danger'>ARM</label>
                      <input type = 'text' name = 'arm_title' id = 'arm_title' class = 'slaid  <?= $am_border?>' placeholder = 'Ներմուծել հայերեն' value = ''>
                      <input type = 'text' name = 'arm_link' id = 'arm_link' class = 'slaid mt-2 <?= $am_border?>' placeholder = 'Ներմուծել հայերեն'>
                  </div>

                  <div class = 'mt-5 d-flex flex-column col-5'>
                    <label class ='text-info'>EN</label>
                    <input type = 'text' name = 'eng_title' id = 'eng_title'  class = 'slaid <?= $eng_border?>' placeholder='input english'>
                    <input type = 'text' name = 'eng_link' id = 'eng_link' class = 'slaid <?= $eng_border?> mt-2' placeholder = 'input english'>
                  </div>
                </div>   
                <div>
                    <input type = 'submit' name = 'submit' value = 'Create' class = 'mt-4' >
                </div>
                  
              </div>
          </form>
          <div class = 'mt-5'>
              <table class="table table-stripped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">N</th>
                      <th scope="col">Arm_title</th>
                      <th scope="col">Arm_link</th>
                      <th scope="col">Eng_title</th>
                      <th scope="col">Eng_link</th>
                      <th scope="col">img</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Del</th>
                      <th scope="col"><input  type = "checkbox" name="check_main" onclick = "onlyall(this)">
                        <button class = "btn" onclick = "delAll()" data-bs-toggle="modal" data-bs-target="#exampleModal">All dellete</button>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                  <?php
                      foreach($data as $key => $val)
                      {
                  ?>
                  
                    <tr data-position = <?= $val['position']?>  data-id = <?= $val['id']?>>
                      <th scope="row"><?=$key+1?></th>
                      <td><?= $val['arm_title']?></td>
                      <td><?= $val['arm_link']?></td>
                      <td><?= $val['eng_title']?></td>
                      <td><?= $val['eng_link']?></td>
                      <td><img src = "/<?= $val['file_link']?>" alt="Girl in a jacket" width="50" height="60"></td>
                      <td ><button type="button" class = 'btn text-danger ' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick = "modalDelelet(this)"  data-id = '<?= $val['id']?>'  ><i class="fa fa-trash fa-4x"  aria-hidden="true"></i></button></td>
                      <td><button class = 'text-success'  data-id = '<?= $val['id']?>' onclick = 'editRow(this)' data-bs-toggle="modal" data-bs-target="#exampleModalChoose"><i class="fa fa-pencil-square-o fa-4x" aria-hidden="true" ></i></button></td>
                      <td><input type = 'checkbox' name="check" data-id = <?= $val['id']?> onclick = "onlyOne(this)" ></td>
                    </tr>
                    <?php 
                  }
                  ?>
                  </tbody>
                </table>
          </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
      Duq hamozvac eq vor petqe heracvi
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id = 'id' onclick="deletRow(this)" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalChoose" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id = 'img_upload' method = 'post' enctype = 'multipart/form-data'>
              <div class = ''>
                <div class = 'd-flex'>
                <div >
                    <input type = 'file' id = 'up_load1' class = 'border <?= $f_border?>' name = 'up_load1[]' accept=".png,.jpg, .jpeg,.avi,.apv,.ogg,.mp4" multiple>
                </div>
                  <div class = 'ms-4'>
                      <input type="image" src=""   id = 'file_link11' width="100" height="100" alt = 'nkar'/>
                      <input type="text" class = 'invisible' id = 'file_link1' name = 'file_link1' value = ''/>
                      <!-- <img  id = 'file_link1' width="100" height="100" alt = 'nkar'/> -->
                  </div>
              </div>
                <div class = 'd-flex'>
                  <div class = 'mt-5 d-flex flex-column col-5'>
                      <label class = 'text-danger'>ARM</label>
                      <input type = 'text' name = 'arm_title1' id = 'arm_title1'  placeholder = 'Ներմուծել հայերեն' value = ''>
                      <input type = 'text' name = 'arm_link1' id = 'arm_link1'  class = '  mt-2' placeholder = 'Ներմուծել հայերեն'>
                  </div>

                  <div class = 'mt-5 d-flex flex-column col-5'>
                    <label class ='text-info'>EN</label>
                    <input type = 'text' name = 'eng_title1' id = 'eng_title1'   placeholder='input english'>
                    <input type = 'text' name = 'eng_link1' id = 'eng_link1' class = ' mt-2' placeholder = 'input english'>
                  </div>
                </div>   
              </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" name = 'submit1' id = 'editSave' class="btn btn-primary" onclick = "changDashboard()" >Save changes</button>
        <input type="text" class = 'invisible' id = 'id1' name = 'id1' value = <?=$val['id']?>/>
      </div>
      <div id = 'emptyInput' class="mx-auto text-warning h3"></div>
      </form>
    </div>
  </div>
</div>