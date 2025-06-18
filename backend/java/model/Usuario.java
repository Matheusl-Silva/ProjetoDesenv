package model;

public class Usuario extends Pessoa {
    private String senha;
    private boolean admin;

    public Usuario() {
    }

    public Usuario(String nome, String email, String senha) {
        super(nome, email);
        this.senha = senha;
        this.admin = false;
    }

    public Usuario(String nome, String email, String senha, boolean admin) {
        super(nome, email);
        this.senha = senha;
        this.admin = admin;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public boolean getAdmin() {
        return admin;
    }

    public void setAdmin(boolean admin) {
        this.admin = admin;
    }
}
