<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<section class="bloco2">
	<section class="row">
		<div class="col s12">
			<nav class="transparent z-depth-0">
				<div class="nav-wrapper">
					<div class="col">
						

						<?php

						if($_SESSION["acessoSchool"] == 1){
							echo "<a href='#!' class='breadcrumb'>Lewi Samuel</a>";
						}else{
							echo "<a href='/escolas/v1/unidade' class='breadcrumb'>Taguatinga - DF</a>

							<a href='/escolas/v1/turma' class='breadcrumb'>7ºF - Matutino</a>

							<a href='#!' class='breadcrumb'>Lewi Samuel
									<small class='grey-text text-lighten-1'>(lewi@goeduca.com)</small>
								</a>
							";

						}

						?>
					</div>
					<a href='#modal1' class='btn modal-trigger btn-flat right'>
						<i class='material-icons left' style="line-height: 35px;">remove_red_eye</i>
						<span>Atividade recente</span>
					</a>
				</div>
			</nav>
		</div>

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Atividade recente:</h4>
				<table class="col s12  bordered striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Apelido</th>
							<th>Serie/turma</th>
							<th>Data</th>
							<th>Jogo</th>
							<th>Pontuação</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Lewi Samuel</td>
							<td>Lewix</td>
							<td>7ªF</td>
							<td>19/agosto de 2018</td>
							<td>SpaceLog</td>
							<td>150 pontos</td>
						</tr>
					</tbody>
				</table>



			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
			</div>
		</div>
		<!-- fim do modal -->

	</section>




	<div class="row">
		<div class="col s12 grey-text">
			<h2 style="font-weight: bold;">Relatório de Desempenho deste aluno</h2>
		</div>
	</div>

			<!--
			//
			//	Gráficos
			//
		-->
		<div id="chart-dashboard">
			<div class="row">
				<div class="col s12">

						<!--
						//
						//	GRÁFICO LINEAR ( MÉDIA GERAL DOS ALUNOS )
						//
					-->
					<div class="card">
						<div class="card-content waves-effect waves-block waves-light">
							<a class="btn-floating btn-move-up2 waves-effect waves-light transparent z-depth-0 right">
								<i class="material-icons activator grey-text">filter_list</i>
							</a>
							<div class="move-up transparent">
								<div class="trending-line-chart-wrapper">
									<canvas id="trending-line-chart" class="line-chartd" height="350" width="824" style="width: 824px; height: 350px;"></canvas>
								</div>
							</div>
						</div>
						<div class="card-reveal" style="display: none; transform: translateY(0px);">
							<div class="card-title grey-text text-darken-4" style="height: 68px;">
								<div class="left">Sumarizado</div>
								<i class="material-icons right">close</i>
								<a class="btn right btn-flat">Exportar</a>
								<a class="btn right btn-flat">Ver detalhado</a>

							</div>
							<table class="responsive-table">
								<thead>
									<tr>
										<th>Mês</th>
										<th>Unidade A</th>
										<th>Unidade B</th>
										<th>Unidade C</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>January</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>February</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>March</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>April</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>May</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>June</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>July</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>August</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Septmber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Octomber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>November</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>December</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<script type="text/javascript">
						var contextod = document.getElementsByClassName("line-chartd");
						var chartGraph = new Chart(contextod, {
							type: 'line',
							data: {
								labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
								datasets: [

								{
									label: "Sobradinho - DF",
									data: [5,5,6,7,7,7,7,7,8,9,9,10],
									borderWidth: 2,
									borderColor: 'green',
									backgroundColor: 'transparent',
								},
								{
									label: "Planaltina - GO",
									data: [6,3,7,6,8,6,8,6,9,8,10,9],
									borderWidth: 2,
									borderColor: 'red',
									backgroundColor: 'transparent',
								},
								{
									label: "Taguatinga - DF",
									data: [4,5,5,8,6,8,6,4,10,6,10,7],
									borderWidth: 2,
									borderColor: 'blue',
									backgroundColor: 'transparent',
								},

								]
							},
							options: {
								title: {
									display: true,
									fontSize: 15,
									fontColor: "#222",
									text: "Média de desempenho (acertos/erros)"
								},
								legend: {
									display: true,
									position: 'bottom'
								},
								labels: {
									fontStyle: "bold"
								},
								maintainAspectRatio: true,
							}
						});
					</script>



						<!--
						//
						//	GRÁFICO RADAR (COMPARATIVO DA MÉDIA DE CADA ESCOLA POR DICIPLINA)
						//
					-->

					<div class="card" style="overflow: hidden;">	
						<div class="card-content">
							<a class="btn-floating btn-move-up2 waves-effect waves-light transparent z-depth-0 right">
								<i class="material-icons activator grey-text">filter_list</i>
							</a>
							<div class="col s12">
								<canvas class="line-charte" height="200" width="300" style="width: 100%; height: 200px;"></canvas>
							</div>
						</div>
						<div class="card-reveal" style="display: none; transform: translateY(0px);">
							<div class="card-title grey-text text-darken-4" style="height: 68px;">
								<div class="left">Sumarizado</div>
								<i class="material-icons right">close</i>
								<a class="btn right btn-flat">Exportar</a>
								<a class="btn right btn-flat">Ver detalhado</a>

							</div>
							<table class="responsive-table">
								<thead>
									<tr>
										<th>Mês</th>
										<th>Unidade A</th>
										<th>Unidade B</th>
										<th>Unidade C</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>January</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>February</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>March</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>April</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>May</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>June</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>July</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>August</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Septmber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Octomber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>November</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>December</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<script type="text/javascript">
						var contextoe = document.getElementsByClassName("line-charte");
						var chartGraph = new Chart(contextoe, {
							type: 'radar',
							data: {
								labels: ["Matematica","Física","Química","Biologia","Português","História","Geografia","Filosofia","Sociologia","Música"],
								datasets: [

								{
									label: "Sobradinho - DF",
									data: [6,5,4,7,9,8,4,6,7,6],
									borderWidth: 2,
									backgroundColor: "transparent",
									borderColor: "green",
								},

								{
									label: "Planaltina - GO",
									data: [9,8,6,7,6,7,8,9,7,8],
									borderWidth: 2,
									backgroundColor: "transparent",
									borderColor: "red",
								},

								{
									label: "Taguatinga - DF",
									data: [7,8,7,5,9,8,6,5,7,6],
									borderWidth: 2,
									backgroundColor: "transparent",
									borderColor: "blue",
								},


								]
							},
							options: {
								scale: {
									ticks: {
										beginAtZero: true,
										min: 0,
										max: 10
									},
									pointLabels: {
										fontSize: 10
									}
								},
								legend: {
									position: 'bottom',
								},
								title: {
									display: true,
									fontSize: 15,
									fontColor: "#222",
									text: "Matérias"
								},
								labels: {
									fontStyle: "bold"
								},
								maintainAspectRatio: true,
							}
						});
					</script>


				</div>

			<div class="col s12 m6">
				<!--
				//
				//	Gráfico engajamento
				//
				-->
				<div class="card" style="overflow: hidden;">
					<div class="card-content waves-effect waves-block waves-light">
						<div class="move-up">
							<a class="btn-floating btn-move-up2 waves-effect waves-light transparent z-depth-0 right">
								<i class="material-icons activator grey-text">filter_list</i>
							</a>
							<p class="margin white-text">Browser Stats</p>
							<canvas class="line-chartf" height="350" style="height: 350px"></canvas>
						</div>
					</div>
					<div class="card-reveal" style="display: none; transform: translateY(0px);">
						<div class="card-title grey-text text-darken-4" style="height: 130px;">
							<div class="left">Sumarizado</div>
							<i class="material-icons right">close</i><br>
							<a class="btn left btn-flat">Exportar</a>
							<a class="btn left btn-flat">Ver detalhado</a>

						</div>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Mês</th>
									<th>Unidade A</th>
									<th>Unidade B</th>
									<th>Unidade C</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>January</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>February</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>March</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>April</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>May</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>June</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>July</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>August</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>Septmber</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>Octomber</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>November</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>December</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<script type="text/javascript">
					var marksCanvas = document.getElementsByClassName("line-chartf");
					var marksData = {
						labels: ["Tempo de acesso", "Tempo de resposta", "Acerto"],
						datasets: [
						{
							label: "Sobradinho - DF",
							data: [6,5,4],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "green",
						},

						{
							label: "Planaltina - GO",
							data: [9,8,6],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "red",
						},

						{
							label: "Taguatinga - DF",
							data: [7,8,7],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "blue",
						},

						]
					};

					var chartOptions = {
						scale: {
							pointLabels: {
								fontSize: 10
							}
						},
						title: {
							display: true,
							fontSize: 15,
							fontColor: "#222",
							text: "Média de engajamento"
						},
						legend: {
							position: 'bottom'
						},
						maintainAspectRatio: true,
							  // legend: {
							  //   position: 'left'
							  // }
							};

							var radarChart = new Chart(marksCanvas, {
								type: 'radar',
								data: marksData,
								options: chartOptions
							});
				</script>
			</div>
			<div class="col s12 m6">
				<!--
				//
				//	Gráfico MODO DE APRENDIZADO (ATITUDINAL, CONCEITUAL, PROCEDIMENTAL)
				//
				-->
				<div class="card">
					<div class="card-content transparent">
						<a class="btn-floating btn-move-up2 waves-effect waves-light transparent z-depth-0 right">
							<i class="material-icons activator grey-text">filter_list</i>
						</a>
						<div class="line-chart-wrapper">
							<p class="margin white-text">Revenue by country</p>
							<canvas class="line-chartg" height="350" style="height: 350px"></canvas>
						</div>
					</div>
					<div class="card-reveal" style="display: none; transform: translateY(0px);">
						<div class="card-title grey-text text-darken-4" style="height: 130px;">
							<div class="left">Sumarizado</div>
							<i class="material-icons right">close</i><br>
							<a class="btn left btn-flat">Exportar</a>
							<a class="btn left btn-flat">Ver detalhado</a>

						</div>
						<table class="responsive-table">
							<thead>
								<tr>
									<th>Mês</th>
									<th>Unidade A</th>
									<th>Unidade B</th>
									<th>Unidade C</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>January</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>February</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>March</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>April</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>May</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>June</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>July</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>August</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>Septmber</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>Octomber</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>November</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
								<tr>
									<td>December</td>
									<td>122</td>
									<td>100</td>
									<td>50</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<script type="text/javascript">
					var marksCanvas = document.getElementsByClassName("line-chartg");

					var marksData = {
						labels: ["Procedimental", "Conceitual", "Atitudinal"],
						datasets: [
						{
							label: "Sobradinho - DF",
							data: [4,7,2],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "green",
						},

						{
							label: "Planaltina - GO",
							data: [7,10,4],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "red",
						},

						{
							label: "Taguatinga - DF",
							data: [9,6,5],
							borderWidth: 2,
							backgroundColor: "transparent",
							borderColor: "blue",
						},
						]
					};

					var chartOptions = {
						title: {
							display: true,
							fontSize: 15,
							fontColor: "#222",
							text: "Objetivo"
						},
						legend: {
							position: 'bottom'
						},
						maintainAspectRatio: true,
					};

					var radarChart = new Chart(marksCanvas, {
						type: 'radar',
						data: marksData,
						options: chartOptions
					});
				</script>
			</div>

		<div class="col s12">
			


					<!--
					//
					//	Gráfico PIZZA ( TEMAS )
					//
					-->
					<div class="card">
						<div class="card-content transparent">
							<a class="btn-floating btn-move-up2 waves-effect waves-light transparent z-depth-0 right">
								<i class="material-icons activator grey-text">filter_list</i>
							</a>
							<div class="line-chart-wrapper">
								<div class="row">
									<div class="input-field col s12 m6">
										<select>
											<option selected="selected">Todas as disciplinas</option>
											<option>Matematica</option>
											<option>Português</option>
											<option>Quimica</option>
											<option>Física</option>
											<option>História</option>
											<option>Geografia</option>
											<option>Filosofia</option>
											<option>Sociologia</option>
										</select>
										<label>Disciplina</label>
									</div>
									<div class="input-field col s12 m6">
										<select>
											<option>Mais dificuldade</option>
											<option>Mais facilidade</option>
										</select>
										<label>Filtro</label>
									</div>
								</div>
								<canvas class="line-charth" height="100" width="100" style="width: 100px; height: 100px;"></canvas>
							</div>
						</div>
						<div class="card-reveal" style="display: none; transform: translateY(0px);">
							<div class="card-title grey-text text-darken-4" style="height: 68px;">
								<div class="left">Sumarizado</div>
								<i class="material-icons right">close</i>
								<a class="btn right btn-flat">Exportar</a>
								<a class="btn right btn-flat">Ver detalhado</a>

							</div>
							<table class="responsive-table">
								<thead>
									<tr>
										<th>Mês</th>
										<th>Unidade A</th>
										<th>Unidade B</th>
										<th>Unidade C</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>January</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>February</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>March</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>April</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>May</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>June</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>July</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>August</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Septmber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>Octomber</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>November</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
									<tr>
										<td>December</td>
										<td>122</td>
										<td>100</td>
										<td>50</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<script type="text/javascript">
						var ctxh = document.getElementsByClassName("line-charth");

						var birdsData = {
							labels: ["tema1", "tema2", "tema3", "tema4", "tema5", "tema6", "tema7","tema8", "tema9", "tema10", "tema11", "tema12", "tema13", "tema14"],
							datasets: [{
								data: [100, 70, 85, 30, 45, 78, 90,80, 90, 65, 50, 25, 98, 70],
								backgroundColor: [
								"rgba(101, 011, 205, 0.6)",
								"rgba(32, 21,67, 0.6)",
								"rgba(5, 01, 55, 0.6)",
								"rgba(212, 55, 45, 0.6)",
								"rgba(54, 14, 0, 0.6)",
								"rgba(014, 156,1, 0.6)",
								"rgba(56, 45, 2, 0.6)",
								"rgba(101, 011, 05, 0.6)",
								"rgba(52, 212,67, 0.6)",
								"rgba(5, 01, 55, 0.6)",
								"rgba(342, 255, 45, 0.6)",
								"rgba(54, 014, 0, 0.6)",
								"rgba(014, 56,1, 0.6)",
								"rgba(56, 45, 20, 0.6)",
								],
								borderColor: "transparent",
							}]
						};

						var chartOptions = {
							startAngle: -Math.PI / 4,
							title: {
								display: true,
								fontSize: 15,
								fontColor: "#222",
								text: "Temas"
							},
							legend: {
								position: 'right'
							},
							animation: {
								animateRotate: false,
							}
						};

						var polarAreaChart = new Chart(ctxh, {
							type: 'polarArea',
							data: birdsData,
							options: chartOptions
						});
					</script>
		</div>
	</div>
</div>

		<!--
		//
		//	TÓPICOS
		//
	-->
	<section class="row">
		<div class="col s12">

		</div>
	</section>

	<section id="work-collections">
		<div class="row">
			<div class="col s12">
				<ul id="issues-collection" class="collection z-depth-1">
					<li class="collection-item avatar red white-text">
						<i class="material-icons transparent circle">bug_report</i>
						<h6 class="collection-header m-0"><b>Temas com maiores dificuldades</b></h6>
						<select>
							<option>Matemática</option>
							<option>Física</option>
						</select>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s7 m5">
								<p class="collections-title">
									<strong>#1</strong> Matemática
								</p>
								<p class="collections-content">Logarítimo</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">95%</span>
							</div>
							<div class="col s3 m5">
								<div class="progress">
									<div class="determinate" style="width: 95%"></div>
								</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s12 m5">
								<p class="collections-title">
									<strong>#2</strong> Física
								</p>
								<p class="collections-content">Hidroestática</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">70%</span>
							</div>
							<div class="col s12 m5">
								<div class="progress">
									<div class="determinate" style="width: 70%"></div>
								</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s7 m5">
								<p class="collections-title">
									<strong>#3</strong> Matemática
								</p>
								<p class="collections-content">Logarítimo</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">65%</span>
							</div>
							<div class="col s3 m5">
								<div class="progress">
									<div class="determinate" style="width: 65%"></div>
								</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s12 m5">
								<p class="collections-title">
									<strong>#4</strong> Física
								</p>
								<p class="collections-content">Hidroestática</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">45%</span>
							</div>
							<div class="col s12 m5">
								<div class="progress">
									<div class="determinate" style="width: 45%"></div>
								</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s7 m5">
								<p class="collections-title">
									<strong>#5</strong> Matemática
								</p>
								<p class="collections-content">Logarítimo</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">43%</span>
							</div>
							<div class="col s3 m5">
								<div class="progress">
									<div class="determinate" style="width: 43%"></div>
								</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s12 m5">
								<p class="collections-title">
									<strong>#6</strong> Física
								</p>
								<p class="collections-content">Hidroestática</p>
							</div>
							<div class="col s2">
								<span class="task-cat deep-orange accent-2">40%</span>
							</div>
							<div class="col s12 m5">
								<div class="progress">
									<div class="determinate" style="width: 40%"></div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
</section>