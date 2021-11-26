$(document).ready(slider);
var index=0;

function slider(){

    $('.flecha-derecha-especiales').click(function(){
        if(index <= 2){
        $('.vestidos-especiales').eq(index).css({'display':'none'});
        index ++;
        }

    });
    $('.flecha-izquierda-especiales').click(function(){
        if(index >=  0){
            $('.vestidos-especiales').eq(index).css({'display':'block'});
            index --;
            if(index < 0){
                index++;
            }
        }

    });
}