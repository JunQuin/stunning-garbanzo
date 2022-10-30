function goToFile(folder, name) {
    if (folder != null || name != null) {
        window.open('/files/' + folder + '/' + name, '_blank');
    }
    return false;
}

function goToVideo(param) {
    if (param != null) {
        window.open(param, '_blank');
    }
    return false;
}

$(window).focus(function () {
    location.reload();
});
