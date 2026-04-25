<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/home-usuario.css">
  <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
  <title>Cadastrar Anamnese de Enfermagem</title>
</head>

<body>
  <div class="bg-decoration decoration-1"></div>
  <div class="bg-decoration decoration-2"></div>
  <div class="bg-decoration decoration-3"></div>

  <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalSucessoLabel">
            <i class="bi bi-check-circle-fill me-2"></i> Sucesso!
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body text-center">
          <p id="mensagemSucesso" class="fs-5 mb-0"></p>
        </div>
        <div class="modal-footer">
          <a href="/exames?paciente=<?php echo $paciente->getId(); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Ver Exames
          </a>
          <a href="/home" class="btn btn-success">
            <i class="bi bi-house-door me-1"></i> Ir para Home
          </a>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="d-flex align-items-center">
        <div class="logo-container-nav">
          <img src="../assets/img/LogoPositivo.png"
            alt="Logo Portal de Saúde Positivo" class="logo-nav">
        </div>
        <a class="navbar-brand">Portal de Saúde Positivo</a>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <div class="d-flex align-items-center">
          <span class="user-greeting me-3">Olá,
            <?php echo htmlspecialchars($nome_usuario); ?></span>
          <form action="/logout" method="post">
            <button type="submit" class="btn-logout">
              <i class="bi bi-box-arrow-right me-1"></i>Sair
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="welcome-banner mb-4">
      <div class="welcome-content text-center">
        <h2>Cadastrar Anamnese de Enfermagem</h2>
        <p class="welcome-subtitle">
          Paciente Nº <?php echo htmlspecialchars($paciente->getId()); ?> -
          <?php echo htmlspecialchars($paciente->getNome()); ?>
        </p>
      </div>
    </div>

    <form action="/anamneseEnf" method="post" class="action-card shadow p-4">
      <input type="hidden" name="id_paciente"
        value="<?php echo $paciente->getId(); ?>">

      <h5 class="mb-3"><i class="bi bi-calendar-event me-2"></i>Informações Iniciais</h5>
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <label class="form-label">Data da Anamnese</label>
          <input type="date" name="data" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Início dos Sintomas (Data e Hora)</label>
          <input type="datetime-local" name="inicioSintomas" class="form-control" required>
        </div>
        <div class="col-md-12">
          <label class="form-label">Queixa Principal</label>
          <textarea name="queixa" class="form-control" rows="2" required></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Frequência da Queixa</label>
          <input type="text" name="frequencia" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Localização da Dor</label>
          <input type="text" name="localizacaoDaDor" class="form-control" required>
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-heart-pulse me-2"></i>Antecedentes Pessoais (Comorbidades)</h5>
      <div class="row g-3">
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="cardiopatia" value="1" id="cardiopatia">
            <label class="form-check-label" for="cardiopatia">Cardiopatia</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="hipertensao" value="1" id="hipertensao">
            <label class="form-check-label" for="hipertensao">Hipertensão</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="diabetes" value="1" id="diabetes">
            <label class="form-check-label" for="diabetes">Diabetes</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="cancer" value="1" id="cancer">
            <label class="form-check-label" for="cancer">Câncer</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="cirurgias" value="1" id="cirurgias">
            <label class="form-check-label" for="cirurgias">Cirurgias</label>
          </div>
        </div>
        <div class="col-md-12 mt-3">
          <label class="form-label">Outras Doenças</label>
          <input type="text" name="outrasDoencas" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Alergias</label>
          <input type="text" name="alergias" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Medicamentos em Uso</label>
          <input type="text" name="medicamento" class="form-control">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-activity me-2"></i>Hábitos de Vida e Saúde</h5>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Refeições ao Dia</label>
          <input type="number" name="refeicoesAoDia" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Horas de Sono</label>
          <input type="number" name="horasDeSono" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Qualidade do Sono e Repouso</label>
          <input type="text" name="sonoERepouso" class="form-control" required>
        </div>
        
        <div class="col-md-4">
          <label class="form-label">Eliminação Urinária</label>
          <input type="text" name="eliminacaoUrinaria" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Eliminação Intestinal</label>
          <input type="text" name="eliminacaoIntestinal" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Ciclo Menstrual</label>
          <input type="text" name="cicloMenstrual" class="form-control">
        </div>

        <div class="col-md-3">
          <label class="form-label">Frequência de Fumo</label>
          <input type="text" name="frequenciaFumo" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Frequência de Álcool</label>
          <input type="text" name="frequenciaAlcool" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Uso de Drogas</label>
          <input type="text" name="frequenciaDrogas" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Frequência de Exercícios</label>
          <input type="text" name="frequenciaExercicios" class="form-control">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-house me-2"></i>Condições Sociais e Ambientais</h5>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Atividades de Lazer</label>
          <input type="text" name="lazer" class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">Animais Domésticos</label>
          <input type="text" name="animaisDomesticos" class="form-control">
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="saneamentoBasico" value="1" id="saneamentoBasico">
            <label class="form-check-label" for="saneamentoBasico">Saneamento Básico</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check form-switch mt-4">
            <input class="form-check-input" type="checkbox" name="postoDeSaude" value="1" id="postoDeSaude">
            <label class="form-check-label" for="postoDeSaude">Posto de Saúde Perto</label>
          </div>
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-people me-2"></i>Antecedentes Familiares</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Doenças na Família</label>
          <input type="text" name="doencaFamiliar" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Tratamento de Doença Familiar</label>
          <input type="text" name="tratamentoDoencaFamiliar" class="form-control">
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="/exames?paciente=<?php echo $paciente->getId(); ?>"
          class="btn btn-outline-secondary me-2">
          <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle me-1"></i>Cadastrar Anamnese
        </button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const exameId = urlParams.get('exame_id');
    const sucesso = urlParams.get('sucesso');

    if (sucesso === '1') {
      const mensagemElement = document.getElementById('mensagemSucesso');
      if (exameId) {
        mensagemElement.textContent = 'Anamnese cadastrada com sucesso! ID: ' + exameId;
      } else {
        mensagemElement.textContent = 'Anamnese cadastrada com sucesso!';
      }

      var myModal = new bootstrap.Modal(document.getElementById('modalSucesso'));
      myModal.show();
    }
  </script>
</body>

</html>
