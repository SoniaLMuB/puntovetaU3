<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Función para obtener los datos de los Países
    function getAllCountriesData()
    {
        $url = 'https://restcountries.com/v2/all';
        $data = file_get_contents($url);

        // Decodifica los datos JSON en un array asociativo
        $countriesData = json_decode($data, true);

        return $countriesData;
    }
    function formatCountriesData($countriesData)
    {
        $formattedData = [];
        foreach ($countriesData as $country) {
            $countryData = [
                'name' => $country['name'],
                'iso2' => $country['alpha2Code'],
                'iso3' => $country['alpha3Code'],
            ];
            // Verifica si la clave 'capital' está presente en los datos del país
            if (isset($country['capital'])) {
                $countryData['capital'] = $country['capital'];
            } else {
                $countryData['capital'] = null; // null para el campo capital cuando no está presente
            }
            
            $formattedData[] = $countryData;
        }
        return $formattedData;
    }

    //Función para correr las funciones
    public function run()
    {
        $countriesData = $this->getAllCountriesData();
        $formattedData = $this->formatCountriesData($countriesData);
        DB::table('countries')->insert($formattedData);
    }

}
