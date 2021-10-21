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
    
}
