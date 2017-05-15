jQuery(function($) {'use strict';

	//Responsive Nav
	$('li.dropdown').find('.fa-angle-down').each(function(){
		$(this).on('click', function(){
			if( $(window).width() < 768 ) {
				$(this).parent().next().slideToggle();
			}
			return false;
		});
	});

	//Fit Vids
	if( $('#video-container').length ) {
		$("#video-container").fitVids();
	}

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){

		$('.main-slider').addClass('animate-in');
		$('.preloader').remove();
		//End Preloader

		if( $('.masonery_area').length ) {
			$('.masonery_area').masonry();//Masonry
		}

		var $portfolio_selectors = $('.portfolio-filter >li>a');
		
		if($portfolio_selectors.length) {
			
			var $portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : '.portfolio-item',
				layoutMode : 'fitRows'
			});
			
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}

	});


	$('.timer').each(count);
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
		
	// Search
	$('.fa-search').on('click', function() {
		$('.field-toggle').fadeToggle(200);
	});


	//clicked radio button tipo
	$("input[name='tipo']").click(function(){    	
	    if($('input:radio[name=tipo]:checked').val() == "p"){
	    	//Para Poupadores
	       $("#imagem").css("display", "none");	        
	       $("#lblFoto").text("Poupador, pule para o próximo :p");     
	       $("#produto_nome").attr("placeholder", "Diga-nos o nome do produto que está procurando. Ex.: Video Game XBOX 360");	
	       $("#produto_preco").attr("placeholder", "Diga-nos o preço que está disposto a pagar. Ex.: Pago até R$20,00");	
	       $("#produto_descr").attr("placeholder", "Nos dê detalhes sobre o produto que está procurando, não se esqueça de mencionar detalhes como voltagem, marca, preço que está disposto a pagar, etc. É importante que informe também o período do aluguel, por exemplo: Preciso usar a mochila de trekking durante todo o mês de julho.");
	    }else{
	    	//Para empreendedores
	    	$("#lblFoto").text("Selecione AAAQUEEELA imagem da sua mais nova forma de empreendimento:");
	    	$("#imagem").css("display", "block");
	    	$("#produto_nome").attr("placeholder", "Dê um nome para ajudar os poupadores a encontrarem seu produto. Ex.: Furadeira 700W");	
	    	$("#produto_preco").attr("placeholder", "Diga-nos o preço que espera receber. Ex.: R$20,00 / dia");	
	    	$("#produto_descr").attr("placeholder", "Fale-nos um pouco sobre o produto, inclusive o preço que espera receber com o aluguel, não se esqueça de mencionar detalhes como voltagem, marca, estado de uso, etc. Se achar importante pode escrever sobre o período do aluguel, por exemplo: Minha escada está disponível somente nos finais de semana.");
	    }
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin" style="color:white"></i> <label style="color:white"> Só mais um pouquinho, estamos quase ... </label></p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success"><label style="color:white">Prontinho, logo nossa equipe entrará em contato com boas notícias \o/</label></p>').delay(3000).fadeOut();
		});
	});

	// Progress Bar
	$.each($('div.progress-bar'),function(){
		$(this).css('width', $(this).attr('data-transition')+'%');
	});

	if( $('#gmap').length ) {
		var map;

		map = new GMaps({
			el: '#gmap',
			lat: 43.04446,
			lng: -76.130791,
			scrollwheel:false,
			zoom: 16,
			zoomControl : false,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false
		});

		map.addMarker({
			lat: 43.04446,
			lng: -76.130791,
			animation: google.maps.Animation.DROP,
			verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#3e8bff',
		});
	}

});