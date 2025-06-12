const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql2");

const app = express();

app.use(bodyParser.json());

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "login"
});

db.connect((err) => {
    if(err){
        console.log("Erro de conexão: " + err);
        return;
    }
    console.log("Conexão com banco de dados estabelecida");
});

app.listen(3000, () => {
    console.log("Servidor rodando na porta 3000.");
});

app.get('/', (req, res) => {

})