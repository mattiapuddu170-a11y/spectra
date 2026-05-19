let timer;

const input = document.getElementById("searchSidebar");
const risultati = document.getElementById("risultatiSidebar");

if (input && risultati) {
    const searchUrl = input.dataset.searchUrl || "ajax/search.php";

    input.addEventListener("keyup", function () {
        clearTimeout(timer);

        const valore = this.value.trim();

        if (valore.length === 0) {
            risultati.innerHTML = "";
            return;
        }

        timer = setTimeout(() => {
            fetch(searchUrl + "?q=" + encodeURIComponent(valore))
                .then(response => response.text())
                .then(data => {
                    risultati.innerHTML = data;
                });
        }, 400);
    });
}
