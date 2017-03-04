 var callbacks = {
  validarFormUser: function( event ) {

  	if (!$("#ci").val().match(numeros) ) {
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_ci);
        return false;
    }   

    if($("#nombre1").val()=="" || $("#nombre1").val().match(espacios) || $("#nombre1").val().length < 2 || $("#nombre1").val().length > 20 || !$("#nombre1").val().match(letras)){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_nom1);
        return false;
    }
    if($("#nombre2").val()){
        
        if($("#nombre2").val().match(espacios) ){
	        $('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_nom2);
	        return false;
        }else if(!$("#nombre2").val().match(letras)){
			$('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_nom2);
	        return false;
        }
     }

     if($("#apellido1").val()=="" || $("#apellido1").val().match(espacios) || $("#apellido1").val().length < 3 || $("#apellido1").val().length > 8 || !$("#apellido1").val().match(letras)){
            $('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_ape1);
	        return false;
    }

    if($("#apellido2").val()){
        
        if($("#apellido2").val().match(espacios) ){
            $('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_ape2);
	        return false;
        }else if(!$("#apellido2").val().match(letras)){
        	$('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_ape2);
	        return false;
        }
     }

     if ($("#fec_nac").val()=="" || !$("#fec_nac").val().match(fecha) ) {
        	$('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_fec_nac);
	        return false;
    }

    if($("#direcc").val()==""){
        	$('#add-User').dialog("open");
	        $('.resp-add-User').html(resp_direcc);
	        return false;
    } 

    if($("#usuario").val()==""  || $("#usuario").val().length < 5 || $("#usuario").val().length > 20 ){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_user);
        return false;
    }

    if($("#clave").val()==""  || $("#clave").val().length < 5 || $("#clave").val().length > 20 ){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_clave);
        return false;
    }

    if($("#sexo option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_sexo);
        return false;
    }

    if($("#perfil option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_perfil);
        return false;
    }


  },
 
  calendario: function( event ) {
    $("#fec_nac").datepicker({
										changeMonth: true,
                                        changeYear: true,
                                        showOn: "button",
                                        buttonImage: "http://localhost/Ribas/vista/public/img/calender.png",
                                        buttonImageOnly: true,
                                        dateFormat: 'dd/mm/yy',
                                        yearRange: '-50:+0',//se puede cambiar el mes y el año en un rango de 100 años.
						});//fin del datepicker
								
  },
  tabla:function(event){

  	$("#tabla-User").dataTable({
									'bJQueryUI':true,
									'sScrollY':200,
									'sPaginationType':'full_numbers',
									"iDisplayLength": 15,//cantidad de filas a mostrar
									'oLanguage':{
												'sUrl':'http://localhost/Ribas/vista/public/js/datatables.spanish.txt'
												}
								});//fin de dataTable({})
  }
 
}//fin del callbacks