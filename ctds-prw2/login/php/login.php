<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/style.css">

 <title> Sistema de Login </title>
</head>
<body>
  <h1> Login de usuário </h1>

  <form action="login.php" method="post">
   <fieldset>
    <legend> Módulo de login de usuário </legend>

    <label class="alinha"> Nome de Usuário: </label>
    <input type="text" name="username" autofocus required>

    <label class="alinha"> Senha: </label>
    <input type="password" name="senha" required>

    <div>
    <button name="logar"> Logar usuário </button>
    </div>
   </fieldset>
  </form>
 
</body>
</html>