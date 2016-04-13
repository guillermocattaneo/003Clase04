$(function(){
			  var patentes = [ 

			   {value: "aaa111" , data: " 2016-04-13 02:12:07 " }, 
 {value: "aaa112" , data: " 2016-04-13 02:12:46 " }, 
 {value: "aas113" , data: " 2016-04-13 02:18:42 " }, 

			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});