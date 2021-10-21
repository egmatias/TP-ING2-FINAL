<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest {

 public function crear($nombre = "Matias", $apellido = "Perez", $dni = 42482377, $salario = 1000, $fecha = null)

     {
        $r = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
        return $r;
     }

      public function testRetornaFechaIngreso() {
        //Se ingresan valores en el objeto DateTime y se verifica en la asercion 
        $d = new DateTime('2010-10-25');
        $r = $this->crear("Jose", "ab", 42214, 100, $d);
        $this->assertEquals('2010-10-25', $r->getfechaIngreso()->format("Y-m-d"));
      }

     public function testCalculaAntiguedad() {
        // Se crean dos objetos DateTime, uno para la fecha de ingreso y otra actual, se comparan con el diff
         $fechaIngreso = new DateTime('2001-10-15');
         $r = $this->crear("Jose", "Ab", 42214, 100, $fechaIngreso);
         $fechaActual = new DateTime();
         $antiguedad = $fechaActual->diff($fechaIngreso);
        $this->assertEquals($antiguedad->y, $r->calcularAntiguedad());
     }
 }
