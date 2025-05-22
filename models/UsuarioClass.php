<?php
class Usuario extends Pessoa
{
    private $senha;
    private $mysqli;

    public function __construct($nome = null, $email = null, $senha = null)
    {
        parent::__construct($nome, $email);
        $this->senha = $senha;

        // Incluindo arquivo de conexão
        require_once __DIR__ . "/../database/conexaoClass.php";
        $bd           = new Conexao();
        $this->mysqli = $bd->getConexao();
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($valor)
    {
        $this->senha = $valor;
    }

    public function listarUsuarios()
    {
        $sql       = "SELECT * FROM usuarios ORDER BY id";
        $resultado = $this->mysqli->query($sql);
        $usuarios  = [];

        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }

    public function buscarUsuarioPorEmail($email)
    {
        $email     = $this->mysqli->real_escape_string($email);
        $sql       = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $this->mysqli->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        }

        return null;
    }

    public function atualizarUsuario($nome, $email, $senha, $admin)
    {
        $nome  = $this->mysqli->real_escape_string($nome);
        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);
        $admin = $this->mysqli->real_escape_string($admin);

        $sql = "UPDATE usuarios SET
                nome = '$nome',
                email = '$email',
                senha = '$senha',
                adm = '$admin'
                WHERE email = '$email'";

        if ($this->mysqli->query($sql)) {
            return true;
        }

        return false;
    }

    public function excluirUsuario($email)
    {
        $email = $this->mysqli->real_escape_string($email);
        $sql   = "DELETE FROM usuarios WHERE email = '$email'";

        return $this->mysqli->query($sql);
    }

    public function renderizarTabelaUsuarios()
    {
        $usuarios = $this->listarUsuarios();
        $html     = '<div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Administrador</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($usuarios as $user) {
            $html .= '<tr>
                        <td>' . htmlspecialchars($user['id']) . '</td>
                        <td>' . htmlspecialchars($user['nome']) . '</td>
                        <td>' . htmlspecialchars($user['email']) . '</td>
                        <td>' . ($user['adm'] === 'S' ? 'Sim' : 'Não') . '</td>
                        <td>
                            <form action="editarUsuario.php" method="POST" style="display: inline;">
                                <input type="hidden" name="email" value="' . htmlspecialchars($user['email']) . '">
                                <button type="submit" name="buscar_usuario" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                            <form action="editarUsuario.php" method="POST" style="display: inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este usuário?\');">
                                <input type="hidden" name="email" value="' . htmlspecialchars($user['email']) . '">
                                <button type="submit" name="excluir_usuario" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>';
        }

        $html .= '</tbody></table></div>';

        return $html;
    }

    public function renderizarFormularioEdicao($usuario)
    {
        $html = '<div class="card-body bg-body-tertiary">
                    <form action="editarUsuario.php" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nomeCompleto" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nomeUsuario" id="nomeUsuario"
                                    placeholder="Insira seu nome completo" value="' . htmlspecialchars($usuario['nome']) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    placeholder="Insira um e-mail válido" value="' . htmlspecialchars($usuario['email']) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="senha" class="form-label">Senha Atual:</label>
                                <input type="password" class="form-control mb-2" name="senha" id="senha"
                                    value="' . htmlspecialchars($usuario['senha']) . '">
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
