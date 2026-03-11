let btAdd = document.getElementById("btAdd")
let listaAtual = document.getElementById("listaAtual")

btAdd.addEventListener('click', addItem)

function addItem(){
 let item = document.getElementById("txtItem").value
 listaAtual.innerHTML = listaAtual.innerHTML+ "<li>" + item + "</li>"
}