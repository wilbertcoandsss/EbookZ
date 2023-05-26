function loadSideMenu() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "sideBar.html", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var navbar = xhr.responseText;
        var navbarElement = document.querySelector("sidemenu");
        navbarElement.innerHTML = navbar;
      }
    };
    xhr.send();
  }
  
  document.addEventListener("DOMContentLoaded", function() {
    loadSideMenu();
  });