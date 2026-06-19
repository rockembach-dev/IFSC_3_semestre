package exerc6;

import exerc1.PrimeiroTeste;
import exerc2.ValidacaoVerdadeiroFalso;
import exerc3.ValidacaoIgualdade;
import exerc4.PreEPosCondicoesDeTeste;
import main.Pessoa;
import org.junit.runner.RunWith;
import org.junit.runners.Suite;

@RunWith(Suite.class)
@Suite.SuiteClasses({
        PrimeiroTeste.class,
        ValidacaoVerdadeiroFalso.class,
        ValidacaoIgualdade.class,
        PreEPosCondicoesDeTeste.class,
        Pessoa.class
})

public class SuiteDeTeste {
}
