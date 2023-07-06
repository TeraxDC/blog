/**
 * funcion para eliminar datos
 */
function eliminar_datos(parametros,url,tipo) {
   $.ajax({
                                        data:  parametros,
                                        url:   url,
                                        type:  tipo,
                                        success:  function (response) {
                                                alert("Eliminado Correctamente");
                                                location.reload();
                                        },
                                        error:function(xhr, status, error){
                                            alert(xhr.responseText);
                                        }
                                }); 
}

