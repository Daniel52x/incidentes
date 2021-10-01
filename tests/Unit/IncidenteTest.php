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

    public function test_delete_incidente()
    {

        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setTipoIncidente(1);
        $incidenteProtocol->setTipoCriticidade(1);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição');

        $incidente = new IncidenteLib();
        $id = $incidente->insert($incidenteProtocol);

        $incidenteProtocol2 = new IncidenteProtocol();
        $incidenteProtocol2->setId($id);

        $this->assertEquals(1, $incidente->delete($incidenteProtocol2));
    }

    public function test_delete_invalid_id_returns_zero_affected_rows()
    {

        $incidente = new IncidenteLib();
        $incidenteProtocol2 = new IncidenteProtocol();
        $incidenteProtocol2->setId(0);

        $this->assertEquals(0, $incidente->delete($incidenteProtocol2));
    }

    public function test_update_incidente_returns_affected_rows()
    {

        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setTipoIncidente(1);
        $incidenteProtocol->setTipoCriticidade(1);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição');

        $incidente = new IncidenteLib();
        $id = $incidente->insert($incidenteProtocol);

        $incidenteProtocol->setId($id);
        $incidenteProtocol->setTitulo('Titulo2');

        $this->assertEquals(1, $incidente->update($incidenteProtocol));
    }

    public function test_update_invalid_id_returns_zero_affected_rows()
    {

        $incidente = new IncidenteLib();
        $incidenteProtocol = new IncidenteProtocol();
        $incidenteProtocol->setId(0);
        $incidenteProtocol->setTipoIncidente(1);
        $incidenteProtocol->setTipoCriticidade(1);
        $incidenteProtocol->setTitulo('Titulo');
        $incidenteProtocol->setDescricao('Descrição2');

        $this->assertEquals(0, $incidente->update($incidenteProtocol));
    }

    public function test_select_all_incidentes()
    {
        $incidente = new IncidenteLib();
        $this->assertGreaterThanOrEqual(1, count($incidente->getAll()));
    }
}
