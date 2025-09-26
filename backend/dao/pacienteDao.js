const db = require("../database/connection");

exports.findAll = () => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM paciente", (err, results) => {
      err ? reject(err) : resolve(results);
    });
  });
};

exports.findById = (id) => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM paciente WHERE id = ?", [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.findByEmail = (email) => {
  return new Promise((resolve, reject) => {
    db.query(
      "SELECT * FROM paciente where cemail = ?",
      [email],
      (err, result) => {
        err ? reject(err) : resolve(result[0] ? result[0] : false);
      }
    );
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query =
      "INSERT INTO paciente (cnome, cemail, cperiodo, ddata_nascimento, ctelefone, ccpf, cmedicamento, cpatologia) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    const values = [
      data.nome,
      data.email,
      data.periodo,
      data.data_nascimento,
      data.telefone,
      data.cpf,
      data.medicamento,
      data.patologia,
    ];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.update = (id, data) => {
  return new Promise((resolve, reject) => {
    const query =
      "UPDATE paciente SET cnome = ?, cemail = ?, cperiodo = ?, ddata_nascimento = ?, ctelefone = ?, ccpf = ?, cmedicamento = ?, cpatologia = ? WHERE id = ?";

    const values = [
      data.nome,
      data.email,
      data.periodo,
      data.data_nascimento,
      data.telefone,
      data.cpf,
      data.medicamento,
      data.patologia,
      id,
    ];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.delete = (id) => {
  return new Promise((resolve, reject) => {
    db.query("DELETE FROM paciente WHERE id = ?", [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.BuscaGeral = (id) => {
  return new Promise((resolve, reject) => {
    db.query(
      `SELECT *
         FROM exame_bioquimica eb
         LEFT JOIN exame_hematologia eh 
           ON eb.id_paciente = eh.id_paciente
        WHERE eb.id_paciente = ?`,
      [id],
      (err, result) => {
        err ? reject(err) : resolve(result);
      }
    );
  });
};
