let b1 = document.getElementById("b1")
let b2 = document.getElementById("b2")
let divNumero = document.getElementById("divNumero")
let valorAtual = 0

b1.addEventListener("click",aumentar)
b2.addEventListener("click",diminuir)

function aumentar(){
 valorAtual = valorAtual + 1
 divNumero.innerText = valorAtual
}

function diminuir(){
 valorAtual = valorAtual - 1
 divNumero.innerText = valorAtual
}