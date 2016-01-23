$(document).ready(function(){
    var lastId = 0;

    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    var maxId;

    var lastIdE = 0;
    var maxIdE;

    $.ajax({
          // chargement du fichier externe monfichier-ajax.php
          url      : "asset/traitement/pagination.php",
          // Passage des données au fichier externe (ici le nom cliqué) 
          data     : {},
          cache    : false,
          dataType : "json",
          error    : function(request, error) { // Info Debuggage si erreur        
                       alert("Erreur : responseText: "+request.responseText);
                     },
          success  : function(data) { 
                       // Informe l'utilisateur que l'opération est terminé et renvoie le résultat
                       maxId = data.news;
                       maxIdE = data.events;
                     }      
    });

    if (lastId == 0) {
        $('.prevNews').hide();
    }

    if (lastIdE == 0) {
        $('.prevEvents').hide();
    }
    
    /* Pagination News - Index */
    $('.prevNews').click(function(e){
    	e.preventDefault();
    	e.stopPropagation();
    	
    	var page = $(this).attr('href');
        page = page.substr(0, page.length-1);
        lastId = lastId - 3;
        if (lastId <= 0) lastId = 0;

    	var url = page+lastId;

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                
                var data = xmlhttp.responseText;
                var news;
                news = $(data).find('#News').html();
                
             	$('#News').empty().hide();
                $('#News').append(news);
                $('#News').velocity("transition.slideLeftIn", {duration: 800});
                $('html, body').velocity("scroll", {
                    delay: 0,
                    duration: 150,
                    offset: 0
                });

                if ((lastId+3) <= maxId) {
                    $('.nextNews').show();
                } 
                if (lastId == 0) {
                    $('.prevNews').hide();
                }
            }
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send('#News');
        
    });

    $('.nextNews').click(function(e){
    	e.preventDefault();
    	e.stopPropagation();
    	
        var page = $(this).attr('href');
        page = page.substr(0, page.length-1);
        lastId = lastId +3;        
        var url = page+lastId;

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                
                var data = xmlhttp.responseText;

                var news = $(data).find('#News').html();
  
                $('#News').empty().hide();
                $('#News').append(news);
                $('#News').velocity("transition.slideRightIn", {duration: 800});
                
                $('html, body').velocity("scroll", {
                    delay: 0,
                    duration: 150,
                    offset: 0
                });

                

                if ((lastId+3) >= maxId) {
                    $('.nextNews').hide();
                }       
                if (lastId != 0) {
                    $('.prevNews').show();
                }
            }
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send('#News');
        
    });


 /* Pagination Event - Index */
    $('.prevEvents').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var page = $(this).attr('href');
        page = page.substr(0, page.length-1);
        lastIdE = lastIdE - 3;
        if (lastIdE <= 0) lastIdE = 0;

        var url = page+lastIdE;

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                
                var data = xmlhttp.responseText;
                var news;
                news = $(data).find('#Events').html();
                
                $('#Events').empty().hide();
                $('#Events').append(news);
                $('#Events').velocity("transition.slideLeftIn", {duration: 800});


                if ((lastIdE+3) <= maxIdE) {
                    $('.nextEvents').show();
                } 
                if (lastIdE == 0) {
                    $('.prevEvents').hide();
                }
            }
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send('#Events');
        
    });

    $('.nextEvents').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var page = $(this).attr('href');
        page = page.substr(0, page.length-1);
        lastIdE = lastIdE +3;        
        var url = page+lastIdE;

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                
                var data = xmlhttp.responseText;

                var news = $(data).find('#Events').html();
  
                $('#Events').empty().hide();
                $('#Events').append(news);
                $('#Events').velocity("transition.slideRightIn", {duration: 800});

                if ((lastIdE+3) >= maxIdE) {
                    $('.nextEvents').hide();
                }       
                if (lastIdE != 0) {
                    $('.prevEvents').show();
                }
            }
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send('#Events');
        
    });

}); // ready()