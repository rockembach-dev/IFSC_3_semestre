function validar(){
 let nome = document.getElementById("nome").value
 let email = document.getElementById("email").value

 if(nome==''){
  document.getElementById('erroNome').style.display='block'
 }
 else {
  document.getElementById('erroNome').style.display='none'
 }

 if(email==''){
  document.getElementById('erroEmail').style.display='block'
 }
 else {
  document.getElementById('erroEmail').style.display='none'
 }
}