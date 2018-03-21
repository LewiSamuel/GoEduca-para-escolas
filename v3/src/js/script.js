(function($){
  $(function(){


    function imprimirRanking(){
      alert("foi");
    }

  $('.timepicker').pickatime({
      default: 'now', // Set default time: 'now', '1:30AM', '16:30'
      fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
      twelvehour: false, // Use AM/PM or 24-hour format
      donetext: 'OK', // text for done-button
      cleartext: 'Clear', // text for clear-button
      canceltext: 'Cancel', // Text for cancel-button
      autoclose: false, // automatic close timepicker
      ampmclickable: true, // make AM PM clickable
      aftershow: function(){} //Function for after opening timepicker
    });

	$('.modal').modal();

	$('.chips-placeholder').material_chip({
		placeholder: 'Digite uma Tag',
		secondaryPlaceholder: '+Tag',
	});


  $('.parallax').parallax();

  $('.carousel').carousel({
        dist:0,
        shift:0,
        padding:20,
        indicators:true,
        duration:200
    });

  autoplay()   
  function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
  }

	//NavTop
	$('.autopesquisa').hide();
	$('.btn-search-go').click(function(){
		$('.title-topo, .nav-action, .menu-collapse').hide();
		$('.autopesquisa').fadeIn( "slow" );
	});
	$('.btn-close-go').click(function(){
		$('.title-topo, .nav-action, .menu-collapse').fadeIn('slow');
		$('.autopesquisa').hide();
	});

  	//NavLeft
  	$('.button-collapse').sideNav();




    /*
    *	Materialize inicianizations
    */
	//materialize_dropdown
  $('.dropdown-button').dropdown();

	$('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
    constrainWidth: false,
    hover: true,
    gutter: 0,
    belowOrigin: true,
    alignment: 'left',
    stopPropagation: false
	 });



    //materialize_autocomplete
 //    $('input.autocomplete').autocomplete({
 //    	data: {
 //    		"Matemática": null,
 //    		"Física": null,
 //    		"Química": null,
 //    		"Biologia": null,
 //    		"Cálculo": null,
 //    		"Allan Paulo": 'https://placehold.it/250x250',
 //    		"Nayara Matos": 'https://placehold.it/250x250',
 //    		"Lewi Samuel": 'https://placehold.it/250x250',
 //    		"Antônio Domingues Neto": 'https://placehold.it/250x250',
 //    		"Daniel Antônio da Silva": 'https://placehold.it/250x250'
 //    	},
	// 	limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
	// 	onAutocomplete: function(val) {
	// 	  // Callback function when value is autcompleted.
	// 	},
	// 	minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
	// });



    $('.dropdown-button').dropdown('open',function(){
    	//when dropdown open
    });
    $('.dropdown-button').dropdown('close',function(){
    	//when dropdown close
    });

	  // Initialize collapse button
	  $(".button-collapse").sideNav();
	  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
	  //$('.collapsible').collapsible();

	  //datepicker
    var data = new Date();


	  $('.datepicker').pickadate({
      selectMonths: true, 
      selectYears: 60, 
      today: false,
      clear: 'Resetar',
      close: 'Ok',
      labelMonthNext: 'Próximo mês',
      labelMonthPrev: 'Mês anterior',
      labelMonthSelect: 'Selecione o mês',
      labelYearSelect: 'Selecione o ano',
      monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
      monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
      weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado' ],
      weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
      weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
      format: 'yyyy-mm-dd',
      closeOnSelect: false,
      min: new Date(data.getFullYear() - 100, 12, 30),
      max: new Date(data.getFullYear() + -5, 12, 30)
  });

  //select
  $('select').material_select();


//funções de conteúdo

  //criar <option></option> de disciplina
  function CriarOptionDisciplina(segmentoID){
    data = {
      func: "CriarOptionDisciplina",
      segmentoID: segmentoID
    };
    $("select.selectDisciplina").html("<option disabled selected>Carregando...<option>");
    $("select.selectDisciplina").material_select("update");
    $("select.selectTema").html("<option disabled selected> - <option>");
    $("select.selectTema").material_select("update");
    $.post("/include/db-global.php",data,function(result){
      $("select.selectDisciplina").html(result);
      $("select.selectDisciplina").material_select("update");
    });
  }  
  $("select.selectSegmento").on("change",function(){
    var segmentoID = $(this).val();
    CriarOptionDisciplina(segmentoID);
  });

  //criar <option></option> de tema
  function CriarOptionTema(disciplinaID){
    data = {
      func: "CriarOptionTema",
      disciplinaID: disciplinaID
    };
    $("select.selectTema").html("<option disabled selected>Carregando...<option>");
    $("select.selectTema").material_select("update");
    $.post("/include/db-global.php",data,function(result){
      $("select.selectTema").html(result);
      $("select.selectTema").material_select("update");
      console.log("result: "+result);
    });
  }  
  $("select.selectDisciplina").on("change",function(){
    var disciplinaID = $(this).val();
    CriarOptionTema(disciplinaID);
  });
  
  $("select.selectDisciplina").on("change",function(){
    var disciplinaID = $(this).val();
    CriarOptionTema(disciplinaID);
  });

  $("select#tipo").on("change",function(){
    
    var opcao = $(this).val();
    if(opcao == "Outro"){
      $(".escreveroutro").fadeIn(500);
    }else{
      $(".escreveroutro").fadeOut(500);
    }

  });

$(window).on("mousemove", function(event) {
  var y = event.clientY;
  if (parseInt(y) < parseInt(20)) {
    $('#novidades').modal('open');
  }
});



function AlteraExame(){
  var exameSelectVal = $("#exameSelect").val();
  if(exameSelectVal=="nao" || exameSelectVal==""){
    //não relacionado a exame específico
    $("#exameTituloDiv").hide();
    $("#exameAnoDiv").hide();
    $("#exameAplicacaoDiv").hide();
  }else if(exameSelectVal=="rel"){
    //relacionada a exame
    $("#exameTituloDiv").show();
    $("#exameAnoDiv").hide();
    $("#exameAplicacaoDiv").hide();
  }else if(exameSelectVal=="res" || exameSelectVal=="exm" || exameSelectVal=="gab"){
    //questao de exame
    $("#exameTituloDiv").show();
    $("#exameAnoDiv").show();
    $("#exameAplicacaoDiv").show();
  }else{
    $("#exameTituloDiv").hide();
    $("#exameAnoDiv").hide();
    $("#exameAplicacaoDiv").hide();
  }
}
//quando carregar a pg, esconde as opções
AlteraExame();
$("#exameSelect").on("change",function(){
  AlteraExame();
});


$("#formNovaAula").on("submit",function(){
  $("#bnt-novaAula").val("Enviando...");
});






/*
*   Funcionalidades da plataforma
*/

	// Preloader controll
	$('.preloader').addClass("hide");
	$(".loaded").removeClass("hide");


    //Preloader Bruno
/*  $('.preloader-background').delay(1700).fadeOut('slow');
  $('.preloader-wrapper').delay(1700).fadeOut();
  */



  }); // end of document ready
})(jQuery); // end of jQuery name space



document.addEventListener("DOMContentLoaded", function(){
  $('.preloader-background').delay(1700).fadeOut('slow');
  
  $('.preloader-wrapper')
    .delay(1700)
    .fadeOut();
});