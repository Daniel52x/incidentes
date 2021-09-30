<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Libraries\Incidente\Protocols\IncidenteProtocol;
use App\Libraries\Incidente\Exceptions\IncidenteProtocolException;

class IncidenteProtocolTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_validation_set_and_get_id()
    {
        $id = 1;
        $incidente = new IncidenteProtocol();
        $incidente->setId($id);
        $this->assertEquals($id, $incidente->getId());
    }

    public function test_validation_set_id_not_number_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'id' precisa ser do tipo int");

        $incidente = new IncidenteProtocol();
        $incidente->setId('invalid');
    }

    public function test_validation_set_and_get_id_tipo_incidente()
    {
        $id = 1;
        $incidente = new IncidenteProtocol();
        $incidente->setTipoIncidente($id);
        $this->assertEquals($id, $incidente->getTipoIncidente());
    }

    public function test_validation_set_id_tipo_incidente_not_number_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'tipo incidente id' precisa ser do tipo int");

        $incidente = new IncidenteProtocol();
        $incidente->setTipoIncidente('invalid');
    }

    public function test_validation_set_and_get_id_tipo_criticidade()
    {
        $id = 1;
        $incidente = new IncidenteProtocol();
        $incidente->setTipoCriticidade($id);
        $this->assertEquals($id, $incidente->getTipoCriticidade());
    }

    public function test_validation_set_id_tipo_criticidade_not_number_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'tipo criticidade id' precisa ser do tipo int");

        $incidente = new IncidenteProtocol();
        $incidente->setTipoCriticidade('invalid');
    }

    public function test_validation_set_and_get_titulo()
    {
        $titulo = 'Titulo Válido';
        $incidente = new IncidenteProtocol();
        $incidente->setTitulo($titulo);
        $this->assertEquals($titulo, $incidente->getTitulo());

        $incidente->setTitulo("<script>$titulo</script>");
        $this->assertEquals($titulo, $incidente->getTitulo());

        $incidente->setTitulo("    $titulo     ");
        $this->assertEquals($titulo, $incidente->getTitulo());
    }

    public function test_validation_set_titulo_empty_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'título' precisa ser preenchido");

        $incidente = new IncidenteProtocol();
        $incidente->setTitulo('    ');
    }

    public function test_validation_set_and_get_descricao()
    {
        $titulo = 'Descrição Válida';
        $incidente = new IncidenteProtocol();
        $incidente->setDescricao($titulo);
        $this->assertEquals($titulo, $incidente->getDescricao());

        $incidente->setDescricao("<script>$titulo</script>");
        $this->assertEquals($titulo, $incidente->getDescricao());

        $incidente->setDescricao("    $titulo     ");
        $this->assertEquals($titulo, $incidente->getDescricao());
    }

    public function test_validation_set_descricao_empty_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'descrição' precisa ser preenchido");

        $incidente = new IncidenteProtocol();
        $incidente->setDescricao('    ');
    }

    public function test_validation_set_and_get_status()
    {
        $status = 1;
        $incidente = new IncidenteProtocol();
        $incidente->setStatus($status);
        $this->assertEquals($status, $incidente->getStatus());
    }

    public function test_validation_set_status_not_number_returns_exception()
    {
        $this->expectException(IncidenteProtocolException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("O atributo 'status' precisa ser do tipo int");

        $incidente = new IncidenteProtocol();
        $incidente->setStatus('invalid');
    }
}
