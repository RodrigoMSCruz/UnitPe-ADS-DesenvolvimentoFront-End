<?php
    include("conexao.php");
    $pessoa = selectIdPessoa($_POST["id"])
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<div class="container">
    <form name="dadosPEssoa" action="conexao.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" size="20"></td>
                </tr>
                <tr>
                    <td>Nascimento:</td>
                    <td><input type="date" name="nascimento" value="<?=$pessoa["nascimento"]?>"></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" size="20"></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" size="20"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="acao" value="alterar">
                        <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                    </td>
                    <td><input type="hidden" name="Enviar" value="Enviar"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>