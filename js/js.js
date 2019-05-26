

 $("document").ready(function(){

	$('#Dtabla').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				},
				paging: false,
    });

	$("#menuAdmin").click(function(){
			
			$("#mySidenav").css('width','250px');
			$("#main").css('marginLeft','250px');
			

	});
	$("#closeMenuAdmin").click(function(){
			
		$("#mySidenav").css('width','0px');
		$("#main").css('marginLeft','0');
;

	});
 });
