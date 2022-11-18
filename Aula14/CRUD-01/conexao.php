<?php
    if(isset($_POST["acao"])){
        if($_POST["acao"]=="inserir"){
            inserirPessoa();
        }
        if($_POST["acao"]=="alterar"){
            alterarPessoa();
        }
        if($_POST["acao"]=="excluir"){
            excluirPessoa();
        }
    }

    //Responsável por criar uma conexão com o banco
    function abrirBanco(){
        $conexao = new mysqli("localhost", "root", "12345678@", "agenda");
        return $conexao;
    }

    function inserirPessoa(){
        $banco = abrirBanco();
        $sql = "INSERT INTO pessoa(nome, nascimento, endereco, telefone)
        VALUES ({$_POST["nome"]}','{$_POST["nascimento"]}','{$_POST["endereco"]}','{$_POST["telefone"]}')";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function alterarPessoa(){
        $banco = abrirBanco();
        $sql = "UPDATE pessoa SET nome={$_POST["nome"]}, nascimento='{$_POST["nascimento"]}', endereco='{$_POST["endereco"]}', telefone='{$_POST["telefone"]}' WHERE id={$_POST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirPessoa(){
        $banco = abrirBanco();
        $sql = "DELETE FROM pessoa WHERE id='{$_POST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function selectAllPessoa(){
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa ORDER BY nome";
        $resultado = $banco->query($sql);
        $banco->close();
        while($row = mysqli_fetch_array($resultado)){
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdPessoa($id){
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa WHERE id=".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltarIndex(){
        header("Location:index.php");
    }

    /*
    Script PL-SQL para criar a base AGENDA e criar a tabela pessoa no banco MySQL;
        CREATE DATABASE AGENDA;
        USE AGENDA;
        DROP TABLE pessoa;

        CREATE TABLE pessoa(
        id int  PRIMARY KEY NOT NULL AUTO_INCREMENT ,
        nome varchar(25) NOT NULL,
        nascimento date NOT NULL,
        telefone varchar(15) NOT NULL
        )
        ENGINE=InnoDB DEFAULT CHARSET=utf8;
    */
?>