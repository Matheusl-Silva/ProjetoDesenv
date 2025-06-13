const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql2");
const http = require ('http');
const ejs = require("ejs");

const app = express();
app.use(express.static(__dirname + "/assets"));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({encoded: true}));

app.set("view engine", "ejs");

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
})

