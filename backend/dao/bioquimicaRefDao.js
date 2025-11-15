const db = require("../database/connection");

exports.findAll = () => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM referencia_bioquimica ", (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query = `
      INSERT INTO referencia_bioquimica (
        id,
        cbilirrubina_total, cbilirrubina_direta,
        cproteina_total, calbumina,
        camilase,
        ctgo_transaminase_glutamico_oxalacetica_m, ctgo_transaminase_glutamico_oxalacetica_f,
        ctgp_transaminase_glutamico_piruvica_m, ctgp_transaminase_glutamico_piruvica_f,
        cgama_gt_glutamiltransferase_m, cgama_gt_glutamiltransferase_f,
        cfosfatase_alcalina_m, cfosfatase_alcalina_f,
        ccreatina_quinase_ck_m, ccreatina_quinase_ck_f,
        cglicose,
        cferro_m_ate_40_anos, cferro_m_mais_de_40_anos, cferro_m_mais_de_60_anos,
        cferro_f_ate_40_anos, cferro_f_mais_de_40_anos, cferro_f_mais_de_60_anos,
        cferro_crianca,
        ccolesterol_total,
        chdl_ate_19_anos, chdl_mais_de_20_anos,
        cldl_baixo_risco, cldl_risco_intermediario, cldl_alto_risco, cldl_muito_alto_risco,
        ctriglicerideos,
        cureia_m_menos_de_50_anos, cureia_m_mais_de_50_anos, cureia_f_menos_de_50_anos, cureia_f_mais_de_50_anos, cureia_crianca,
        ccreatinina_m, ccreatinina_f, ccreatinina_crianca,
        cacido_urico_m_13_a_18_anos, cacido_urico_m_mais_de_18_anos, cacido_urico_f_1_a_9_anos, cacido_urico_f_10_a_18_anos, cacido_urico_f_mais_de_18_anos,
        cpcr_proteina_c_reativa,
        ccalcio,
        cldh,
        cmagnesio_m, cmagnesio_f, cmagnesio_crianca,
        cfosforo_adulto, cfosforo_1_a_3_anos, cfosforo_4_a_12_anos, cfosforo_13_a_15_anos, cfosforo_16_a_18_anos
      ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const values = [
      data.id,
      data.bilirrubina_total,
      data.bilirrubina_direta,
      data.proteina_total,
      data.albumina,
      data.amilase,
      data.tgo_transaminase_glutamico_oxalacetica_m,
      data.tgo_transaminase_glutamico_oxalacetica_f,
      data.tgp_transaminase_glutamico_piruvica_m,
      data.tgp_transaminase_glutamico_piruvica_f,
      data.gama_gt_glutamiltransferase_m,
      data.gama_gt_glutamiltransferase_f,
      data.fosfatase_alcalina_m,
      data.fosfatase_alcalina_f,
      data.creatina_quinase_ck_m,
      data.creatina_quinase_ck_f,
      data.glicose,
      data.ferro_m_ate_40_anos,
      data.ferro_m_mais_de_40_anos,
      data.ferro_m_mais_de_60_anos,
      data.ferro_f_ate_40_anos,
      data.ferro_f_mais_de_40_anos,
      data.ferro_f_mais_de_60_anos,
      data.ferro_crianca,
      data.colesterol_total,
      data.hdl_ate_19_anos,
      data.hdl_mais_de_20_anos,
      data.ldl_baixo_risco,
      data.ldl_risco_intermediario,
      data.ldl_alto_risco,
      data.ldl_muito_alto_risco,
      data.triglicerideos,
      data.ureia_m_menos_de_50_anos,
      data.ureia_m_mais_de_50_anos,
      data.ureia_f_menos_de_50_anos,
      data.ureia_f_mais_de_50_anos,
      data.ureia_crianca,
      data.creatinina_m,
      data.creatinina_f,
      data.creatinina_crianca,
      data.acido_urico_m_13_a_18_anos,
      data.acido_urico_m_mais_de_18_anos,
      data.acido_urico_f_1_a_9_anos,
      data.acido_urico_f_10_a_18_anos,
      data.acido_urico_f_mais_de_18_anos,
      data.pcr_proteina_c_reativa,
      data.calcio,
      data.ldh,
      data.magnesio_m,
      data.magnesio_f,
      data.magnesio_crianca,
      data.fosforo_adulto,
      data.fosforo_1_a_3_anos,
      data.fosforo_4_a_12_anos,
      data.fosforo_13_a_15_anos,
      data.fosforo_16_a_18_anos,
    ];

    db.query(query, values, (err, result) => {
      if (err) {
        console.error("Erro ao executar query:", err);
        reject(err);
      } else {
        resolve(result);
      }
    });
  });
};

exports.update = (data) => {
  return new Promise((resolve, reject) => {
    const query = `
      UPDATE referencia_bioquimica SET
        cbilirrubina_total = ?, cbilirrubina_direta = ?,
        cproteina_total = ?, calbumina = ?,
        camilase = ?,
        ctgo_transaminase_glutamico_oxalacetica_m = ?, ctgo_transaminase_glutamico_oxalacetica_f = ?,
        ctgp_transaminase_glutamico_piruvica_m = ?, ctgp_transaminase_glutamico_piruvica_f = ?,
        cgama_gt_glutamiltransferase_m = ?, cgama_gt_glutamiltransferase_f = ?,
        cfosfatase_alcalina_m = ?, cfosfatase_alcalina_f = ?,
        ccreatina_quinase_ck_m = ?, ccreatina_quinase_ck_f = ?,
        cglicose = ?,
        cferro_m_ate_40_anos = ?, cferro_m_mais_de_40_anos = ?, cferro_m_mais_de_60_anos = ?,
        cferro_f_ate_40_anos = ?, cferro_f_mais_de_40_anos = ?, cferro_f_mais_de_60_anos = ?,
        cferro_crianca = ?,
        ccolesterol_total = ?,
        chdl_ate_19_anos = ?, chdl_mais_de_20_anos = ?,
        cldl_baixo_risco = ?, cldl_risco_intermediario = ?, cldl_alto_risco = ?, cldl_muito_alto_risco = ?,
        ctriglicerideos = ?,
        cureia_m_menos_de_50_anos = ?, cureia_m_mais_de_50_anos = ?, cureia_f_menos_de_50_anos = ?, cureia_f_mais_de_50_anos = ?, cureia_crianca = ?,
        ccreatinina_m = ?, ccreatinina_f = ?, ccreatinina_crianca = ?,
        cacido_urico_m_13_a_18_anos = ?, cacido_urico_m_mais_de_18_anos = ?, cacido_urico_f_1_a_9_anos = ?, cacido_urico_f_10_a_18_anos = ?, cacido_urico_f_mais_de_18_anos = ?,
        cpcr_proteina_c_reativa = ?,
        ccalcio = ?,
        cldh = ?,
        cmagnesio_m = ?, cmagnesio_f = ?, cmagnesio_crianca = ?,
        cfosforo_adulto = ?, cfosforo_1_a_3_anos = ?, cfosforo_4_a_12_anos = ?, cfosforo_13_a_15_anos = ?, cfosforo_16_a_18_anos = ?
      WHERE id = 1
    `;

    const values = [
      data.bilirrubina_total,
      data.bilirrubina_direta,
      data.proteina_total,
      data.albumina,
      data.amilase,
      data.tgo_transaminase_glutamico_oxalacetica_m,
      data.tgo_transaminase_glutamico_oxalacetica_f,
      data.tgp_transaminase_glutamico_piruvica_m,
      data.tgp_transaminase_glutamico_piruvica_f,
      data.gama_gt_glutamiltransferase_m,
      data.gama_gt_glutamiltransferase_f,
      data.fosfatase_alcalina_m,
      data.fosfatase_alcalina_f,
      data.creatina_quinase_ck_m,
      data.creatina_quinase_ck_f,
      data.glicose,
      data.ferro_m_ate_40_anos,
      data.ferro_m_mais_de_40_anos,
      data.ferro_m_mais_de_60_anos,
      data.ferro_f_ate_40_anos,
      data.ferro_f_mais_de_40_anos,
      data.ferro_f_mais_de_60_anos,
      data.ferro_crianca,
      data.colesterol_total,
      data.hdl_ate_19_anos,
      data.hdl_mais_de_20_anos,
      data.ldl_baixo_risco,
      data.ldl_risco_intermediario,
      data.ldl_alto_risco,
      data.ldl_muito_alto_risco,
      data.triglicerideos,
      data.ureia_m_menos_de_50_anos,
      data.ureia_m_mais_de_50_anos,
      data.ureia_f_menos_de_50_anos,
      data.ureia_f_mais_de_50_anos,
      data.ureia_crianca,
      data.creatinina_m,
      data.creatinina_f,
      data.creatinina_crianca,
      data.acido_urico_m_13_a_18_anos,
      data.acido_urico_m_mais_de_18_anos,
      data.acido_urico_f_1_a_9_anos,
      data.acido_urico_f_10_a_18_anos,
      data.acido_urico_f_mais_de_18_anos,
      data.pcr_proteina_c_reativa,
      data.calcio,
      data.ldh,
      data.magnesio_m,
      data.magnesio_f,
      data.magnesio_crianca,
      data.fosforo_adulto,
      data.fosforo_1_a_3_anos,
      data.fosforo_4_a_12_anos,
      data.fosforo_13_a_15_anos,
      data.fosforo_16_a_18_anos
    ];

    db.query(query, values, (err, result) => {
      if (err) {
        console.error("Erro ao executar query de update:", err);
        reject(err);
      } else {
        resolve(result);
      }
    });
  });
};