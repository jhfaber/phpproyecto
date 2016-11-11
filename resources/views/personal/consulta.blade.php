<?php
use phpproyecto\Categoria;

$flights = phpproyecto\Categoria::all();

foreach ($flights as $flight) {
    echo $flight->nombre;
}