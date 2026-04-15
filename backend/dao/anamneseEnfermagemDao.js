const db = require("../database/connection");

exports.findByPacientId = (pacientId) => {
  return new Promise((resolve, reject) => {
    const query = `SELECT id, ddata FROM anamnese_enfermagem WHERE id_paciente = ? ORDER BY ddata DESC;`;

    db.query(query, [pacientId] , (err, result) => {
      err ? reject(err) : resolve(result);
    })
  })
}

exports.findById = (id) => {
  return new Promise((resolve, reject) => {
    const query = "SELECT * FROM anamnese_enfermagem WHERE ID = ?;";
    db.query(query, [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query = `INSERT INTO anamnese_enfermagem (
                    ddata,
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
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                    );`;

    const values = [
      data.data,
      data.queixa,
      data.inicioSintomas,
      data.frequencia,
      data.localizacaoDaDor,
      data.cardiopatia,
      data.hipertensao,
      data.diabetes,
      data.cancer,
      data.cirurgias,
      data.outrasDoencas,
      data.alergias,
      data.medicamento,
      data.refeicoesAoDia,
      data.eliminacaoUrinaria,
      data.eliminacaoIntestinal,
      data.cicloMenstrual,
      data.sonoERepouso,
      data.horasDeSono,
      data.frequenciaFumo,
      data.frequenciaDrogas,
      data.frequenciaAlcool,
      data.frequenciaExercicios,
      data.lazer,
      data.saneamentoBasico,
      data.animaisDomesticos,
      data.postoDeSaude,
      data.doencaFamiliar,
      data.tratamentoDoencaFamiliar,
      data.idPaciente,
    ];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};
