//--------------------------Qunatity Scripts------------------------------------------------------ 
// setting deafult attribute to disabled of minus button
document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

// taking value increameny decrement input value
var valueCount

// plus button
document.querySelector(".plus-btn").addEventListener("click", function() {
    // getting value of input
    valueCount = document.getElementById("quantity-number").value;

    // input value increment by 1
    valueCount++;
    // setting increment input value
    document.getElementById("quantity-number").value = valueCount;
    if (valueCount > 1) {
        document.querySelector(".minus-btn").removeAttribute("disabled");
        document.querySelector(".minus-btn").classList.remove("disabled");
    }
    if (valueCount == 10) {
        document.querySelector(".plus-btn").setAttribute("disabled", "disabled");
    }
})

// minus button
document.querySelector(".minus-btn").addEventListener("click", function() {
    // getting value of input
    valueCount = document.getElementById("quantity-number").value;

    // input value decrement by 1
    valueCount--;
    // setting increment input value
    document.getElementById("quantity-number").value = valueCount;
    if (valueCount == 1) {
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
    }
    if (valueCount < 10) {
        document.querySelector(".plus-btn").removeAttribute("disabled");
        document.querySelector(".plus-btn").classList.remove("disabled");
    }
})


// ----------------------Read More Script-------------------------------
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
$('.read-more-content').addClass('hide_content')
$('.read-more-show, .read-more-hide').removeClass('hide_content')

// Set up the toggle effect:
$('.read-more-show').on('click', function(e) {
    $(this).next('.read-more-content').removeClass('hide_content');
    $(this).addClass('hide_content');
    e.preventDefault();
});

// Changes contributed by @diego-rzg
$('.read-more-hide').on('click', function(e) {
    var p = $(this).parent('.read-more-content');
    p.addClass('hide_content');
    p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
    e.preventDefault();
});