
<div class="mt-5" >''</div>
<div class = "mt-1" style="background-color: aquamarine;">
<div class="mt-1 p-2" id = 'mes' ></div>
<form id = "addQuestForma">
              <div class = 'mt-5'>
                <div class = 'd-flex'>
                  <div class = 'mt-5 d-flex flex-column col-5'>
                      <label class = 'text-danger'>Quest</label>
                      <textarea name = 'text_area' id = '' class = 'mt-2 quits_text' rows="6" placeholder = 'Please input the question' value = ''></textarea>
                  </div>

                  <div class = 'mt-5 d-flex flex-column col-7'>
                    <label class ='text-info'>Answer</label>
                    <div>
                         <input type = 'text' name = 'answer1' id = 'eng_title'   class = 'w-75 quits_text ' placeholder = 'Please input the answer'>
                         <input type="checkbox" name = 'quest_true1' class = "ms-2 checkt">
                         <label class ='text-info queri_label'>True</label>
                    </div>
                    <div>
                         <input type = 'text' name = 'answer2' id = 'eng_title'   class = 'w-75 mt-2 quits_text' placeholder = 'Please input the answer'>
                         <input type="checkbox" name = 'quest_true2' class="ms-2 checkt">
                         <label class ='text-info queri_label'>True</label>
                    </div>
                    <div>
                         <input type = 'text' name = 'answer3' id = 'eng_title'   class = 'w-75 mt-2 quits_text' placeholder = 'Please input the answer'>
                         <input type="checkbox" name = 'quest_true3' class="ms-2 checkt">
                         <label class ='text-info queri_label'>True</label>
                    </div>
                    <div>
                         <input type = 'text' name = 'answer4' id = 'eng_title'   class = 'w-75 mt-2 quits_text' placeholder = 'Please input the answer'>
                         <input type="checkbox" name = 'quest_true4' class="ms-2 checkt">
                         <label class ='text-info queri_label'>True</label>
                    </div>
                  </div>
                </div>   
                <div class="text-center">
                    <input type = 'button' id = 'add_quest' name = '' value = 'Add quest' class = 'mt-4 border-3 btn btn-outline-light ' >
                </div>
              </div>
          </form>
          <hr style="border-top: 3px solid #000;">
          <div class="mt-5 p-3 table table-hover">
               <table class="table table-bordered">
                    <thead>
                         <tr>
                              <th scope="col">#</th>
                              <th scope="col">Text_area</th>
                              <th scope="col">Answer 1</th>
                              <th scope="col">Answer 2</th>
                              <th scope="col">Answer 3</th>
                              <th scope="col">Answer 4</th>
                              <th scope="col">Delet</th>
                              <!-- <th scope="col">Edit</th>                               -->
                         </tr>
                    </thead>
                    <tbody id="addRowJs">

<?php
     $k=0;
     for($i = 0; $i < count($data);$i = $i+4){
?>
     <tr data-id = <?= $data[$i]['quest_id']?> >
          <th scope="row" ><?= $data[$i]['quest_id'] ?></th>
          <td><?=$data[$i]['text_area']?></td>
     <?php
               for($j = $k; $j < $k+4; $j++){
     ?>
          <td><?=$data[$j]['answer']?><input type="checkbox" class="ms-2" <?= $data[$j]['quest_true']?'checked':''?> disabled></td>

<?php 
     }
     $k = $k+4;
?>
          <td><button class="btn btn-outline-danger" data-toggle="modal" data-target = "#questModal"  data-id = <?= $data[$i]['quest_id']?> onclick="deletQuest(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

     </tr>
<?php
     }
?>                         
                    </tbody>
                    </table>
               </div>
          </div>


<div class="modal fade" id="questModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    Դուք համոզվաց եք որ պետք է հեռացնել?
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="deleteMi" class="btn btn-primary" data-id = "0" onclick="deleteMi(this)" data-dismiss="modal">Save changes</button>
               </div>
          </div>
     </div>
 </div>