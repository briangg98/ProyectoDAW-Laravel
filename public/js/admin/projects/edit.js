$(function() {
    $('[data-category]').on('click', editCategoryModal);
    $('[data-level]').on('click', editLevelModal);
});

function editCategoryModal() {
	// id
	var category_id = $(this).data('category');
	$('#category_id').val(category_id);
	// nombre
	var category_name = $(this).parent().prev().text();
	$('#category_name').val(category_name);
	// mostrar
	$('#modalEditCategory').modal('show');
}

function editLevelModal() {
	// id
	var level_id = $(this).data('level');
	$('#level_id').val(level_id);
	// nombre
	var level_name = $(this).parent().prev().text();
	$('#level_name').val(level_name);
	// mostrar
	$('#modalEditLevel').modal('show');
}