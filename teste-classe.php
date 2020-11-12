<?php

require './util/Municipio.php';

$gut = new Municipio();
$paragrafos = $gut->getParagrafos();

print_r($paragrafos);