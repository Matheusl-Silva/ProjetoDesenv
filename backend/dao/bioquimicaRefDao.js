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
                cbilirrubina_total, cbilirrubina_total_unidade,
                cbilirrubina_direta, cbilirrubina_direta_unidade,
                cproteina_total, cproteina_total_unidade,
                calbumina, calbumina_unidade,
                camilase, camilase_unidade,
                ctgo_transaminase_glutamico_oxalacetica_m, ctgo_transaminase_glutamico_oxalacetica_f, ctgo_transaminase_glutamico_oxalacetica_unidade,
                ctgp_transaminase_glutamico_piruvica_m, ctgp_transaminase_glutamico_piruvica_f, ctgp_transaminase_glutamico_piruvica_unidade,
                cgama_gt_glutamiltransferase_m, cgama_gt_glutamiltransferase_f, cgama_gt_glutamiltransferase_unidade,
                cfosfatase_alcalina_m, cfosfatase_alcalina_f, cfosfatase_alcalina_unidade,
                ccreatina_quinase_ck_m, ccreatina_quinase_ck_f, ccreatina_quinase_ck_unidade,
                cglicose, cglicose_unidade,
                cferro_m_ate_40_anos, cferro_m_mais_de_40_anos, cferro_m_mais_de_60_anos,
                cferro_f_ate_40_anos, cferro_f_mais_de_40_anos, cferro_f_mais_de_60_anos,
                cferro_crianca, cferro_unidade,
                ccolesterol_total, ccolesterol_total_unidade,
                chdl_ate_19_anos, chdl_mais_de_20_anos, chdl_unidade,
                cldl_baixo_risco, cldl_risco_intermediario, cldl_alto_risco, cldl_muito_alto_risco, cldl_unidade,
                ctriglicerideos, ctriglicerideos_unidade,
                cureia_m_menos_de_50_anos, cureia_m_mais_de_50_anos, cureia_f_menos_de_50_anos, cureia_f_mais_de_50_anos, cureia_crianca, cureia_unidade,
                ccreatinina_m, ccreatinina_f, ccreatinina_crianca, ccreatinina_unidade,
                cacido_urico_m_13_a_18_anos, cacido_urico_m_mais_de_18_anos, cacido_urico_f_1_a_9_anos, cacido_urico_f_10_a_18_anos, cacido_urico_f_mais_de_18_anos, cacido_urico_unidade,
                cpcr_proteina_c_reativa, cpcr_proteina_c_reativa_unidade,
                ccalcio, ccalcio_unidade,
                cldh, cldh_unidade,
                cmagnesio_m, cmagnesio_f, cmagnesio_crianca, cmagnesio_unidade,
                cfosforo_adulto, cfosforo_1_a_3_anos, cfosforo_4_a_12_anos, cfosforo_13_a_15_anos, cfosforo_16_a_18_anos, cfosforo_unidade
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        `;

    const values = [
      data.id,
      data.cbilirrubina_total,
      data.cbilirrubina_total_unidade,
      data.cbilirrubina_direta,
      data.cbilirrubina_direta_unidade,
      data.cproteina_total,
      data.cproteina_total_unidade,
      data.calbumina,
      data.calbumina_unidade,
      data.camilase,
      data.camilase_unidade,
      data.ctgo_transaminase_glutamico_oxalacetica_m,
      data.ctgo_transaminase_glutamico_oxalacetica_f,
      data.ctgo_transaminase_glutamico_oxalacetica_unidade,
      data.ctgp_transaminase_glutamico_piruvica_m,
      data.ctgp_transaminase_glutamico_piruvica_f,
      data.ctgp_transaminase_glutamico_piruvica_unidade,
      data.cgama_gt_glutamiltransferase_m,
      data.cgama_gt_glutamiltransferase_f,
      data.cgama_gt_glutamiltransferase_unidade,
      data.cfosfatase_alcalina_m,
      data.cfosfatase_alcalina_f,
      data.cfosfatase_alcalina_unidade,
      data.ccreatina_quinase_ck_m,
      data.ccreatina_quinase_ck_f,
      data.ccreatina_quinase_ck_unidade,
      data.cglicose,
      data.cglicose_unidade,
      data.cferro_m_ate_40_anos,
      data.cferro_m_mais_de_40_anos,
      data.cferro_m_mais_de_60_anos,
      data.cferro_f_ate_40_anos,
      data.cferro_f_mais_de_40_anos,
      data.cferro_f_mais_de_60_anos,
      data.cferro_crianca,
      data.cferro_unidade,
      data.ccolesterol_total,
      data.ccolesterol_total_unidade,
      data.chdl_ate_19_anos,
      data.chdl_mais_de_20_anos,
      data.chdl_unidade,
      data.cldl_baixo_risco,
      data.cldl_risco_intermediario,
      data.cldl_alto_risco,
      data.cldl_muito_alto_risco,
      data.cldl_unidade,
      data.ctriglicerideos,
      data.ctriglicerideos_unidade,
      data.cureia_m_menos_de_50_anos,
      data.cureia_m_mais_de_50_anos,
      data.cureia_f_menos_de_50_anos,
      data.cureia_f_mais_de_50_anos,
      data.cureia_crianca,
      data.cureia_unidade,
      data.ccreatinina_m,
      data.ccreatinina_f,
      data.ccreatinina_crianca,
      data.ccreatinina_unidade,
      data.cacido_urico_m_13_a_18_anos,
      data.cacido_urico_m_mais_de_18_anos,
      data.cacido_urico_f_1_a_9_anos,
      data.cacido_urico_f_10_a_18_anos,
      data.cacido_urico_f_mais_de_18_anos,
      data.cacido_urico_unidade,
      data.cpcr_proteina_c_reativa,
      data.cpcr_proteina_c_reativa_unidade,
      data.ccalcio,
      data.ccalcio_unidade,
      data.cldh,
      data.cldh_unidade,
      data.cmagnesio_m,
      data.cmagnesio_f,
      data.cmagnesio_crianca,
      data.cmagnesio_unidade,
      data.cfosforo_adulto,
      data.cfosforo_1_a_3_anos,
      data.cfosforo_4_a_12_anos,
      data.cfosforo_13_a_15_anos,
      data.cfosforo_16_a_18_anos,
      data.cfosforo_unidade,
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
