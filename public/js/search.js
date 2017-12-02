$(document).ready(function() {

    var lastentry = "";

    $('#search-2').keyup(function(event) {
        // $('#search-2').val() != lastentry
        lastentry = $('#search-2').val()

        // g - global match
        // i - case insensitive
        // m - multi line
        var ptrn = new RegExp(lastentry, "gim");
        var fltr = new RegExp(filter, "gim");
        $(".thumbnail").each(function(index) {
            if (ptrn.test($(this).text())) {
                if (fltr.test($(this).text())) {
                    $(this).show();
                    $(this).addClass("item masonry-brick grid-item");
                } else {
                    $(this).hide();
                    $(this).removeClass("item masonry-brick grid-item");
                }
            } else {
                $(this).hide();
                $(this).removeClass("item masonry-brick grid-item");
            }
        });
        //redo_layout();
        $grid.isotope('layout');
        // use layout directly instead of using redo_layout function
    });
});;;
