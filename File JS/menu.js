document.addEventListener('DOMContentLoaded', function() {
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const sidebarLinks = sidebar.querySelectorAll('a');
  
  function toggleSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
  }
  
  function closeSidebar() {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
  }
  
  hamburgerBtn.addEventListener('click', toggleSidebar);
  overlay.addEventListener('click', closeSidebar);
  
  sidebarLinks.forEach(link => {
    link.addEventListener('click', closeSidebar);
  });
});