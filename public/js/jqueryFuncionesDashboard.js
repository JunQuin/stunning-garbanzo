$(function () {
    $("#graph_select").change(function () {
        var val = $(this).val();
        if (val == 0) {
            $(".Divulgación").show();
            $(".Cuento").show();
            $(".Cortometraje").show();
            $(".Animación").show();
            $(".Robótica").show();
        }
        else if (val == 1) {
            $(".Divulgación").show();
            $(".Cuento").hide();
            $(".Cortometraje").hide();
            $(".Animación").hide();
            $(".Robótica").hide();
        }
        else if (val == 2) {
            $(".Cuento").show();
            $(".Divulgación").hide();
            $(".Cortometraje").hide();
            $(".Animación").hide();
            $(".Robótica").hide();
        }
        else if (val == 3) {
            $(".Cortometraje").show();
            $(".Divulgación").hide();
            $(".Cuento").hide();
            $(".Animación").hide();
            $(".Robótica").hide();
        }
        else if (val == 4) {
            $(".Animación").show();
            $(".Divulgación").hide();
            $(".Cuento").hide();
            $(".Cortometraje").hide();
            $(".Robótica").hide();
        }
        else if (val == 5) {
            $(".Robótica").show();
            $(".Divulgación").hide();
            $(".Cuento").hide();
            $(".Cortometraje").hide();
            $(".Animación").hide();
        }
    });
});
