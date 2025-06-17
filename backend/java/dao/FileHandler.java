package dao;

import java.io.FileWriter;
import java.io.PrintWriter;
import java.io.IOException;

public class FileHandler {
    private static final String FILE_NAME = "inserts.sql";

    public static synchronized void writeInsertStatement(String insert){
        try{
            FileWriter fw = new FileWriter(FILE_NAME, true);
            PrintWriter pw = new PrintWriter(fw);
            pw.write(insert);
            pw.close();

        }catch(IOException erro){
            System.err.println("Erro:\n" + erro.getMessage());
        }
    }
}
