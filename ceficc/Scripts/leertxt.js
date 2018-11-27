 <script>
  
   function inicializar_XHR(){
if(window.XMLHttpRequest){
	peticionHTTP = new XMLHttpRequest();
}else{
	peticionHTTP= new ActiveXObject("Microsoft.XMLHTTP");
}
}

function realizarPeticion(url, metodo, funcion){
//Definir una funcion de coo actuar
	peticionHTTP.onreadystatechange= funcion;
	//realizar la peticion
	peticionHTTP.open(metodo, url, true);
	peticionHTTP.send(null);
}
function edit(){
	alert("actuando");
inicializar_XHR();
realizarPeticion('../manager/archivo.txt', 'GET', funcionActuadora);

}

function funcionActuadora(){
if(peticionHTTP.readyState==4)
	if(peticionHTTP.status==200)
		hacerAlgo();
	document.write(peticionHTTP.responseText);

}
 
windows.onload=descargarArchivo;  
</script>