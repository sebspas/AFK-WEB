$(document).ready(function(){


	outdatedBrowser({
        bgColor: '#f25648',
        color: '#f8f8f8',
        lowerThan: 'transform',
        languagePath: 'http://afk.atewix.fr/asset/outdatedbrowser/lang/fr.html'
    })


    $(window).resize(function() {
    	if ($(document).width() > 999) {
    		$('.menu-navigation').show();
    	}
    }); // $(document).resize()

	$('.js-menu-btn').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		if ($('.menu-navigation').is(':hidden')) {
			$('.menu-navigation').velocity("slideDown", {duration: 200});
		}
		else {
			$('.menu-navigation').velocity("slideUp", {duration: 200});
		}
	}); // $('.menu-btn').click()
	
	

	$('.error').velocity("fadeIn", {delay: 30, duration: 500});
	$('.error').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		$(this).velocity("fadeOut", {delay: 30, duration: 250});
	}); // $('.error').click()

	$('.success').velocity("fadeIn", {delay: 30, duration: 500});
	$('.success').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		$(this).velocity("fadeOut", {delay: 30, duration: 250});
	});  // $('.success').click()

	//$('.row').velocity("fadeIn", {delay: 150, duration: 750});


	$('.js-tologinbox').click(function() {
		if ($('.loginbox').is(':visible')) {
			$('.loginbox').velocity("slideUp", {duration: 350});
		}
		else {
			$('.loginbox').velocity("slideDown", {duration: 350});
		}
	}); // $('.tologinbox').click()


	$('.js-tosections').click(function() {
		if ($('.sections').is(':visible')) {
			$('.sections').velocity("slideUp", {duration: 350});
		}
		else {
			$('.sections').velocity("slideDown", {duration: 350});
		}
	}); // $('.tologinbox').click()


	$(".slider").fitVids();

	
	$(this).scrollT();



	/* FORM */
	$('.field-input').focus(function(){
            $(this).parent().addClass('is-focused has-label');
    })

    $('.field-input').blur(function(){
        $parent = $(this).parent();
        if($(this).val() == ''){
            $parent.removeClass('has-label');
        }
        $parent.removeClass('is-focused');
    });

	// sceditor - texterea BBCODE
	$(function() {
		$(".editme").sceditor({
			plugins: 'bbcode',
			style: 'asset/css/modern.css',
			toolbar: "bold,italic,font,color,left,center,right,justify,link,emoticon,youtube,underline|source",
			emoticonsRoot: 'asset/images/'
		});
	});
	
  // Footer - Inscrits
  $('.registered').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        document.location.href="http://afk.atewix.fr/index.php?page=liste"; 
  }); // $('.registered').click()
  
}); // ready()