
function Vertabla() {
    $('#tabla').load('Php/Usuarios/tabla.php');
  };

$('#txt_pass').change(function(){
    var pas1 = $("#txt_pass").val();
    var pas2 = $("#txt_veripass").val();
           if (pas1 != pas2) {
                $('#txt_pass').css({'border-width':'2px'}); 
              $('#txt_veripass').css({'border-width':'2px'}); 
              $('#txt_pass').css({'border-style':'solid'}); 
              $('#txt_veripass').css({'border-style':'solid'}); 
              $('#txt_pass').css({'border-color':'red'}); 
              $('#txt_veripass').css({'border-color':'red'}); 
             } else {     
              $('#txt_pass').css({'border-width':'thin'}); 
              $('#txt_veripass').css({'border-width':'thin'}); 
              $('#txt_pass').css({'border-style':'solid'}); 
              $('#txt_veripass').css({'border-style':'solid'}); 
              $('#txt_pass').css({'border-color':'#D6DBDF'}); 
              $('#txt_veripass').css({'border-color':'#D6DBDF'}); 
                  }
            });
 $('#txt_veripass').change(function(){
    var pas1 = $("#txt_pass").value;
    var pas2 = $("#txt_veripass").value;
             if (pas1 == pas2) {
                $('#txt_pass').css({'border-width':'thin'}); 
                $('#txt_veripass').css({'border-width':'thin'}); 
                $('#txt_pass').css({'border-style':'solid'}); 
                $('#txt_veripass').css({'border-style':'solid'}); 
                $('#txt_pass').css({'border-color':'#D6DBDF'}); 
                $('#txt_veripass').css({'border-color':'#D6DBDF'});   
             } else {
                $('#txt_pass').css({'border-width':'2px'}); 
                $('#txt_veripass').css({'border-width':'2px'}); 
                $('#txt_pass').css({'border-style':'solid'}); 
                $('#txt_veripass').css({'border-style':'solid'}); 
                $('#txt_pass').css({'border-color':'red'}); 
                $('#txt_veripass').css({'border-color':'red'}); 
                     }
            });       
                      



            $('#password').change(function(){
                var pass1 = $("#password").val();
                var pass2 = $("#password1").val();
                       if (pass1 != pass2) {
                           $('#password').css({'border-width':'2px'}); 
                          $('#password1').css({'border-width':'2px'}); 
                          $('#password').css({'border-style':'solid'}); 
                          $('#password1').css({'border-style':'solid'}); 
                          $('#password').css({'border-color':'red'}); 
                          $('#password1').css({'border-color':'red'}); 
                         } else {     
                          $('#password').css({'border-width':'thin'}); 
                          $('#password1').css({'border-width':'thin'}); 
                          $('#password').css({'border-style':'solid'}); 
                          $('#password1').css({'border-style':'solid'}); 
                          $('#password').css({'border-color':'#D6DBDF'}); 
                          $('#password1').css({'border-color':'#D6DBDF'}); 
                              }
                        });
             $('#password1').change(function(){
                var pass1 = $("#password").val();
                var pass2 = $("#password1").val();
                         if (pass1 == pass2) {
                            $('#password').css({'border-width':'thin'}); 
                            $('#password1').css({'border-width':'thin'}); 
                            $('#password').css({'border-style':'solid'}); 
                            $('#password1').css({'border-style':'solid'}); 
                            $('#password').css({'border-color':'#D6DBDF'}); 
                            $('#password1').css({'border-color':'#D6DBDF'});   
                         } else {
                            $('#password').css({'border-width':'2px'}); 
                            $('#password1').css({'border-width':'2px'}); 
                            $('#password').css({'border-style':'solid'}); 
                            $('#password1').css({'border-style':'solid'}); 
                            $('#password').css({'border-color':'red'}); 
                            $('#password1').css({'border-color':'red'}); 
                                 }
                        });

                        $('#txt_pass').change(function(){
                            var pas1 = $("#txt_pass").val();
                            var pas2 = $("#txt_veripass").val();
                                   if (pas1 != pas2) {
                                       $('#txt_pass').css({'border-width':'2px'}); 
                                      $('#txt_veripass').css({'border-width':'2px'}); 
                                      $('#txt_pass').css({'border-style':'solid'}); 
                                      $('#txt_veripass').css({'border-style':'solid'}); 
                                      $('#txt_pass').css({'border-color':'red'}); 
                                      $('#txt_veripass').css({'border-color':'red'}); 
                                     } else {     
                                      $('#txt_pass').css({'border-width':'thin'}); 
                                      $('#txt_veripass').css({'border-width':'thin'}); 
                                      $('#txt_pass').css({'border-style':'solid'}); 
                                      $('#txt_veripass').css({'border-style':'solid'}); 
                                      $('#txt_pass').css({'border-color':'#D6DBDF'}); 
                                      $('#txt_veripass').css({'border-color':'#D6DBDF'}); 
                                          }
                                    });
                         $('#txt_veripass').change(function(){
                            var pas1 = $("#txt_pass").val();
                            var pas2 = $("#txt_veripass").val();
                                     if (pas1 == pas2) {
                                        $('#txt_pass').css({'border-width':'thin'}); 
                                        $('#txt_veripass').css({'border-width':'thin'}); 
                                        $('#txt_pass').css({'border-style':'solid'}); 
                                        $('#txt_veripass').css({'border-style':'solid'}); 
                                        $('#txt_pass').css({'border-color':'#D6DBDF'}); 
                                        $('#txt_veripass').css({'border-color':'#D6DBDF'});   
                                     } else {
                                        $('#txt_pass').css({'border-width':'2px'}); 
                                        $('#txt_veripass').css({'border-width':'2px'}); 
                                        $('#txt_pass').css({'border-style':'solid'}); 
                                        $('#txt_veripass').css({'border-style':'solid'}); 
                                        $('#txt_pass').css({'border-color':'red'}); 
                                        $('#txt_veripass').css({'border-color':'red'}); 
                                             }
                                    });       
                                              
                        
                        
                        
                                    $('#password').change(function(){
                                        var pass1 = $("#password").val();
                                        var pass2 = $("#password1").val();
                                               if (pass1 != pass2) {
                                                   $('#password').css({'border-width':'2px'}); 
                                                  $('#password1').css({'border-width':'2px'}); 
                                                  $('#password').css({'border-style':'solid'}); 
                                                  $('#password1').css({'border-style':'solid'}); 
                                                  $('#password').css({'border-color':'red'}); 
                                                  $('#password1').css({'border-color':'red'}); 
                                                 } else {     
                                                  $('#password').css({'border-width':'thin'}); 
                                                  $('#password1').css({'border-width':'thin'}); 
                                                  $('#password').css({'border-style':'solid'}); 
                                                  $('#password1').css({'border-style':'solid'}); 
                                                  $('#password').css({'border-color':'#D6DBDF'}); 
                                                  $('#password1').css({'border-color':'#D6DBDF'}); 
                                                      }
                                                });
                                     $('#password1').change(function(){
                                        var pass1 = $("#password").val();
                                        var pass2 = $("#password1").val();
                                                 if (pass1 == pass2) {
                                                    $('#password').css({'border-width':'thin'}); 
                                                    $('#password1').css({'border-width':'thin'}); 
                                                    $('#password').css({'border-style':'solid'}); 
                                                    $('#password1').css({'border-style':'solid'}); 
                                                    $('#password').css({'border-color':'#D6DBDF'}); 
                                                    $('#password1').css({'border-color':'#D6DBDF'});   
                                                 } else {
                                                    $('#password').css({'border-width':'2px'}); 
                                                    $('#password1').css({'border-width':'2px'}); 
                                                    $('#password').css({'border-style':'solid'}); 
                                                    $('#password1').css({'border-style':'solid'}); 
                                                    $('#password').css({'border-color':'red'}); 
                                                    $('#password1').css({'border-color':'red'}); 
                                                         }
                                                });  