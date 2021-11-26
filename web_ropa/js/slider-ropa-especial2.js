$(document).ready(slider);
var index=0;

function slider(){

    $('.flecha-derecha-especiales2').click(function(){
        if(index <= 4){
        $('.vestidos-especiales2').eq(index).css({'display':'none'});
        index ++;
        }

    });
    $('.flecha-izquierda-especiales2').click(function(){
        if(index >=  0){
            $('.vestidos-especiales2').eq(index).css({'display':'block'});
            index --;
            if(index < 0){
                index++;
            }
        }

    });
}