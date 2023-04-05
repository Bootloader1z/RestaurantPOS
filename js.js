const links = document.querySelectorAll(".delay-link");
const loader = document.getElementById("loader");

for (let i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function(event) {
        event.preventDefault();
        loader.classList.remove("hidden");
        const url = this.getAttribute("href");
        setTimeout(function() {
            window.location.href = url;
        }, 2000);
    });
}