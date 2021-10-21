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
     public function testCalculaComision() {
        //Mismo que el anterior y ademas se verifica que el porcentaje de antiguedad sea = a calcularComision()
        $fechaIngreso = new DateTime('2001-10-15');
        $r = $this->crear("Jose", "Ab", 42214, 100, $fechaIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaIngreso);
        $this->assertEquals($antiguedad->y, $r->calcularAntiguedad());
        $this->assertEquals("{$antiguedad->y}%", $r->calcularComision());

     }
       public function testCalculaAntiguedadConDia0()
     {
       //Calcula la antiguedad pasando dos fechas iguales
       $fechaIngreso = new DateTime();
       $r = $this->crear("Jose", "Ab", 42214, 100, $fechaIngreso);
       $fechaActual = new DateTime();
       $antiguedad = $fechaActual->diff($fechaIngreso);
       $this->assertEquals($antiguedad->y, $r->calcularAntiguedad());
       $this->assertEquals("0%", $r->calcularComision());
     }

       public function testCalculaAntiguedadConFechaFutura()
     {
       //Se espera una excepcion al ingresar una fecha en futuro
        $this->expectException(\Exception::class);
        $fechaIngreso = new DateTime('2023-10-15');
        $r = $this->crear("Jose", "Ab", 42214, 100, $fechaIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaIngreso);
     }

       public function testCalcularIngresoTotal() 
     {
        $antiguedad = 20;
        $r = $this->crear("Jose", "Ab", 42214, 100 + $antiguedad);
        $this->assertEquals(120, $r->calcularIngresoTotal());
     }
 }
