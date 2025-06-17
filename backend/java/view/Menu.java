package view;

import java.util.Scanner;

public class Menu {
    private static Scanner scan = new Scanner(System.in);

    public static int exibirMenuPrincipal(){
        String textoMenu = "1. Inserir usuário" + 
                            "\n2. Inserir paciente" + 
                            "\n3. Inserir exame" +
                            "\n4. Sair" + 
                            "\n-----------------------" + 
                            "\nSelecione uma opção:";
        System.out.println(textoMenu);
        return scan.nextInt();
    }

    public void fecharScanner(){
        Menu.scan.close();
    }
}
