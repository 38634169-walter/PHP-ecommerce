document.addEventListener('DOMContentLoaded',function(){
  document.querySelector('#enviar').onclick = send_curriculum;
});

function send_curriculum(){
  
  var nombre = document.querySelector('#nombre').value;
  var apellido = document.querySelector('#apellido').value;
  var dni = document.querySelector('#dni').value;
  var email = document.querySelector('#email').value;
  var telefono = document.querySelector('#telefono').value;
  var mensaje = document.querySelector('#mensaje').value;
  var curriculum = document.querySelector('#curriculum').value;

      
  Email.send({
    Host : "smtp.mailtrap.io",
    Username : "a4d955d72fcb6c",
    Password : "bbc73bc28a2e4b",
    To : 'walterdiaz9414@gmail.com',
    From : email,
    Subject : "Curriculum",
    Body : `${mensaje} <br> <br> Nombre: ${nombre} <br> Apellido: ${apellido} <br> Dni: ${dni} <br> Email: ${email} <br> Tel: ${telefono}`,
    Attachments : [
      {
        name : curriculum ,
        path : "https://networkprogramming.files.wordpress.com/2017/11/smtpjs.png"
      }]
  })
    .then(function(response){
        if (response == 'OK'){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Tu curriculum se envio con exito',
                showConfirmButton: true,
              })

        }
        else{
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error al enviar curriculum',
            text:'Verifica que tus datos esten completos y sean correctos',
            showConfirmButton: true,
          })
        }
    });
}


