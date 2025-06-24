<?php

class UsuarioDAO
{
    private $mysqli;

    public function __construct()
    {
        require_once __DIR__ . "/../database/conexaoClass.php";
        $bd           = new Conexao();
        $this->mysqli = $bd->getConexao();
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

    public function atualizarUsuario($id, $nome, $email, $senha, $admin)
    {
        $id  = $this->mysqli->real_escape_string($id);
        $nome  = $this->mysqli->real_escape_string($nome);
        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);
        $admin = $this->mysqli->real_escape_string($admin);

        $sql = "UPDATE usuarios SET
                nome = '$nome',
                email = '$email',
                senha = '$senha',
                adm = '$admin'
                WHERE id = '$id'";

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

    public function cadastrarUsuario($nome, $email, $senha)
    {
        $nome  = $this->mysqli->real_escape_string($nome);
        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        return $this->mysqli->query($sql);
    }

    public function buscarUsuario($email)
    {
        $email = $this->mysqli->real_escape_string($email);

        $sql       = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $this->mysqli->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        }

        return null;
    }

    public function atualizarSenha($email, $novaSenha)
    {
        $sql  = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = $this->mysqli->prepare($sql);
        return $stmt->execute([$novaSenha, $email]);
    }

    public function updatePassword($email, $novaSenhaRec): bool
    {
        $sql  = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $novaSenhaRec, $email);
        return $stmt->execute();
    }
}
