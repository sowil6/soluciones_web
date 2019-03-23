<!doctype html>
<html>
<head>
<script type="text/javascript">
function generapdf(){ //lo activas con un OnClick

	//alert(html);
	documento_="75482555";
	id_estudiante_="245";
location.href="reporte_inscripcion?documento="+ documento_+"&id_estudiante="+id_estudiante_ ;
}
</script>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="generapdf();">Generar Pdf</button>

</body>
</html>