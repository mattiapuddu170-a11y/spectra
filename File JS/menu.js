const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("sidebarOverlay");
const openBtn = document.getElementById("hamburgerBtn");
const closeBtn = document.getElementById("closeSidebar");

function openSidebar() {
  sidebar.classList.add("active");
  overlay.classList.add("active");
}

function closeSidebar() {
  sidebar.classList.remove("active");
  overlay.classList.remove("active");
}

openBtn?.addEventListener("click", openSidebar);
overlay?.addEventListener("click", closeSidebar);
closeBtn?.addEventListener("click", closeSidebar);