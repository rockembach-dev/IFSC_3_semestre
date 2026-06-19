package main;


import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@Getter
@Setter
@AllArgsConstructor
@ToString
public class Pessoa {
    private long rg;
    private String nome;
    private String sobrenome;
    private String dataNascimento;
    private Data dataNascimentoObjeto;

    public Pessoa(long rg, String nome, String sobrenome, int dia, int mes, int ano) {
        this.rg = rg;
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.dataNascimentoObjeto = new Data(dia, mes, ano);
    }

    public Pessoa(long rg, String nome, String sobrenome, String dataNascimento) {
        this.rg = rg;
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.dataNascimento = dataNascimento;
    }
}
