/* 
 * Teste de Softwares 
 * REALIZE AS ATIVIDADES ABAIXO COMENTADAS
 */
class TestaConta {

    public static void main(String[] args) {
        // Criacao da conta
        Conta conta = new Conta();
        // Inicializacao da conta
        conta.inicializaConta(1000,"15","Joao",12345, 123);
        // Impressao dos dados da conta
        conta.imprimeDados();
        // Saque da conta
        conta.saque(200);
        // Impressao dos dados da conta
        conta.imprimeDados();
        // Deposito em conta
        conta.deposito(500);
        // Impressao dos dados da conta
        conta.imprimeDados();
    }
}
