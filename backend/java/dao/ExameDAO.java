package dao;

import model.Exame;
import java.util.Map;

public class ExameDAO {
    public void salvarExame(Exame e){ // precisa adicionar o paciente, responsavel e preceptor, mas como faz isso se a classe não tem ID?
               
        StringBuilder dados = new StringBuilder();
        StringBuilder valores = new StringBuilder();

        for(Map.Entry<String, Double> entry : e.getListaDados().entrySet()){
            dados.append(entry.getKey()).append(", ");
            valores.append(entry.getValue()).append(", ");
        }
        dados.setLength(dados.length()-2);
        valores.setLength(valores.length()-2);

        String insertSQL = String.format("INSERT INTO exames (id_responsavel, id_preceptor, registro_paciente, dentrada, dentrega, data, %s) VALUES (%d, %d, %d, '%s', '%s', '%s', %s);\n",
        dados, 
        e.getIdResponsavel(), 
        e.getIdPreceptor(), 
        e.getIdPaciente(), 
        e.getDataEntrada(), 
        e.getDataEntrega(), 
        e.getData(), 
        valores);

        FileHandler.writeInsertStatement(insertSQL);
    }
}
