<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //1.Leer el archivo de datos 
         $json= File::get('database/_data/bootcamps.json');
         //2.Convertir los datos del json en un arreglo
         $arreglo_bootcamp = json_decode($json); 
         //3.Recorrer el arreglo
         //var_dump($arreglo_usuarios);
         foreach ($arreglo_bootcamp as $bootcamp){
             //4. Registrar el usuario en bd
             //Se utiliza el metodo ::create
             Bootcamp::create ([
                 "name" =>$bootcamp->name,
                 "description" =>$bootcamp->description,
                 "website" =>$bootcamp->website,
                 "phone" => $bootcamp->phone,
                 "user_id" => $bootcamp->user_id
             ]);
    }
}
}
