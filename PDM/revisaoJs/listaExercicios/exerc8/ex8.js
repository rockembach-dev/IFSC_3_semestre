let tamFonte = 1
let pesoFonte = ""

function fonteMais(){
  tamFonte += 0.1
  document.querySelector('p').style.fontSize = tamFonte+"em"
}

function fonteMenos(){
  tamFonte -= 0.1
  document.querySelector('p').style.fontSize = tamFonte+"em"
}

function negrito(){
 if(pesoFonte == ""){
  pesoFonte = "bold"
 }
 else{
  pesoFonte = ""
 }
 document.querySelector('p').style.fontWeight = pesoFonte
}