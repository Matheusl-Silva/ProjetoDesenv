import dao.UsuarioDAO;
import model.Usuario;

public class App {
    public static void main(String[] args) {
        Usuario u = new Usuario("matheus", "matheus@gmail", "matheussenha");
        UsuarioDAO uDAO = new UsuarioDAO();
        uDAO.salvarUsuario(u);
    }
}