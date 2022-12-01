<?php
    //Utilizando o método POST, para incluir as informações no banco
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['data_nascimento']) && !empty($_POST['genero']) && !empty($_POST['senha']))
    {
        //print_r($_POST['nome']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $genero = $_POST['genero'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,data_nascimento,genero,senha) 
        VALUES ('$nome', '$email', '$telefone','$data_nascimento', '$genero', '$senha')");

        //echo  "<script>alert('Pesquisa enviada com Sucesso!');</script>";
        header('location: login.php');
        
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleformulario.css">
    <title>Unit Coffe</title>
  </head>
  <body>
    <div>
        <p><img src="img/logo.png" width="400px" height="400px"></p>
            <div class="content">   
                <h1>Cadastro ☕</h1>
                <form action="formulario.php" method="POST">
                   <div>
                    <input type="text" name="nome" placeholder="Digite seu nome" class="inputs required" oninput="nameValidate()">
                    <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                   </div> 
                   <div>
                        <input type="email" name="email" placeholder="Digite seu e-mail" class="inputs required" oninput="emailValidate()">
                        <span class="span-required">Digite um email válido</span>
                    </div>                    
                    <div>
                        <input type="tel" name="telefone" placeholder="Digite o número do seu celular" class="inputs required" oninput="telValidate()">
                        <span class="span-required">Digite apenas os números com DDD</span>
                    </div>
                    <div>
                        <input type="date" name="data_nascimento" placeholder="Digite sua data de nascimento" class="inputs required">
                        
                    </div>
                    <p>Sexo</p>
                    <div class="box-select">
                        <div>
                            <input type="radio" id="f" value="feminino" name="genero">
                            <label for="f">Feminino</label>
                        </div>   
                        <div>
                            <input type="radio" id="m" value="masculino" name="genero">
                            <label for="m">Masculino</label>
                        </div>
                        <div>
                            <input type="radio" id="o" value="outro" name="genero">
                            <label for="o">Outro</label>
                        </div> 
                        <br><br>
                    </div>
                    <div>
                        <input type="password" name="senha" placeholder="Digite sua senha" class="inputs required">
                        
                    </div>
                      
                    
                    
                    <button type="submit" name="submit" id="submit">Enviar</button> 
                              
                </form>
            
            </div>              
    </div> 
  </body>
  <script>
    const form = document.getElementById('form');
    const campos = document.querySelectorAll('.required');
    const spans  = document.querySelectorAll('.span-required');
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    //Definindo mensagens ao clicar em enviar
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        nameValidate();
        emailValidate();
        telValidate();
    });

    function setError(index){
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }

    function removeError(index){
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }

    function nameValidate(){
        if(campos[0].value.length < 3)
        {
            setError(0);
        }
        else
        {
            removeError(0);
        }
    }

    function emailValidate(){
        if(!emailRegex.test(campos[1].value))
        {
            setError(1);
        }
        else
        {
            removeError(1);
        }
    }

    function telValidate(){
        if(campos[2].value.length < 11 || campos[2].value.length > 11)
        {
            setError(2);
        }
        else
        {
            removeError(2);
        }
    }
  </script>
  </html>