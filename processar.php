<?php

/*
 * Autor: Peterson Passos
 * peterson.jfp@gmail.com
 * 51 9921298121
 * 
 * Modificado por: Girol | andregirol@gmail.com
 */
require_once	'functions.php';

//recebendo os dados do form da index
$getpost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Busca os atributos preenchidos pelo usuário e transforma em array
$atributos = array_map('trim', explode(',', $getpost['atributos']));

//recebendo o nome da classe e colocando a primeira letra maiuscula ja que se trata de um nome de classe *-*
$nome_classe = ucfirst(strtolower($getpost['nome']));

//gerando uma variavel com a contagem dos attrs
$num_atributos = count($atributos);

//iniciando a var $s, depois a gente remove essa gambi de var e cada metodo dara seus echo's
$s = "\n\n";

//div com display none para não ficar aquela bagunça na tela
echo "<div style='display:none'>";

/* formularios html com classes booststrap */
$s .= make_forms($nome_classe, $atributos);

/* metodos do controller que receberao os post dos formularios */
$s .= make_methods($nome_classe, $atributos, $num_atributos);

/* comando sql para criar a tabela da classse no banco*/
$s .= make_sql($nome_classe, $atributos);

/*  classe php contendo os atributos do formulario */
$s .= make_class($nome_classe,	$atributos, $num_atributos);

//jogando o codigo gerado na tela
var_dump($s);

echo "</div>";// fechando a div que esconde a bagunça

echo "<h1>Por favor visualize o codigo fonte da pagina</h1>";
