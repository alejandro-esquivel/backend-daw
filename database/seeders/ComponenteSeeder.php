<?php

namespace Database\Seeders;

use App\Models\Componente;
use Illuminate\Database\Seeder;

class ComponenteSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $componentes =
      [
        // Componente 1
        [
          "modelo" => "Ryzen 5 3600 3.6GHz",
          "fabricante" => 2,
          "categoria" => 3,
          "precio" => "199.90",
          "imagen" => "1.jpg",
          "descripcion" => '"descripcion":[
            "Núcleos de CPU: 6",
            "Hilos: 12",
            "Velocidad base de reloj: 3.6GHz",
            "Max Turbo Core Speed: 4.2GHz"
        ]'
        ], [
        "modelo" => "Core i9-10900 2.8 GHz",
        "fabricante" => 1,
        "categoria" => 3,
        "precio" => "399.91",
        "imagen" => "2.jpg",
        "descripcion" => '"descripcion":[
          "Núcleos de CPU: 10",
          "Hilos: 20",
          "Velocidad base de reloj: 2.8GHz"
        ]'],
        [
          "modelo" => "Z490-A PRO",
          "fabricante" => 12,
          "categoria" => 4,
          "precio" => "159.90",
          "imagen" => "3.jpg",
          "descripcion" => '"descripcion":[
            "Zócalo LGA 1200",
            "Admite memoria DDR4, hasta 4800 (OC) MHz",
            "Puertos de expansión: 3x PCIe 3.0 x1"
        ]'],
        [
          "modelo" => "Z4430-B PRO",
          "fabricante" => 12,
          "categoria" => 4,
          "precio" => "111.90",
          "imagen" => "4.jpg",
          "descripcion" => '"descripcion":[
           "Zócalo AMD AM4",
           "Admite memoria DDR4, hasta 4400 (OC) MHz",
           "Puertos de expansión: 1x PCI-E 4.0 x16"
        ]'],
        [
          "modelo" => "860 EVO Basic SSD 1TB SATA3",
          "fabricante" => 19,
          "categoria" => 1,
          "precio" => "123.00",
          "imagen" => "5.jpg",
          "descripcion" => '"descripcion":[
           "Tecnología V-NAND 3D 250GB",
           "Interfaz SATA III de mayor rendimiento (6 GB / s)",
           "Sistema de encriptación: de 256 bits AES Encryption (Clase 0) TGC / Opal V2.0, una unidad de cifrado (IEEE1667)"
        ]'],
        [
          "modelo" => "Blue SN550 SSD 1TB NVMe M.2 PCIe Gen 3",
          "fabricante" => 21,
          "categoria" => 1,
          "precio" => "115.19",
          "imagen" => "6.jpg",
          "descripcion" => '"descripcion":[
           "Factor de forma de disco SSD: M.2",
           "Tipo de memoria: 3D NAND",
           "Velocidad de lectura: 2400 MB/s"
        ]'],
        [
          "modelo" => "GeForce GTX 1660 Twin Fan 6GB GDDR5",
          "fabricante" => 3,
          "categoria" => 6,
          "precio" => "499.90",
          "imagen" => "7.jpg",
          "descripcion" => '"descripcion":[
           "Máxima resolución: 7680 x 4320 Pixeles",
           "Frecuencia del procesador: 1785 MHz",
           "Núcleos CUDA: 1408"
        ]'],
        [
          "modelo" => "SF600 600W 80 Plus Platinum Modular",
          "fabricante" => 6,
          "categoria" => 2,
          "precio" => "112.40",
          "imagen" => "8.jpg",
          "descripcion" => '"descripcion":[
           "Potencia total: 600 W",
           "Alimentador de energía para tarjeta madre: 24-pin ATX",
           "Tiempo medio entre fallos: 100000h"
        ]'],
        [
          "modelo" => "V850 Gold V2 850W 80 Plus Gold Modular",
          "fabricante" => 8,
          "categoria" => 2,
          "precio" => "136.0",
          "imagen" => "9.jpg",
          "descripcion" => '"descripcion":[
           "Potencia total: 850 W",
           "Alimentador de energía para tarjeta madre: 24-pin ATX",
           "Tiempo medio entre fallos: 100000h"
        ]'],

      ];

    foreach ($componentes as $comp) {
      $componente = Componente::firstOrCreate([
        "modelo" => $comp["modelo"],
        "fabricante" => $comp["fabricante"],
        "categoria" => $comp["categoria"],
        "precio" => $comp["precio"],
        "imagen" => $comp["imagen"],
        "descripcion" => '{
      ' . $comp["descripcion"] . '}'
      ]);
      $componente->save();
    }
  }
}
