let timer;

const input = document.getElementById("searchSidebar");
const risultati = document.getElementById("risultatiSidebar");

input.addEventListener("keyup", function () {

    clearTimeout(timer);

    let valore = this.value;

    if (valore.length === 0) {
        risultati.innerHTML = "";
        return;
    }

    timer = setTimeout(() => {
        fetch("?ajax=1&q=" + encodeURIComponent(valore))
            .then(r => r.text())
            .then(data => {
                risultati.innerHTML = data;
            });
    }, 400);

});