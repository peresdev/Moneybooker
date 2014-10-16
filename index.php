<?php
	date_default_timezone_set("Brazil/East");
	$ano = date("Y");
	include("util.php");
	include("curl.php");
	$times_liga = retornaTimesLiga("mes");
	//ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Moneybooker - Aqui a média é alta!</title>
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/tooltipster.css" />
	<link rel="stylesheet" type="text/css" href="/css/themes/tooltipster-light.css" />
	<link rel="stylesheet" type="text/css" href="/css/picbox.css" media="screen" />

<script type="text/javascript" src="/js/jquery.js"></script>
<!-- https://code.google.com/p/picboxjs -->
<script type="text/javascript" src="/js/picbox.js"></script> 
<script type="text/javascript" src="/js/jquery.tooltipster.min.js"></script>

<script type="text/javascript">
$(function() {
    function addAnimationMethod(targetValues) {
        return function() {
            $(this).stop().delay(50).animate(targetValues, 300);
        }
    }
    
    $("ul.icon.expand li a").hover(addAnimationMethod({
        width: "100%",
        height: "100%",
        marginTop: 0,
        marginLeft: 0
    }), addAnimationMethod({
        width: "64%",
        height: "64%",
        marginTop: "18%",
        marginLeft: "18%"
    }));

	//Tooltip - Site plugin: http://iamceege.github.io/tooltipster/
    $('.escudo-tooltip').tooltipster({
    	theme: '.tooltipster-light', 
    	//trigger: 'click'
    });

});

</script>
</head>
<body>
<div class="geral">
	<div class="topo center">
		<div class="logo fleft">
			<a href="index.php"><img src="imagens/logo-cartola.png" alt="logo-moneybooker"></a>
		</div>
		<div class="escudo-liga">
			<img src="imagens/liga-moneybooker.png" alt="">
		</div>
		<div class="titulo fright">
			<h1 class="color">MoneyBooker</h1>
		</div>
	</div>
	<div class="escudos">
		<nav>
			<ul class="icon expand">
				<li><a href="#"><img src="../imagens/pernetadriblador.png" alt="Perneta Driblador FC" class="escudo-tooltip" title="“Apostar 10 conto por fora”"/></a></li>
				<li><a href="#"><img src="../imagens/peresfc.png" alt="Peres F.C" class="escudo-tooltip" title="“Vou de Everaldo”" /></a></li>
				<li><a href="#"><img src="../imagens/galbiatti.png" alt="Galbiatti A.C" class="escudo-tooltip" title="“Essa rodada vai ser fácil”" /></a></li>
				<li><a href="#"><img src="../imagens/machadocartola.png" alt="Machado Cartola FC" class="escudo-tooltip" title="“A globo me ligou para participar do programa do Cartola”" /></a></li>
				<li><a href="#"><img src="../imagens/chutocerto.png" alt="CHUTO CERTO" class="escudo-tooltip" title="“Esse negócio de cartola é peçado né?”" /></a></li>
				<li><a href="#"><img src="../imagens/rhgfc.png" alt="RHGFC" class="escudo-tooltip" title="“Cheguei nessa porra, mas já to saindo”" /></a></li>
				<li><a href="#"><img src="../imagens/caboca.png" alt="C.A Boca Jrs" class="escudo-tooltip" title="“...”"/></a></li>
				<li><a href="#"><img src="../imagens/Barcapv.png" alt="BarçaPV" class="escudo-tooltip" title="“Deixa eu ver meu time aqui, é rapidinho”" /></a></li>
			</ul>
		</nav>
	</div>
	<div class="conteudo center">
		<div class="campo center">
			<img src="../imagens/campo.png" class="espacamento" alt="" />
		</div>
		<div class="tabela espacamento">
			<?php include("tabela.php"); ?>
		</div>
	</div>
	<div class="rodape">
		<span> Todos os direitos reservados - <span class="color"> MoneyBooker </span> - <?php echo $ano; ?>  </span>
	</div>
</div>
</body>
</html>