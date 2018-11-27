var index_ = function(){

    /*metodos, propiedades privadas*/
    var _private = {};
    
    /*metodos, propiedades publicas*/
    var _public = {};
    
    _public.init = function(){ 
        $("#btnGrid").click(function(){
            index.getDatagrid('',1,10);
        });
    };
    
    _public.getDatagrid = function(criterio,page,regxpag){
		  var datos = '&_criterio='+criterio+'&_page='+page+'&_regxpag='+regxpag;
       
        $.ajax({
            type: "POST",
            data: datos,
            url: '../controls/Grilla.php',
            dataType: 'html',
            success: function(result){
                $('#conctainer_datagrid').html(result);
            }
        });
    };
    
    _public.edit = function(ape,nom){
        alert(ape+' - '+nom);
    };
    
    _public.check = function(ape,nom){
        alert(ape+'--'+nom);
    };
    
    return _public;
    
};

var index = new index_();


/*
$(function(){
	$("#consultar").click(function(){
	$("#receptor").text("Consultando....");
	$.post("../vista/Ejemplos_vista.php",{action:"consultar", query:$("#consultar").val()},respuesta,'json');
	
	});
	});

function respuesta(arg){
	$("#receptor").html(arg.toSource())
		$("#receptor").append(arg);
	
	}*/