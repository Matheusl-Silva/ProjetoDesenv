<?

class ExameHematoController
{
  public function gerarFormCadastro()
  {
    $auth = new Autenticacao();
    $auth->verificarLogin();

    $idPHemato    = null;
    $erroCadasdro = false;

    require 'views/cadastroexamehemato.php';

    unset($_SESSION["idPHemato"]);
    unset($_SESSION["errocadastro"]);
  }

  public function gerarLista($idExame)
  {
    $exameHematoDAO = new ExameHematoDAO();
    $listaExames    = $exameHematoDAO->buscarExameCompletoPorId($idExame);

    require 'views/listaexameshemato.php';
  }

  public function cadastrar(ExameHemato $dadosExame)
  {
    $exameHematoDAO = new ExameHematoDAO();
    $result         = $exameHematoDAO->cadastrarExame($dadosExame);
    return $result;
  }

}
