package model;

public class Exame {
    private String dataEntrada, dataEntrega, data;
    private double hemacia, hemoglobina, hematocrito, vcm, hcm, chcm, rdw, leucocitos, neutrofilos, blastos, promielocitos, mielocitos, metamielocitos, bastonetes, segmentados, eosinofilos, basofilos, plaquetas, volPlaquetarioMedio;
    
    public Exame(String dataEntrada, String dataEntrega, String data, double hemacia, double hemoglobina,
            double hematocrito, double vcm, double hcm, double chcm, double rdw, double leucocitos, double neutrofilos,
            double blastos, double promielocitos, double mielocitos, double metamielocitos, double bastonetes,
            double segmentados, double eosinofilos, double basofilos, double plaquetas, double volPlaquetarioMedio) {
        this.dataEntrada = dataEntrada;
        this.dataEntrega = dataEntrega;
        this.data = data;
        this.hemacia = hemacia;
        this.hemoglobina = hemoglobina;
        this.hematocrito = hematocrito;
        this.vcm = vcm;
        this.hcm = hcm;
        this.chcm = chcm;
        this.rdw = rdw;
        this.leucocitos = leucocitos;
        this.neutrofilos = neutrofilos;
        this.blastos = blastos;
        this.promielocitos = promielocitos;
        this.mielocitos = mielocitos;
        this.metamielocitos = metamielocitos;
        this.bastonetes = bastonetes;
        this.segmentados = segmentados;
        this.eosinofilos = eosinofilos;
        this.basofilos = basofilos;
        this.plaquetas = plaquetas;
        this.volPlaquetarioMedio = volPlaquetarioMedio;
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
    public double getHemacia() {
        return hemacia;
    }
    public void setHemacia(double hemacia) {
        this.hemacia = hemacia;
    }
    public double getHemoglobina() {
        return hemoglobina;
    }
    public void setHemoglobina(double hemoglobina) {
        this.hemoglobina = hemoglobina;
    }
    public double getHematocrito() {
        return hematocrito;
    }
    public void setHematocrito(double hematocrito) {
        this.hematocrito = hematocrito;
    }
    public double getVcm() {
        return vcm;
    }
    public void setVcm(double vcm) {
        this.vcm = vcm;
    }
    public double getHcm() {
        return hcm;
    }
    public void setHcm(double hcm) {
        this.hcm = hcm;
    }
    public double getChcm() {
        return chcm;
    }
    public void setChcm(double chcm) {
        this.chcm = chcm;
    }
    public double getRdw() {
        return rdw;
    }
    public void setRdw(double rdw) {
        this.rdw = rdw;
    }
    public double getLeucocitos() {
        return leucocitos;
    }
    public void setLeucocitos(double leucocitos) {
        this.leucocitos = leucocitos;
    }
    public double getNeutrofilos() {
        return neutrofilos;
    }
    public void setNeutrofilos(double neutrofilos) {
        this.neutrofilos = neutrofilos;
    }
    public double getBlastos() {
        return blastos;
    }
    public void setBlastos(double blastos) {
        this.blastos = blastos;
    }
    public double getPromielocitos() {
        return promielocitos;
    }
    public void setPromielocitos(double promielocitos) {
        this.promielocitos = promielocitos;
    }
    public double getMielocitos() {
        return mielocitos;
    }
    public void setMielocitos(double mielocitos) {
        this.mielocitos = mielocitos;
    }
    public double getMetamielocitos() {
        return metamielocitos;
    }
    public void setMetamielocitos(double metamielocitos) {
        this.metamielocitos = metamielocitos;
    }
    public double getBastonetes() {
        return bastonetes;
    }
    public void setBastonetes(double bastonetes) {
        this.bastonetes = bastonetes;
    }
    public double getSegmentados() {
        return segmentados;
    }
    public void setSegmentados(double segmentados) {
        this.segmentados = segmentados;
    }
    public double getEosinofilos() {
        return eosinofilos;
    }
    public void setEosinofilos(double eosinofilos) {
        this.eosinofilos = eosinofilos;
    }
    public double getBasofilos() {
        return basofilos;
    }
    public void setBasofilos(double basofilos) {
        this.basofilos = basofilos;
    }
    public double getPlaquetas() {
        return plaquetas;
    }
    public void setPlaquetas(double plaquetas) {
        this.plaquetas = plaquetas;
    }
    public double getVolPlaquetarioMedio() {
        return volPlaquetarioMedio;
    }
    public void setVolPlaquetarioMedio(double volPlaquetarioMedio) {
        this.volPlaquetarioMedio = volPlaquetarioMedio;
    }
}