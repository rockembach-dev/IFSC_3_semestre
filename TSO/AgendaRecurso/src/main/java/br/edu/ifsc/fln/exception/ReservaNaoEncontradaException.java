package br.edu.ifsc.fln.exception;

public class ReservaNaoEncontradaException extends RuntimeException {
    public ReservaNaoEncontradaException(String message) {
        super(message);
    }
}
