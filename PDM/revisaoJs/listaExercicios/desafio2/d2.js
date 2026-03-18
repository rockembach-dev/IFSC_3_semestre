function ligaDesliga(){
 let lamp = document.querySelector('img')

 let estado = lamp.getAttribute('src')
  if(estado == "lampada-apagada.png"){
   lamp.setAttribute('src','lampada-acesa.png')
  }else{
   lamp.setAttribute('src','lampada-apagada.png')
  }
 
}