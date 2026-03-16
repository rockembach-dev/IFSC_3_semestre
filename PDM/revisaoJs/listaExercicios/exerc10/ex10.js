//Arrow function
document.getElementById("btAdd").addEventListener("click",_=>{
 //recebe o valor do input
 let inputTarefa  = document.getElementById("inputTarefa");
 let tarefa = inputTarefa.value;

 //mensagem de erro
 if (tarefa == ""){
  let mensagemErro = "A caixa de tarefa está vazia"
  document.getElementById("mensagem").textContent = mensagemErro
 //mensagem de sucesso
 }else{
  let mensagem = "Tarefa adicionada com sucesso!"
 document.getElementById("mensagem").textContent = mensagem

 //se a caixa nao estiver vazia, faz a lista
 let listaTarefas = document.getElementById("lista");
 let novaTarefa = document.createElement("li");

 novaTarefa.textContent = tarefa;

 //pega o elemento "pai" e adiciona um novo elemento "filho"
 listaTarefas.appendChild(novaTarefa);

 inputTarefa.value=""
 }
})

//função para se o usuário apertar ENTER ele adiciona.
//O "e" é um objeto criado automaticamente pelo navegador e ele contém varias propriedades prontas com info dos eventos.
//e = key : "enter", type: "keypress", target: input, timeStamp: 123.
document.getElementById("inputTarefa").addEventListener("keypress",e=>{
 if(e.key === "Enter"){
  document.getElementById("btAdd").click();
 }
})
