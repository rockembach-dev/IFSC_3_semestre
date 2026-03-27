package br.edu.ifsc.fln.vendas.repository;

import br.edu.ifsc.fln.vendas.domain.*;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ProdutoRepository extends JpaRepository<Produto, Integer> {
}
