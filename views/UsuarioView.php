<?php

require_once '../dao/UsuarioDAO.php';

class UsuarioView
{
    public static function renderizarTabelaUsuarios()
    {
        $uDao     = new UsuarioDAO();
        $usuarios = $uDao->listarUsuarios();
        $html     = '<div class="table-responsive mt-3">
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
                        <tbody>';

        foreach ($usuarios as $user) {
            $html .= '<tr>
                        <td>' . ($user['id']) . '</td>
                        <td>' . ($user['nome']) . '</td>
                        <td>' . ($user['email']) . '</td>
                        <td>' . ($user['adm'] === 'S' ? 'Sim' : 'Não') . '</td>
                        <td>
                            <form action="editarUsuario.php" method="POST" style="display: inline;">
                                <input type="hidden" name="email" value="' . ($user['email']) . '">
                                <button type="submit" name="buscar_usuario" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                            <form action="editarUsuario.php" method="POST" style="display: inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este usuário?\');">
                                <input type="hidden" name="email" value="' . ($user['email']) . '">
                                <button type="submit" name="excluir_usuario" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>';
        }

        $html .= '</tbody></table></div>';

        return $html;
    }

    public static function renderizarFormularioEdicao($usuario)
    {
        $html = '<div class="card-body bg-body-tertiary">
                    <form action="editarUsuario.php" method="POST">
                        <input type="hidden" name="id" value="' . ($usuario["id"]) . '">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nomeCompleto" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nomeUsuario" id="nomeUsuario"
                                    placeholder="Insira seu nome completo" value="' . ($usuario['nome']) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    placeholder="Insira um e-mail válido" value="' . ($usuario['email']) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="senha" class="form-label">Senha Atual:</label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="senha" id="senha" value="' . ($usuario['senha']) . '">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleSenha" tabindex="0" aria-label="Mostrar senha" title="Mostrar senha">
                                        <span id="iconSenha" class="bi bi-eye"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="admin" class="form-label">Administrador:</label>
                                <select class="form-select mb-2" name="admin" id="admin">
                                    <option value="N"' . ($usuario['adm'] === 'N' ? ' selected' : '') . '>Não</option>
                                    <option value="S"' . ($usuario['adm'] === 'S' ? ' selected' : '') . '>Sim</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="atualizar_usuario" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                        </div>
                    </form>
                </div>';

        return $html;
    }
}
