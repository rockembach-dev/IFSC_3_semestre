function addTarefa(event){
 let tarefa = document.getElementById('tarefa').value
 let listaTarefas = document.querySelector('ul')

 let novaTarefa = document.createElement('li') // Cria novo <LI>
 novaTarefa.innerText = tarefa //Define o texto dentro do <LI>

 let btPronto = document.createElement('span')
 btApagar.innerText = "[]"
 novaTarefa.appendChild(btPronto)

 

 let btApagar = document.createElement('span') // Cria um <span>
 btApagar.innerText = "[X]" // define texto do <span>

 novaTarefa.addEventListener('click', event=>{ //trata evento que apaga
  listaTarefas.removeChild(novaTarefa)         //elemento <li>
 })

 novaTarefa.appendChild(btApagar) // Insere <span> em <li>
 listaTarefas.appendChild(novaTarefa) //Insere <li> em <ul>
}