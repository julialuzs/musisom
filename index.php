<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MUSISOM</title>
</head>

<body>

    <div id="container">

        <?php require('navbar.php'); ?>

        <div id="conteudo">

            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php if (!empty($produtos)) : ?>

                <!-- Tabela de Clientes -->
                <table class="table table-striped">
                    <tr class='active'>
                        <th>Foto</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Valor</th>
                        <th>Quantidade em Estoque</th>
                        <th>Ação</th>
                    </tr>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <td><img src='fotos/<?= $cliente->foto ?>' height='40' width='40'></td>
                            <td><?= $cliente->nome ?></td>
                            <td><?= $cliente->email ?></td>
                            <td><?= $cliente->celular ?></td>
                            <td><?= $cliente->status ?></td>
                            <td>
                                <a href='editar.php?id=<?= $cliente->id ?>' class="btn btn-primary">Editar</a>
                                <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?= $cliente->id ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php else : ?>
                <h3 class="text-center text-primary">Não existem instrumentos cadastrados!</h3>
            <?php endif; ?>

        </div>

    </div>

</body>

</html>