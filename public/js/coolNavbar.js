document.addEventListener("scroll", function() {
    var l = window.innerHeight;
    var f = document.querySelectorAll("section[data-target]");
    
    for (var d = 0, a = f.length; d < a; d++) {
        var g = f[d];
        var e = g.getBoundingClientRect();
        if (e.top >= 0 && e.top <= 0.5 * l) {
            var k = document.querySelectorAll("section.active nav.cool-navbar ul li a");
            for (var c = 0, b = k.length; c < b; c++) {
                var h = k[c];
                if (h.getAttribute("href") == g.getAttribute("data-target")) {
                    h.className = "active"
                } else { h.className = "" }
            }
        }
    }
});