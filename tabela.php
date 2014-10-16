	<?php if(!is_array($times_liga)) { echo "Tabela em atualização, aguarde. Vá tomar um cafézinho :)"; exit(); } ?>
	<table class="imagetable center">
		<tbody>
		    <tr>
				<th>Pos.</th>
				<th>Time</th>
				<th>Variação</th>
				<th>Rodada</th>
				<th>Total</th>
				<th>Diferença</th>
	 	    </tr>
	 	    <?php 
	 	    	$i = 0;
	 	    	$quantidade_times = count($times_liga)-1;
                $obj = [];

                 foreach($times_liga as $time) {
                     array_push($obj, $time->time->slug);
                 }
                $ponto_rodada = retornaTimesLiga($obj);

	 	    	foreach($times_liga as $time) { 
	 	    		if($i == 0) {
	 	    			$ponto_primeiro = $time->pontos_ou_patrimonio;
	 	    		}
	 	    ?>
		    <?php 
		    	if($quantidade_times == $i) { // última posição
		    		echo "<tr class='ultimo'>";
		    	} else if($i == 0) { // primeira posição
		    		echo "<tr class='primeiro'>";
		    	} else { // restante
		    		echo "<tr>";
		    	}
		    ?>
			    	<td class="bold"><?php echo $time->posicao;?></td>
			    	<td>
			    		<a href="imagens/montagem_<?php echo $time->time->slug;?>.jpg" rel="lightbox" class="link-table"><?php echo $time->time->nome; ?></a>
			    	</td>
			    	<td><?php echo $time->variacao > 0 ? "+" . $time->variacao : $time->variacao; ?></td>
			    	<td><?php echo $ponto_rodada[$i];?></td>
			    	<td><?php echo $time->pontos_ou_patrimonio;?></td>
			    	<td><?php echo Diferenca_Primeiro($ponto_primeiro, $time->pontos_ou_patrimonio) ?> </td>
		  	</tr>
		  	 <?php 
		  	 	$i++; 
		  	 }
		  	?>
		</tbody>
	</table>