package model;

import java.util.HashMap;

public class Exame {
    private String dataEntrada, dataEntrega, data;
    private HashMap<String, Double> dados = new HashMap<>();

    public static final String[] NOME_DADOS = {"hemacia", "hemoglobina", "hematocrito", "vcm", "hcm", "chcm", "rdw", "leucocitos", "neutrofilos", "blastos", "promielocitos", "mielocitos", "metamielocitos", "bastonetes", "segmentados", "eosinofilos", "basofilos", "plaquetas", "volPlaquetarioMedio"};

    public Exame(){}
    public Exame(String dataEntrada, String dataEntrega, String data, HashMap<String, Double> dados){
        this.dataEntrada = dataEntrada;
        this.dataEntrega = dataEntrega;
        this.data = data;
        this.dados = dados;
    }
    public Exame(String dataEntrada, String dataEntrega, String data, double hemacia, double hemoglobina,
            double hematocrito, double vcm, double hcm, double chcm, double rdw, double leucocitos, double neutrofilos,
            double blastos, double promielocitos, double mielocitos, double metamielocitos, double bastonetes,
            double segmentados, double eosinofilos, double basofilos, double plaquetas, double volPlaquetarioMedio) {

        this.dataEntrada = dataEntrada;
        this.dataEntrega = dataEntrega;
        this.data = data;

        this.dados.put("hemacia", hemacia);
        this.dados.put("hemoglobina", hemoglobina);
        this.dados.put("hematocrito", hematocrito);
        this.dados.put("vcm", vcm);
        this.dados.put("hcm", hcm);
        this.dados.put("chcm", chcm);
        this.dados.put("rdw", rdw);
        this.dados.put("leucocitos", leucocitos);
        this.dados.put("neutrofilos", neutrofilos);
        this.dados.put("blastos", blastos);
        this.dados.put("promielocitos", promielocitos);
        this.dados.put("mielocitos", mielocitos);
        this.dados.put("metamielocitos", metamielocitos);
        this.dados.put("bastonetes", bastonetes);
        this.dados.put("segmentados", segmentados);
        this.dados.put("eosinofilos", eosinofilos);
        this.dados.put("basofilos", basofilos);
        this.dados.put("plaquetas", plaquetas);
        this.dados.put("volPlaquetarioMedio", volPlaquetarioMedio);
        
    }

    public String getDataEntrada() {
        return dataEntrada;
    }

    public void setDataEntrada(String dataEntrada) {
        this.dataEntrada = dataEntrada;
    }

    public String getDataEntrega() {
        return dataEntrega;
    }

    public void setDataEntrega(String dataEntrega) {
        this.dataEntrega = dataEntrega;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public HashMap<String, Double> getListaDados(){
        return this.dados;
    }

    public double getDado(String dado){
        return dados.get(dado);
    }

    public void setDado(String dado, double valor){
        dados.put(dado, valor);
    }
}