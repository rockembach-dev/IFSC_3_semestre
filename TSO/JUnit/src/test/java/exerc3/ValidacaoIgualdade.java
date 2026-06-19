package exerc3;

import org.junit.*;
import static org.junit.Assert.*;

public class ValidacaoIgualdade {
    @Test
    public void validacaoIgualdade_Sucesso(){
        String resultadoObtido = "Registro salvo com sucesso";
        assertEquals("Registro salvo com sucesso", resultadoObtido);
    }

    @Test
    public void validacaoIgualdade_Falha(){
        inicializa();
        String resultadoObtido = "Registro excluído com sucesso!";
        assertEquals("Resultado Salvo com sucesso!", resultadoObtido);
        finaliza();
    }

    @Before
    public void inicializa(){
    }
    @After
    public void finaliza(){
    }
}
