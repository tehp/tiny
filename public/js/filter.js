$(document).ready(function() {
    window.filter = "";
    $("#rad1").click(function() {
        filter = "housing";
        $('#search-2').trigger('keyup');
    });
    $("#rad2").click(function() {
        filter = "land";
        $('#search-2').trigger('keyup');
    });
    $("#rad3").click(function() {
        filter = "supplies";
        $('#search-2').trigger('keyup');
    });
    $("#rad4").click(function() {
        filter = "services";
        $('#search-2').trigger('keyup');
    });
    $("#rad5").click(function() {
        filter = "consulting";
        $('#search-2').trigger('keyup');
    });
});
