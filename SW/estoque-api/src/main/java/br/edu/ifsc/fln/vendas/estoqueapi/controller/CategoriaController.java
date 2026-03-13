package br.edu.ifsc.fln.vendas.estoqueapi.controller;

import br.edu.ifsc.fln.vendas.domain.Categoria;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.ArrayList;
import java.util.List;


    @RestController
    public class CategoriaController{

        @GetMapping("/categorias")
        public List<Categoria> getCategorias(){
            List<Categoria> categorias = new ArrayList<>();
            categorias.add(new Categoria(1,"Vestuário"));
            categorias.add(new Categoria(2,"Calçado"));
            return categorias;
        };


    }

