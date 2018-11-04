<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionXML
 *
 * @author master
 */  


class GestionXML {
    //put your code here
 public function leerxml2(){
$canciones = simplexml_load_file("./XMLPage/xmlCatalogo.xml");
foreach($canciones as $cancion)
{
    if($cancion->Codigo=="2049"){
echo "Codigo: " . $cancion->Codigo; echo "<br>";
echo "DetalleCodigo: " . $cancion->DetalleCodigo; echo "<br>";
echo "Titulo: " . $cancion->Titulo; echo "<br>"; echo "<br>";
echo "introduccionNoticia: " . $cancion->introduccionNoticia; echo "<br>"; echo "<br>";
echo "mensajeNoticia: " . $cancion->mensajeNoticia; echo "<br>"; echo "<br>";
echo "foto: " . $cancion->foto; echo "<br>"; echo "<br>";
echo "url: " . $cancion->url; echo "<br>"; echo "<br>";
echo "xml: " . $cancion->xml; echo "<br>"; echo "<br>";
echo "fecha: " . $cancion->genero; echo "<br>"; echo "<br>";
echo "url: " . $cancion->genero; echo "<br>"; echo "<br>";
echo "Autor: " . $cancion->autor; echo "<br>"; echo "<br>";
}
 }}
 
}
?>