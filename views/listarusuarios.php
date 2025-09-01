<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <title>Lista de Usuários</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Gerenciar Usuários</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Administrador</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaUsuarios as $usuario): ?>
                                    <tr>
                                        <td><?=$usuario->getId()?></td>
                                        <td><?=$usuario->getNome()?></td>
                                        <td><?=$usuario->getId()?></td>
                                        <td><?=($usuario->getAdmin() === 'S' ? 'Sim' : 'Não')?></td>
                                        <td>
                                            <a href="/usuario/<?=$usuario->getId()?>" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="/usuario/<?=$usuario->getId()?>" method="POST" style="display: inline;" onsubmit='return confirm("Tem certeza que deseja excluir este usuário?");'>
                                                <input type="hidden" name="method" value="DELETE">
                                                <button type="submit" name="excluir_usuario" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="/home" class="btn btn-outline-secondary">Voltar para a tela de usuário</a>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>