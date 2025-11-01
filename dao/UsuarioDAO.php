<?php

class UsuarioDAO
{
    public function listarUsuarios()
    {
        $url    = "http://localhost:3000/usuarios";
        $result = file_get_contents($url);
        $lista  = json_decode($result, true);

        $listaObj = [];
        foreach ($lista as $usuario) {
            $listaObj[] = $this->converterParaObj($usuario);
        }

        return $listaObj;
    }

    public function buscarUsuario($id)
    {
        $url    = "http://localhost:3000/usuarios/" . $id;
        $result = file_get_contents($url);

        if ($result == false) {
            return false;
        }

        $response = json_decode($result, true);
        return $this->converterParaObj($response);
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        $url   = "http://localhost:3000/usuarios";
        $dados = [
            "nome"  => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "senha" => $usuario->getSenha(),
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);

        return isset($response["id"]) ? $response["id"] : false;
    }

    public function verificarEmail($email)
    {
        $url   = "http://localhost:3000/usuarios/verificar-email";
        $dados = [
            "email" => $email,
        ];
        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result == false) {
            return false;
        }

        $response = json_decode($result, true);

        return $this->converterParaObj($response);
    }

    public function login($email, $senha)
    {
        $url   = "http://localhost:3000/usuarios/login";
        $dados = [
            "email" => $email,
            "senha" => $senha,
        ];
        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados, true),
            ],
        ];

        $context = stream_context_create($options);
        $result  = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        return $this->converterParaObj(json_decode($result, true));
    }

    public function atualizarUsuario(Usuario $usuario)
    {
        $url   = "http://localhost:3000/usuarios/" . $usuario->getId();
        $dados = [
            "nome"  => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "senha" => $usuario->getSenha(),
            "admin" => $usuario->getAdmin(),
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "PUT",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result == false) {
            return ["erro" => "Falha na requisição PUT"];
        }

        return json_decode($result, true);
    }

    public function excluirUsuario(Usuario $usuario)
    {
        $url     = "http://localhost:3000/usuarios/" . $usuario->getId();
        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE",
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result === false) {
            return ["erro" => "Erro ao excluir usuário"];
        }
        return json_decode($result, true);
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
