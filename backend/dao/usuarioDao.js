const db = require("../database/connection");

exports.findAll = () => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM usuario", (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.findByEmail = (email) => {
  return new Promise((resolve, reject) => {
    db.query(
      "SELECT * FROM usuario WHERE cemail = ?",
      [email],
      (err, result) => {
        err ? reject(err) : resolve(result);
      }
    );
  });
};

exports.login = (email, senha) => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM usuario WHERE cemail = ? AND csenha = ?;"),
      [email, senha],
      (err, result) => {
        err ? reject(err) : resolve(result);
      };
  });
};

exports.findById = (id) => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM usuario WHERE id = ?", [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query =
      "INSERT INTO usuario (cnome, cemail, csenha) VALUES (?, ?, ?)";

    const values = [data.nome, data.email, data.senha];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.update = (id, data) => {
  return new Promise((resolve, reject) => {
    const query =
      "UPDATE usuario SET cnome = ?, cemail = ?, csenha = ?, cadmin = ? WHERE id = ?";

    const values = [data.nome, data.email, data.senha, data.admin, id];

    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.delete = (id) => {
  return new Promise((resolve, reject) => {
    db.query("DELETE * FROM usuario WHERE id = ?", [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};
