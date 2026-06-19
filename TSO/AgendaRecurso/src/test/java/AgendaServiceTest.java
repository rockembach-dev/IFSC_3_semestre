import br.edu.ifsc.fln.exception.CancelamentoNaoPermitidoException;
import br.edu.ifsc.fln.exception.DataInvalidaException;
import br.edu.ifsc.fln.exception.ReservaNaoEncontradaException;
import br.edu.ifsc.fln.exception.SalaIndisponivelException;
import br.edu.ifsc.fln.service.AgendaService;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

import java.time.LocalDateTime;

import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class AgendaServiceTest {

    private AgendaService agenda;

    @BeforeEach
    public void initialize() {
        agenda = new AgendaService();
    }


    @Test
    public void deveReservarSalaDisponivel(){
        LocalDateTime data = LocalDateTime.now().plusDays(2);
        boolean passou = agenda.reservar(data);

        assertTrue(passou);
    }
    @Test
    public void naoDevePermitirReservaDuplicada(){
        LocalDateTime data = LocalDateTime.now().plusDays(2);

        agenda.reservar(data);
        assertThrows(SalaIndisponivelException.class, ()->agenda.reservar(data));

    }
    @Test
    public void deveCancelarReserva(){
        LocalDateTime data = LocalDateTime.now().plusDays(2);

        agenda.reservar(data);

        boolean passou = agenda.cancelar(data);

        assertTrue(passou);

    }
    @Test
    public void naoDeveCancelarComMenos24Horas(){
        LocalDateTime data = LocalDateTime.now().plusHours(10);

        agenda.reservar(data);

        assertThrows(CancelamentoNaoPermitidoException.class, ()->agenda.cancelar(data));

    }
    @Test
    @DisplayName("naoDeveCancelarReservaInesxistente")
    public void naoDeveCancelarReservaInesxistente(){
        LocalDateTime data = LocalDateTime.now().plusDays(2);

        assertThrows(ReservaNaoEncontradaException.class, ()->agenda.cancelar(data));
    }
    @Test
    public void naoDeveReservarDataPassada(){
        LocalDateTime data = LocalDateTime.now().minusDays(1);

        assertThrows(DataInvalidaException.class, ()->agenda.reservar(data));
    }
    @Test
    public void salaDeveFicarDisponivelNovamente(){
        LocalDateTime data = LocalDateTime.now().plusDays(3);

        agenda.reservar(data);

        agenda.cancelar(data);

        boolean passou = agenda.estaDisponivel(data);
        assertTrue(passou);

    }
}
