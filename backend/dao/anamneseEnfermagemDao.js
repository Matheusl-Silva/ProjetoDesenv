const db = require("../database/connection");

exports.findById = (id) => {
  return new Promise((resolve, reject) => {
    const query = "SELECT * FROM anamnese_enfermagem WHERE ID = ?;";
    db.query(query, [id], (err, results) => {
      err ? reject(err) : resolve(results);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query = `INSERT INTO anamnese_enfermagem (
                    cqueixa,
                    dinicio_sintomas,
                    cfrequencia,
                    clocalizacao_da_dor,
                    bcardiopatia,
                    bhipertensao,
                    bdiabetes,
                    bcancer,
                    bcirurgias,
                    coutras_doencas,
                    calergias,
                    cmedicamento,
                    nrefeicoes_ao_dia,
                    celiminacao_urinaria,
                    celiminacao_intestinal,
                    cciclo_menstrual,
                    csono_e_repouso,
                    nhoras_de_sono,
                    cfrequencia_fumo,
                    cfrequencia_drogas,
                    cfrequencia_alcool,
                    cfrequencia_exercicios,
                    clazer,
                    bsaneamento_basico,
                    canimais_domesticos,
                    bposto_de_saude,
                    cdoenca_familiar,
                    ctratamento_doenca_familiar,
                    id_paciente
                    ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?, ?, ?, ?, ?
                    );`;

    const values = [
      data.cqueixa,
      data.dinicioSintomas,
      data.cfrequencia,
      data.clocalizacaoDaDor,
      data.bcardiopatia,
      data.bhipertensao,
      data.bdiabetes,
      data.bcancer,
      data.bcirurgias,
      data.coutrasDoencas,
      data.calergias,
      data.cmedicamento,
      data.nrefeicoesAoDia,
      data.celiminacaoUrinaria,
      data.celiminacaoIntestinal,
      data.ccicloMenstrual,
      data.csonoERepouso,
      data.nhorasDeSono,
      data.cfrequenciaFumo,
      data.cfrequenciaDrogas,
      data.cfrequenciaAlcool,
      data.cfrequenciaExercicios,
      data.clazer,
      data.bsaneamentoBasico,
      data.canimaisDomesticos,
      data.bpostoDeSaude,
      data.cdoencaFamiliar,
      data.ctratamentoDoencaFamiliar,
      data.idPaciente,
    ];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};
