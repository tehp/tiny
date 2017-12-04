$(document).ready(function() {
    window.filter = "";
    $("#rad0").click(function() {
        filter = "";
        $('#search-2').trigger('keyup');
    });
    $("#rad1").click(function() {
        filter = "Housing Sale";
        $('#search-2').trigger('keyup');
    });
    $("#rad2").click(function() {
        filter = "Housing Rent";
        $('#search-2').trigger('keyup');
    });
    $("#rad3").click(function() {
        filter = "Lot Sale";
        $('#search-2').trigger('keyup');
    });
    $("#rad4").click(function() {
        filter = "Lot Rent";
        $('#search-2').trigger('keyup');
    });
    $("#rad5").click(function() {
        filter = "Materials";
        $('#search-2').trigger('keyup');
    });
    $("#rad6").click(function() {
        filter = "Services";
        $('#search-2').trigger('keyup');
    });
    $("#rad7").click(function() {
        filter = "Community";
        $('#search-2').trigger('keyup');
    });
});
