<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        //Utilizando a busca no banco, para saber se o id existe
        $sqlSelect = "SELECT *  FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        //Se o resultado for > 0, vai deletar o id. 
        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }

    header('Location: sistema.php');
   
?>