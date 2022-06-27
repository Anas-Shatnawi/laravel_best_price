const buttons = document.querySelectorAll(".open-clos-sidebar-btn");

buttons.forEach(button =>
    button.addEventListener("click", _ => {
        document.getElementById("sidebar").classList.toggle("collapsed");
    })
);