<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylelogin.css">
    <title>Login</title>
  </head>
  <body>
  <p>  
  <button type= "button" class= "btn btn-info btn-xs" > <a href="home.php" class="btn btn-lg btn-danger btn-3f">Voltar</a>
  </button>    
  </p>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Entrar">
        </form>
    </div>
</body>
</html>    
