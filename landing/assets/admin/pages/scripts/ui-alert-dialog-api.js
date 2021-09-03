var UIAlertDialogApi = function () {

    var handleDialogs = function() {

        	$('#demo_1').click(function(){
                bootbox.alert("Primero debes completar los datos de tu registro en la seccion Mis Datos");    
            });
            //end #demo_1
			
			$('#demo_2').click(function(){
                bootbox.alert("Primero debes completar los datos de tu registro en la seccion Mis Datos");    
            });
            //end #demo_1
			
			$('#demo_3').click(function(){
                bootbox.alert("Primero debes completar los datos de tu registro en la seccion Mis Datos");    
            });
            //end #demo_1
			
			$('#demo_4').click(function(){
                bootbox.alert("Primero debes completar los datos de tu registro en la seccion Mis Datos");    
            });
            //end #demo_1
			
			$('#demo_5').click(function(){
                bootbox.alert("Primero debes completar los datos de tus integrantes y asignar a un profesor responsable en la seccion Lista de integrantes");    
            });
            //end #demo_1
			
			$('#demo_6').click(function(){
                bootbox.alert("Primero debes completar los datos de tus integrantes y asignar a un profesor responsable en la seccion Lista de integrantes");    
            });
            //end #demo_1
    }

    var handleAlerts = function() {
        
        $('#alert_show').click(function(){

            Metronic.alert({
                container: $('#alert_container').val(), // alerts parent container(by default placed after the page breadcrumbs)
                place: $('#alert_place').val(), // append or prepent in container 
                type: $('#alert_type').val(),  // alert's type
                message: $('#alert_message').val(),  // alert's message
                close: $('#alert_close').is(":checked"), // make alert closable
                reset: $('#alert_reset').is(":checked"), // close all previouse alerts first
                focus: $('#alert_focus').is(":checked"), // auto scroll to the alert after shown
                closeInSeconds: $('#alert_close_in_seconds').val(), // auto close after defined seconds
                icon: $('#alert_icon').val() // put icon before the message
            });

        });

    }

    return {

        //main function to initiate the module
        init: function () {
            handleDialogs();
            handleAlerts();
        }
    };

}();