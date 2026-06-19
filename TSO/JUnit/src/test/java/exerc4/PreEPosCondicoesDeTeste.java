package exerc4;

import org.junit.*;

public class PreEPosCondicoesDeTeste {
    @Before
    public void preCondicao(){
        System.out.println("Executou a pré condição");
    }
    @Test
    public void exibicaoPrePosCondicao_Teste1(){
        System.out.println("Executou teste 1");
    }

    @After
    public void finalza(){
        System.out.println("Executou a finaliza");
    }
}
