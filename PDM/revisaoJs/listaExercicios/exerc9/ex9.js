document.getElementById("btCalculo").addEventListener("click",_=>{
 let peso = document.getElementById("peso").value;
 let altura = document.getElementById("alt").value; 
 let imc = Number(peso)/Number(altura*altura);
 let classificacao;
 document.getElementById("resultado").innerText = imc.toFixed(2);

 if(imc < 18.5){
  document.getElementById("classificacao").innerText = "Abaixo do Peso";
 }
 else if(imc <24.9){
  document.getElementById("classificacao").innerText = "Peso adequado";
 }
 else if(imc <29.9){
  document.getElementById("classificacao").innerText = "sobrepeso";
 }
 else{
  document.getElementById("classificacao").innerText = "obesidade";
 }
})