document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('#enviar').onclick = send_mail;
});


function send_mail(){
    var nombre = document.querySelector('#nombre').value;
    var email = document.querySelector("#email").value;
    var asunto = document.querySelector("#asunto").value;
    var mensaje = document.querySelector("#mensaje").value;
    
    Email.send({
        Host : "smtp.mailtrap.io",
        Username : "a4d955d72fcb6c",
        Password : "bbc73bc28a2e4b",
        To : 'walterdiaz9414@gmail.com',
        From : email,
        Subject : asunto,
        Body : `${mensaje} <br> <br> NOMBRE: ${nombre}` 
    })
        .then(function(response){
            if (response == 'OK'){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tu mail fue enviado con exito',
                    showConfirmButton: true,
                  })

            }
            else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error al enviar el mail',
                    text:'Verifica que tus datos esten completos y sean correctos',
                    showConfirmButton: true,
                  })
            }
        });
}