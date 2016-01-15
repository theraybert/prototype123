<?php
// src/AppBundle/Services/Meteo.php
namespace AppBundle\Services;

class Meteo
{
    public function getWeather($city)
    {
        return '-133 C for '.$city;
    }
}