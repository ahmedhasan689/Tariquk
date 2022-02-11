// $(document).ready(function() {
//     $(".sea").on("click", function() {
//         $(".par").css("overflow", "visible");


//     });
// });

// function showhide() {
//     var div = document.getElementsByClassName("par");
//     if (div.style.overflow !== "visible") {
//         div.style.display = "visible";
//     } else {
//         div.style.display = "none";
//     }
// }

$(document).ready(function () {
    $(".change").click(function () {
        $(".form").toggle();


    });
});


var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

