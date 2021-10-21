<?php 

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {
 
    /*public function crear($nombre = "Esteban", $apellido = "Quito", $dni = 12345678, $salario = 123456, $fecha = null)

    {
       $ee = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
       return $ee;
    }
*/
    public function testgetNombreApellido()
    {
        $ee = $this->crear("Luciano", "Campos");
        $this->assertEquals("Luciano Campos", $ee->getNombreApellido());
    }

    public function testgetNombre()
    {
        $this->expectException(\Exception::class);
        $ee = $this->crear("", "Campos");
    }

    public function testgetApellido()
    {
        $this->expectException(\Exception::class);
        $ee = $this->crear("Luciano" , "");
    }
    public function testgetDni()
    {
        $ee = $this->crear(42181512);
        $this->assertEquals(42181512, $ee->getDNI());
    }

    public function testgetDniVacio()
    {
        $this->expectException(\Exception::class);
        $ee = $this->crear("Luciano", "Campos", null, 40000);
    }

    public function testDniConLetras()
    {
        $this->expectException(\Exception::class);
        $ee = $this->crear("Luciano", "Campos", "asd", 40000);
    }
    
    public function testgetSalario()
    {
        $ee = $this->crear(100);
        $this->assertEquals(100, $ee->getSalario());
    }

    public function testgetSalarioVacio()
    {
        $this->expectException(\Exception::class);
        $ee = $this->crear("Luciano", "Campos", 42181512, null);
    }
    
    public function testsetYgetSector() 
    {
    $ee = $this->crear("Luciano", "Campos", 42181512, 40000, null);
    $ee->setSector("Ventas");
    $this->assertEquals("Ventas",$ee->getSector()); 
    }
    
    public function testgetSectorNoEspecificado() 
    {
    $ee = $this->crear("Luciano", "Campos", 42181512, 40000, null);
    $this->assertEquals("No especificado",$ee->getSector()); 
    }

    public function test__toString()
    {
      $ee = $this->crear("Luciano", "Campos", 42181512, 40000);
      $this->assertEquals("Luciano Campos 42181512 40000", $ee->__toString());
    }   
}


