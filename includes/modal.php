<!--INICIO POPU-->  

   <div class="modal fade" id="exampleModal"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="AccionModal"></h1>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
          <h1 class="modal-title" id="AccionModal">Convenio</h1><!--ubique esta linea aqui, porque me pario mejor-->
          
      </div>
      <div class="modal-body" style="background-color:lightblue" >
 <span id="nombreprograma"></span>
<div id="divImagenPrevia"> <span  id="demo" > No hay Imagen Seleccionada</span></div>
            <table>
            <tr>
                <td class="col1TabProgr">
                    Nombre del programa:</td>
                <td >
                    <input id="nombreprograma2" class="TextalignRight" type="text"   /></td>
            </tr>
                <tr>
                <td class="col1TabProgr">
                    Horas del programa

                </td>
                <td class="lignRight">
                   <input id="horasPrograma" class="TextalignRight" value=" <?php $cancion->Titulo?> " type="text" />

                </td>

               
            </tr>
           
         
                <tr>
                    <td class="col1TabProgr">Objetivo General</td>
                    <td class="lignRight">
                        <input id="ObjetivoGeneralPrograma" class="TextalignRight" type="text"  />
                    </td>
                </tr>
                <tr>
                    <td class="col1TabProgr">Objetivos específicos</td>
                    <td class="lignRight">
                        <textarea id="ObjetivosEspecificosPrograma" class="TextalignRight" rows="5" cols="50"  wrap="hard" ></textarea>
                    </td>
                </tr>
           
         
        </table>

      </div>

        <div class="modal-footer">
         <button type="button" id="btnGrabarPrograma" class="btn btn-success" >Grabar</button>
         <button type="button" class="btn btn-default"   data-dismiss="modal">Cerrar</button>
               <span class="anchoControl" id="LabelCodigoPrograma" ></span>
      </div>
    </div>
  </div> <input id="btnOkay" value="Done" type="button" style="display: none;" />
                    <input id="btnCancel" value="Cancel" type="button" style="display: none;" />
</div>

<!--FIN POPU--> 