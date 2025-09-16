<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Resultado do Exame</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="logo-container-nav">
                        <img src="../assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
                    </div>
                    <a class="navbar-brand">Portal de Saúde Positivo</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="d-flex align-items-center">
                        <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                        <form action="/logout" method="post">
                            <button type="submit" class="btn-logout">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

  <main class="container mb-5">

    <form class="needs-validation" novalidate method="post" action="/public/exames/bioquimica/salvar">
      <input type="hidden" name="tipo_exame" value="bioquimica">

      <!-- Painel Hepático -->
      <div class="card mb-4">
        <div class="card-header"><div class="section-title"><i class="bi bi-bezier2"></i> Painel Hepático</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Bilirrubina Total</label><input class="form-control" name="bilirrubina_total"><div class="muted">Adultos: 0,1 – 1,2 mg/dL</div></div>
          <div class="col-md-3"><label class="form-label">Bilirrubina Direta</label><input class="form-control" name="bilirrubina_direta"><div class="muted">Adultos/Crianças: ≤ 0,1 – 1,2 mg/dL</div></div>
          <div class="col-md-3"><label class="form-label">Proteína Total</label><input class="form-control" name="proteina_total"><div class="muted">3,5 – 5,2 g/dL</div></div>
          <div class="col-md-3"><label class="form-label">Albumina</label><input class="form-control" name="albumina"><div class="muted">3,5 – 5,2 g/dL</div></div>
          <div class="col-md-3"><label class="form-label">Amilase</label><input class="form-control" name="amilase"><div class="muted">&lt; 100 U/L</div></div>
          <div class="col-md-3"><label class="form-label">TGO (AST)</label><input class="form-control" name="ast"><div class="muted">F: &lt;31 U/L • M: &lt;35 U/L</div></div>
          <div class="col-md-3"><label class="form-label">TGP (ALT)</label><input class="form-control" name="alt"><div class="muted">F: &lt;34 U/L • M: &lt;45 U/L</div></div>
          <div class="col-md-3"><label class="form-label">Gama GT</label><input class="form-control" name="ggt"><div class="muted">F: &lt;32 U/L • M: &lt;49 U/L</div></div>
          <div class="col-md-3"><label class="form-label">Fosfatase Alcalina</label><input class="form-control" name="fa"><div class="muted">F: 35–105 • M: 40–130 U/L</div></div>
          <div class="col-md-3"><label class="form-label">CK (Creatina Quinase)</label><input class="form-control" name="ck"><div class="muted">F: &lt;145 • M: &lt;171 U/L</div></div>
        </div>
      </div>

      <!-- Metabólico / Outros -->
      <div class="card mb-4">
        <div class="card-header"><div class="section-title"><i class="bi bi-activity"></i> Metabólico / Outros</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Glicose</label><input type="number" step="0.1" class="form-control" name="glicose" placeholder="70–99 jejum"></div>
          <div class="col-md-3"><label class="form-label">PCR (Proteína C Reativa)</label><input class="form-control" name="pcr"><div class="muted">Inferior a 1,0 mg/dL</div></div>
          <div class="col-md-3"><label class="form-label">LDH</label><input class="form-control" name="ldh"><div class="muted">&lt; 480 U/L</div></div>
        </div>
      </div>

      <!-- Perfil Lipídico -->
      <div class="card mb-4">
        <div class="card-header"><div class="section-title"><i class="bi bi-heart-pulse"></i> Perfil Lipídico</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Colesterol Total</label><input class="form-control" name="col_total"><div class="muted">≤ 200 mg/dL</div></div>
          <div class="col-md-3"><label class="form-label">HDL</label><input class="form-control" name="hdl"><div class="muted">≥ 40–45 mg/dL</div></div>
          <div class="col-md-3"><label class="form-label">LDL</label><input class="form-control" name="ldl"><div class="muted">Alvo por risco</div></div>
          <div class="col-md-3"><label class="form-label">Triglicerídeos</label><input class="form-control" name="triglicerideos"><div class="muted">≤ 200 mg/dL</div></div>
        </div>
      </div>

      <!-- Perfil de Ferro -->
      <div class="card mb-4">
        <div class="card-header"><div class="section-title"><i class="bi bi-droplet-half"></i> Perfil de Ferro</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Ferro</label><input class="form-control" name="ferro"></div>
          <div class="col-md-3"><label class="form-label">Ferritina</label><input class="form-control" name="ferritina"></div>
          <div class="col-md-3"><label class="form-label">Transferrina</label><input class="form-control" name="transferrina"></div>
          <div class="col-md-3"><label class="form-label">% Saturação Transferrina</label><input class="form-control" name="sat_transferrina"></div>
        </div>
      </div>

      <!-- Renal / Metabólitos -->
      <div class="card mb-4">
        <div class="card-header"><div class="section-title"><i class="bi bi-droplet"></i> Renal / Metabólitos</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Creatinina</label><input class="form-control" name="creatinina"></div>
          <div class="col-md-3"><label class="form-label">Ácido Úrico</label><input class="form-control" name="acido_urico"></div>
        </div>
      </div>

      <!-- Eletrólitos -->
      <div class="card mb-5">
        <div class="card-header"><div class="section-title"><i class="bi bi-lightning-charge"></i> Eletrólitos</div></div>
        <div class="card-body row g-3">
          <div class="col-md-3"><label class="form-label">Cálcio</label><input class="form-control" name="calcio"></div>
          <div class="col-md-3"><label class="form-label">Magnésio</label><input class="form-control" name="magnesio"></div>
          <div class="col-md-3"><label class="form-label">Fósforo</label><input class="form-control" name="fosforo"></div>
        </div>
      </div>

      <!-- Observação -->
      <div class="card mb-5">
        <div class="card-header"><div class="section-title"><i class="bi bi-journal-text"></i> Observação</div></div>
        <div class="card-body"><textarea class="form-control" name="observacao" rows="4" placeholder="Observações clínicas, intercorrências, orientação ao paciente etc."></textarea></div>
      </div>

      <div class="sticky-actions d-flex gap-2 justify-content-end">
        <a href="./IndexExames.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
        <button type="reset" class="btn btn-warning"><i class="bi bi-eraser"></i> Limpar</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Salvar</button>
      </div>
    </form>
  </main>

  <script>
    (()=>{const forms=document.querySelectorAll('.needs-validation');Array.from(forms).forEach(f=>{f.addEventListener('submit',e=>{if(!f.checkValidity()){e.preventDefault();e.stopPropagation();}f.classList.add('was-validated');});});})();
  </script>
</body>
</html>
