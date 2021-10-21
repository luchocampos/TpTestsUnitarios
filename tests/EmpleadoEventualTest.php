<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function crear($nombre = "Luciano", $apellido = "Campos", $dni = 42181512, $salario = 40000, $fecha = null, Array $montos = [2, 4, 6, 8])

    {
        $ev = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
        return $ev;
    }

    public function testCalculaComision()

    {
        $r= $this->crear("Luciano", "Campos", 42181512, 40000);
        $this->assertEquals(0.25, $r->calcularComision());

    }
    public function testCalculaConCeroONegativo()

    {   $this->expectException(\Exception::class);
        $r= $this->crear("Luciano", "Campos", 42181512, 40000, null, [0,-2, 4, 6]);

    }

    public function testCalculaIngresoTotal()
    {
       $r= $this->crear("asd" , "asb", 1234, 12345);
        $this->assertEquals(12345.25, $r->calcularIngresoTotal());
       
    }
}