package br.edu.ifsc.fln.service;

import br.edu.ifsc.fln.exception.CancelamentoNaoPermitidoException;
import br.edu.ifsc.fln.exception.DataInvalidaException;
import br.edu.ifsc.fln.exception.ReservaNaoEncontradaException;
import br.edu.ifsc.fln.exception.SalaIndisponivelException;

import java.time.LocalDateTime;

public class AgendaService {

    private LocalDateTime reserva;

    public boolean reservar(LocalDateTime data){

        if (data.isBefore(LocalDateTime.now())){
            throw new DataInvalidaException("Data Inválida");
        }

        if (reserva != null && reserva.equals(data)){
            throw new SalaIndisponivelException("Sala Já está Reservada");
        }

        reserva = data;
        return true;
    }

    public boolean cancelar(LocalDateTime data){

        if (reserva == null || !reserva.equals(data)){
            throw new ReservaNaoEncontradaException("Reserva Não Encontrada");
        }

        if (data.isBefore(LocalDateTime.now().plusHours(24))){
            throw new CancelamentoNaoPermitidoException("Cancelamento permitido apenas com 24 horas de antecedência");
        }
        reserva = null;
        return true;
    }

    public boolean estaDisponivel(LocalDateTime data){

        return reserva == null || !reserva.equals(data);
    }

}
