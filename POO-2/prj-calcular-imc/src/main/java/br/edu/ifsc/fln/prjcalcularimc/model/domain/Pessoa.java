package br.edu.ifsc.fln.prjcalcularimc.model.domain;

public class Pessoa {
    private String nome;
    private int idade;
    private String sexo;
    private double peso;
    private double altura;

    public double calcularIMC(){
        if (altura > 3 ){
            altura = altura/100;
            return peso/(altura*altura);
        }
        return peso/(altura*altura);
    }

    public String alturaFormatada(){
        double alturaFormatada = altura;
        if (altura > 3){
            alturaFormatada = altura/100;
        }
        return String.format("%.2f", alturaFormatada).replace(".",",");
    }

    public String ClassificaIMC(){
        double imc = calcularIMC();
        if (imc < 18.5){
            return  " Baixo Peso";
        }
        else if (imc < 24.9){
            return " Eutrofia ( peso adequado )";
        }
        else if (imc < 29.9){
            return " sobrepeso";
        }
        else if (imc < 34.9){
            return " obesidade grau 1";
        }
        else if (imc < 39.9){
            return " obesidade grau 2";
        }
        else
        {
            return " obesidade EXTREMA!!";
        }
    }

    public String imcFormatado(){
        return String.format("%.2f", calcularIMC());
    }

    public String getDados(){
        StringBuilder dados = new StringBuilder();
        dados.append("Nome: ").append(nome).append("\n").
                append("Idade: ").append(idade).append("\n").
                append("Sexo: ").append(sexo).append("\n").
                append("Peso: ").append(peso).append("kg\n").
                append("Altura: ").append(alturaFormatada()).append("m\n");
        return dados.toString();
    }

    public Pessoa(String nome, int idade, String sexo,double peso,double altura) {
        this.nome = nome;
        this.idade = idade;
        this.sexo = sexo;
        this.peso = peso;
        this.altura = altura;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getIdade() {
        return idade;
    }

    public void setIdade(int idade) {
        this.idade = idade;
    }

    public String getSexo() {
        return sexo;
    }

    public void setSexo(String sexo) {
        this.sexo = sexo;
    }

    public double getPeso() {
        return peso;
    }

    public void setPeso(double peso) {
        this.peso = peso;
    }

    public double getAltura() {
        return altura;
    }

    public void setAltura(double altura) {
        this.altura = altura;
    }
}
