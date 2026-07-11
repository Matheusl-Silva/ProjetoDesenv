<?php

class UsuarioDAO
{
    public function listarUsuarios()
    {
        $r = ApiClient::get("/usuarios");
        if ($r['status'] !== 200 || !is_array($r['json'])) {
            return [];
        }
        $listaObj = [];
        foreach ($r['json'] as $usuario) {
            $listaObj[] = $this->converterParaObj($usuario);
        }
        return $listaObj;
    }

    public function buscarUsuario($id)
    {
        $r = ApiClient::get("/usuarios/" . $id);
        if ($r['status'] !== 200) {
            return false;
        }
        return $this->converterParaObj($r['json']);
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        $dados = [
            "nome"  => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "senha" => $usuario->getSenha(),
            "admin" => $usuario->getAdmin() ?: "N",
        ];
        // Cadastro é rota pública — não redireciona no 401
        $r = ApiClient::post("/usuarios", $dados, ['no_redirect_on_401' => true]);
        if ($r['status'] !== 201) {
            return false;
        }
        return $r['json']['id'] ?? false;
    }

    public function verificarEmail($email)
    {
        // Rota pública
        $r = ApiClient::post(
            "/usuarios/verificar-email",
            ["email" => $email],
            ['no_redirect_on_401' => true]
        );
        if ($r['status'] !== 200) {
            return false;
        }
        return $this->converterParaObj($r['json']);
    }

    public function login($email, $senha)
    {
        // Rota pública — retorna ['token' => ..., 'usuario' => Usuario]
        $r = ApiClient::post(
            "/usuarios/login",
            ["email" => $email, "senha" => $senha],
            ['no_redirect_on_401' => true]
        );
        if ($r['status'] !== 200 || empty($r['json']['token'])) {
            return false;
        }
        return [
            "token"   => $r['json']['token'],
            "usuario" => $this->converterParaObj($r['json']['usuario']),
        ];
    }

    public function atualizarUsuario(Usuario $usuario)
    {
        $dados = [
            "nome"  => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "admin" => $usuario->getAdmin(),
        ];
        // Se a senha foi informada, manda — backend faz hash
        if ($usuario->getSenha()) {
            $dados["senha"] = $usuario->getSenha();
        }
        $r = ApiClient::put("/usuarios/" . $usuario->getId(), $dados);
        if ($r['status'] !== 200) {
            return ["erro" => "Falha na requisição PUT"];
        }
        return $r['json'];
    }

    public function excluirUsuario(Usuario $usuario)
    {
        $id = is_object($usuario) ? $usuario->getId() : $usuario;
        $r  = ApiClient::delete("/usuarios/" . $id);
        if ($r['status'] !== 200) {
            return ["erro" => "Erro ao excluir usuário"];
        }
        return $r['json'];
    }

    public function updatePassword($email, $novaSenha)
    {
        // Rota pública (recover)
        $r = ApiClient::put(
            "/usuarios/recover-password",
            ["email" => $email, "senha" => $novaSenha],
            ['no_redirect_on_401' => true]
        );
        return $r['status'] === 200;
    }

    private function converterParaObj($row)
    {
        $usuario = new Usuario();
        $usuario->setId($row["id"] ?? null);
        $usuario->setNome($row["cnome"] ?? null);
        $usuario->setEmail($row["cemail"] ?? null);
        // csenha não vem mais do backend (sanitizado) — deixa vazio
        $usuario->setSenha($row["csenha"] ?? "");
        $usuario->setAdmin($row["cadmin"] ?? "N");
        return $usuario;
    }
}
