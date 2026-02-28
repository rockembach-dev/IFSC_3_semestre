package org.example;

public abstract class ContaCorrente implements Imprimivel{
    private double saldo;
    private int numeroConta;
    private String titular;

    public ContaCorrente(int numeroConta, String titular) {
        this.numeroConta = numeroConta;
        this.titular = titular;
        this.saldo = 0;
    }

    public int getNumeroConta() {
        return numeroConta;
    }

    public String getTitular() {
        return titular;
    }

    public double getSaldo() {
        return saldo;
    }

    public boolean saque(double valor){
        if (valor <= saldo){
            saldo -= valor;
            return true;
        }
        else {
            return false;
        }
    }

    public String imprimir(){
        String retorno = " A conta corrente "+ this.numeroConta +" tem saldo de "+ this.saldo;
        System.out.println(retorno);
        return retorno;
    }


}
