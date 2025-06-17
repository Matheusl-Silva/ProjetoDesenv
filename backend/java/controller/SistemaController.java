package controller;
import java.util.Scanner;
import java.util.LinkedHashMap;
import model.Exame;
import model.Paciente;
import model.Usuario;
import dao.ExameDAO;
import dao.PacienteDAO;
import dao.UsuarioDAO;

public class SistemaController {
    private static Scanner scan = new Scanner(System.in);

    public void cadastrarUsuario(){
        UsuarioDAO uDao = new UsuarioDAO();

        System.out.println("Insira o nome:");
        String nome = scan.nextLine();
        System.out.println("Insira o email:");
        String email = scan.nextLine();
        System.out.println("Insira a senha:");
        String senha = scan.nextLine();
        System.out.println("Cadastrar o usuário como administrador? s/n");
        boolean admin = receberSimNao();
        Usuario u = new Usuario(nome, email, senha, admin);
        uDao.salvarUsuario(u);
        System.out.println("Usuário cadastrado com sucesso!");
    }

    public void cadastrarPaciente(){
        PacienteDAO pDao = new PacienteDAO();

        System.out.println("Insira o nome:");
        String nome = scan.nextLine();
        System.out.println("Insira o email:");
        String email = scan.nextLine();
        System.out.println("Insira o período:");
        String periodo = scan.nextLine();
        System.out.println("Insira a data de nascimento: ");
        String dataNasc = scan.nextLine();
        System.out.println("Insira o telefone:");
        String fone = scan.nextLine();
        System.out.println("Insira o nome da mãe:");
        String nomeMae = scan.nextLine();
        System.out.println("O paciente toma algum medicamento? s/n");
        boolean tomaMedicamento = receberSimNao();
        String medicamento = "";
        if(tomaMedicamento){
            System.out.println("Insira o nome do medicamento:");
            medicamento = scan.nextLine();
        }
        System.out.println("O paciente trata alguma patologia?");
        boolean trataPatologia = receberSimNao();
        String patologia = "";
        if(trataPatologia){
            System.out.println("Insira a patologia tratada:");
            patologia = scan.nextLine();
        }
        System.out.println("Insira a data desse cadastro:");
        String dataCadastro = scan.nextLine();
        Paciente p = new Paciente(nome, email, periodo, dataNasc, fone, nomeMae, tomaMedicamento, medicamento, trataPatologia, patologia, dataCadastro);
        pDao.salvarPaciente(p);
        System.out.println("Paciente cadastrado com sucesso!");
    }

    public void cadastrarExame(){
        ExameDAO eDao = new ExameDAO();

        System.out.println("Insira o ID do responsável:");
        int idResponsavel = scan.nextInt();
        System.out.println("Insira o ID do preceptor:");
        int idPreceptor = scan.nextInt();
        System.out.println("Insira o registro do paciente:");
        int idPaciente = scan.nextInt();
        scan.nextLine(); //Limpar buffer
        System.out.println("Insira a data de entrada:");
        String dataEntrada = scan.nextLine();
        System.out.println("Insira a data de entrega:");
        String dataEntrega = scan.nextLine();
        System.out.println("Insira a data do exame:");
        String data = scan.nextLine();
        System.out.println("Insira os dados do exame a seguir:");
        double valores[];
        valores = new double[19];
        int i = 0;
        for(String nome : Exame.NOME_DADOS){ //Recebe todos os valores e guarda em um array
            System.out.println(nome + ":");
            valores[i] = scan.nextDouble();
            i++;
        }
        LinkedHashMap<String, Double> dados = new LinkedHashMap<>();
        for(i = 0; i < valores.length; i++){ //Coloca todos os valores no LinkedHashMap 
            dados.put(Exame.NOME_DADOS[i], valores[i]);
        }
        Exame e = new Exame(idResponsavel, idPreceptor, idPaciente, dataEntrada, dataEntrega, data, dados);
        eDao.salvarExame(e);

    }

    private boolean receberSimNao(){
        char entrada;
        do{
            entrada = scan.nextLine().toUpperCase().charAt(0);
            if(entrada != 'S' && entrada != 'N'){
                System.out.println("Caracter inválido!");
            } 
        }while(entrada != 'S' && entrada != 'N');
        if(entrada == 'S'){
            return true;
        }else{
            return false;
        }
    }
}
