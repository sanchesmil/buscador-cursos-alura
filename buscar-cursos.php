#!/usr/bin/env php
<?php

$path =
require 'vendor/autoload.php';  //Arquivo que já vem por padrao com a instalação do Composer

//Testando o mapeamento de classes via 'classmap'
//Teste::metodo();
//die();

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;  //O Guzzle é um cliente HTTP PHP que facilita o envio de solicitações HTTP
use Symfony\Component\DomCrawler\Crawler;  //DomCrawler é um componente que facilita a NAVEGAÇÃO no DOM de páginas HTML e XML.

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);  //Cria um cliente do Guzzle com a URL base

//Crawler = percorredor
$crawler = new Crawler();  //A classe Crawler fornece métodos para consultar e manipular documentos HTML e XML.

$buscador = new Buscador($client, $crawler);

$cursos = $buscador->buscar('cursos-online-programacao/php');  //Obtem uma lista de cursos

foreach ($cursos as $curso){  //$curso é um elemento do DOM
    exibeMensagem("Curso: " . $curso);
}
