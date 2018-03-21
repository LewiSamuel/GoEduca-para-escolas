
<!--
//
//	SIDE NAV 
//
-->




<ul id="slide-out" class="side-nav fixed" style="transform: translateX(0%); background: linear-gradient(to right, rgb(255, 255, 255), rgb(240, 240, 240));">
	<li>
		<div class="user-view" <?php echo "style='background-image: url(".$APP_PATH_VERSION."/src/img/bkg-navleft-goeduca.png); background-size: cover;' "; ?>>
			<a>
				<img width="190" <?php  echo "src='".$APP_PATH_VERSION."/src/img/marca-azul-escuro.png'"; ?>>
				<div style="margin-top: -37px; width:  190px; text-align:  center;" class="grey-text">Para escolas</div>
			</a>
			<a href="/user/">
				<span class="black-text truncate name"><?php  echo $pessoaNome; ?></span>
			</a>
			<a href="/user/">
				<span class="black-text truncate email"><?php echo $pessoaEmail; ?></span>
			</a>
		</div>
	</li>
	<li class="divider"></li>

	<li class='no-padding'>
		<a <?php echo "href='".$APP_PATH_VERSION."/'" ?> class='left-align'>
			<i class='material-icons'>home</i>
			<!--- <span class='badge'>4</span> --> Home 
		</a>
	</li>

<!-- 	<li class='no-padding'>
		<a href='/tarefas' class='left-align'>
			<i class='material-icons'>description</i>
			<span class='new badge'>4</span>Tarefas
		</a>
	</li>

	<li class='no-padding'>
		<a href='/ranking' class='left-align'>
			<i class='material-icons'>star_rate</i>
			Ranking
		</a>
	</li> -->

	

	<?php

	if($pessoaNivelAcesso == 1){
		// echo "<li class='no-padding'>
		// <a href='/aluno' class='left-align'>
		// <i class='material-icons'>person</i>
		// Meu desempenho
		// </a>
		// </li>";
	}else{
		echo "<li class='no-padding'>
		<a href='/inicial' class='left-align'>
		<i class='material-icons'>person</i>
		Area do aluno
		</a>
		</li>";
	}




	if($pessoaNivelAcesso > 2){
		echo "
		<li class='no-padding'>
		<a href='/pessoas' class='left-align'>
		<i class='material-icons'>accessibility</i> Pessoas
		</a>
		</li>
		";
	}

	?>

	<li class="divider"></li>  

	<li>
		<a  <?php echo "href='".$APP_PATH_VERSION."/contato'" ?> class="waves-effect waves-cyan">
			<i class="material-icons">info</i>Entrar em contato
		</a>
	</li>
	<li>
		<a  <?php echo "href='".$APP_PATH_VERSION."/logout'" ?> class="" data-activates="translation-dropdown">
			<i class="material-icons">power_settings_new</i> Sair
		</a>
	</li>
	<li>
		<a class="grey-text">
			© 2018 Copyright Go Educa
		</a>
	</li>
</ul>

<main>
	<!--
	//
	//	TOP NAV ( SOMENTE MOBILE )
	//
-->
<section class="hide-on-large-only" style="height: 70px; overflow: hidden;"></section>
<nav class="hide-on-large-only white" style="background: linear-gradient(to right, rgb(255,255,255), rgb(240,240,240)); height: 70px; overflow: hidden; position: fixed; z-index: 9; top: 0;">
	<div class="nav-wrapper">
		<a href="#" class="brand-logo center"><img <?php  echo "src='".$APP_PATH_VERSION."/src/img/marca-azul-escuro.png'"; ?> width="175">
			<div style="margin-top: -16px;line-height:1; color: grey; font-size: 12px;">Para Escolas</div>
		</a>
		<a href="#" data-activates="slide-out" class="button-collapse grey-text"><i class="material-icons">menu</i></a>
	</div>
</nav>
