$(document).ready(function() {
    window.filter = "";
    $("#rad1").click(function() {
        filter = "asdf";
        $('#search-2').trigger('keyup');
    });
    $("#rad2").click(function() {
        filter = "wasd";
        $('#search-2').trigger('keyup');
    });
});
