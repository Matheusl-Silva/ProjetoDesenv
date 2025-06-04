package dao;

import model.Usuario;

public class UsuarioDAO {
    public void salvarUsuario(Usuario u){
        String insertSQL = String.format("INSERT INTO usuarios (nome, email, senha, admin) VALUES (%s, %s, %s, %c);\n",
        u.getNome(),
        u.getEmail(),
        u.getSenha(),
        u.getAdmin() ? 'S' : 'N');

        FileHandler.writeInsertStatement(insertSQL);
    }
}
