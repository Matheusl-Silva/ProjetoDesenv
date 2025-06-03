package dao;

import model.Usuario;

public class UsuarioDAO {
    public void salvarUsuario(Usuario usuario){
        String insertSQL = String.format("INSERT INTO usuarios (nome, email, senha, admin) VALUES (%s, %s, %s, %c);\n",
        usuario.getNome(),
        usuario.getEmail(),
        usuario.getSenha(),
        usuario.getAdmin());

        FileHandler.writeInsertStatement(insertSQL);
    }
}
