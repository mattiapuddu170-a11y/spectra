let timer;
let activeIndex = -1;
let lastQuery = "";

const input = document.getElementById("searchSidebar");
const risultati = document.getElementById("risultatiSidebar");

if (input && risultati) {
    const searchUrl = input.dataset.searchUrl || "ajax/search.php";

    function getResults() {
        return Array.from(risultati.querySelectorAll(".search-result"));
    }

    function setExpanded(isExpanded) {
        input.setAttribute("aria-expanded", isExpanded ? "true" : "false");
    }

    function selectResult(index) {
        const items = getResults();
        activeIndex = items.length ? Math.max(0, Math.min(index, items.length - 1)) : -1;

        items.forEach((item, itemIndex) => {
            const isActive = itemIndex === activeIndex;
            item.classList.toggle("active", isActive);
            item.setAttribute("aria-selected", isActive ? "true" : "false");
        });
    }

    function clearResults() {
        activeIndex = -1;
        risultati.innerHTML = "";
        setExpanded(false);
    }

    input.addEventListener("input", function () {
        clearTimeout(timer);

        const valore = this.value.trim();
        lastQuery = valore;

        if (valore.length === 0) {
            clearResults();
            return;
        }

        risultati.innerHTML = '<p class="search-state">Cerco prodotti...</p>';
        setExpanded(true);

        timer = setTimeout(() => {
            fetch(searchUrl + "?q=" + encodeURIComponent(valore))
                .then(response => response.text())
                .then(data => {
                    if (valore !== lastQuery) {
                        return;
                    }

                    risultati.innerHTML = data;
                    setExpanded(risultati.innerHTML.trim().length > 0);
                    activeIndex = -1;
                })
                .catch(() => {
                    risultati.innerHTML = '<p class="search-state">Ricerca non disponibile.</p>';
                    setExpanded(true);
                });
        }, 250);
    });

    input.addEventListener("keydown", function (event) {
        const items = getResults();

        if (event.key === "ArrowDown" && items.length) {
            event.preventDefault();
            selectResult(activeIndex + 1);
        }

        if (event.key === "ArrowUp" && items.length) {
            event.preventDefault();
            selectResult(activeIndex <= 0 ? items.length - 1 : activeIndex - 1);
        }

        if (event.key === "Enter" && items.length) {
            event.preventDefault();
            items[Math.max(activeIndex, 0)].click();
        }

        if (event.key === "Escape") {
            this.value = "";
            clearResults();
        }
    });

    risultati.addEventListener("mouseover", function (event) {
        const item = event.target.closest(".search-result");
        if (!item) {
            return;
        }

        const items = getResults();
        selectResult(items.indexOf(item));
    });
}
