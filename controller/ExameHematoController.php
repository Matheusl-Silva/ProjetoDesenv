<?

class ExameHematoController
{

  public function VisualizarExame($id)
  {
    $auth = new Autenticacao();
    $auth->verificarLogin();

    $exameHematoDAO = new ExameHematoDAO();
    $exame = $exameHematoDAO->buscarExameCompletoPorId($id);

    if (!$exame) {
        $mensagem = "Exame de hematologia não encontrado.";
        header("Location: /exames?mensagem=" . urlencode($mensagem));
        exit();
    }

    $nome_usuario = $auth->getNomeUsuario();

    require 'views/visualizarExameHemato.php';
  }
}
