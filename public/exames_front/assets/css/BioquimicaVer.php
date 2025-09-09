<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Bioquímica - Resultado do Exame</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/css/Bioquimica.css" rel="stylesheet">
</head>
<body class="read">
  <header class="py-3 mb-4 shadow-sm bg-primary text-white">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h5 mb-0">Portal de Saúde Positivo</h1>
      <nav><ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="IndexExames.php">Início</a></li>
        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="IndexExames.php">Exames</a></li>
        <li class="breadcrumb-item active text-white">Bioquímica (Resultado)</li>
      </ol></nav>
    </div>
  </header>

  <main class="container mb-5">
    <div class="alert alert-info border-0 shadow-sm rounded-3">Paciente selecionado previamente. Abaixo, os resultados registrados.</div>

    <!-- Painel Hepático -->
    <div class="card mb-4">
      <div class="card-header"><div class="section-title"><i class="bi bi-bezier2"></i> Painel Hepático</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Bilirrubina Total</label><input class="form-control" value="{{BILIRRUBINA_TOTAL}}" disabled><div class="muted">Adultos: 0,1 – 1,2 mg/dL</div></div>
        <div class="col-md-3"><label class="form-label">Bilirrubina Direta</label><input class="form-control" value="{{BILIRRUBINA_DIRETA}}" disabled><div class="muted">Adultos/Crianças: ≤ 0,1 – 1,2 mg/dL</div></div>
        <div class="col-md-3"><label class="form-label">Proteína Total</label><input class="form-control" value="{{PROTEINA_TOTAL}}" disabled><div class="muted">3,5 – 5,2 g/dL</div></div>
        <div class="col-md-3"><label class="form-label">Albumina</label><input class="form-control" value="{{ALBUMINA}}" disabled><div class="muted">3,5 – 5,2 g/dL</div></div>
        <div class="col-md-3"><label class="form-label">Amilase</label><input class="form-control" value="{{AMILASE}}" disabled><div class="muted">&lt; 100 U/L</div></div>
        <div class="col-md-3"><label class="form-label">TGO (AST)</label><input class="form-control" value="{{AST}}" disabled><div class="muted">F: &lt;31 U/L • M: &lt;35 U/L</div></div>
        <div class="col-md-3"><label class="form-label">TGP (ALT)</label><input class="form-control" value="{{ALT}}" disabled><div class="muted">F: &lt;34 U/L • M: &lt;45 U/L</div></div>
        <div class="col-md-3"><label class="form-label">Gama GT</label><input class="form-control" value="{{GGT}}" disabled><div class="muted">F: &lt;32 U/L • M: &lt;49 U/L</div></div>
        <div class="col-md-3"><label class="form-label">Fosfatase Alcalina</label><input class="form-control" value="{{FA}}" disabled><div class="muted">F: 35–105 • M: 40–130 U/L</div></div>
        <div class="col-md-3"><label class="form-label">CK (Creatina Quinase)</label><input class="form-control" value="{{CK}}" disabled><div class="muted">F: &lt;145 • M: &lt;171 U/L</div></div>
      </div>
    </div>

    <!-- Metabólico / Outros -->
    <div class="card mb-4">
      <div class="card-header"><div class="section-title"><i class="bi bi-activity"></i> Metabólico / Outros</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Glicose</label><input class="form-control" value="{{GLICOSE}}" disabled></div>
        <div class="col-md-3"><label class="form-label">PCR (Proteína C Reativa)</label><input class="form-control" value="{{PCR}}" disabled></div>
        <div class="col-md-3"><label class="form-label">LDH</label><input class="form-control" value="{{LDH}}" disabled></div>
      </div>
    </div>

    <!-- Perfil Lipídico -->
    <div class="card mb-4">
      <div class="card-header"><div class="section-title"><i class="bi bi-heart-pulse"></i> Perfil Lipídico</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Colesterol Total</label><input class="form-control" value="{{COL_TOTAL}}" disabled></div>
        <div class="col-md-3"><label class="form-label">HDL</label><input class="form-control" value="{{HDL}}" disabled></div>
        <div class="col-md-3"><label class="form-label">LDL</label><input class="form-control" value="{{LDL}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Triglicerídeos</label><input class="form-control" value="{{TRIGLICERIDEOS}}" disabled></div>
      </div>
    </div>

    <!-- Perfil de Ferro -->
    <div class="card mb-4">
      <div class="card-header"><div class="section-title"><i class="bi bi-droplet-half"></i> Perfil de Ferro</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Ferro</label><input class="form-control" value="{{FERRO}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Ferritina</label><input class="form-control" value="{{FERRITINA}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Transferrina</label><input class="form-control" value="{{TRANSFERRINA}}" disabled></div>
        <div class="col-md-3"><label class="form-label">% Saturação Transferrina</label><input class="form-control" value="{{SAT_TRANSFERRINA}}" disabled></div>
      </div>
    </div>

    <!-- Renal / Metabólitos -->
    <div class="card mb-4">
      <div class="card-header"><div class="section-title"><i class="bi bi-droplet"></i> Renal / Metabólitos</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Creatinina</label><input class="form-control" value="{{CREATININA}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Ácido Úrico</label><input class="form-control" value="{{ACIDO_URICO}}" disabled></div>
      </div>
    </div>

    <!-- Eletrólitos -->
    <div class="card mb-5">
      <div class="card-header"><div class="section-title"><i class="bi bi-lightning-charge"></i> Eletrólitos</div></div>
      <div class="card-body row g-3">
        <div class="col-md-3"><label class="form-label">Cálcio</label><input class="form-control" value="{{CALCIO}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Magnésio</label><input class="form-control" value="{{MAGNESIO}}" disabled></div>
        <div class="col-md-3"><label class="form-label">Fósforo</label><input class="form-control" value="{{FOSFORO}}" disabled></div>
      </div>
    </div>

    <!-- Observação -->
    <div class="card mb-5">
      <div class="card-header"><div class="section-title"><i class="bi bi-journal-text"></i> Observação</div></div>
      <div class="card-body"><textarea class="form-control" rows="4" disabled>{{OBSERVACAO}}</textarea></div>
    </div>

    <div class="sticky-actions d-flex gap-2 justify-content-end">
      <a href="./BioquimicaNovo.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
      <button class="btn btn-outline-secondary" type="button" onclick="window.print()"><i class="bi bi-printer"></i> Imprimir</button>
      <a href="./IndexExames.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left"></i> Voltar</a>
    </div>
  </main>
</body>
</html>
