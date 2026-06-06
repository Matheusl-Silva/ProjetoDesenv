const db = require("../database/connection");

exports.findAll = () => {
  return new Promise((resolve, reject) => {
    db.query(
      "SELECT id, cnome, cemail, cadmin FROM usuario",
      (err, result) => {
        err ? reject(err) : resolve(result);
      }
    );
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

exports.findById = (id) => {
  return new Promise((resolve, reject) => {
    db.query(
      "SELECT id, cnome, cemail, cadmin FROM usuario WHERE id = ?",
      [id],
      (err, result) => {
        err ? reject(err) : resolve(result);
      }
    );
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query =
      "INSERT INTO usuario (cnome, cemail, csenha, cadmin) VALUES (?, ?, ?, ?)";
    const values = [data.nome, data.email, data.senha, data.admin || "N"];
    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.update = (id, data) => {
  return new Promise((resolve, reject) => {
    // Update sem mexer na senha; a senha é trocada por updatePasswordByEmail
    const query =
      "UPDATE usuario SET cnome = ?, cemail = ?, cadmin = ? WHERE id = ?";
    const values = [data.nome, data.email, data.admin, id];
    db.query(query, values, (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.delete = (id) => {
  return new Promise((resolve, reject) => {
    db.query("DELETE FROM usuario WHERE id = ?", [id], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.updatePasswordByEmail = (email, novaSenhaHash) => {
  return new Promise((resolve, reject) => {
    const query = "UPDATE usuario SET csenha = ? WHERE cemail = ?";
    db.query(query, [novaSenhaHash, email], (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};
