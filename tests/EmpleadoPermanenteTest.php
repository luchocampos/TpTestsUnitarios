<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest {

 public function crear($nombre = "Luciano", $apellido = "Campos", $dni = 42181512, $salario = 40000, $fecha = null)

     {
        $ep = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
        return $ep;
     }

      public function testRetornaFechaIngreso() {
        $f = new DateTime('2020-12-24');
        $ep = $this->crear("asd", "asd", 1234, 1234, $f);
        $this->assertEquals('2020-12-24', $ep->getfechaIngreso()->format("Y-m-d"));
      }

     public function testCalculaAntiguedad() {
         $fechaIngreso = new DateTime('2020-12-24');
         $ep = $this->crear("asd", "asd", 1234, 1234, $fechaIngreso);
         $fechaActual = new DateTime();
         $antiguedad = $fechaActual->diff($fechaIngreso);
        $this->assertEquals($antiguedad->y, $ep->calcularAntiguedad());
     }
     public function testCalculaComision() {
        $fechaIngreso = new DateTime('2020-12-24');
        $ep = $this->crear("asd", "asd", 1234, 1234, $fechaIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaIngreso);
        $this->assertEquals($antiguedad->y, $ep->calcularAntiguedad());
        $this->assertEquals("{$antiguedad->y}%", $ep->calcularComision());

     }
       public function testAntiguedadConDiacero()
     {
       $fechaIngreso = new DateTime();
       $ep = $this->crear("asd", "asd", 1234, 1234, $fechaIngreso);
       $fechaActual = new DateTime();
       $antiguedad = $fechaActual->diff($fechaIngreso);
       $this->assertEquals($antiguedad->y, $ep->calcularAntiguedad());
       $this->assertEquals("0%", $ep->calcularComision());
     }

       public function testAntiguedadFechaFutura()
     {
        $this->expectException(\Exception::class);
        $fechaIngreso = new DateTime('2021-12-24');
        $ep = $this->crear("asd", "asd", 1234, 1234, $fechaIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaIngreso);
     }

       public function testCalcularIngresoTotal() 
     {
        $antiguedad = 20;
        $ep = $this->crear("asd", "asd", 1234, 1234 + $antiguedad);
        $this->assertEquals(1254, $ep->calcularIngresoTotal());
     }
 }
