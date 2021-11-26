$(document).ready(buscador);
var n=0;

function buscador(){
    
    $('#lupa').click(function(){        
        $('#buscador').css({'display':'block'});
        $('#lupa').css({'display':'none'});
        if($('#buscador').is(':visible')){
            $('footer').click(ocultar_buscador);
            $('section').click(ocultar_buscador);
        }
    });
}

function ocultar_buscador(){
    $('#buscador').css({'display':'none'});
    $('#lupa').css({'display':'block'});
    n=0;
}