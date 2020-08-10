
'use strict'

$(document).ready(function(){
	var dia = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
	var hora = ['7:00-8:30','8:30-10:00','10:30-12:00','12:30-14:00','14:30-16:00','16:30-18:00','18:30-20:00','20:30-22:00'];
	//$('#hora_horario').prop("disabled",'false');
	//$('#horario_elegido').prop("disabled",'false');
	$('#hora_horario').hide();
	$('#aula_horario').hide();
	

	$('#horario_elegido').text('Eliga un horario');

	$(".horario_click").click(function(){
		//alert(this.getAttribute('name'));
		let i = parseInt(this.getAttribute('name'));
		//$(location).attr('href',window.location+'/'+i); //
		
		$("#hora_horario").val(this.getAttribute('name'));
		$('#horario_elegido').text(dia[parseInt( (i-1)/8)] + ' ' + hora[(i-1)%8]);
				
		//dia[i%6]+' '+hora[i%8]
	});
	
	//var k = 0;
	$(".lista").click(function(){
		//alert("1111addasdas");
		$('#aula_horario').val($('#LIS option:selected').text());
		//k++;
	});

	$(".p_aulas_eliminar").click(function(){
		let i = $(this).next('input');
		$(location).attr('href',window.location+'/eliminar/'+i.val());
	});
});

