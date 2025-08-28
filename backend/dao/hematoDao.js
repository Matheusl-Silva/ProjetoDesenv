const db = require("../database/connection");

exports.findByRegistroPaciente = (registroPaciente) => {
  return new Promise((resolve, reject) => {
    const query =
      "SELECT id, ddata, id_preceptor FROM exame_hematologia WHERE id_paciente = ? ORDER BY ddata DESC";

    db.query(query, [registroPaciente], (err, results) => {
      err ? reject(err) : resolve(results);
    });
  });
};

exports.findById = (idExame) => {
  return new Promise((resolve, reject) => {
    const query = `SELECT
      e.*,
      p.cnome AS nome_paciente,
      u_resp.cnome AS nome_responsavel,
      u_prec.cnome AS nome_preceptor
  FROM
      exame_hematologia e,
      paciente p,
      usuario u_resp,
      usuario u_prec
  WHERE
      e.id_paciente = p.id AND
      e.id_responsavel = u_resp.id AND
      e.id_preceptor = u_prec.id AND
      e.id = ?`;

    db.query(query, [idExame], (err, results) => {
      err ? reject(err) : resolve(results);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query = `INSERT INTO exame_hematologia (
                  id_responsavel, id_preceptor, id_paciente, ddata_exame,
                  nhemacia, nhemoglobina, nhematocrito, nvcm, nhcm, nchcm, nrdw, nleucocitos,
                  nblastos, npromielocitos, nmielocitos, nmetamielocitos, nbastonetes, nsegmentados,
                  neosinofilos, nbasofilos, nplaquetas, nvolume_plaquetario_medio, nneutrofilos
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

    const values = [
      data.id_responsavel,
      data.id_preceptor,
      data.id_paciente,
      data.data,
      data.hemacia,
      data.hemoglobina,
      data.hematocrito,
      data.vcm,
      data.hcm,
      data.chcm,
      data.rdw,
      data.leucocitos,
      data.blastos,
      data.promielocitos,
      data.mielocitos,
      data.metamielocitos,
      data.bastonetes,
      data.segmentados,
      data.eosinofilos,
      data.basofilos,
      data.plaquetas,
      data.volplaquetariomedio,
      data.neutrofilos,
    ];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};
