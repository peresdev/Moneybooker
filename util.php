<?php
/* Calcula a diferença de todos os times em relação ao primeiro */

function Diferenca_Primeiro($ponto_primeiro, $pontuacao_time) {
	define('PONTUACAO_PRIMEIRO', $ponto_primeiro); 
	$calculo = PONTUACAO_PRIMEIRO - $pontuacao_time;
	if($calculo == 0) {
		return "---";
	} else {
		return $calculo;
	}
}
//chamada da função - exemplo
//echo Diferenca_Primeiro(120.00, 111.00); // chamar o restante das pontuações para ter a diferença do primeiro
?>