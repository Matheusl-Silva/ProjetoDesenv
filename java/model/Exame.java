package model;

import java.util.LinkedHashMap;

public class Exame {
    private String dataEntrada, dataEntrega, data;
    private LinkedHashMap<String, Double> dados = new LinkedHashMap<>();

    public static final String[] NOME_DADOS = {"hemacia", "hemoglobina", "hematocrito", "vcm", "hcm", "chcm", "rdw", "leucocitos", "neutrofilos", "blastos", "promielocitos", "mielocitos", "metamielocitos", "bastonetes", "segmentados", "eosinofilos", "basofilos", "plaquetas", "volPlaquetarioMedio"};

    public Exame(){}
    public Exame(String dataEntrada, String dataEntrega, String data, LinkedHashMap<String, Double> dados){
        this.dataEntrada = dataEntrada;
        this.dataEntrega = dataEntrega;
        this.data = data;
        this.dados = dados;
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

    public LinkedHashMap<String, Double> getListaDados(){
        return this.dados;
    }

    public double getDado(String dado){
        return dados.get(dado);
    }

    public void setDado(String dado, double valor){
        dados.put(dado, valor);
    }
}