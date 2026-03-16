module br.edu.ifsc.fln.prjcalcularimc {
    requires javafx.controls;
    requires javafx.fxml;


    opens br.edu.ifsc.fln.prjcalcularimc to javafx.fxml;
    exports br.edu.ifsc.fln.prjcalcularimc;
    exports br.edu.ifsc.fln.prjcalcularimc.model.domain;
    opens br.edu.ifsc.fln.prjcalcularimc.model.domain to javafx.fxml;
    exports br.edu.ifsc.fln.prjcalcularimc.controller;
    opens br.edu.ifsc.fln.prjcalcularimc.controller to javafx.fxml;
}