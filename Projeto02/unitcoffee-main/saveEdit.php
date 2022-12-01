<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $genero = $_POST['genero'];
        $senha = $_POST['senha'];

        $sqlInsert = "UPDATE usuarios 
        SET nome='$nome', email='$email', telefone='$telefone', data_nascimento='$data_nascimento', genero='$genero', senha='$senha'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');
?>    
