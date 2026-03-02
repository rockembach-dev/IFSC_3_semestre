 <?php


 class Curso 
 {
 

  public $nome;
  public $duracao;

  //método que cria o construtor personalizado
  function __construct($nome, $duracao)
  {
   $this->nome = $nome;
   $this->duracao = $duracao;
  }

  function classificarCurso()
  {
   //classificando o curso acessando o atributo duracao do objeto
   if($this->duracao <= 1)
   {
    $mensagem = "Curso de curta duração";
   }
   else if($this->duracao < 4)
   {
    $mensagem = "Curso de média duração";
   }
   else
   {
    $mensagem = "Curso de Longa duração";
   }

   return $mensagem;
  }

    //método getter para mostrar o nome do curso
    function mostrarNome()
    {
     return $this->nome;
    }
 } 



 ?>