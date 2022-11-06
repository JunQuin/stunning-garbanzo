function limpiarInputs() {
    $('.form-control').val('');
}

var counter = 4;
var interval = setInterval(function () {
    counter--;
    // Display 'counter' wherever you want to display it.
    if (counter <= 0) {
        clearInterval(interval);
        $('#toast').addClass("hidden");
        return;
    } else {
        $('#time').text(counter);
        console.log("Timer --> " + counter);
    }
}, 1000);

function showEliminarJuez(param, juez) {
    if (param == 1) {
        $('#arbol-'+juez).removeClass('hidden');
    }
    if (param == 0) {
        $('#arbol-'+juez).addClass('hidden');
    }
}
