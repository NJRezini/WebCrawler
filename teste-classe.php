<?php

require './util/Municipio.php';

$gut = new Municipio();
$noticias = $gut->getParagrafos();

// print_r($noticias);