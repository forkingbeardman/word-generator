jQuery(document).ready(function($) {
    $(".toggledark").click(function() {
        $(".toggledark").toggleClass("active");
        $("body").toggleClass("night");
        $.cookie("toggledark", $(".toggledark").hasClass('active'));

        if ($(".toggledark").hasClass('active')) {
            $("#icon-toogledark").removeClass("lni-night");
            $("#icon-toogledark").addClass("lni-sun");
        } else {
            $("#icon-toogledark").removeClass("lni-sun");
            $("#icon-toogledark").addClass("lni-night");
        }
    });

    if ($.cookie("toggledark") === "true") {
        $(".toggledark").addClass("active");
        $("body").addClass("night");
        $("#icon-toogledark").removeClass("lni-night");
        $("#icon-toogledark").addClass("lni-sun");
    }
});