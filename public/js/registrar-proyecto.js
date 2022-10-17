$("#subcategoriaForm").hide();   //which element you want to hide or show
function subcategoriaForm() {
    var categoria = $("#categoria").val();
    var subcategoria = $("#sub-Categoria").val();
    if (categoria == 2) {
        $("#subcategoriaForm").show();
    } else {
        $("#subcategoriaForm").hide();
        $("#sub-Categoria").val('');
    }
}
