<?php
// src/AppBundle/Services/Meteo.php
namespace AppBundle\Services;

class Meteo
{
    public function getWeather($city)
    {
        return '-12 C for '.$city;
    }
}