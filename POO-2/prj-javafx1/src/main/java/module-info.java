module br.edu.ifsc.fln.prjjavafx1 {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.desktop;


    opens br.edu.ifsc.fln.prjjavafx1 to javafx.fxml;
    exports br.edu.ifsc.fln.prjjavafx1;
}