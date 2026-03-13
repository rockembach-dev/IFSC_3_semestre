package br.edu.ifsc.fln.vendas.estoqueapi.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController //Informa ao Spring que esta classe responderá a requisições web
public class PrimeiroController {

    @GetMapping("/mensagem") //Mapeia a URL específica para o método
    public String mensagem(){
        return "<h1> Nosso primeiro web service </h1><p> Este é o nosso primeiro web service </p>";
    }
}
