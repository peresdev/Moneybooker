<?php
// Inicia o cURL
function retornaTimesLiga($tipo) {

	$ch = curl_init();

	// Credenciais de login do cartolafc
	$credenciais = array(
		'login-passaporte' => base64_decode('bW9uZXlib29rZXJjYXJ0b2xhQGdtYWlsLmNvbQ=='),
		'senha-passaporte' => base64_decode('bW9uZXljYXJ0b2xhMTkw==')
	);

	// Define a URL original (do formulário de login)
	curl_setopt($ch, CURLOPT_URL, 'https://loginfree.globo.com/login/438');

	// Habilita o protocolo POST
	curl_setopt ($ch, CURLOPT_POST, 1);

	// Define os parâmetros que serão enviados (usuário e senha por exemplo)
	curl_setopt ($ch, CURLOPT_POSTFIELDS, 'login-passaporte=' . $credenciais['login-passaporte'] . '&senha-passaporte=' . $credenciais['senha-passaporte']);

	// Imita o comportamento patrão dos navegadores: manipular cookies
	curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');

	// Define o tipo de transferência (Padrão: 1)
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	// Executa a requisição
	$store = curl_exec ($ch);

	// Define uma nova URL para ser chamada (após o login)
	if($tipo == "mes") {
		$url = "http://cartolafc.globo.com/liga/moneybooker/times.json?page=1&order_by=mes";
	} else {
		$url = "http://cartolafc.globo.com/liga/moneybooker/times.json?page=1&order_by=rodada";
	}

	curl_setopt($ch, CURLOPT_URL, $url);

	// Executa a segunda requisição
	$content = curl_exec ($ch);

	// Encerra o cURL
	curl_close ($ch);

	if($tipo == "mes") {
		$json_decode = json_decode($content);
		$json_convert = $json_decode->times;
		return $json_convert;
	} else {
        $json_decode = json_decode($content);
        $obj = [];
        if(is_array($tipo)) {
            foreach($tipo as $Tipo) {
                foreach($json_decode->times as $time_rodada) {    
                        if($time_rodada->time->slug == $Tipo) { // compara ordem da pontuação geral para inserir a pontuaçao da rodada
                            array_push($obj, $time_rodada->pontos_ou_patrimonio);
                        }
                }
            }
            return $obj;
        }
	}
}

?>