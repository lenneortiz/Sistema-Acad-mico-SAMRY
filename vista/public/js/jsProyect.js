/*$('.articulo').jrumble({
                          x: 6,
                          y: 6,
                          rotation: 1,
                          speed: 0
                          });
                          var demoTimeout;
                          $this = $(this);
                          clearTimeout(demoTimeout);
                          $this.trigger('startRumble');
                          demoTimeout = setTimeout(function(){$this.trigger('stopRumble');}, 400)*/


		$(document).on('ready',function(){ 


 ///////////////////////// boton que llama a el menu de plantel y ambiente///////////////////////////////////////////
$("#botones-menu-superior").delegate('#plantel-ambiente','click',function(event){

  $('.modulo').load(url+'vista/plantel_ambiente.php?vistaP_A=1',function(){

        $('.list-menu-izquierdo').delegate('#add-plantel','click',function(){

              $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=2',function(){

                  $('#form-user').delegate('#submit-agregar-plantel','click',function(event){
                    event.preventDefault();
                      var data = $('#form-user').serialize();

                    $.ajax({
                            url:url+'control/addPlanteleControl.php',
                            data:
                            {
                                'tipo':'insert',
                                'nom_plantel':$('#nom_plantel').val(),
                                'direcc_plantel':$('#direcc_plantel').val(),
                                'estado':$('#estado').val(),
                                'municipio':$('#municipio').val(),
                                'parroquia':$('#parroquia').val(),
                                'codigo_plantel':$('#codigo_plantel').val(),
                                'plan_de_estudio':$('#plan_de_estudio').val()
                                
                            },
                            type:'POST',
                            dataType:'json',
                            contenType:'x-www-form-urlencoded',
                            async:true,
                            cache:false,
                            beforeSend:function(){

                                $('#bloqueo').show();
                            },
                            error:function(objeto,error){
                                console.log(error);
                                $('#bloqueo').hide();
                            },
                            success:function(resp){
                              $('#bloqueo').hide();
                              console.log(resp);
                              if(resp[0]==1){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('El plantel ha sido registrado con exito ');
                                $('#form-user').resetform();

                              }else if(resp[0]==2){
                                  $('#add-User').dialog("open");
                                  $('.resp-add-User').text('existen campos vacios,por favor verifique.');

                              }else if(resp[0]==3){
                                    $('#add-User').dialog("open");
                                    $('.resp-add-User').text('ha ocurrido un error en la consulta.');

                              }else if(resp[0]==4){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('El plan de estudio es incorrecto.');

                              }else if(resp[0]==5){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('El nombre del  plantel ya se encuentra asignado a un Plantel.');

                              }
                            },
                            complete:function(){


                            }

                          });
                  })
              });
        });




$('#update-plantel').on('click',function(){

     $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=3',function(){

                $('#data-select-id-user').delegate('#select-buscar-plantel','click',function(event){

                        event.preventDefault();
                        var id_plantel = $('#select-data-user').val();
                        $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=4&id_plantel='+id_plantel,function(){

                          var data = $('#form-user').serialize();
                          $('#form-user').delegate('#submit-editar-plantel','click',function(event){
                            event.preventDefault();
                            
                            
                            $.ajax({
                        
                              url:url+'control/editPlantelControl.php',
                              data:
                              {
                                'tipo' : 'update',
                                'nom_plantel':$('#nom_plantel').val(), 
                                'direcc_plantel':$('#direcc_plantel').val(), 
                                'estado':$('#estado').val(), 
                                'municipio':$('#municipio').val(), 
                                'parroquia':$('#parroquia').val(), 
                                'codigo_plantel':$('#codigo_plantel').val(), 
                                'plan_de_estudio':$('#plan_de_estudio').val(), 
                                'id_plantel':$('#id_plantel').val(), 


                              },
                              type:'POST',
                              cache:false,
                              contentType:"application/x-www-form-urlencoded",
                              dataType:'json',
                              async:true,
                              beforeSend:function(objeto){
                                 $('#bloqueo').show();
                              },
                              error:function(objeto,error){
                                 $('#bloqueo').hide();
                              console.log(error);
                              },
                              success:function(resp){
                              $('#bloqueo').hide();
                              console.log(resp);
                              if(resp[0]==1){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('Los datos han sido actualizados correctamente ');
                                //$('#form-user').resetform();

                              }else if(resp[0]==2){
                                  $('#add-User').dialog("open");
                                  $('.resp-add-User').text('existen campos vacios,por favor verifique.');

                              }else if(resp[0]==3){
                                    $('#add-User').dialog("open");
                                    $('.resp-add-User').text('ha ocurrido un error en la consulta.');

                              }else if(resp[0]==4){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('El plan de estudio es incorrecto.');

                              }else if(resp[0]==5){
                                $('#add-User').dialog("open");
                                $('.resp-add-User').text('El nombre del  plantel ya se encuentra asignado a un Plantel.');

                              }
                              
                              },
                              complete:function(objeto){
                        
                              
                            },
                        
                            });//fin de ajax


                          });

                        });
                });

     });


});

////////////////boton que llama al formulario de agregar ambiente/////////////////
$('#add-ambiente').on('click',function(){

    $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=5',function(){

		    $("select#id_cohorte").change(function(){
		     var id_cohorte=$(this).find(":selected").val();
		            //alert(id_cohorte);

		            		$('select#id_semestre').load(url+'control/periodo_Id_control.php?id_cohorte='+id_cohorte,function(){

		            			if($('#id_semestre').val()==""){

		            			$('#add-User').dialog("open");
                                $('.resp-add-User').text('Disculpe no se puede asignar un semestre al ambiente,ya que no hay ninguno asociado al cohorte seleccionada');
	

		            			}

		            		});

		     			 
		    });

		   $('#form-user').delegate('#submit-agregar-ambiente','click',function(event){
             event.preventDefault();
             	 if(callbacks.validaformAmbiente()== false){

                                      return false;

                                     }else{
                                                      //alert('submit')
                                                      $.ajax({

                                               url:url+'control/addAmbienteControl.php',
                                              data:
                                              {
                                                'tipo':'insert',
                                                  /*1*/'nombre_ambiente':$('#nombre_ambiente').val(),
                                                  /*2*/'tipo_ambiente':$('#tipo_ambiente').val(),
                                                  /*3*/'turno_clase':$('#turno_clase').val(),
                                                  /*4*/'horario_clase':$('#horario_clase').val(),
                                                  /*5*/'id_user_facilitador':$('#id_user_facilitador').val(),
                                                  /*6*/'id_user_coordinador':$('#id_user_coordinador').val(),
                                                  /*7*/'id_user_vocero':$('#id_user_vocero').val(),
                                                  /*8*/'id_cohorte':$('#id_cohorte').val(),
                                                  /*9*/'id_semestre':$('#id_semestre').val(),
                                                  /*10*/'id_plantel':$('#id_plantel').val(),
                                              },
                                              type:'POST',
                                              dataType:'json',
                                              contentType:'application/x-www-form-urlencoded',
                                              async:true,
                                              cache:false,
                                              beforeSend:function(){
                                                  $('#bloqueo').show();
                                              },
                                              error:function(obeto,error){
                                                $('#bloqueo').hide();
                                                console.log(error);
                                              },
                                              success:function(resp){
                                                $('#bloqueo').hide();
                                                if(resp[0]=='1'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('Registrado un nuevo Ambiente con exito');
                                                  $('#form-user').resetform();

                                                }else if(resp[0]=='2'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('ha ocurrido un erro el  Ambiente no pudo ser registrado');

                                                }else if(resp[0]=='3'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('Disculpe el nombre del Ambiente ya esta asignado a un registro');
                                                }
                                                console.log(resp);
                                              },
                                              complete:function(){

                                              }

                                        });//fin ajax

                                                }//fin de la validacion

            });//fin del submit

		});

    
});
//////////////////fi  de boton que llama al formulario de agregar ambiente///////////////////////





////////////////// boton que llama al formulario de busqueda de ambiente///////////////////////
$('.list-menu-izquierdo').delegate('#update-ambiente','click',function(){

  //alert();

      $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=6',function(){


        if($('#select-data-user').val().length > 0){

                $('#data-select-id-user').delegate('#select-buscar-ambiente','click',function(event){
                event.preventDefault();
                var id_ambiente=$('#data-select-id-user').find(":selected").val();



                $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=7&id_ambiente='+id_ambiente,function(){
                     $("select#id_cohorte").change(function(){
                      var id_cohorte=$(this).find(":selected").val();
            //alert(id_cohorte);

                      

                  });


                      //boton que llama a la consulta de matriales asignados al ambiente
                       $('.ui-widget-header').on('click',function(event){

                        var id_ambiente = $('.ui-widget-header').attr('data-idambiente');
                      
                        //alert(id_ambiente);

                       if(id_ambiente.length > 0 || isNumeric(id_ambiente)){

                        //alert(id_ambiente);

                        //si la variable id_ambiente tiene un valor llamos el formulario que tiene los datos de los materiales
                        //asignados al ambiente
                         $('#modal').load(url+'vista/plantel_ambiente.php?vistaP_A=9&id_ambiente='+id_ambiente,function(){

                            $('#bloqueado').removeClass('pantalla_modal_hide');
                            $('#bloqueado').addClass('pantalla_modal_show');

                            //boton activa la edicion de materiales asignados a un ambiente
                            $('#submit-activar-edit-materiales').on('click',function(event){
                            	event.preventDefault();
                            	//alert('submit');
                            	 var valor_submit = $(this).val();
                            	 $(this).removeAttr('type');
                            	 $(this).removeAttr( valor_submit);
                            	
                            	 $("input:text").prop("readonly","");
                            	 $(this).attr('type','submit');
                            	 $(this).val('Actualizar');
                            	 $(this).attr('id','submit-edit-materiales');


                            	 //bonton que envia los datos para ser actualizados
                            	$('#submit-edit-materiales').on('click',function(event){
                            		event.preventDefault();
                            		if(callbacks.validarFormMateriales() == false){
                            			return false;

                            		}else{
 									 $.ajax({
		                                  url:url+'control/editMaterialesAsignadosControl.php',
		                                  data:
		                                  {
		                                    'tipo':'update',
		                                    'id_ambiente':$('#id_ambiente').val(),
		                                    'fec_asig_dvd':$('#fec_asig_dvd').val(),
		                                    'marca_dvd':$('#marca_dvd').val(),
		                                    'modelo_dvd':$('#modelo_dvd').val(),
		                                    'serial_dvd':$('#serial_dvd').val(),
		                                    'serial_ribas_dvd':$('#serial_ribas_dvd').val(),

		                                    'fec_asig_tv':$('#fec_asig_tv').val(),
		                                    'marca_tv':$('#marca_tv').val(),
		                                    'modelo_tv':$('#modelo_tv').val(),
		                                    'serial_tv':$('#serial_tv').val(),
		                                    'serial_ribas_tv':$('#serial_ribas_tv').val(),

		                                    'fec_asig_folleto':$('#fec_asig_folleto').val(),
		                                    'cantidad_folleto':$('#cantidad_folleto').val(),
		                                    'kit_video_clase':$('#kit_video_clase').val(),
		                                    
		                                  },
		                                  type:'POST',
		                                  dataType:'json',
		                                  contentType:'application/x-www-form-urlencoded',
		                                  async:true,
		                                  cache:false,
		                                  beforeSend:function(){
		                                      $('#bloqueo').show();
		                                  },
		                                  error:function(objeto,error){
		                                     $('#bloqueo').hide();
		                                    console.log(error);
		                                  },
		                                  success:function(resp){
		                                     $('#bloqueo').hide();
		                                    console.log(resp);
		                                    if(resp[0]=='1'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('Los materiales asignados al Ambiente fueron modificados con exito');
                                                  $(".hide").hide( "explode",{pieces: 8 }, 1000 ); 
                                				$('#bloqueado').removeClass('pantalla_modal_show');

                                                }else if(resp[0]=='2'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').html('ha ocurrido un error los materiales del  Ambiente no pudieron ser modificados');

                                                }
		                                    
		                                  },
		                                  complete:function(){

		                                  }

	                            		});//fin ajax                           		
                            		}//fin de la condicion
                            		
                            	}); //fin de bonton que envia los datos para ser actualizados


                            });//fin del boton que activa la edicion

                                $('.boton-cancelar').on('click',function(){
                                $(".hide").hide( "explode",{pieces: 8 }, 1000 ); 
                                $('#bloqueado').removeClass('pantalla_modal_show');
                                });
                          });//fin de la llama del formulario

                       }else{
                       		 $('#add-User').dialog("open");
                             $('.resp-add-User').text('No se encontro el ambiente');
                        
                       }

                         
                       });//fin de boton que llama a la consulta de matriales asignados al ambiente

						$("select#id_cohorte").change(function(){
		     var id_cohorte=$(this).find(":selected").val();
		           // alert(id_cohorte);

		            		$('select#id_semestre').load(url+'control/periodo_Id_control.php?id_cohorte='+id_cohorte,function(){

		            			if($('#id_semestre').val()==""){

		            			$('#add-User').dialog("open");
                                $('.resp-add-User').text('Disculpe no se puede asignar un semestre al ambiente,ya que no hay ninguno asociado al cohorte seleccionada');
	

		            			}

		            		});

		            		});




                      $('#submit-edit-ambiente').on('click',function(event){
                        event.preventDefault();
                                   if(callbacks.validaformAmbiente()== false){

                                      return false;

                                     }else{
                                        $.ajax({

                                               url:url+'control/editAmbienteControl.php',
                                              data:
                                              {
                                                 'tipo':'update',
                                              /*1*/'nombre_ambiente':$('#nombre_ambiente').val(),
                                              /*2*/'tipo_ambiente':$('#tipo_ambiente').val(),
                                              /*3*/'turno_clase':$('#turno_clase').val(),
                                              /*4*/'horario_clase':$('#horario_clase').val(),
                                              /*5*/'id_user_facilitador':$('#id_user_facilitador').val(),
                                              /*6*/'id_user_coordinador':$('#id_user_coordinador').val(),
                                              /*7*/'id_user_vocero':$('#id_user_vocero').val(),
                                              /*8*/'id_cohorte':$('#id_cohorte').val(),
                                              /*9*/'id_semestre':$('#id_semestre').val(),
                                              /*10*/'id_plantel':$('#id_plantel').val(),
                                              /*11*/'id_ambiente':$('#id_ambiente').val(),
                                              },
                                              type:'POST',
                                              dataType:'json',
                                              contentType:'application/x-www-form-urlencoded',
                                              async:true,
                                              cache:false,
                                              beforeSend:function(){
                                                  $('#bloqueo').show();
                                              },
                                              error:function(obeto,error){
                                                $('#bloqueo').hide();
                                                console.log(error);
                                              },
                                              success:function(resp){
                                                $('#bloqueo').hide();
                                                if(resp[0]=='1'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('El Ambiente se ha actualizado con exito');
                                                  //$('#form-user').resetform();

                                                }else if(resp[0]=='2'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('ha ocurrido un erro el  Ambiente no pudo ser actualizado');

                                                }else if(resp[0]=='3'){
                                                  $('#add-User').dialog("open");
                                                  $('.resp-add-User').text('Disculpe el nombre del Ambiente ya esta asignado a un registro');
                                                }
                                                console.log(resp);
                                              },
                                              complete:function(){

                                              }

                                        });//fin ajax
                                       


                                    }//fin de la funcion de validacion

                               
                      });

                  

                });
                //alert(id_ambiente);
              });

              }else{
                 
                $('#select-buscar-ambiente').attr('disabled','disabled');


              }

              

      });

});///////////// fin de boton que llama al formulario de busqueda de ambiente///////////////////////








////////////boton para llamar al formulario de asignar materiales  a un ambiente//////////////
$('#add-materiales-ambiente').on('click',function(){

          $('.articulo').load(url+'vista/plantel_ambiente.php?vistaP_A=8',function(){
                      callbacks.calendario("#fec_asig_dvd");//funcion que muestra el calendario
                      callbacks.calendario("#fec_asig_tv");//funcion que muestra el calendario
                      callbacks.calendario("#fec_asig_folleto");//funcion que muestra el calendario

                      $('#form-user').delegate('#submit-agregar-materiales','click',function(event){
                        event.preventDefault();
                        //alert('submit');
                        if(callbacks.validarFormMateriales()==false){

                            return false;
                        }else{  

                            //alert('addMatrialesControl.php');
                            $.ajax({
                                  url:url+'control/addMatrialesControl.php',
                                  data:
                                  {
                                    'tipo':'insert',
                                    'id_ambiente':$('#id_ambiente').val(),
                                    'fec_asig_dvd':$('#fec_asig_dvd').val(),
                                    'marca_dvd':$('#marca_dvd').val(),
                                    'modelo_dvd':$('#modelo_dvd').val(),
                                    'serial_dvd':$('#serial_dvd').val(),
                                    'serial_ribas_dvd':$('#serial_ribas_dvd').val(),

                                    'fec_asig_tv':$('#fec_asig_tv').val(),
                                    'marca_tv':$('#marca_tv').val(),
                                    'modelo_tv':$('#modelo_tv').val(),
                                    'serial_tv':$('#serial_tv').val(),
                                    'serial_ribas_tv':$('#serial_ribas_tv').val(),

                                    'fec_asig_folleto':$('#fec_asig_folleto').val(),
                                    'cantidad_folleto':$('#cantidad_folleto').val(),
                                    'kit_video_clase':$('#kit_video_clase').val(),
                                    
                                  },
                                  type:'POST',
                                  dataType:'json',
                                  contentType:'application/x-www-form-urlencoded',
                                  async:true,
                                  cache:false,
                                  beforeSend:function(){
                                      $('#bloqueo').show();
                                  },
                                  error:function(objeto,error){
                                     $('#bloqueo').hide();
                                    console.log(error);
                                  },
                                  success:function(resp){
                                     $('#bloqueo').hide();
                                    console.log(resp);
                                    if(resp[0]=='1'){
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Disculpe ya existen materiales asignados al Ambiente');
                                      //$('#form-user').resetform();

                                    }else if(resp[0]=='2'){
                                       $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Los materiales fueron asignados al Ambiente con exito');
                                      //$('#form-user').resetform();

                                    }else if(resp[0]=='3'){

                                    	$('#add-User').dialog("open");
                                      	$('.resp-add-User').text('Los materiales no pudieron ser asignado al Ambiente');
                                    }
                                  },
                                  complete:function(){

                                  }

                            });//fin ajax

                        }
                        
                      });
          });


});////////////fin de boton para llamar al formulario de asignar materiales  un ambiente//////////////





  });/////fin del load() que cargar el menu ambiente plantel



});/////////fin de  boton que llama a el menu de plantel y ambiente///////////////////////////////////////////








 ///////////////////////// boton que llama a el menu de cohorte y semestre///////////////////////////////////////////
$("#botones-menu-superior").delegate('#cohorte-semestre','click',function(event){

    $('.modulo').load(url+'vista/cohorte_semestre.php?vista_C_S=1',function(){

                      $('.list-menu-izquierdo').delegate('#crear-periodo','click',function(){

                            $('.articulo').load(url+'vista/cohorte_semestre.php?vista_C_S=2',function(){
                                callbacks.calendario_periodo('#fec_inic_cohorte');
                                callbacks.calendario_periodo('#fec_fin_cohorte');

                                $('#form-user').delegate('#submit-agregar-cohorte','click',function(event){
                                  event.preventDefault();
                                  if(callbacks.validaFormCohorte()==false){
                                    return false;

                                  }else{

                                    //alert('submit');
                                    $.ajax({
                                      url:url+'control/addCohorteControl.php',
                                      data:
                                      {
                                        'tipo':'insert',
                                        'nom_cohorte':$('#nom_cohorte').val(),
                                        'tipo_cohorte':$('#tipo_cohorte').val(),
                                        'estado_cohorte':$('#estado_cohorte').val(),
                                        'fec_inic_cohorte':$('#fec_inic_cohorte').val(),
                                        'fec_fin_cohorte':$('#fec_fin_cohorte').val(),
                                      },
                                      type:'POST',
                                      dataType:'json',
                                      contentType:'application/x-www-form-urlencoded',
                                      cache:false,
                                      async:true,
                                      beforeSend:function(){
                                        $('#bloqueo').show();
                                      },
                                      error:function(objeto,error){
                                         $('#bloqueo').hide();
                                         console.log(error);
                                      },
                                      success:function(resp){
                                        $('#bloqueo').hide();
                                        if(resp[0]==1){
                                            $('#add-User').dialog("open");
                                            $('.resp-add-User').text("Se ha registrado con exito")
                                            $('#form-user').resetform();
                                        }else if(resp[0]==2){
                                            $('#add-User').dialog("open");
                                            $('.resp-add-User').text("No se podido registrar la cohorte")
                                        }else if(resp[0]==3){
                                            $('#add-User').dialog("open");
                                            $('.resp-add-User').text("Disculpe el nombre de la cohorte ya se encuentra asignado a un registro,debe de agregar otro nombre")
                                        }
                                        console.log(resp);

                                      },
                                      complete:function(){

                                      }

                                    });//fin ajax
                                  }
                                  
                                });

                            });
                      });


          ////////////////////////boton de modificacion la cohorte//////////////////////////////////////
        $('.list-menu-izquierdo').delegate('#modificar-cohorte','click',function(){

              $('.articulo').load(url+'vista/cohorte_semestre.php?vista_C_S=3',function(){

                  $('#form').delegate('#select-buscar-cohorte','click',function(event){
                    event.preventDefault();
                    var id_cohorte = $('#id_cohorte').val();
                    //alert(id_cohorte);

                        if($('select#id_cohorte').val().length > 0){
                          $('#select-buscar-cohorte').removeAttr('disabled');
                          $('.articulo').load(url+'vista/cohorte_semestre.php?vista_C_S=4&id_cohorte='+id_cohorte,function(){
                            callbacks.calendario('#fec_inic_cohorte');
                            callbacks.calendario('#fec_fin_cohorte');
                            
                                  $('#form-user').delegate('#submit-edit-cohorte','click',function(event){
                                      event.preventDefault();

                                      if(callbacks.validaFormCohorte()==false){
                                    return false;

                                  }else{

                                    $.ajax({
                                           url:url+'control/editCohorteControl.php',
                                          data:
                                          {
                                              'tipo':'update',
                                              'id_cohorte':$('#id_cohorte').val(),
                                              'nom_cohorte':$('#nom_cohorte').val(),
                                              'tipo_cohorte':$('#tipo_cohorte').val(),
                                              'estado_cohorte':$('#estado_cohorte').val(),
                                              'fec_inic_cohorte':$('#fec_inic_cohorte').val(),
                                              'fec_fin_cohorte':$('#fec_fin_cohorte').val(),
                                          },
                                          type:'POST',
                                          dataType:'json',
                                          contentType:'application/x-www-form-urlencoded',
                                          async:true,
                                          cache:false,
                                          beforeSend:function(){
                                            $('#bloqueo').show();
                                          },
                                          error:function(objeto,error){
                                            $('#bloqueo').hide();
                                            console.log(error);
                                          },
                                          success:function(resp){
                                            $('#bloqueo').hide();
                                            console.log(resp);
                                            if(resp[0]==1){
                                              $('#add-User').dialog("open");
                                              $('.resp-add-User').text("los datos han sido actualizado")
                                            }else if(resp[0]==2){
                                              $('#add-User').dialog("open");
                                              $('.resp-add-User').text("los datos no pudieron ser actualizado")

                                            }
                                          },
                                            
                                            });//fin ajax
                                  }//fin de la concion

                                    

                                  });
                            });

                        }else{

                              $('#select-buscar-cohorte').attr('disabled','disabled');

                        }
                  })
              });

        });////////////////////////boton de modificacion de cohorte//////////////////////////////////////

        //////////////////boton que llama el formulario de creacion de semestre//////////////////////////////////////
        $('.list-menu-izquierdo').delegate('#crear-semestre','click',function(){

              $('.articulo').load(url+'vista/cohorte_semestre.php?vista_C_S=5',function(){

                    callbacks.calendario_periodo('#fec_inic_semestre');
                    callbacks.calendario_periodo('#fec_fin_semestre');

                    $('#id_cohorte').change(function(){
						var 	nombre_cohorte	=	$(this).find(":selected").text();
                    	var 	letra 		= 	nombre_cohorte.substring(16);     // porcion = "ndo"
						var letra_sin_espacio = $.trim(letra );
                    	

    				if(letra_sin_espacio == 'B'){

    		 		$('#div_select_semestre').html('<label>Nombre de semestre:</label><select style="width:50%" name="nombre_semestre" id="nombre_semestre"><option value="">Seleccione</option><option value="semestre-3">semestre-3</option><option value="semestre-4">semestre-4</option></select>');
    		 		
    		 	//alert('A');
    				}else{
    				
    				$('#div_select_semestre').html('<label>Nombre de semestre:</label><select style="width:50%" name="nombre_semestre" id="nombre_semestre"><option value="">Seleccione</option><option value="semestre-1">semestre-1</option><option value="semestre-2">semestre-2</option>');
    				
    				//alert('B');
    				}
                    	

                    });
                    $('#form-user').delegate('#submit-agregar-semestre','click',function(event){
                    	event.preventDefault();
                    	if(callbacks.validar_form_semestre() == false){
                    		return false;

                    	}else{
                                      Boolean(NaN); //false
                                      Boolean(undefined); //false
                                      Boolean(null); //false
                                      Boolean(1); //true

                    		          
                       		      /*var  semana = $('input#semana[type=text]').map(function() {
                			           return $(this).attr('value');
                			           }).get().join('');*/
                			
                                      //valor de materia
                                      var  data_materia = $( "input#materia[type=checkbox]:checked" ).map(function() {
                                        return $( this ).val();
                                      }).get()
                                      var data1 = data_materia.filter(Boolean);  
                                      var id_materia = $.merge([], data1);
                                     
                                     //valor de horas
                                      var data_horas = $( "input#horas" ).map(function() {
                                        return $( this ).val();
                                      }).get()
                                      var data2 = data_horas.filter(Boolean);  
                                      var horas = $.merge([], data2);

                                      //valor de semanas
                                      var data_semana = $( "input#semana" ).map(function() {
                                        return $( this ).val();
                                      }).get()
                                      var data3 = data_semana.filter(Boolean);  
                                      var semana = $.merge([], data3);

                                      //valor de semanas
                                      var data_video_clase = $( "input#video_clase" ).map(function() {
                                        return $( this ).val();
                                      }).get()
                                      var data4 = data_video_clase.filter(Boolean);  
                                      var video_clase = $.merge([], data4);
                                  //console.log(horas);
                                  //console.log(id_materia);

                      			     $.ajax({
                                  url:url+'control/addSemestreControl.php',
                                  data:
                                  {
                                    'tipo':'insert',
                                     'id_cohorte':$('#id_cohorte').val(),
                                     'nombre_semestre':$('#nombre_semestre').val(),
                                     'numero_semestre':$('#numero_semestre').val(),
                                     'fec_inic_semestre':$('#fec_inic_semestre').val(),
                                     'fec_fin_semestre':$('#fec_fin_semestre').val(),
                                     'num_semana_duracion':$('#num_semana_duracion').val(),
                                     'materia':id_materia,
                                     'horas':horas, 
                                     'semana':semana, 
                                      'video_clase':video_clase, 
                                         
                                   },
                                   type:'POST',
                                   dataType:'json',
                                   contentType:'application/x-www-form-urlencoded',
                                   async:true,
                                   cache:false,
                                  beforeSend:function(){
                                    $('#bloqueo').show();

                                  },
                                  error:function(){
                                    console.log(error);
                                    
                                  },
                                  success:function(resp){
                                    console.log(resp);
                                    $('#bloqueo').hide();
                                    if(resp[0]=='1'){
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('El semestre se ha creado con exito');
                                     $('#form-user').resetform();


                                    }else if(resp[0]=='2'){
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('ha ocurriod un error,el semestre no pudo ser creado');

                                    }else if(resp[0]=='3'){
                                    $('#add-User').dialog("open");
                                    $('.resp-add-User').text('Disculpe el nombre del semestre ya esta asignado a un registro,por favor debe agregar otro nombre para el  semestre');

                                      

                                    }else{
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('ha ocurriod un error');

                                    }
                                    
                                    
                                  }

                        });//fin de ajax
                    		
                    		
                    	}//fin de la validacion
                    	
                    });
              });
        });

        //////////////////fi de boton que llama el formulario de creacion de semestre////////////////////////////7

    });//fin del load 1




});/////////////////// fin de boton que llama a el menu de cohorte  y semenstre//////////////////////////////////////////





///////////////////////// boton que llama a el menu de vencedor///////////////////////////////////////////

$('#opcion-menu-vencedor').on('click',function(){

		$('.modulo').load(url+'vista/vencedor.php?vistaVencedor=1',function(){

			$('.list-menu-izquierdo').delegate('#add-vencedor','click',function(){
				$('.articulo').load(url+'vista/vencedor.php?vistaVencedor=2',function(){

					callbacks.calendario('#anio_robinson_aprobado');
					callbacks.calendario('#fec_nac');

					$('#etnia').mouseenter(function(){
						 $('#modal-etnia').dialog("open");
          				
					});

						$("input[type='checkbox']").on('click',function(){

							var value_checkeado=$(this).val();
							//alert(value_checkeado);
							$('#etnia').val(value_checkeado);
							$('#modal-etnia').dialog("close");
						});

						$('#form-user').delegate('#submit-agregar-vencedor','click',function(event){
							event.preventDefault();
							if(callbacks.validar_form_vencedor()==false){

									return false;
							}else{
								//alert('submit');
								  $.ajax({
	                        			url:url+'control/addVencedorControl.php',
	                              		data:
	                              		{
	                              			'tipo' :'insert',
	                              			'estado':$('#estado').val(), 
	                              			'ci':$('#ci').val(), 
	                              			'nacionalidad':$('#nacionalidad').val(), 
	                              			'nombre1':$('#nombre1').val(), 
	                              			'nombre2':$('#nombre2').val(), 
	                              			'apellido1':$('#apellido1').val(), 
	                              			'apellido2':$('#apellido2').val(), 
	                              			'edad':$('#edad').val(), 
	                              			'fec_nac':$('#fec_nac').val(), 
	                              			'telef':$('#telef').val(), 
	                              			'lugar_nacimiento':$('#lugar_nacimiento').val(), 
	                              			'estado_nac':$('#estado_nac').val(), 
	                              			'sexo':$('#sexo').val(), 
	                              			'anio_aprobado':$('#anio_aprobado').val(), 
	                              			'anio_robinson_aprobado':$('#anio_robinson_aprobado').val(), 
	                              			'discapacidad':$('#discapacidad').val(), 
	                              			'etnia':$('#etnia').val(), 
	                              			'becado':$('#becado').val(), 
	                              			'observaciones':$('#observaciones').val(), 
	                              			'partida_naci':$('#partida_naci').val(), 
	                              			'nota_certificada_9_grado':$('#nota_certificada_9_grado').val(), 
	                              			'fotocopia_cedula':$('#fotocopia_cedula').val(), 
	                              			'foto':$('#foto').val(), 

	                              		},
	                              		type:'POST',
			                            cache:false,
			                            contentType:"application/x-www-form-urlencoded",
			                            dataType:'json',
			                            async:true,
		                            beforeSend:function(objeto){
		                              $('#bloqueo').show();
		                            },
                        			error:function(objeto,error){
			                        console.log(error);
			                        $('#bloqueo').hide();
			                        },
                        			success:function(resp){
                        			 $('#bloqueo').hide();
                                    if(resp[0]=='1'){
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('El vencedor ha sido registrado con exito ');
                                      $('#form-user').resetform();


                                    }else if(resp[0]=='2'){
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Disculpe la fecha de nacimiento ingresada no concuerda con la edad');

                                    }else if(resp[0]=='3'){
                                    $('#add-User').dialog("open");
                                    $('.resp-add-User').text('ha ocurrido un error,el nuevo vencedor no a podido ser registrado en la base de datos');

                                      

                                    }else{
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('ha ocurriod un error');

                                    }
                                    

                              		},
                        			complete:function(objeto){
                        			},
                        			timeout: 6000
                        			});//fin de ajax

							}//fin de la validacion

						});
					

							
				});

			});

			//////////////////////////////////////
			$('.list-menu-izquierdo').delegate('#update-vencedor','click',function(){

				$('.articulo').load(url+'vista/vencedor.php?vistaVencedor=3',function(){
					callbacks.tablaVencedor();
					$('#tabla').delegate('.data-vencedor','click',function(){

						var id_vencedor = $(this).attr('data-idvencedor');
						//alert(id_vencedor);
						 $('#modal').load(url+'vista/vencedor.php?vistaVencedor=4&id_vencedor='+id_vencedor,function(){
							 	callbacks.calendario();
							 	callbacks.calendario('#fec_nac');
							 	callbacks.calendario('#anio_robinson_aprobado');
							 	$('#etnia').focus(function(){
							 	$('#modal-etnia').dialog("open");
	          					});

								$("input[type='checkbox']").on('click',function(){
								var value_checkeado=$(this).val();
								//alert(value_checkeado);
								$('#etnia').val(value_checkeado);
								$('#modal-etnia').dialog("close");
								});


                             	$('#bloqueado').removeClass('pantalla_modal_hide');
                            	$('#bloqueado').addClass('pantalla_modal_show');

                             	$('.boton-cancelar').on('click',function(){
                                $(".hide").hide( "explode",{pieces: 8 }, 1000 ); 
                                $('#bloqueado').removeClass('pantalla_modal_show');
                                });

                                $('#form-user').delegate('#submit-edit-vencedor','click',function(event){
                             	event.preventDefault();
                             	$(".hide").hide( "explode",{pieces: 4 }, 1000 ); 
                                $('#bloqueado').removeClass('pantalla_modal_show');
                                $('#bloqueado').addClass('pantalla_modal_hide');

                             	if(callbacks.validar_form_vencedor()==false){

									return false;
								}else{
									//alert('submit');
									$.ajax({
										url:url+'control/editVencedorControl.php',
										data:{
											'tipo':'update',
											'nacionalidad':$('#nacionalidad').val(), 
											'nombre1':$('#nombre1').val(), 
											'nombre2':$('#nombre2').val(), 
											'apellido1':$('#apellido1').val(), 
											'apellido2':$('#apellido2').val(), 
											'edad':$('#edad').val(), 
											'fec_nac':$('#fec_nac').val(), 
											'telef':$('#telef').val(), 
											'lugar_nacimiento':$('#lugar_nacimiento').val(), 
											'estado_nac':$('#estado_nac').val(), 
											'sexo':$('#sexo').val(), 
											'anio_aprobado':$('#anio_aprobado').val(), 
											'anio_robinson_aprobado':$('#anio_robinson_aprobado').val(), 
											'discapacidad':$('#discapacidad').val(), 
											'etnia':$('#etnia').val(), 
											'becado':$('#becado').val(), 
											'observaciones':$('#observaciones').val(), 
											'partida_naci':$('#partida_naci').val(), 
											'nota_certificada_9_grado':$('#nota_certificada_9_grado').val(), 
											'fotocopia_cedula':$('#fotocopia_cedula').val(), 
											'foto':$('#foto').val(), 
											'id_vencedor':$('#id_vencedor').val(),
											'id_documento':$('#id_documento').val(),
											'estado':$('#estatus').val(),
										},
										type:'POST',
										datatype:'json',
										contentType:'application/x-www-form-urlencoded',
										async:true,
										cache:false,
										beforeSend:function(){
											$('#bloqueo').show();
										},
										error:function(objeto,error){
											console.log(error);
											$('#bloqueo').hide();
										},
										success:function(resp){
											console.log(resp);
											$('#bloqueo').hide();
											$('#add-User').dialog("open");
                                      		$('.resp-add-User').text(resp);
	
										},
										complete:function(){

										}
									});
								}
                             	
                             	});


						 });

					});
				});
			})
			//////////////////////////////////////

		});////fin del load que muestra el menu de vencedor
});///////////////////////// fin de  boton que llama a el menu de vencedor///////////////////////////////////////////












		     ///////////////////////// boton que llama a el menu de usuario///////////////////////////////////////////
		      
		      $("#botones-menu-superior").delegate('#opcion-menu-user','click',function(event){
		      	event.preventDefault();
		      	//carga de la vista 1 que muestra el menu de usuario
		      	$(".modulo").load(url+'vista/usuario.php?vistaUser=1',function(){


		      	//boton que llama al formulario de registro de usuario
		      	$(".menu-izquierdo").delegate('#nuevo-usuario','click',function(){

		      		//carga de la vista 2 que muestra el formulario de usuario
		      		$(".articulo").load(url+'vista/usuario.php?vistaUser=2',function(){
		      			callbacks.calendario("#fec_nac");//funcion que muestra el calendario

		      			//boton que envia los datos por ajax({});
		      			$("#form-user").delegate('#submit-agregar-usuario','click',function(event){
		      			event.preventDefault();
		      			//funcion que valida los datos del formulario
		      			if(callbacks.validarFormUser()==false){

		      				return false;

		      			}else{//ejecutamos el ajax

		      				$.ajax({
                                url:url+'control/addUserControl.php',
                                data:{
	                              'tipo':'insert',
	                              'cedula':$("#ci").val(),
	                              'nombre1':$("#nombre1").val(),
	                              'nombre2':$("#nombre2").val(),
	                              'apellido1':$("#apellido1").val(),
	                              'apellido2':$("#apellido2").val(),
                                'edad':$('#edad').val(),
	                              'fec_nac':$("#fec_nac").val(),
	                              'direcc':$("#direcc").val(),
	                              'usuario':$("#usuario").val(),
	                              'clave':$("#clave").val(),
	                              'estado':$("#estado").val(),
	                              'sexo':$("#sexo").val(),
	                              'perfil':$("#perfil").val(),
                                'telef':$('#telef').val(),
                                'correo':$('#correo').val(),
	                              'perfilUser':$('#perfilUser').val()

                           		 },
                                type:'POST',
                                cache:false,
                                contentType:"application/x-www-form-urlencoded",
                                dataType:'json',
                                async:true,
                                beforeSend:function(objeto){

                                  $("#bloqueo").show();
                                },
                        
                            error:function(objeto,error){

                                   $("#bloqueo").hide();
                                  $('#add-User').dialog("open");
                                  $('.resp-add-User').text("Disculpe ha ocurrido en error grave");
                                  console.log(error);
                            },
                        
                             success:function(resp){
                          
                            if(resp[0]== 1){
                                      $("#bloqueo").hide();
                                      
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('existen campos vacios,por favor verifique..');
                                    
                                  }else if(resp[0]== 2){
                                      $("#bloqueo").hide();
                                      
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('La cédula ya se encuentra asignada a un usuario,por favor debe agregar otra cédula..');
                                      

                                  }else if(resp[0]== 3){
                                      $("#bloqueo").hide();
                                     
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('El nombre de Usuario ya se encuentra asignado a un usuario,por favor debe agregar otro ..');
                                      
                                  }else if(resp[0]== 4){
                                      $("#bloqueo").hide();
                                     
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Disculpe esta opción solo esta disponible para usuarios con priveligios de Administrador ..');
                                      callbacks.resetform($('#form-user'));
                                  }else if(resp[0]==6){

                                      $("#bloqueo").hide();
                                      
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Disculpe la fecha de nacimiento ingresada no coincide con la edad');

                                  }else if(resp[0]==7){

                                    $("#bloqueo").hide();
                                      
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('la edad es correcta..');

                                  }else{

                                    $("#bloqueo").hide();
                                      
                                      $('#add-User').dialog("open");
                                      $('.resp-add-User').text('Se ha registrado con exito..');
                                      callbacks.resetform($('#form-user'));
                                  }
                          console.log(resp);

                             },
                            
                             complete:function(objeto){
                              
                             
                              
                              },
                        
                            timeout: 6000
                        
                             });//fin del metodo ajax

		      			}//fin de la funcion que valida los datos del formulario

		      			});//fin boton que envia los datos por ajax({});

		      		});//fin carga de la vista 2 que muestra el formulario de usuario

		      	});	//ifn del boton que llama al formulario de registro de usuario



	///////////////////////////boton que llama a la tabla////////////////////////////////////////////////////////////
				$(".list-menu-izquierdo").delegate('#tabla-data-usuario','click',function(event){
						event.preventDefault();
						$('.articulo').load(url+'vista/usuario.php?vistaUser=3',function(){

						callbacks.tabla();//funcion que muestra el plugin dataTable()

						$("#tabla").delegate('.ver-data-general-user','click',function(){
						event.preventDefault();
						var IdUser = $(this).attr('data-iduser');//se guarda el valor de data-iduser en una variable
						callbacks.dialogo();
						

                        //se carga el formulario de edición
                        $('#modal').load(url+'vista/usuario.php?vistaUser=6&IdUser='+IdUser,function(){

                        	callbacks.calendario("#fec_nac");
                        	$('#bloqueado').removeClass('pantalla_modal_hide');
                        	$('#bloqueado').addClass('pantalla_modal_show');


                        	//boton que esconde el formulario
							$("#form-user").delegate('.boton-cancelar','click',function(event){
                        		$("#form-user").hide( "explode",{pieces: 8 }, 1000 ); 
                            $('#bloqueado').removeClass('pantalla_modal_show');

                        	});//fin de boton que esconde el formulario

							//boton que envia los datos por ajax({});
                        	$("#form-user").delegate('#submit-edit-usuario','click',function(event){
                        		event.preventDefault();
                        		var data = $("#form-user").serialize();
                        		//funcion que valida los datos del formulario
                        		
                        if(callbacks.formEditUsrBasico()==false){

		      				return false;

		      			}else{//ejecutamos el ajax
                        
                        	$.get(url+'control/editUserControl.php',
                        		{
                        			'tipo':'update',
			                          'idUser':$("#idUser").val(),
			                          'nombre1':$("#nombre1").val(),
			                          'nombre2':$("#nombre2").val(),
			                          'apellido1':$("#apellido1").val(),
			                          'apellido2':$("#apellido2").val(),
			                          'fec_nac':$("#fec_nac").val(),
			                          'direcc':$("#direcc").val(),
			                          'estatus':$("#estatus").val(),
			                          'perfilUser':$('#perfilUser').val()
                        		},
                        		function(datos){
            					$('#add-User').dialog("open");
                                 $('.resp-add-User').text(datos);
                                 $("#form-user").hide( "explode",{pieces: 8 }, 1000 ); 
                                 $('#bloqueado').removeClass('pantalla_modal_show');
				                  console.log(datos);
				                  
           					 });


                        	}//fin de la condicion	

                        	});//fin de boton que envia los datos por ajax({});

                        });	 //fi del load que carga el formulario de edición

						});




					});//fin de load que muestra la vista 3

				});

///////////////////fin del boton que llama a la tabla/////////////////////////////////////////////////////////


////////////////////////////boton que llama a la vista 4 ///////////////////////////////////////////////////////////
				$(".menu-izquierdo").delegate('#select-data-usuario','click',function(){

					//cargar la vista la vista 4
					$(".articulo").load(url+'vista/usuario.php?vistaUser=4',function(){


							//boton que activa el submit 
							$("#data-select-id-user").delegate('#select-buscar-user','click',function(event){
							event.preventDefault();
							var IdUser= $("#select-data-user").val();
								
							$.ajax({
                                          url:url+'vista/usuario.php?vistaUser=5',
                                          data:{'IdUser' : IdUser },
                                          type:'GET',
                                          cache:false,
                                          contentType:"application/x-www-form-urlencoded",
                                          dataType:"html",
                                          async:true,

                                          beforeSend:function(objeto){

                                          $("#bloqueo").show();

                                          },
                                         error:function(objeto,error){
                                    
                                          $('.articulo').html('error de consulta,paso esto:'+error);
                                          console.log(error);
                                    },
                                         success:function(respuesta){
                                    
                                          console.log(respuesta);
                                          $("#bloqueo").hide();
                                        $('.articulo').html(respuesta);  
                                        
                                        

                                            
                                    },
                                    complete:function(){

                                      $("#form-user").on('click','#submit-edit-usuario',function(event){
                                        event.preventDefault();
                                        
                                        var data=$("#form-user").serialize();
                                        if(callbacks.validarEditAvanzado()==false){

		      								return false;

		      							}else{//ejecutamos el aja

		      								$.ajax({
                                        	url:url+'control/editAvanzadoUserControl.php',
                                        	data:
                                        	{
                                        		'tipo':'update',
					                            'nombre1':$("#nombre1").val(),
					                            'nombre2':$("#nombre2").val(),
					                            'apellido1':$("#apellido1").val(),
					                            'apellido2':$("#apellido2").val(),
                                      			'edad':$("#edad").val(),
					                            'fec_nac':$("#fec_nac").val(),
					                            'direcc':$("#direcc").val(),
					                            'usuario':$("#usuario").val(),
					                            'estado':$("#estado").val(),
					                            'perfil':$("#perfil").val(),
					                            'perfilUser':$('#perfilUser').val(),
                                      			'sexo':$('#sexo').val(),
                                      			'telef':$('#telef').val(),
                                      			'correo':$('#correo').val(),
					                            'idUser':$("#IdUser").val(),

                                        	},
                                        	type:'POST',
                                        	dataType:'json',
                                        	cache:false,
                                        	async:true,
                                        	contenType:'aplication/x-www-form-urlencoded',
                                        	beforeSend:function(){
                                        		$('#bloqueo').show();

                                        	},
                                        	error:function(objeto,error){
                                        		$('#bloqueo').hide();
                                        		console.log(error);

                                        	},
                                        	success:function(resp){
                                        		$('#bloqueo').hide();
                                        		if(resp[0]==1){

                                        				$('#add-User').dialog("open");
                                 						$('.resp-add-User').text('tiene acceso y es correcto ..');
                                        				console.log(resp);
                                        		}else if(resp[0]==2){
                                        				$('#add-User').dialog("open");
                                 						$('.resp-add-User').text('Disculpe esta opción solo esta disponible para usuarios con priveligios de Administrador ..');
                                        				console.log(resp);

                                        		}else if(resp[0]==3){
                                        				$('#add-User').dialog("open");
                                 						$('.resp-add-User').text('Actualizado con exito ..');
                                        				console.log(resp);
                                        		}else if(resp[0]==4){
                                        				$('#add-User').dialog("open");
                                 						   $('.resp-add-User').text('Los datos no fueron modificados');
                                        				console.log(resp);
                                        		}else if(resp[0]==5){
                                                $('#add-User').dialog("open");
                                               $('.resp-add-User').text('Disculpe la fecha de nacimiento ingresada no concuerda con la edad');
                                                console.log(resp);

                                            }else{

                                              $('#add-User').dialog("open");
                                               $('.resp-add-User').text('Los datos no fueron modificados');
                                                console.log(resp);
                                            }

                                        	},
                                        	complete:function(){

                                        	}
                                        });
		      							}
                                        
                                        
                                        
                                      });//fin de submit-edit-usuario
                                    }


                                    });//fin del metodo ajax.

							});//fin de boton que activa el submit 


					});//fin del load que cargar los datos de los usuarios en un select




				});
		////////////////////////////fin del boton que llama a la vista 4 ///////////////////////////////////////////////////////////

		

		});//fin del load qe carga de la vista 1 que muestra el menu de usuario


 })//fin del boton que llama a el menu de usuario

						





		


		//////////////////////////////boton que muestra el menu de materia///////////////////////////////////////////////

		$('#opcion-menu-materias-grados').on('click',function(){

			/////////////////////////// vista 1 de materia.phtml///////////////////////////////////////
			$('.modulo').load(url+'vista/materia.php?vistaMateria=1',function(){

				/////////////////////////// vista 1 de materria_grados.php///////////////////////////////////////
				$('div.menu-izquierdo ul.list-menu-izquierdo').delegate('a#admin-materias','click',function(){

						$('.articulo').load(url+'vista/materia.php?vistaMateria=2',function(){

							callbacks.tabla();//funcion que muestra el plugin dataTable()

							$("#accordion div").hide();
							  $("#accordion h5").click(function(){



							    $(this).next("div").slideToggle("slow",function(){

			////////////////////////boton que llama el formulario de edicion de materia//////////////////////////////////////////////
							    $('.edit-materia').on('click',function(){
							    var idMateria=$(this).attr('data-materia');
							    		
                                 $('.articulo').load(url+'vista/materia.php?vistaMateria=3&idmateria='+idMateria,function(){

                                 	$('form#form-materia').delegate('input#submit-edit-materia','click',function(event){
                                 		event.preventDefault();
                                 		
                                 		$.ajax({
                                          url:url+'control/editMateriaControl.php',
                                          data:{
                                          		'tipo':'update',
                                 				'IdMateria':$('#id_materia').val(),
                                 				'materia':$('#materia').val(),
                                 				'estado':$('#estado').val(),
                                          		},
                                          type:'GET',
                                          cache:false,
                                          contentType:"application/x-www-form-urlencoded",
                                          dataType:"html",
                                          async:true,

                                          beforeSend:function(objeto){

                                          $("#bloqueo").show();

                                          },
                                         error:function(objeto,error){
                                    
                                          $("#bloqueo").hide();
                                        	$('#add-User').dialog('open');
                                 			$('.resp-add-User').text('error');  
                                        
                                          console.log(error);
                                    },
                                         success:function(resp){
                                    
                                          	console.log(resp);
                                          	$("#bloqueo").hide();
                                        	$('#add-User').dialog('open');
                                 			$('.resp-add-User').text(resp);  
                                        
                                        

                                            
                                    },
                                    complete:function(){

                                     
                                    }


                                    });//fin del metodo ajax.
										

										});


							    		});

                                 });
		////////////////////fin de boton que llama el formulario de edicion de materia/////////////////////////////////

							    	/////////////////////////boton que activa el submit del formulario de registro de nueva materia////////////////////////////////////////////

							    	$('blockquote#cont-form-materia form#form-registro-materia').delegate('input#submit-agregar-materia','click',function(event){
							    	event.preventDefault();
							    	if(callbacks.validaFormMateria()==false){

							    		return false;

							    	}else{

							    	$.ajax({

                                 		url:url+'control/addMateriaControl.php',
                                 		data:{
                                 			'tipo':'insert',
                                 			'materia':$('#materia').val(),
                                 			'estado':$('#estado').val(),
                                 		},
                                 		type:'POST',
                                 		dataType:'json',
                                 		cache:false,
                                 		async:true,
                                 		contenType:'aplication/x-www-form-urlencoded',
                                 		beforeSend:function(){
                                 			$("#bloqueo").show();
                                 		},
                                 		error:function(objeto,error){
                                 			console.log(error);
                                 		},
                                 		success:function(resp){
                                 			 $("#bloqueo").hide();
                                 			if(resp[0]==1){
                                 				
                                 				$('#add-User').dialog('open');
                                 				$('.resp-add-User').text('disculpe ya existe una materia con esa descripción..');

                                 			}else if(resp[0]==2){
                                 				
                                 				$('#add-User').dialog('open');
                                 				$('.resp-add-User').text('registro exitoso..');
                                 				callbacks.resetform($('#form-materia'));
                                 			}
                                 			console.log(resp);
                                 		},
                                 		complete:function(){

                                 		}
                                 	});

							    	}
                                 	

                                 
                                 	})
       ///////////////////fin de boton que activa el submit del formulario de registro de nueva materia///////////////

		///////////////////fin de boton que activa el submit del formulario de elimininar materia//////////					    
						$('blockquote#cont-form-materia form#form-materia').delegate('input#submit-eliminar-materia','click',function(event){
							event.preventDefault();
								var Idmateria= $("select#materia").val();			
							$.get(url+'control/deleteMateriaControl.php',
								{
									'tipo':'delete',
									'idMateria':Idmateria,
								},
								function(resp){
									$('#modal-materia').dialog('open');
                  					$('.resp-modal-materia').text('Se ha eliminado la Materia');
									console.log(resp);


								});
						});





							    })
							    .siblings("div:visible").slideUp("10000");
							    $(this).toggleClass("active");
							    $(this).siblings("h5").removeClass("active");

							  });





						});
				});


			});/////////////////////////// vista 1 de materia.phtml///////////////////////////////////////


		});


		///////////////////////////////fin de boton que muestra el menu de materia///////////////////////////////////////////////////////



////////////////////boton que llama a el archivo informe.php////////////////////////////////////////////
$('#informes').on('click',function(){

	$('.modulo').load(url+'vista/informes.php?vistaInforme=1',function(){

		$('.list-menu-izquierdo').delegate('#total-semestres','click',function(){

				$('.articulo').load(url+'vista/informes.php?vistaInforme=2',function(){

						$('#id_cohorte').change(function(){
							var id_cohorte=$(this).find(':selected').val();
							//alert(id_cohorte);
							$('#id_semestre').load(url+'control/periodo_Id_control.php?id_cohorte='+id_cohorte,function(){
								$('#id_semestre').css('visibility','visible');
								if($('#id_semestre').val().length > 0){

									$('#select-buscar-semestre').css('visibility','visible');

								}else{

									$('#select-buscar-semestre').css('visibility','hidden');
								}
							
							});

						});
				});
		});

		$('.list-menu-izquierdo').delegate('#informes-materiales-asignado-ambiente','click',function(){
		
			$('.articulo').load(url+'vista/informes.php?vistaInforme=3',function(){
				$('#data-select-id-user').delegate('#submit-informe-ambiente','click',function(){
					if($('#select-data-user option:selected').val()==''){
						$('#add-User').dialog("open");
                        $('.resp-add-User').text('Debe seleccionar un ambiente');
                        return false;

					}else{

						$('#data-select-id-user').submit();


					}
				});

			});


		});
	});


});/////////fin del boton que llama a el archivo informe.php//////////////7777777

////////////////////////////////////























$("#add-User").dialog({
                        autoOpen:false,
                        title:'Mensaje',
                        modal:true,
                        resizable:false,
                        buttons:{
                          'Aceptar':function(){
                            $("#add-User").dialog("close");

                          }
                        },
                        
                            show:{
                                effect:"explode",
                                duration:900,
                                },
                            hide:{
                                effect:"explode",
                                duration:900,
                                }
                        });//fin de dialogo  

$("#modal-materia").dialog({
                        autoOpen:false,
                        title:'Mensaje',
                        modal:true,
                        resizable:false,
                        buttons:{
                          'Aceptar':function(){
                            $("#modal-materia").dialog("close");

                          }
                        },
                        
                            show:{
                                effect:"explode",
                                duration:900,
                                },
                            hide:{
                                effect:"explode",
                                duration:900,
                                }
                        });//fin de dialogo  

$("#modal-etnia").dialog({

	autoOpen:false,
	width:700,
	height:200,
   minWidth: 400,
   maxWidth: 850,
   show: "explode",
   hide: "explode",
                       
});//fin de dialogo  
		//event de llama al archivo de cerrar sesion
        $("#logout").on('click',function(){
				window.location='../control/Logoutcontrol.php';

        }) 
        //fin de event de llama al archivo de cerrar sesion

		})