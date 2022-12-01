<?php
//Conexão com o banco de dados 

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario-unitcoffee';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    /*if($conexao->connect_erron)
    {
        echo "Erro";
    }
    else
    {
        echo "Conexão efetuada com sucesso";
    } */


?>