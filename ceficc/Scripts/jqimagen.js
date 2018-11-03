

function enviaimagen(){
var parametros	= new formData($("#formimagen")[0]);
$.ajax({
	data: parametros,
	url:"..manager/manager_imagen.php",
	type:"POST",
	contentType:false,
	beforeSend: function(){
		
		},
		success: function(response){
			alert(resonse);
			}
	
	});	
	}
	

	