

$('.button-string-random').on('click',function () {

	let _url     = '/generar-string-random';
   	let _token   = $('meta[name="csrf-token"]').attr('content');
   	/*fin de inputs para el request*/

   	//peticion ajax
   	$.ajax({

        url: _url,
        type: "POST",
        data: {
          _token: _token
        },
        success: function(response) {
        	
            if(response.code == 200) {
            	
            	console.log(response.data.validacion)
            	modalValidacion(response.data);
	            
            }

        },
        error: function(response) {
        	console.log(response.responseJSON.errors)
        }
      });
});


modalValidacion = function(data){


	
	
	if (!data.validacion.validacion) {
		mensaje ='Con las letras del string no se puede formar la palabra teonteach';

		$("#div-letras-inexistentes").show( "slow" );
	}else{
		mensaje ='Con las letras del string se puede formar teonteach';

		$("#div-letras-inexistentes").hide();
	}

	$("#message-match").text(mensaje);
	$("#string-random").val(data.string_random)
	$("#palabra-formada").val(data.validacion.palabra_formada_maxima);
	$("#letras-inexistentes").val(data.validacion.letras_inexistente);

	


	$('#exampleModalCenter').modal('show');
}

