
let select = document.querySelectorAll(".sideNavbar li");

function activelink() {
    select.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
}
select.forEach((item) => item.addEventListener("mouseover", activelink));

function active() {
    select.forEach((item) => item.classList.remove("active"));
    this.classList.add("active");
}
select.forEach((item) => item.addEventListener("click", active));

// button
let toggle = document.querySelector('.toggle');
let sideNavbar = document.querySelector('.sideNavbar');
let main = document.querySelector('.main');
toggle.onclick = function() {
    sideNavbar.classList.toggle('active');
    main.classList.toggle('active');
}


// dropdown
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}