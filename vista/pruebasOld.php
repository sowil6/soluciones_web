<!doctype html>
<html>
<head>
<script type="text/javascript">
function generapdf(){ //lo activas con un OnClick

	//alert(html);
	documento_="73";
	id_estudiante_="29";
location.href="./reportes/reporte_inscripcion.php?documento="+ documento_+"&id_estudiante="+id_estudiante_ ;
}
</script>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="generapdf();">Generar Pdf</button>

</body>
</html>