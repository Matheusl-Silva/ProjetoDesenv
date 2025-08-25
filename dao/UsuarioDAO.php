<?php

class UsuarioDAO
{
    private $mysqli;

    public function __construct()
    {
        $bd           = new Conexao();
        $this->mysqli = $bd->getConexao();
    }
    public function listarUsuarios()
    {
        $sql       = "SELECT * FROM usuario ORDER BY id";
        $resultado = $this->mysqli->query($sql);
        $usuarios  = [];

        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $usuarios[] = $this->converterParaObj($row);
            }
        }

        return $usuarios;
    }

    public function atualizarUsuario(Usuario $usuario){
        $sql = "UPDATE usuario SET cnome = ?, cemail = ?, csenha = ?, cadmin = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $admin = $usuario->getAdmin();
        $id = $usuario->getId();

        $stmt->bind_param('ssssi', $nome, $email, $senha, $admin, $id);
        $result = $stmt->execute();
        return $result;
    }

    public function excluirUsuario($email)
    {
        $email = $this->mysqli->real_escape_string($email);
        $sql   = "DELETE FROM usuarios WHERE email = '$email'";

        return $this->mysqli->query($sql);
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        $sql  = "INSERT INTO usuario (cnome, cemail, csenha) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sss', $usuario->getNome(), $usuario->getEmail(), $usuario->getSenha());
        return $stmt->execute();
    }

    public function buscarUsuario($id){
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $success = $stmt->execute();

        if($success){
            $result = $stmt->get_result();
            return $this->converterParaObj($result->fetch_assoc());
        }
        return false;
    }

    public function atualizarSenha($email, $novaSenha)
    {
        $sql  = "UPDATE usuario SET csenha = ? WHERE cemail = ?";
        $stmt = $this->mysqli->prepare($sql);
        return $stmt->execute([$novaSenha, $email]);
    }

    public function updatePassword($email, $novaSenhaRec): bool
    {
        $sql  = "UPDATE usuario SET csenha = ? WHERE cemail = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $novaSenhaRec, $email);
        return $stmt->execute();
    }

    public function verificarEmail($email)
    {
        try {
            $sql  = "SELECT * FROM usuario WHERE cemail = ?;";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $usuario = $this->converterParaObj($result->fetch_assoc());
                return $usuario->getId();
            }
            return false;
        } catch (mysqli_sql_exception $erro) {
            echo "Erro ao verificar login: $erro";
        }
    }

    public function login($email, $senha)
    {
        try {
            $sql  = "SELECT * FROM usuario WHERE cemail = ? AND csenha = ?;";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('ss', $email, $senha);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $this->converterParaObj($result->fetch_assoc());
            }
            return false;
        } catch (mysqli_sql_exception $erro) {
            echo "Erro ao fazer login: $erro";
        }
    }

    private function converterParaObj($row)
    {
        $usuario = new Usuario();
        $usuario->setId($row["id"]);
        $usuario->setNome($row["cnome"]);
        $usuario->setEmail($row["cemail"]);
        $usuario->setSenha($row["csenha"]);
        $usuario->setAdmin($row["cadmin"]);
        return $usuario;
    }
}
