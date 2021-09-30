<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Libraries\Criticidade\CriticidadeLib;

class CriticidadeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_return_array()
    {
        $crit = new CriticidadeLib();
        $this->assertTrue(is_array($crit->getAll()));
    }

    public function test_exists_id_tipo_criticidade()
    {
        $incidente = new CriticidadeLib();
        $this->assertTrue($incidente->validateIdCriticidade(1));
        $this->assertFalse($incidente->validateIdCriticidade(-2));
    }
}
