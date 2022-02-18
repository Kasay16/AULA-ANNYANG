// $(document).ready(function(){
//     $('#aviso').hide();
//     $('#aviso1').hide();
//     $('#form-recuperar').submit(e=>{
//         let correo = $('#correo-recuperar').val();
//         let usuario = $('#campousuario').val();
//         if(correo==''|| usuario==''){
//             $('#aviso').show();
//             $('#aviso').text('Rellene todos los campos'); 
//         }
//         else{
//             $('#aviso').hide();
            
//             let funcion="verificar";
//             $.post( "../../Controladores/usuariosC", {funcion,correo,usuario},(response)=>{
//                 console.log(response);
//             })
//         }
//         e.preventDefault();
//     })
// })

// function RestablecerClave(){

//     $caracteres= "abcdefghijklmnopqrtuvwxyzABCDEFGHYJKLMNOPQRTUVWXYZ123456789";
//     $clave ="";
//     for(i=0;i<6;i++){
//         clave+=caracteres.charAt(Math.floor(Math.ramdom()*caracteres.length));
//     }
//     alert(clave);
    
// }


    


})