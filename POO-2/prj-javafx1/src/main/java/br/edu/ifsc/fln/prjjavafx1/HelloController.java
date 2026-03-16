package br.edu.ifsc.fln.prjjavafx1;

import javafx.fxml.FXML;

import javafx.scene.control.CheckBox;
import javafx.scene.control.Label;

import javafx.scene.control.TextField;


public class HelloController {
    @FXML
    private Label welcomeText;

    @FXML
    private TextField tfIdade;

    @FXML
    private Label lbNomeCompleto;

    @FXML
    private CheckBox cbHabilitarEntrada;

    @FXML
    private TextField tfNome;

    @FXML
    private TextField tfSobrenome;


    @FXML
    protected void BtOnAction(){
        String nome =  tfNome.getText();
        String sobrenome =  tfSobrenome.getText();
        String nomeCompleto = nome + " " + sobrenome;
        int idade = Integer.parseInt(tfIdade.getText());
        String situacao = "";
        if(idade >= 18){
            situacao = "Maior de idade";
        }
        else if(idade < 18){
            situacao = "Menor de idade";
        }
        lbNomeCompleto.setText(nomeCompleto + " Você é " + situacao);
    }

    @FXML
    void btLimparOnAction() {
        tfNome.setText("");
        tfSobrenome.setText("");
        tfNome.requestFocus();
    }

    @FXML
    void cbHabilitarEntradaOnAction() {
//        if(cbHabilitarEntrada.isSelected()){
//            tfSobrenome.setEditable(true);
//            tfNome.setEditable(true);
//        }
//        else{
//            tfSobrenome.setEditable(false);
//            tfNome.setEditable(false);
//        }
        tfNome.setEditable(cbHabilitarEntrada.isSelected());
        tfSobrenome.setEditable(cbHabilitarEntrada.isSelected());
    }
}
