<?php
    /*Utilizando o método GET, para pegar as informações do banco e editar.
    Verificando se o id não estar vazio */ 
    
    include_once('config.php');

        if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id"; //condição se o id é igual ao que estar utilizando
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0) //Se o numero de registro não for maior que 0, ele não existe. 
        {
            while($user_data = mysqli_fetch_assoc($result)) //Pegando o resultado dos dados
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $data_nascimento = $user_data['data_nascimento'];
                $genero = $user_data['genero'];
                $senha = $user_data['senha'];
                
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }
  
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleedit.css">
    <title>Editar Cadastro</title>
  </head>
  <body>
    <div>
        <p><img src="img/logo.png" width="400px" height="400px"></p>
            <div class="content">    
                <form action= "saveEdit.php" method="POST">
                   <h1>Editar Cadastro ☕</h1>
                   <div>
                    <input type="text" name="nome" placeholder="Digite seu nome" class="inputs required" value="<?php echo $nome ?>" oninput="nameValidate()"> <!-- Colocando o value para imprimir a variável -->
                    <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                   </div> 
                   <div>
                        <input type="email" name="email" placeholder="Digite seu e-mail" class="inputs required" value="<?php echo $email ?>" oninput="emailValidate()">
                        <span class="span-required">Digite um email válido</span>
                    </div>                    
                    <div>
                        <input type="tel" name="telefone" placeholder="Digite o número do seu celular" class="inputs required" value="<?php echo $telefone ?>" oninput="telValidate()">
                        <span class="span-required">Digite apenas os números com DDD</span>
                    </div>
                    <div>
                        <input type="date" name="data_nascimento" placeholder="Digite sua data de nascimento" class="inputs required" value="<?php echo $data_nascimento ?>">
                        
                    </div>
                    <p>Sexo</p>
                    <div class="box-select">
                        <div>
                            <input type="radio" id="f" value="feminino" name="genero" <?php echo ($genero == 'feminino') ? 'checked' : '';?> required>
                            <label for="f">Feminino</label>
                        </div>   
                        <div>
                            <input type="radio" id="m" value="masculino" name="genero" <?php echo ($genero == 'masculino') ? 'checked' : '';?> required>
                            <label for="m">Masculino</label>
                        </div>
                        <div>
                            <input type="radio" id="o" value="outro" name="genero" <?php echo ($genero == 'outro') ? 'checked' : '';?> required>
                            <label for="o">Outro</label>
                        </div> 
                        <br><br>
                    </div>
                    <div>
                        <input type="password" name="senha" placeholder="Digite sua senha" class="inputs required" value="<?php echo $senha ?>">
                        
                    </div>

                    <input type="hidden" name="id" value=<?php echo $id;?>>
                    <button type="submit" name="update" id="update">Enviar</button> 
                              
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
    form.addEventListener('update', (event) => {
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