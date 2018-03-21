<style type="text/css">

@keyframes animatedBackground {
	from { background-position: 0 0; }
	to { background-position: 100% 0; }
}

.mask{
	width:  100%;
	padding: 75px 0px;
	background: rgba(0,161,176,0.7);
	background: -moz-linear-gradient(to bottom right, #48a1afcc, #232423CC);
	background: -webkit-linear-gradient(bottom right, #48a1afcc, #232423CC);
	background: linear-gradient(to bottom right, #48a1afaa, #232423aa);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#48a1afcc', endColorstr='#232423CC',GradientType=0 );
	color: white;
}


.container-image{
	height: auto;
	background-image: <?php echo "url('".$APP_PATH_VERSION."/components/config/imgResize2.php?img=".$APP_PATH_ROOT."/src/img/background-games.png&w=500')"; ?>;
	background-size: auto 100%;
	background-attachment: fixed;
	background-repeat: repeat-x;
	animation: animatedBackground 5s alternate infinite;
}


</style>

<!-- 
	*
	HEADER
	campo de pesquisa
	*
-->
<section class="row container-image white-text">
	<section class="mask">
		<div class="row no-margin-b">
			<div class="col s12 center-align" style="font-size: 3em;">
				<b>Aprenda Jogando</b>
			</div>
		</div>
		<div class="row">
			<form id="pesquisa" class="input-field col s12 m8 offset-m2" method="GET">
				<i class="material-icons prefix" style="right: 0;font-size:  1.5rem;line-height: 2;" onclick="$('#pesquisa').submit();">search</i>
				<input id="nomegame" type="text" class="validate" name="s" <?php if(isset($_GET['s'])) echo "value='".$_GET['s']."'"; ?>>
				<label for="nomegame">Pesquise aqui</label>
			</form>
		</div>
	</section>
</section>
<!-- 
	*
	TAREFAS
	listagem de tarefas pendentes
	*
-->
<div class="row">
	<div class="col s12 grey-text center-align">
		<h2 style="font-weight: bold;">
			<?php
				if (isset($_GET['s'])) {
					echo "Exibindo resultados para \"".$_GET['s']."\"";
				}else{
					echo "Jogos recomendados para você";
				}
			?>
		</h2>
	</div>
</div>

<section class="bloco2">
	<div class="row">
		<?php
			require_once $APP_PATH_ROOT."/components/config/action-jogo.php";
			$tamanhoDaPagina = 20;


			if(isset($_GET['p']))
				$paginaAtual = $_GET['p'];
			else
				$paginaAtual = 1;


			if(isset($_GET['s'])){
				imprimirJogo($paginaAtual, $tamanhoDaPagina, $_GET['s']);
			}else{
				imprimirJogo($paginaAtual, $tamanhoDaPagina, NULL);
			}

		?>
	</div>


	<!-- PAGINCAÇÃO -->
	<?php include $APP_PATH_ROOT."/components/paginacao.phtml";  ?>


</section>