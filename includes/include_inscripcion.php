<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body>
    <form method="post" class="formimagen" name="formimagen" id="formimagen" enctype="multipart/form-data"  >


  <p class="Estilo1">INGRESE DATOS DEL ESTUDIANTE</p>
  <p><strong>Tipo Indentificacion
      <label></label>
  </strong>
    <label>
    <select name="tipo" size="tipo" id="tipo">
      <option value="1">Cedula de ciudadania</option>
      <option value="2">Tarjeta de Identidad</option>
      <option value="3">Cedula Extrangeria</option>
      <option value="4">Pasaporte</option>
    </select>
    </label> 
    <label><strong>Cedula</strong>
    <input name="textcedula" type="text" id="textcedula" size="20" maxlength="20" />
    </label>
    <label><strong>Nombre</strong></label>
    <input name="textrenombre" type="text" id="textrenombre" value="" size="30" maxlength="50" />
  </p>
  <p><strong>Empresa</strong> 
   <select name="empresa" size="0" id="empresa">
     <option value="1">Ecopetrol</option>
     <option value="2">Mutual Ser EPS-s</option>
     <option value="3">MAMONAL</option>
     <option value="4">SENA</option>
    </select>
  </p>
  <p>&nbsp;</p>
 
  <p>
    <label><strong>Registrar</strong>
    <input name="guardar" type="submit" id="guardar" value="Registrar" />
    </label>
</p></form> 

</body>
</html>