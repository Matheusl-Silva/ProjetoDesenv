<?

class ExameHematoController
{
  public function gerarFormCadastro()
  {
    $auth = new Autenticacao();
    $auth->verificarLogin();

    $idPHemato    = null;
    $erroCadastro = false;

    require 'views/cadastrarHematologia.php';  

    unset($_SESSION["idPHemato"]);
    unset($_SESSION["errocadastro"]);
  }

  public function cadastrar(ExameHemato $dadosExame)
  {
    $exameHematoDAO = new ExameHematoDAO();
    $result         = $exameHematoDAO->cadastrarExame($dadosExame);
    return $result;
  }

}
