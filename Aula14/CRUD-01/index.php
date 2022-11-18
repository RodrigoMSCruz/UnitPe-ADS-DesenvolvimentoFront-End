<!DOCTYPE html>

<?php include("conexao.php");
    $grupo = selectAllPessoa();
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CRUD com PHP e MySQL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstap/4.2.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="styleshhet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <body>
            <div class="posicionarCabecalho">
                <h1>Agenda Pessoal</h1>
            </div>
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thread>
                <tbody>
                    <?php>
                        foreach($grupo as $pessoa){ ?>
                            <tr>
                                <th><?=$pessoa["nome"]?></th>
                                <th><?=$formatoData($pessoa["nascimento"])?></th>
                                <th><?=$pessoa["telefone"]?></th>
                                <th><?=$pessoa["endereco"]?></th>
                                <th>
                                    <form name="alterar" action="alterar.php" method="post">
                                        <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                                        <input type="hidden" name="editar" value="Editar">
                                    </form>
                                </th>
                                <th>
                                    <form name="excluir" action="conexao.php" method="post">
                                        <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                                        <input type="hidden" name="acao" value="Excluir">
                                        <input type="hidden" name="excluir" value="Excluir">
                                    </form>
                                </th>

                            </tr>
                        }
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <button type="button" class="btn btn-primary"><a href="inserir.php">Adicionar pessoa</a></button>
            </div>
            <?php
                function formatoData($data){
                    $array = explode("-", $data);
                    $novaData = $array[2]."/".array[1]."/".$array[0];
                    return $novaData;
                }
            ?>
        </body>
    </div>
</body>
</html>