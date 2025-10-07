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
  <title>Cadastrar Exame de Hematologia</title>
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
        <h2>Cadastrar Exame de Hematologia</h2>
        <p class="welcome-subtitle">
          Paciente Nº <?php echo htmlspecialchars($paciente->getId()); ?> -
          <?php echo htmlspecialchars($paciente->getNome()); ?>
        </p>
      </div>
    </div>

    <form action="/exameHemato" method="post" class="action-card shadow p-4">
      <input type="hidden" name="id_paciente"
        value="<?php echo $paciente->getId(); ?>">

      <h5 class="mb-3"><i class="bi bi-calendar-event me-2"></i>Data do Exame</h5>
      <div class="row g-3 mb-4">
          <div class="col-md-6">
              <label class="form-label">Data da Coleta</label>
              <input type="date" name="data" class="form-control" required>
          </div>
      </div>

      <h5 class="mb-3"><i class="bi bi-droplet-half me-2"></i>Eritrograma</h5>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Hemácia (milhões/µL)</label>
          <input type="number" step="0.01" name="hemacia" class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">Hemoglobina (g/dL)</label>
          <input type="number" step="0.1" name="hemoglobina"
            class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">Hematócrito (%)</label>
          <input type="number" step="0.1" name="hematocrito"
            class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">VCM (fL)</label>
          <input type="number" step="0.1" name="vcm" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">HCM (pg)</label>
          <input type="number" step="0.1" name="hcm" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">CHCM (g/dL)</label>
          <input type="number" step="0.1" name="chcm" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">RDW (%)</label>
          <input type="number" step="0.1" name="rdw" class="form-control">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-shield-check me-2"></i>Leucograma</h5>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Leucócitos (/µL)</label>
          <input type="number" name="leucocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Neutrófilos (/µL)</label>
          <input type="number" name="neutrofilos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Linfócitos (/µL)</label>
          <input type="number" name="linfocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Monócitos (/µL)</label>
          <input type="number" name="monocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Eosinófilos (/µL)</label>
          <input type="number" name="eosinofilos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Basófilos (/µL)</label>
          <input type="number" name="basofilos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Bastonetes (/µL)</label>
          <input type="number" name="bastonetes" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Blastos (/µL)</label>
          <input type="number" name="blastos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Promielócitos (/µL)</label>
          <input type="number" name="promielocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Mielócitos (/µL)</label>
          <input type="number" name="mielocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Metamielócitos (/µL)</label>
          <input type="number" name="metamielocitos" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Segmentados (/µL)</label>
          <input type="number" name="segmentados" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Linfócitos Atípicos (/µL)</label>
          <input type="number" name="linfocitos_atipicos"
            class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">Plasmócitos (/µL)</label>
          <input type="number" name="plasmocitos" class="form-control">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-circle-half me-2"></i>Plaquetas</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Plaquetas (mil/µL)</label>
          <input type="number" name="plaquetas" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Volume Plaquetário Médio (fL)</label>
          <input type="number" step="0.1" name="volumePlaquetarioMedio" class="form-control">
        </div>
      </div>

      <hr class="my-4">

      <h5 class="mb-3"><i class="bi bi-person-check me-2"></i>Responsáveis</h5>
      <div class="row g-3">

          <div class="col-md-6">
              <label class="form-label">Responsável pelo exame</label>
              <select name="id_responsavel" class="form-select" required>
                  <option value="" selected disabled>Selecione um usuário...</option>
                  <?php foreach ($usuario as $usuarios): ?>
                  <option value="<?php echo $usuarios->getId(); ?>">
                      <?php echo htmlspecialchars($usuarios->getNome()); ?>
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>

          <div class="col-md-6">
              <label class="form-label">Preceptor responsável</label>
              <select name="id_preceptor" class="form-select" required>
                  <option value="" selected disabled>Selecione um usuário...</option>
                  <?php foreach ($usuario as $usuarios): ?>
                  <option value="<?php echo $usuarios->getId(); ?>">
                      <?php echo htmlspecialchars($usuarios->getNome()); ?>
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>

      </div>

      <div class="text-center mt-4">
        <a href="/exames?paciente=<?php echo $paciente->getId(); ?>"
          class="btn btn-outline-secondary me-2">
          <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle me-1"></i>Cadastrar Exame
        </button>
      </div>
    </form>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const exameId = urlParams.get('exame_id');
    const sucesso = urlParams.get('sucesso');

    if (sucesso === '1') {
        const mensagemElement = document.getElementById('mensagemSucesso');
        if (exameId) {
            mensagemElement.textContent = 'Exame Hematológico cadastrado com sucesso! Número do Exame: ' + exameId;
        } else {
            mensagemElement.textContent = 'Exame Hematológico cadastrado com sucesso!';
        }

        var myModal = new bootstrap.Modal(document.getElementById('modalSucesso'));
        myModal.show();
    }
    </script>
</body>
</html>