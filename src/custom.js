jQuery(document).ready(function ($) {
  $(".toggledark").click(function () {
    $(".toggledark").toggleClass("active");
    $("body").toggleClass("night");
    $.cookie("toggledark", $(".toggledark").hasClass("active"));

    if ($(".toggledark").hasClass("active")) {
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

  // Set the font data cookie

  // Remove the font data cookie

  function resetInput(inputID, defaultValue) {
    //
    $(inputID).val(defaultValue);
  }

  function clearFonts() {
    document.fonts.clear();

    $("#genResults").removeAttr("style");
    $("#fontWeightValue").text(400);
    resetInput("#fontweight", 400);
    $("#fontSpacingValue").text("0");
    resetInput("#fontspacing", 0);
    $("#lineHeightValue").text("1.2");
    resetInput("#lineheight", 1.2);
    $("#fontSizeValue").text("16");
    resetInput("#fontsize", 16);
    $("#fontWidthValue").text("5");
    resetInput("#fontwidth", 5);
  }

  // Handle click event for "Clear Font" button
  $(".clearFont").click(function () {
    clearFonts();
  });

  // Handle file input change event
  $("#fileToUpload").change(function () {
    //reset styling when reloading font
    clearFonts();

    // Read the font file data
    var file = this.files[0];
    var reader = new FileReader();

    reader.readAsArrayBuffer(file);
    reader.onload = function () {
      console.log("font loaded");
      var fontData = new FontFace("CustomFont", reader.result);
      fontData.load().then(function (loadedFont) {
        document.fonts.add(loadedFont);
        // Load the custom font
        $("#genResults").css("font-family", "'CustomFont'");
      });
    };
  });
});

//font size
jQuery(document).ready(function ($) {
  $("#fontsize").on("input", function () {
    var fontSize = $(this).val() + "px";
    var fontSizeText = $(this).val();
    $("#genResults").css("font-size", fontSize);
    $("#fontSizeValue").text(fontSizeText);
  });
});

//line height
jQuery(document).ready(function ($) {
  $("#lineheight").on("input", function () {
    var lineHeight = $(this).val();
    $("#genResults").css("line-height", lineHeight);
    $("#lineHeightValue").text(lineHeight);
  });
});

//font spacing
jQuery(document).ready(function ($) {
  // ...
  $("#fontspacing").on("input", function () {
    var fontSpacing = $(this).val() + "em";
    var fontSpacingText = $(this).val();
    $("#genResults").css("letter-spacing", fontSpacing);
    $("#fontSpacingValue").text(fontSpacingText);
  });
});

//font weight
jQuery(document).ready(function ($) {
  $("#fontweight").on("input", function () {
    var fontWeight = $(this).val();
    $("#genResults").css("font-weight", fontWeight);
    $("#fontWeightValue").text(fontWeight);
  });
});

//font width
jQuery(document).ready(function ($) {
  $("#fontwidth ").on("input", function () {
    var fontWidth = $(this).val();
    $("#fontWidthValue").text(fontWidth);
    
    var fontStretch = "";
    switch (fontWidth) {
      case "1":
        fontStretch = "ultra-condensed";
        break;
      case "2":
        fontStretch = "extra-condensed";
        break;
      case "3":
        fontStretch = "condensed";
        break;
      case "4":
        fontStretch = "semi-condensed";
        break;
      case "5":
        fontStretch = "normal";
        break;
      case "6":
        fontStretch = "semi-expanded";
        break;
      case "7":
        fontStretch = "expanded";
        break;
      case "8":
        fontStretch = "extra-expanded";
        break;
      case "9":
        fontStretch = "ultra-expanded";
        break;
      default:
        fontStretch = "normal";
    }
    console.log(fontStretch);
    $("#genResults").css("font-stretch", fontStretch);
  });
});
