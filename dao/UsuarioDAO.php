<?php
class UsuarioDAO
{
    //CREATE
    public function cadastrarUsuario($nome, $email, $senha)
    {
        $url = "http://localhost:3000/usuarios";
        $dados = [
            "nome" => $nome,
            "endereco" => $email,
            "senha" => $senha
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "POST",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context); //Faz a requisição
        return $result ? json_decode($result, true) : false;
    }

    //READ
    public function listarUsuarios()
    {
        $url = "http://localhost:3000/usuarios";
        $result = file_get_contents($url);
        $lista = json_decode($result);
        $usuarios = [];
        foreach ($lista as $users) {
            $usuarios[] = $this->converterParaObj($users);
        }
        return $usuarios;
    }

    private function converterParaObj($row)
    {
        $u = new Usuario();
        $u->setNome(htmlspecialchars($row['nome']));
        $u->setEmail(htmlspecialchars($row['email']));
        $u->setSenha(htmlspecialchars($row['senha']));
        $u->setAdmin(htmlspecialchars($row['admin']));
        return $u;
    }

    //UPDATE
    public function atualizarUsuario($nome, $email, $senha, $admin)
    {
        $url = "http://localhost:3000/usuarios/" . urlencode($email);
        $dados = [
            "nome" => $nome,
            "endereco" => $email,
            "senha" => $senha,
            "admin" => $admin
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "PUT",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return ["erro" => "Falha na requisição PUT"];
        }

        return json_decode($result, true);
    }

    //BUSCAR POR EMAIL
    public function buscarUsuario($email){
        $url = "http://localhost:3000/usuarios/" . urlencode($email);
        try{
            $response = @file_get_contents($url);
            if($response === FALSE) return null;
            $data = json_decode($response, true);
            if($data){
                return $this->converterParaObj($data);
            }
            return null;
        }catch(Exception $e){
            echo "Erro ao buscar usuário: {$e->getMessage()}";
            return null;
        }
    }

    //DELETE
    public function excluirUsuario($email){
        $url = "http://localhost:3000/usuarios/" . urlencode($email);

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE"
            ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if($result === FALSE){
            echo ["erro" => "Erro ao excluir usuário"];
        }
        return json_decode($result, true);
    }
}
