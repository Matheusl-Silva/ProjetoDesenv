import view.Menu;

import controller.SistemaController;

public class App {
    public static void main(String[] args) {
        SistemaController controller = new SistemaController();
        int entrada;
        do{
            entrada = Menu.exibirMenuPrincipal();
            switch(entrada){
                case 1:
                    controller.cadastrarUsuario();
                    break;
                case 2:
                    controller.cadastrarPaciente();
                    break;
                case 3:
                    controller.cadastrarExame();
                    break;
                case 4:
                    System.out.println("Saindo...");
                    break;
                default:
                    System.out.println("Opção inválida!");
                
            }
        }while(entrada != 4);
    }
}