package dao;

import model.Paciente;

public class PacienteDAO {
    public void salvarPaciente(Paciente p){
        String insertSQL = String.format("INSERT INTO pacientes (periodo, nome, data_nascimento, telefone, email, nome_mae, toma_medicamento, medicamento, trata_patalogia, patologia, data_cadastro) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %s, '%s', %s, '%s');\n",
        p.getPeriodo(),
        p.getNome(),
        p.getDataNasc(),
        p.getFone(),
        p.getEmail(),
        p.getNomeMae(),
        p.getTomaMedicamento() ? "medSim" : "medNao",
        p.getTomaMedicamento() ? "'" + p.getMedicamento() + "'" : "null",
        p.getTrataPatologia() ? "patSim" : "patNao",
        p.getTrataPatologia() ? "'" + p.getPatologia() + "'" : "null",
        p.getDataCadastro());

        FileHandler.writeInsertStatement(insertSQL);
    }
}
