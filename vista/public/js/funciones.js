          var url ='http://localhost/Ribas/';
          var cadenatxt=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
          var email =/^[_a-zA-Z0-9-_]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})+$/;
          var numeros = /^[0-9]+$/;
          var ci =/^([1,2]?)([1-9])([\.\b\B ]?([0-9]){1,4}){2}$/;
          var fecha = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
          var letras=  /^[a-zñáéíóúA-ZÑÁÉÍÓÚ\s]+$/;
          var espacios = /\s/;
          var telef = /^\d{4}\-\d{7}$/;//ejemplo 0000-5551234
          var tel =/\((\d{3})\)\s+(\d{3})-(\d{4})/;//ejemplo(123) 555-1234
          var cohorte = /^[a-zA-Z-]{7}-\d{2}/;
           var formato_semestre = /^[a-zA-Z-]{8}-\d{1}/;
          var fecha_sistema = new Date();
          var anio = fecha_sistema.getFullYear();//anio actual
          var dia = fecha_sistema.getDate();//dia actual
          var mes = fecha_sistema.getMonth();//mes actual
          var buscar_patron_cohorte = 'cohorte-'+anio;
          //var periodo = /^[a-zA-Z-]{7}/;
          var resp_ci="Dede agregar un numero de cédula";
          var resp_nom1="El primer nombre es requerido y debe de tener un minimo de 2 caracteres y un máximo de 20,sin caracteres numéricos ni espacios en blanco....";
          var resp_nom2="El segundo nombre debe de tener un minimo de 2 caracteres, un máximo de 20,sin espacios en blanco y sin caracteres numéricos....";
          var resp_ape1="El primer apellido es requerido y debe de tener un minimo de 4 caracteres y un máximo de 20,sin caracteres numéricos ni espacios en blanco";
          var resp_ape2="El segundo apellido debe de tener un minimo de 2 caracteres, un máximo de 20,sin espacios en blanco y sin caracteres numéricos...."
          var resp_fec_nac="Debe de agregar una fecha con el formato "+dia+'/0'+mes+'/'+anio;
          var resp_direcc="Debe agregar una dirección....";
          var resp_user="el nombre de usuario es requerido y debe tener un minimo 5 caracteres y un máximo de 20";
          var resp_clave="la contraseña de usuario es requerida y debe tener un minimo 5 caracteres y un máximo de 20";
          var resp_sexo="seleccione una opción de sexo....";
          var resp_perfil="seleccione una opción de perfil....";
          var resp_estatus="seleccione una opción de estatus....";
          var resp_edad ="debe agregar una edad";
          var error="hubo un error grave";
          var nacionalidad="debe seleccionar una nacionalidad";
          var telefono = 'Debe agregar una numero de telefono como Ej:0000-1112233....';

//funciones que se ejecutaran despues de activar un evento
 var callbacks = {
  validarFormUser: function() {

   
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

      if ($("#edad").val()=="" || !$("#edad").val().match(numeros) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_edad);
          return false;
    }

     if ($("#fec_nac").val()=="" || !$("#fec_nac").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }

    if($("#telef").val()=="" || !telef.test($("#telef").val() ) ){
 
         $("#add-User").dialog("open");
        $('.resp-add-User').html(telefono);
        return false;
        
        
    }
  if($("#correo").val()=="" || !email.test($("#correo").val() ) ){

         $("#add-User").dialog("open");
        $('.resp-add-User').html('Debe agregar una dirección de correo valida....');
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

    

    var valorselect = $('#perfil option:selected').text();
    if(valorselect == 'estudiante'){

      if($('#edad').val() < 18){

        $('#add-User').dialog("open");
        $('.resp-add-User').html('el estudiante debe tener una edad mayor a 18 años');
        return false;

      }
       

    }
    if($("#direcc").val()==""){
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_direcc);
          return false;
    } 

  },
  formEditUsrBasico:function(){



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

   

    if($("#direcc").val()==""){
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_direcc);
          return false;
    } 

   

    if($("#sexo option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_sexo);
        return false;
    }

  },
   validarEditAvanzado: function() {

    if (!$("#ci").val().match(numeros) ) {
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_ci);
        return false;
    }   

    if($("#nombre1").val()=="" ){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_nom1);
        return false;
    }
    if (!$("#nombre1").val().match(letras) ) {
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
     if ($("#edad").val()=="" || !$("#edad").val().match(numeros) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_edad);
          return false;
    }

     if ($("#fec_nac").val()=="" || !$("#fec_nac").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }
    if($("#telef").val()=="" || !telef.test($("#telef").val() )){

         $("#add-User").dialog("open");
        $('.resp-add-User').html('Debe agregar una numero de telefono como Ej:0000-1112233....');
        return false;
        
        
    }
  if($("#correo").val()==""){

     if (!email.test($("#correo").val() ) ){   
         $("#add-User").dialog("open");
        $('.resp-add-User').html('Debe agregar una dirección de correo valida....');
        return false;
        
        } 
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


   var valorselect = $('#perfil option:selected').text();
    if(valorselect == 'estudiante'){

      $('#add-User').dialog("open");
        $('.resp-add-User').html('es ustudinate');
        return false;

    }


  },
  validarFormMateriales:function(){
    if ($("#fec_asig_dvd").val()=="" || !$("#fec_asig_dvd").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }
    if($("#marca_dvd").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una marca de DVD');
      return false;
    }
    if($("#modelo_dvd").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una modelo de DVD');
      return false;
    }
    if($("#serial_dvd").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar un serial de fabrica de DVD');
      return false;
    }
    if($("#serial_ribas_dvd").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una serial de Ribas para el DVD');
      return false;
    }
    if ($("#fec_asig_tv").val()=="" || !$("#fec_asig_tv").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }
    if($("#marca_tv").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una marca de TV');
      return false;
    }
    if($("#modelo_tv").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una modelo de TV');
      return false;
    }
    if($("#serial_tv").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar un serial de fabrica de TV');
      return false;
    }
     if($("#serial_ribas_tv").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar una serial de Ribas para la TV');
      return false;
    }
    if ($("#fec_asig_folleto").val()=="" || !$("#fec_asig_folleto").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }
    if($("#cantidad_folleto").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar la cantidad de folletos');
      return false;
    }
     if($("#kit_video_clase").val()==""){
      $('#add-User').dialog("open");
      $('.resp-add-User').html('Debe agregar Kit de video clases');
      return false;
    }

  },
  validar_form_semestre:function(){

    
    if($("#numero_semestre option:selected").val()=="" || !$("#numero_semestre").val().match(numeros )){
          $('#add-User').dialog("open");
          $('.resp-add-User').html('Debe asignar un numero a el semestre que coincida con el nombre del semestre seleccionado');
          return false;
    } 
    if($("#fec_inic_semestre").val()=="" || !$("#fec_inic_semestre").val().match(fecha )){
          $('#add-User').dialog("open");
          $('.resp-add-User').html('Debe asignar una fecha de inicio a el semestre con el formato 00/00/0000');
          return false;
    }
    if($("#fec_fin_semestre").val()=="" || !$("#fec_fin_semestre").val().match(fecha )){
          $('#add-User').dialog("open");
          $('.resp-add-User').html('Debe asignar una fecha fin a el semestre con el formato 00/00/0000');
          return false;
    }
    if($("#num_semana_duracion option:selected").val()=="" || !$("#num_semana_duracion").val().match(numeros )){
          $('#add-User').dialog("open");
          $('.resp-add-User').html('Debe asignar un numero de semanas a el semestre');
          return false;
    } 

  },
  validar_form_vencedor:function(){

     if (!$("#ci").val().match(numeros) ) {
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_ci);
        return false;
    } 
    if($('#nacionalidad option:selected').val()==""){
      $('#add-User').dialog("open");
        $('.resp-add-User').html(nacionalidad);
        return false;

      return false;
    }  

    if($("#nombre1").val()=="" ){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_nom1);
        return false;
    }
    if (!$("#nombre1").val().match(letras) ) {
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

     if($("#apellido1").val()=="" || $("#apellido1").val().match(espacios) || $("#apellido1").val().length < 3 || $("#apellido1").val().length > 15 || !$("#apellido1").val().match(letras)){
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
   if ($("#edad").val()=="" || !$("#edad").val().match(numeros) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_edad);
          return false;
    }
    if($('#edad').val() < 18){

        $('#add-User').dialog("open");
        $('.resp-add-User').html('el Vencedor debe tener una edad mayor a 18 años');
        return false;

      }
    if ($("#fec_nac").val()=="" || !$("#fec_nac").val().match(fecha) ) {
          $('#add-User').dialog("open");
          $('.resp-add-User').html(resp_fec_nac);
          return false;
    }
    if($("#telef").val()=="" || !telef.test($("#telef").val() ) ){
 
         $("#add-User").dialog("open");
        $('.resp-add-User').html(telefono);
        return false;
        
        
    }
    if($('#lugar_nacimiento').val()==""){
      $("#add-User").dialog("open");
      $('.resp-add-User').html('Debe agregar un lugar de nacimiento');
      return false;
    }
    if($('#estado_nac').val()==""){
      $("#add-User").dialog("open");
      $('.resp-add-User').html('Debe agregar un estado de nacimiento');
      return false;
    }
     if($("#sexo option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html(resp_sexo);
        return false;
    }
    if($("#anio_aprobado option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar el ultimo año aprobado');
        return false;
    }
    if($("#discapacidad option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si posse o no una discapacidad');
        return false;
    }
    if($("#becado option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si posse o no una beca');
        return false;
    }
    if($("#partida_naci option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si consignó o no la partidad de nacimiento');
        return false;
    }
    if($("#nota_certificada_9_grado option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si consignó o no las notas certificadas de 9 grado');
        return false;
    }
    if($("#fotocopia_cedula option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si consignó o no la fotoscopia de la cédula');
        return false;
    }
    if($("#foto option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('Debe seleccionar si consignó o no la foto');
        return false;
    }

},
 
  calendario: function( idcalender) {
    $(idcalender).datepicker({
                    changeMonth: true,
                                        changeYear: true,
                                        showOn: "button",
                                        buttonImage: url+"vista/public/img/calender.png",
                                        buttonImageOnly: true,
                                        dateFormat: 'dd/mm/yy',
                                        yearRange: '-70:+0',//se puede cambiar el mes y el año en un rango de 100 años.
            });//fin del datepicker
                
  },
   calendario_periodo: function( idcalender) {
    $(idcalender).datepicker({
                    changeMonth: true,
                                        changeYear: true,
                                        showOn: "button",
                                        buttonImage: url+"vista/public/img/calender.png",
                                        buttonImageOnly: true,
                                        dateFormat: 'dd/mm/yy',
                                        yearRange: '-0:+2',//se puede cambiar el mes y el año en un rango de 100 años.
            });//fin del datepicker
                
  },
  tabla:function(event){

    $("#tabla").dataTable({
                  'bJQueryUI':true,
                  'sScrollY':200,
                  'sPaginationType':'full_numbers',
                  "iDisplayLength": 15,//cantidad de filas a mostrar
                   "bSort": true,
                  'oLanguage':{
                        'sUrl':url+'vista/public/js/datatables.spanish.txt'
                        }
                });//fin de dataTable({})
  },
  tablaVencedor:function(event){

    $("#tabla").dataTable({
                  'bJQueryUI':true,
                  'sScrollY':300,
                  'sPaginationType':'full_numbers',
                  "iDisplayLength": 15,//cantidad de filas a mostrar
                   "bSort": true,
                  'oLanguage':{
                        'sUrl':url+'vista/public/js/datatables.spanish.txt'
                        }
                });//fin de dataTable({})
  },

  resetform:function(id){

  id.find("input[type=text],input[type=password],textarea,select").each(function(){ 
                                              $(this).val('');
                                            });

 
},
dialogo:function(){

  $("#edit-User").dialog({
    autoOpen:false,
    width:600,
    height:470,
    modal:true,
    resizable:false,
    
                        
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
    width:820,
    height:450,
    modal:true,
    resizable:false,
    
                        
    show:{
        effect:"explode",
        duration:900,
        },
    hide:{
        effect:"explode",
        duration:900,
        }
    });//fin de dialogo  
},
validaFormMateria:function(){

  if($('#materia').val()==""){
    $('#add-User').dialog('open');
    $('.resp-add-User').text('Debe agregar una Materia..');
    return false;
  }
}
,
validaFormCohorte:function(){

  if($('#nom_cohorte').val()==""){

    $('#add-User').dialog('open');
    $('.resp-add-User').text('Debe agregar una descripción de la Cohorte.');
    return false;
  }
  if(!$('#nom_cohorte').val().match(cohorte)){
    $('#add-User').dialog('open');
    $('.resp-add-User').text('formato de Cohorte incorrecto.Por favor debe agregar una Cohorte con el siguiente formato ej:cohorte-00');
    return false;
  }
  if($('#tipo_cohorte option:selected').val()==""){
    $('#add-User').dialog('open');
      $('.resp-add-User').text('Debe seleccionar un tipo de cohorte');
    return false;
  }
   if($('#estado_cohorte option:selected').val()==""){
    $('#add-User').dialog('open');
      $('.resp-add-User').text('Debe seleccionar un estado de cohorte');
    return false;
  }
  if(!$('#fec_inic_cohorte').val().match(fecha)){
      $('#add-User').dialog('open');
      $('.resp-add-User').text(resp_fec_nac);
      return false;
  }
  if(!$('#fec_fin_cohorte').val().match(fecha)){
      $('#add-User').dialog('open');
      $('.resp-add-User').text(resp_fec_nac);
      return false;
  }
if($('#fec_inic_cohorte').val() == $('#fec_fin_cohorte').val() ){
      $('#add-User').dialog('open');
      $('.resp-add-User').text('La fecha de inicio de Cohorte debe ser diferente a la fecha de fin de cohorte.Por favor verifique que las fechas sean las correctas');
      return false;


}
      
},

validaformAmbiente:function(){
if($('#nombre_ambiente').val()==""){
    $('#add-User').dialog('open');
    $('.resp-add-User').text('Debe agregar una nombre..');
    return false;
  }
  if($('#tipo_ambiente').val()==""){
    $('#add-User').dialog('open');
    $('.resp-add-User').text('Debe agregar una tipo de ambiente..');
    return false;
  }
  if($("#turno_clase option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar un turno de clase');
        return false;
    }
  if($("#horario_clase option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar un horario de clase');
        return false;
    }
  if($("#id_user_facilitador option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar el facilitador que sera asignado al ambiente');
        return false;
    }
  if($("#id_user_coordinador option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar el coordinador que sera asignado al ambiente');
        return false;
    }
  if($("#id_user_vocero option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar el vocero que sera asignado al ambiente');
        return false;
    }
   if($("#id_cohorte option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar la cohorte que sera asignado al ambiente');
        return false;
    }
  if($("#id_plantel option:selected ").val()==""){
        $('#add-User').dialog("open");
        $('.resp-add-User').html('debe seleccionar el plantel que sera asignado al ambiente');
        return false;
    }
  



},
 
}//fin del callbacks

$.fn.resetform = function () {
  $(this).each (function() { this.reset(); });
}