package model;

//import java.util.HashMap;

public class Paciente  extends Pessoa{
    private String periodo;
    private String dataNasc;
    private String fone;
    private String nomeMae;
    private boolean tomaMedicamento;
    private String medicamento;
    private boolean trataPatologia;
    private String patologia;
    private String dataCadastro;

    //private HashMap<String, String> dados = new HashMap<>();

    public Paciente(){}
    
    
    public Paciente(String nome, String email, String periodo, String dataNasc, String fone, String nomeMae,
            boolean tomaMedicamento, String medicamento, boolean trataPatologia, String patologia,
            String dataCadastro) {
        super(nome, email);
        this.periodo = periodo;
        this.dataNasc = dataNasc;
        this.fone = fone;
        this.nomeMae = nomeMae;
        this.tomaMedicamento = tomaMedicamento;
        this.medicamento = medicamento;
        this.trataPatologia = trataPatologia;
        this.patologia = patologia;
        this.dataCadastro = dataCadastro;
        
    }


    public String getPeriodo() {
        return periodo;
    }
    public void setPeriodo(String periodo) {
        this.periodo = periodo;
    }
    public String getDataNasc() {
        return dataNasc;
    }
    public void setDataNasc(String dataNasc) {
        this.dataNasc = dataNasc;
    }
    public String getFone() {
        return fone;
    }
    public void setFone(String fone) {
        this.fone = fone;
    }
    public String getNomeMae() {
        return nomeMae;
    }
    public void setNomeMae(String nomeMae) {
        this.nomeMae = nomeMae;
    }
    public boolean getTomaMedicamento() {
        return tomaMedicamento;
    }
    public void setTomaMedicamento(boolean tomaMedicamento) {
        this.tomaMedicamento = tomaMedicamento;
    }
    public String getMedicamento() {
        return medicamento;
    }
    public void setMedicamento(String medicamento) {
        this.medicamento = medicamento;
    }
    public boolean getTrataPatologia() {
        return trataPatologia;
    }
    public void setTrataPatologia(boolean trataPatologia) {
        this.trataPatologia = trataPatologia;
    }
    public String getPatologia() {
        return patologia;
    }
    public void setPatologia(String patologia) {
        this.patologia = patologia;
    }
    public String getDataCadastro() {
        return dataCadastro;
    }
    public void setDataCadastro(String dataCadastro) {
        this.dataCadastro = dataCadastro;
    }

    
}
