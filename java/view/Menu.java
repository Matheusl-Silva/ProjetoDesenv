package view;

import java.util.Scanner;

public class Menu {
    private Scanner scan;

    public Menu(Scanner scan){
        this.scan = scan;
    }

    public void exibirMenuPrincipal(){
        String textoMenu = "1. Inserir usuário" + 
                            "\n2. Inserir paciente" + 
                            "3. Sair";
        System.out.println(textoMenu);
    }
}
