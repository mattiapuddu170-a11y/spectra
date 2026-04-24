let timer;

document.getElementById("search").addEventListener("keyup", function () {

    clearTimeout(timer);

    let valore = this.value;

    timer = setTimeout(() => {
        fetch("?ajax=1&q=" + encodeURIComponent(valore))
            .then(r => r.text())
            .then(data => {
                document.getElementById("risultati").innerHTML = data;
            });
    }, 400);

});