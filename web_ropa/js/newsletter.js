document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('#suscribirse').onclick = suscribirse;
  });
  
  function suscribirse(){
    
    var nombre = document.querySelector('#nombre2').value;
    var email = document.querySelector('#email2').value;
  
        
    Email.send({
      Host : "smtp.mailtrap.io",
      Username : "a4d955d72fcb6c",
      Password : "bbc73bc28a2e4b",
      To : 'walterdiaz9414@gmail.com',
      From : email,
      Subject : "Newsletter",
      Body : `Nombre: ${nombre} <br> Email: ${email}`
    })
      .then(function(response){
          if (response == 'OK'){
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Tu suscripcion esta siendo procesada',
                  showConfirmButton: true,
                })
  
          }
          else{
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Error al suscribirse',
              text:'Verifica que tus datos esten completos y sean correctos',
              showConfirmButton: true,
            })
          }
      });
  }