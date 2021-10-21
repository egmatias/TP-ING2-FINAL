<?php 

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {
 

    public function testArrojaNombreApellido()
    {
        $r = $this->crear("Matias", "Rodriguez");
        $this->assertEquals("Matias Rodriguez", $r->getNombreApellido());
    }

    public function testNoArrojaNombreSiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("", "Rodriguez");
    }

    public function testNoArrojaApellidoSiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Matias" , "");
    }
    public function testArrojaDNI()
    {
        $r = $this->crear(42482377);
        $this->assertEquals(42482377, $r->getDNI());
    }

    public function testNoArrojaDNISiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Fulano", "de tal", null, 9999);
    }

    public function testNoArrojaDNISiHayUnaLetra()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Fulano", "de tal", "a", 9999);
    }
    
    public function testArrojaSalario()
    {
        $r = $this->crear(1000);
        $this->assertEquals(1000, $r->getSalario());
    }

    public function testNoArrojaSalario()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Fulano", "de tal", 9999, null);
    }
    
    public function testObtieneYSeleccionaSector() 
    {
    $s = $this->crear("Fulano", "de tal", 9999, 1000, null);
    $s->setSector("Permanente");
    $this->assertEquals("Permanente",$s->getSector()); 
    }
    
    public function testNoSeleccionaSector() 
    {
    $s = $this->crear("Fulano", "de tal", 9999, 1000, null);
    $this->assertEquals("No especificado",$s->getSector()); 
    }

    public function test__toString()
    {
      $r = $this->crear("Fulano", "de tal", 1234, 9999);
      $this->assertEquals("Fulano de tal 1234 9999", $r->__toString());
    }   
}


