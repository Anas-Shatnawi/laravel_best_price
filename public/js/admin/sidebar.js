$(document).ready(function() {
    $('.sidebarCollapse').on('click', function() {
        if (document.getElementById("sidebar").display == "none") {
            console.log('HI NONE')
            document.getElementById("sidebar").display == "block"
            $('#sidebar').toggleClass('active');
        } else {
            console.log('HI')
            document.getElementById("sidebar").display == "none"
            $('#sidebar').toggleClass('active');
        }
    });
});

