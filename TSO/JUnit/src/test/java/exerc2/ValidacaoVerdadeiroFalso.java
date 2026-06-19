package exerc2;

import org.junit.Test;
import static org.junit.Assert.*;

public class ValidacaoVerdadeiroFalso {
    @Test
    public void validacaoVerdadeiro_Sucesso(){
        boolean campoEstaPresente = true;
        assertTrue(campoEstaPresente);
    }

    @Test
    public void validacaoVerdadeiro_Falha(){
        boolean campoEstaPresente = true;
        assertFalse("Campo não esta presente",campoEstaPresente);
    }
}
