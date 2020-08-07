function edit(id){
	$.post("./views/user/edit.php?",{id:id}).done(function( data ){$('#subContent').html(data);});
}

function add(){
	$.post("./views/user/new.php?").done(function( data ){$('#subContent').html(data)});
}

function del(id){
	$.confirm({
	    title: '&#161;Advertencia!',
	    type: 'orange',
	    content: '¿Realmente desea eliminar este usuario? al Confirmar, es posible que no se pueda eliminar, ya que pueden haber mas datos asociados a el.',
	    buttons: {
	        Confirmar: function () {
	        	$.ajax({
					type: "POST",
					data:  {id:id,delete:''},
					url: "./controllers/users_controller.php",
					success: function(respuesta){
						respuesta;
						$('#tableUser').DataTable().ajax.reload( null, false );
					}
				});	
	        },
	        Cancelar: function () {
	        }
	    }
	});
};