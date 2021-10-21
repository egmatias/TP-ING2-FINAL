<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function crear($nombre = "Matias", $apellido = "Perez", $dni = 42482377, $salario = 1000, $fecha = null, Array $montos = [100, 200, 300, 400])

    {
        $r = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
        return $r;
    }

    public function testCalculaComision()

    {
        $r= $this->crear("Jose", "Perez", 41065923, 1000);
        $this->assertEquals(12.5, $r->calcularComision());

    }
}
