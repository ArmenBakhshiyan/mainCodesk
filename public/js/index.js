     //var add_quest = document.getElementById("add_quest");
     
     function login(){
          let login = document.getElementById('typeEmailX-2').value;
               let pas = document.getElementById('typePasswordX-2').value;
               let obj ={
                    login:login,
                    pas:pas                    
               }
               
               fetch('http://maincodesk.am/ajax/login',{
                    method: "POST",
                    body: JSON.stringify(obj)
               }).then((response) => response.json()).then((objId) =>{
                    window.location.href = objId['url'];
               });

     }

     function onlyOne(checkbox) {
          var checkboxes = document.getElementsByName('check_main')
          checkboxes[0].checked = false;
      }

      function onlyall(checkbox){
          var checkboxes = document.getElementsByName(checkbox.name)
          var checkboxesAll = document.getElementsByName("check")
          checkboxesAll.forEach((item) => {
               item.checked = checkboxes[0].checked
           })
      }

      function modalDelelet(a){
          window.del_id = a.getAttribute('data-id');
          window.tr = a.parentNode.parentNode;
          
      }

      function deletRow(a){
          let obj ={
               id:del_id
          }
          fetch('http://maincodesk.am/ajax/deletRowUrl',{
               method: "POST",
               body: JSON.stringify(obj)
          }).then((response) => response.json()).then((objId) =>{
               tr.remove();
          });
      }

      function editRow(a){
          a = $(a).data('id');
          let obj ={
               id:a
          }
          fetch('http://maincodesk.am/ajax/modelRow',{
               method: "POST",
               body: JSON.stringify(obj)
          }).then((response) => response.json()).then((objId) =>{
               for(let key in objId[0]){
                         if(key != 'file_link'){
                              document.getElementById(key+'1').value = objId[0][key]
                         }else{
                              document.getElementById(key+'11').src = '/'+objId[0][key]
                              document.getElementById(key+'1').value = objId[0][key]
                         }
               };

      })
     }

     $(document).ready(function() {
          // demo.initChartsPages();
          $(function() {
             $('#tbody' ).sortable({
                   update: function(event,ui){
                       $(this).children().each(function(index){

                         if($(this).attr('data-position') != (index+1)){
                              
                           $(this).attr('data-position',(index+1)).addClass('updated');
                         }
                       })
                       saveNewPosition();
                   }
             })
          })
 
          function saveNewPosition(){
           var position = [];
           $('.updated').each(function(){
             //  alert($(this).attr('data-position'));
             position.push([$(this).attr('data-id'),$(this).attr('data-position')]);
             $(this).removeClass('updated')
           })
           obj = {
              position:position
           }
           fetch('http://maincodesk.am/ajax/updateMove',{
               method: "POST",
               body: JSON.stringify(obj)
           }).then((response) => response.json()).then((obj) =>{
           })
 
          }
     })

     function changDashboard(){
        //  let up_load = document.getElementById('up_load1');
          let emptyInput = document.getElementById('emptyInput');
          let arm_title = document.getElementById('arm_title1').value;
          let arm_link = document.getElementById('arm_link1').value;
          let eng_title = document.getElementById('eng_title1').value;
          let eng_link = document.getElementById('eng_link1').value;
         // let id = document.getElementById('id1').value

          emptyInput.innerText = '';

         // const file = up_load.files[0];
          const formDate = new FormData(img_upload);
         // formDate.append('file_img',up_load)

          if((arm_title == '' ||  arm_link == '') && (eng_title == '' || eng_link == '')){
               emptyInput.innerText = 'Dashter@ chisht chen lracvel';
          }else{
               fetch('http://maincodesk.am/ajax/editRow',{
                    method: "POST",
                    body: formDate
                    }).then((response) => response.json()).then((obj) =>{                   
                          window.location.href = obj;
                 
                    })
              
          }  
     }

     function delAll(){
          const checkboxes = document.querySelectorAll('input[name = "check"]:checked');
          checkboxes.forEach(function(element){
               let id = $(element).attr('data-id');
               let obj ={
                    id:id
               }
               
               fetch('http://maincodesk.am/ajax/deletRowUrl',{
                    method: "POST",
                    body: JSON.stringify(obj)
               }).then((response) => response.json()).then((obj) =>{
                  //  tr.remove();
                  document.querySelector(`tr[data-id="${id}"]`).remove();
               });
          })
     }

    


if(document.querySelector('#carouselExampleCaptions')){        
const carousel = document.querySelector('#carouselExampleCaptions');
const buttons = carousel.querySelectorAll('.button');
const divCreat = document.createElement('div');
divCreat.style.top = '19px'
divCreat.style.position = 'absolute';
divCreat.style.zIndex = '999'
divCreat.style.width = '0px'
divCreat.style.borderRadius = '5px'
// divCreat.style.left = '13px'
divCreat.style.borderBlockColor = 'yellow'
divCreat.style.borderWidth = '2px' 
divCreat.style.transition = 'width 3s ease'
divCreat.style.id = 'reamov'
let k=0
//carousel.append(divCreat);
let left  

function updateButtonColors() {

 
 
    buttons.forEach((button, index) => {
     
     
        if(button.classList.contains('active')){
          let width = window.getComputedStyle(button).width
          let id = Number(button.getAttribute('data-bs-slide-to'))+1
          if(id>=buttons.length){
               id=0
          }
          divCreat.style.width = 0
          if(k==0){
               left = k *(50 + parseFloat(width))+13.1
               k++;
          }else{
               left = id *(50 + parseFloat(width))+13.1
          }
          
          divCreat.style.left = left +'px'
          carousel.append(divCreat);
          }
        
    });
}
function updateButtonColors1(){
     buttons.forEach((button, index) => {
     
          if(button.classList.contains('active')){
          let width = window.getComputedStyle(button).width
          divCreat.style.width = (parseInt(width)+3)+'px'}
     })
}
 carousel.addEventListener('slide.bs.carousel',updateButtonColors);
 carousel.addEventListener('slid.bs.carousel',updateButtonColors1);
  updateButtonColors(); 
  updateButtonColors1();
}
if(document.getElementById("add_quest")){
document.getElementById("add_quest").addEventListener("click", function(event) {
     var mess = document.getElementById('mes')
     var queri_label = document.getElementsByClassName('queri_label')
     var inputs = document.getElementsByClassName('quits_text')
     const labelsArray = Array.from(queri_label); // Փոխարկում ենք HTMLCollection-ը զանգվածի
     var checkbox = document.getElementsByClassName('checkt')
     labelsArray.forEach((lable)=>{
          lable.classList.remove('text-danger');
      })
     let count = 0;
     mess.innerText = ''
    for (let i = 0;i < inputs.length; i++){
          if (inputs[i].value.trim() === "") {
               inputs[i].style.borderColor = "red";
               mess.innerText = 'Նշված դաշտերը պարտադիր են'
           } else {
               inputs[i].style.borderColor = ""; 
           }
           if(i<inputs.length-1 && checkbox[i].checked !== true){
               count++
           }
     }
     if(count === 4 && mess.innerText.trim() === ''){
           mess.innerText = 'Նշվածներից գոնե մեկը պարտադիր է'
           labelsArray.forEach((lable)=>{
               lable.classList.add('text-danger');
           })
     }
     if(mess.innerText.trim() === '' && count !==4){
          var form = document.getElementById('addQuestForma');
          var formData = new FormData(form);
          obj = {};
          for (let [key, value] of formData.entries()) {
               obj[key] = value;             
           }
          fetch('http://maincodesk.am/ajax/addQuest',{
               method: "POST",
               body:JSON.stringify(obj)
               }).then((response) => response.json()).then((obj) =>{     
                   // console.log(obj);
                    const input = Array.from(inputs);   
                    const checkboxs = Array.from(checkbox); 
                    input.forEach((element)=>element.value = '');  
                    checkboxs.forEach((element)=>element.checked = false);     
                    
                    console.log(obj['quest_true1']!= undefined ? 'checked' :'1');
                    const tr = document.getElementById('addRowJs');
                    var newRow = `<tr data-id = ${obj['id']}>
                         <th scope='row'>${obj['id']}</th>
                         <td>${obj['text_area']}</td>
                         <td>${obj['answer1']}<input type='checkbox' class='ms-2 '${obj['quest_true1']!= undefined ? 'checked ' :''} disabled></td>
                         <td>${obj['answer2']}<input type='checkbox' class='ms-2 '${obj['quest_true2']!= undefined ? 'checked ' :''} disabled></td>
                         <td>${obj['answer3']}<input type='checkbox' class='ms-2 '${obj['quest_true3']!= undefined ? 'checked ' :''} disabled></td>
                         <td>${obj['answer4']}<input type='checkbox' class='ms-2 '${obj['quest_true4']!= undefined ? 'checked ' :''} disabled></td>
                         <td><button class='btn btn-outline-danger' data-toggle="modal" data-target = "#questModal" data-id = ${obj['id']} onclick="deletQuest(this)"><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                    </tr>`

                   tr.insertAdjacentHTML('afterbegin', newRow);

               })
     }

 });
}

const addQuset = () => {

}

function deletQuest(el){

     const id = el.getAttribute('data-id');
     document.getElementById('deleteMi').setAttribute('data-id',id)
}
//add_quest.addEventListener('click', function(){
function deleteMi(el){
     let id = el.getAttribute('data-id')
     let obj ={
          id:id
     }
     fetch('http://maincodesk.am/ajax/questDeletRow',{
          method: "POST",
          body: JSON.stringify(obj)
     }).then((response) => response.json()).then((obj) =>{
          const elements = document.querySelectorAll(`tr[data-id="${id}"]`)[0];
          setTimeout(()=>{
               elements.remove()
          },1000)
          
     });
     

}

