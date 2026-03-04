// Seleciona o formulário e a mensagem de agradecimento

const form = document.getElementById('interestForm');

form.addEventListener('submit', function (event){
 event.preventDefault(); //Previna o envio padrão do formulário
 //Obter dados do formulário
 let nomeForm = document.getElementById("nome")
 let emailForm = document.getElementById("email")
 let mensagemForm = document.getElementById("mensagem")

 //Cria HTML da mensagem
 let mensagemHtml = `<div class="message">
 <h3>${nomeForm.value} - ${emailForm.value}</h3>
 <p>${mensagemForm.value}</p>
 </div>`

 //Inclui a mensagem no final
 let forum = document.getElementById("forum")
 forum.innerHTML += mensagemHtml
 
});