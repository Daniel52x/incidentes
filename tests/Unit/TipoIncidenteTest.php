<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Libraries\TipoIncidente\TipoIncidenteLib;

class TipoIncidenteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_return_array()
    {
        $incidente = new TipoIncidenteLib();
        $this->assertTrue(is_array($incidente->getAll()));
    }
}
