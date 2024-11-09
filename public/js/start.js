let count = 0;
const obj = {}
let sendAnswer = document.getElementById('sendAnswer');
document.getElementById('startNext').addEventListener('click',function(){
    let element = document.getElementsByClassName('active')[0]
     if(+element.getAttribute('data-stop') == 4){
          sendAnswer.classList.remove('invisible')
          sendAnswer.classList.add('visible')
      }
})

function sendData(){
     fetch('http://maincodesk.am/ajax/sendQueri',{
          method: "POST",
          body:JSON.stringify(obj)
          }).then((response) => response.json()).then((obj) =>{
               if(obj['rating'] < 50){
                    alert(obj['name'] +' ' +obj['rating'] +' miavor  karox eq porcel 1 amsic')
                    window.location.href = obj['url']
                 }else{
                    alert(obj['name'] +' ' +obj['rating'] +' miavor  kkapnven dzez het')
                 }

          })
     
}


function clickTrue(element){
     var answer_id = +element.getAttribute('data-answer_id');
     var quest_id = +element.getAttribute('data-quest_id');
     if(element.checked){
          if(obj[quest_id] == undefined ){
                obj[quest_id] = []
          }
          obj[quest_id].push(answer_id);
     }
     if(!element.checked){
          obj[quest_id] = obj[quest_id].filter(item => item !== answer_id);
      }

}

setTimeout(function() {
     alert('dzez mnacel e 30 v');
 }, 6000000);

 setTimeout(function() {
     sendData();
 }, 6030000);


// if(element.checked){
//      array[+quest_id]=[]
//      array[+quest_id][+answer_id] = 1;
//      console.log(array)
     
// }
// if(!element.checked){
//     delete array[+quest_id][+answer_id] 
// }
sendAnswer.addEventListener('click',sendData);