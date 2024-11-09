
const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
$(document).ready(function() {

     $('.register-show').hide();
 
     $('input[name="active-log-panel"]').on('change', function (){
          if ($('#log-reg-show').is(':checked')) {
               $('.login-show').addClass('show-log-panel').show();
               $('.register-show').removeClass('show-log-panel').hide();
          } else {
               $('.register-show').addClass('show-log-panel').show();
               $('.login-show').removeClass('show-log-panel').hide();
          }
     })
});

 function chektregister(el){
     var inputReg = document.getElementsByClassName('registring')
     const email = document.getElementById('emailReg');
     inputReg = Array.from(inputReg)
     inputReg.forEach ((element) => {
          if(element.value == ''){
               element.classList.add('borderRed')
          }else{
               element.classList.remove('borderRed')
          }
     });
     if(email.value != ''){
          if(!regex.test(email.value)){
               email.classList.add('borderRed')
               alert('Ներմուծեք ճշգրիտ Email')
          }

     }
     if(document.getElementsByClassName('borderRed').length > 0){
          alert('Նշված դաշտերը պարտադիր են')
     }else{
          var form = document.getElementById('formaRegistring');
          var formData = new FormData(form);
          obj = {};
          for (let [key, value] of formData.entries()) {
               obj[key] = value;             
           }
          fetch('http://maincodesk.am/ajax/loginRegistring',{
               method: "POST",
               body:JSON.stringify(obj)
               }).then((response) => response.json()).then((obj) =>{ 
                    var x = document.getElementById('log-reg-show');
                    if(obj['status'] != '0'){
                         Array.from(inputReg).forEach((el)=>{
                              el.value = '';
                         })
                          alert(obj['mes']);
                          x.checked = 'checked';
                         $('.login-show').addClass('show-log-panel').show();
                         $('.register-show').removeClass('show-log-panel').hide();
                    }else if(obj['status'] == '0'){
                         alert(obj['mes']);
                    }else{
                         Array.from(inputReg).forEach((el)=>{
                              el.value = '';
                         })
                         alert(obj['mes']);
                         x.checked = 'checked';
                         $('.login-show').addClass('show-log-panel').show();
                         $('.register-show').removeClass('show-log-panel').hide();
                    }
               })
     }
 }

 function  chektMutq(el){
     var inputReg = document.getElementsByClassName('mutq')
     const loginRemembr = document.getElementById('loginRemembr')
     const email = document.getElementById('emailEnt');
     inputReg = Array.from(inputReg)
     inputReg.forEach ((element) => {
          if(element.value == ''){
               element.classList.add('borderRed')
          }else{
               element.classList.remove('borderRed')
          }

     });

     if(email.value != ''){
          if(!regex.test(email.value)){
               email.classList.add('borderRed')
               alert('Ներմուծեք ճշգրիտ Email')
          }
     }

     if(document.getElementsByClassName('borderRed').length > 0){
          alert('Նշված դաշտերը պարտադիր են')
     }else{
          const obj = {};
          if(loginRemembr.checked){
               obj['loginRemembr'] = 'checked'
          }
          inputReg.forEach ((element) => {
               obj[element.getAttribute('name')] = element.value;
          })

          fetch('http://maincodesk.am/ajax/loginEnter',{
               method: "POST",
               body:JSON.stringify(obj)
               }).then((response) => response.json()).then((obj) =>{
                    if(obj['status'] == 1){
                         window.location.href = obj['url'];
                    }else{
                         alert(obj['mes'])
                    }
               })
     }
 }

 function logout(element){
     const obj = {};
     fetch('http://maincodesk.am/ajax/logout',{
     method: "POST",
     body:JSON.stringify(obj)
     }).then((response) => response.json()).then((obj) =>{
          window.location.href = obj['url'];
     })
 }