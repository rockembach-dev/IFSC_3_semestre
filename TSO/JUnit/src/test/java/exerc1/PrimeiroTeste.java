package exerc1;

import org.junit.*;

public class PrimeiroTeste {
    @Test
    public void teste1(){
        System.out.println("Teste 1 executado");
    }

    @Test
    public void teste2(){
        System.out.println("Teste 2 executado");
    }

    public void naoEUmTeste(){
        System.out.println("Esta mensagem não deve aparecer!");
    }
}
