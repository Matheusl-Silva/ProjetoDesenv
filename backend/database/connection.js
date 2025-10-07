const mysql = require("mysql2");

const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "laboratorio",
});

db.connect((err) => {
  if (err) {
    console.log("Erro de conexão: " + err);
    return;
  }
  console.log("Conexão com banco de dados estabelecida");
});

module.exports = db;