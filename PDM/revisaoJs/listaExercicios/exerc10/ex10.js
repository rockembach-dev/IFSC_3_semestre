let tarefas = [];

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
  mensagem.textContent = mensagem
  tarefas.push(tarefa)
  mostrarTarefas()
 }


function mostrarTarefas(){
 let listaTarefas = document.getElementById("lista");  //se a caixa nao estiver vazia, faz a lista
 listaTarefas.innerHTML = ""

 let i = 0
 for(i; i < tarefas.length; i++){
 let novaTarefa = document.createElement("li");
 novaTarefa.textContent = tarefas[i];

 //Botão que remove o item da lista 
 let botaoRemover = document.createElement("button")
 botaoRemover.textContent = "REMOVER"
 novaTarefa.appendChild(botaoRemover)


 listaTarefas.appendChild(novaTarefa); //pega o elemento "pai" e adiciona um novo elemento "filho"
 }
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
