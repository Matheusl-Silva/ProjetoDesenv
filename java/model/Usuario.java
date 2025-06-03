package model;

public class Usuario extends Pessoa {
    private String senha;
    private char admin;

    public Usuario() {
    }

    public Usuario(String nome, String email, String senha) {
        super(nome, email);
        this.senha = senha;
        this.admin = 'N';
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public char getAdmin() {
        return admin;
    }

    public void setAdmin(char admin) {
        this.admin = admin;
    }
}
