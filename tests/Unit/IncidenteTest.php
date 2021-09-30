<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Libraries\Incidente\IncidenteLib;
use App\Libraries\Incidente\Protocols\IncidenteProtocol;
use App\Libraries\Incidente\Exceptions\IncidenteException;

class IncidenteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_insert_incident_returns_id()
    {
        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setTipoIncidente(1);
        $incidenteProtocol->setTipoCriticidade(1);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição');

        $incidente = new IncidenteLib();
        $this->assertIsInt($incidente->insert($incidenteProtocol));
    }

    public function test_insert_with_type_incident_invalid_returns_exceptions()
    {

        $this->expectException(IncidenteException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("Tipo incidente não encontrado");

        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setTipoIncidente(-2);
        $incidenteProtocol->setTipoCriticidade(1);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição');

        $incidente = new IncidenteLib();
        $incidente->insert($incidenteProtocol);
    }

    public function test_insert_with_type_criticidade_invalid_returns_exceptions()
    {

        $this->expectException(IncidenteException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("Tipo criticidade não encontrado");

        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setTipoIncidente(1);
        $incidenteProtocol->setTipoCriticidade(-2);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição');

        $incidente = new IncidenteLib();
        $incidente->insert($incidenteProtocol);
    }
}
