package br.edu.ifsc.fln.prjcalcularimc.controller;

import br.edu.ifsc.fln.prjcalcularimc.model.domain.Pessoa;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;

import java.net.URL;
import java.util.ResourceBundle;

public class PessoaController implements Initializable {


    @FXML
    private TextField tfNome;

    @FXML
    private Spinner<Integer> sIdade;

    @FXML
    private ChoiceBox<String> cbSexo;

    @FXML
    private TextField tfPeso;

    @FXML
    private TextField tfAltura;


    @FXML
    void btCalcularOnAction(ActionEvent event) {

        //Verificando se o usuário deixou de informar o nome da pessoa.
        if(tfNome.getText().trim().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("CAMPO OBRIGATÓRIO");
            alert.setHeaderText("Nome NÃO foi informado");
            alert.setContentText("Digite o NOME da pessoa");
            alert.showAndWait();
            return;
        }

        if(tfPeso.getText().trim().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("CAMPO OBRIGATORIO");
            alert.setHeaderText("Peso NÃO foi informado");
            alert.setContentText("Por favor digite o PESO");
            alert.showAndWait();
            return;
        }

        if(tfAltura.getText().trim().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("CAMPO OBRIGATORIO");
            alert.setHeaderText("Altura NÃO foi informada");
            alert.setContentText("Por favor digite a ALTURA");
            alert.showAndWait();
            return;
        }

        Pessoa pessoa = new Pessoa(
              tfNome.getText(),
              sIdade.getValue(),
              cbSexo.getValue(),
              Double.parseDouble(tfPeso.getText().replace(",", ".")),
              Double.parseDouble(tfAltura.getText().replace(",", "."))

        );


        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Resultado");
        alert.setHeaderText("Resultado Calculo IMC");
        alert.setContentText(pessoa.getDados() + "\n" + "IMC: " + pessoa.imcFormatado()+ "\nClassificação: " + pessoa.ClassificaIMC() );

        alert.showAndWait();
    }


    @FXML
    void btNovoOnAction(ActionEvent event) {
        tfNome.setText("");
        tfPeso.setText("");
        tfAltura.setText("");
        sIdade.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(0, 100));
        tfNome.requestFocus();
    }

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {

        SpinnerValueFactory<Integer> valueFactory = new SpinnerValueFactory.IntegerSpinnerValueFactory(1,120,1, 1);
        sIdade.setValueFactory(valueFactory);

        cbSexo.getItems().addAll("Masculino", "Feminino");

        cbSexo.setValue("Masculino");
    }
}
