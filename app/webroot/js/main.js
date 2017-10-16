$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();

    $('.openEditModal').click(function(){
    	$('#editId').val($(this).attr('data-id'));
    	$('#editName').val($(this).attr('data-name'));
    	$('#editType').val($(this).attr('data-type'));	
    });
});