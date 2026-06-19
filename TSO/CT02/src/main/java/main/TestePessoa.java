package main;

import org.junit.jupiter.api.Test;

public class TestePessoa {
    Pessoa p = new Pessoa(111L, "Gustavo", "Rockembach","08/07/2006");
    @Test
    void teste(){
        assert (p.getNome().equals("Gustavo"));
        assert (p.getSobrenome().equals("Rockembach"));
        assert (p.getDataNascimento().equals("08/07/2006"));
        assert (p.getRg() == 111L);
    }

    Pessoa p1 = new Pessoa(000L, "Gustavo", "Rockembach", 8,7,2006);
    @Test
    void teste2(){
        assert (p1.getNome().equals("Gustavo"));
        assert (p1.getSobrenome().equals("Rockembach"));
        assert (p1.getRg() == 000L);
        assert (p1.getDataNascimentoObjeto().getDia() == 8);
        assert (p1.getDataNascimentoObjeto().getMes() == 7);
        assert (p1.getDataNascimentoObjeto().getAno() == 2006);
    }
}
