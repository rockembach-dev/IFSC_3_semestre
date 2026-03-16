package br.edu.ifsc.fln.model.domain;

public class Funcionario {
    private String nome;
    private double salarioBase;
    private int numeroDependentes;

    public double calcularSalario() {
        return salarioBase + numeroDependentes * 200;
    }

    public String getDados(){
        StringBuilder dados = new StringBuilder();
        dados.append("Nome: ").append(nome).append("\n").append("Salario: R$").append(salarioBase).append("\n").append("Quantidade dependentes: ").append(numeroDependentes).append("\n");
        return dados.toString();
    }

    public Funcionario(String nome, double salarioBase, int numeroDependentes) {
        this.nome = nome;
        this.salarioBase = salarioBase;
        this.numeroDependentes = numeroDependentes;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getSalarioBase() {
        return salarioBase;
    }

    public void setSalarioBase(double salarioBase) {
        this.salarioBase = salarioBase;
    }

    public int getNumeroDependentes() {
        return numeroDependentes;
    }

    public void setNumeroDependentes(int numeroDependentes) {
        this.numeroDependentes = numeroDependentes;
    }


}
