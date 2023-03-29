<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

use Inmobiliaria\Propiedad;
$propiedad = new Propiedad;
var_dump($propiedad);

