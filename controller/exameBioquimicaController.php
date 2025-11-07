<?php

class ExameBioquimicaController
{
    public function VisualizarExame($id)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameBioquimicaDao = new ExameBioquimicaDAO();
        $usuarioDAO         = new UsuarioDAO();
        $exame              = $exameBioquimicaDao->buscarExameCompletoPorId($id);
        $bioquimicaRefDao   = new ExameBioquimicaRefDAO();
        $bioRefExame        = $bioquimicaRefDao->buscarReferenciaBioquimica();

        $responsavel = $usuarioDAO->buscarUsuario($exame->getResponsavel());
        $preceptor   = $usuarioDAO->buscarUsuario($exame->getPreceptor());

        if (!$exame) {
            $mensagem = "Exame de bioquimica não encontrado.";
            header("Location: /exames?mensagem=" . urlencode($mensagem));
            exit();
        }

        $nome_usuario = $auth->getNomeUsuario();
        require 'views/visualizarBioquimica.php';
    }

    public function excluir($idExame)
    {
        $exameBioquimicaDao = new ExameBioquimicaDAO();
        $result             = $exameBioquimicaDao->excluir($idExame);
        return $result;
    }

    public function editar(ExameBioquimica $exame)
    {
        $exameBioquimicaDAO = new ExameBioquimicaDAO();

        return $exameBioquimicaDAO->editar($exame);
    }

    public function getPaciente($idExame)
    {
        $exameBioquimicaDAO = new ExameBioquimicaDAO();
        $exame              = $exameBioquimicaDAO->buscarExameCompletoPorId($idExame);
        $idPaciente         = $exame->getPaciente();

        return $idPaciente;
    }

    public function gerarFormCadastro($idPaciente)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $nome_usuario = $auth->getNomeUsuario();

        $usuarioDAO = new UsuarioDAO();
        $usuario    = $usuarioDAO->listarUsuarios();

        $pacienteDAO = new PacienteDAO();
        $paciente    = $pacienteDAO->buscarPaciente($idPaciente);

        $mapa_exames = [
            'tgo'                => 'ast',
            'tgp'                => 'alt',
            'gama-gt'            => 'ggt',
            'bilirrubina-total'  => 'bilirrubina_total',
            'bilirrubina-direta' => 'bilirrubina_direta',
            'ureia'              => 'ureia',
            'creatinina'         => 'creatinina',
            'proteina-total'     => 'proteina_total',
            'albumina'           => 'albumina',
            'amilase'            => 'amilase',
            'ldh'                => 'ldh',
            'fosfatase'          => 'fa',
            'ck'                 => 'ck',
            'colesterol-total'   => 'col_total',
            'hdl'                => 'hdl',
            'ldl'                => 'ldl',
            'triglicerideos'     => 'triglicerideos',
            'glicose'            => 'glicose',
            'ferro'              => 'ferro',
            'calcio'             => 'calcio',
            'magnesio'           => 'magnesio',
            'fosforo'            => 'fosforo',
            'acido-urico'        => 'acido_urico',
            'pcr'                => 'pcr',
        ];

        $campos_visiveis = [];

        if (isset($_POST['exames_selecionados'])) {
            $selecionados = json_decode($_POST['exames_selecionados'], true);

            if (is_array($selecionados)) {
                foreach ($selecionados as $exame) {
                    if (isset($mapa_exames[$exame['id']])) {
                        $campos_visiveis[] = $mapa_exames[$exame['id']];
                    }
                }
            }
        }

        $paineis = [
            'hepatico'      => ['ast', 'alt', 'ggt', 'bilirrubina_total', 'bilirrubina_direta'],
            'renal'         => ['ureia', 'creatinina'],
            'proteinas'     => ['proteina_total', 'albumina', 'amilase', 'ldh', 'fa', 'ck'],
            'lipidico'      => ['col_total', 'hdl', 'ldl', 'triglicerideos'],
            'meta_minerais' => ['glicose', 'ferro', 'calcio', 'magnesio', 'fosforo', 'acido_urico'],
            'inflamatorios' => ['pcr'],
        ];

        require 'views/cadastrarBioquimica.php';
    }

    public function cadastrarExame(ExameBioquimica $exameBioquimica)
    {
        $exameBioquimicaDAO = new ExameBioquimicaDAO();
        $result             = $exameBioquimicaDAO->cadastrarExame($exameBioquimica);
        return $result;

    }
}
