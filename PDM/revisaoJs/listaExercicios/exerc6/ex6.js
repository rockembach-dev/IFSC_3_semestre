document.getElementById("btSoma").addEventListener("click",_=>{
 let n1 = document.getElementById("n1").value
 let n2 = document.getElementById("n2").value
 let total = Number(n1) + Number(n2) 
 document.getElementById('resultado').innerText = total
})