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

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <span id="title"> MUSISOM</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="cadastrar-form.php"> Cadastrar </a>
                    </li>

                </ul>
            </div>
        </nav>

        <div id="conteudo">

            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php if (!empty($clientes)) : ?>

                <!-- Tabela de Clientes -->
                <table class="table table-striped">
                    <tr class='active'>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Status</th>
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
                <h3 class="text-center text-primary">Não existem clientes cadastrados!</h3>
            <?php endif; ?>

        </div>

    </div>
    <!--fim container-->

</body>

</html>