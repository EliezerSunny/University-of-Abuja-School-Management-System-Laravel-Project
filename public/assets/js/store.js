/*==================================================
GET DARK-LIGHT-OR-SEMI-DARK VALUE FROM LOCAL STORAGE
===================================================*/
const rootEl = document.documentElement;
const themeMode = localStorage.getItem("theme");
const sidebar = document.querySelector(".sidebar-wrapper");
if (themeMode === "dark") {
  rootEl.classList.add("dark");
  rootEl.classList.remove("light");
  rootEl.classList.remove("semiDark");
} else if (themeMode === "semiDark") {
  rootEl.classList.add("semiDark");
  rootEl.classList.add("light");
  rootEl.classList.remove("dark");
} else {
  rootEl.classList.add(themeMode);
  rootEl.classList.remove("dark");
  rootEl.classList.remove("semiDark");
}

/*=======================================
  GET GRAY-SCALE VALUE FROM LOCAL STORAGE
=======================================*/
// Check if the value of the "effect" key in the local storage is "grayScale"
if (localStorage.effect === "grayScale") {
  // If it is, add the "grayScale" class to the "html" element
  rootEl.classList.add("grayScale");
} else {
  // If it's not, remove the "grayScale" class from the "html" element
  rootEl.classList.remove("grayScale");
}

/*=======================================
  GET RTL/LTR VALUE FROM LOCAL STORAGE
=======================================*/
// Check if the value of the "effect" key in the local storage is "grayScale"
if (localStorage.dir === "rtl") {
  // If it is, add the "grayScale" class to the "html" element
  rootEl.dir = "rtl";
} else {
  // If it's not, remove the "grayScale" class from the "html" element
  rootEl.dir = "ltr";
}


/*==========================================================
  GET Vertical and horizontal menu layout FROM LOCAL STORAGE
==========================================================*/
if (localStorage.menuLayout == "horizontalMenu") {
  rootEl.classList.add("horizontalMenu");
} else {
  rootEl.classList.remove("horizontalMenu");
}

/*===================================
  GET layout type FROM LOCAL STORAGE
=====================================*/
if (localStorage.contentLayout == "layout-boxed") {
  rootEl.classList.add("layout-boxed");
}

/*==========================================================
  GET Vertical and horizontal menu layout FROM LOCAL STORAGE
==========================================================*/
if (localStorage.navbar == "floating") {
  rootEl.classList.add("nav-floating");
  rootEl.classList.remove('nav-sticky');
  rootEl.classList.remove('nav-hidden');
  rootEl.classList.remove('nav-static');
} else if (localStorage.navbar == "sticky") {
  rootEl.classList.add("nav-sticky");
  rootEl.classList.remove('nav-floating');
  rootEl.classList.remove('nav-hidden');
  rootEl.classList.remove('nav-static');
} else if (localStorage.navbar == "hidden") {
  rootEl.classList.add("nav-hidden");
  rootEl.classList.remove('nav-floating');
  rootEl.classList.remove('nav-sticky');
  rootEl.classList.remove('nav-static');
} else {
  rootEl.classList.add("nav-static");
  rootEl.classList.remove('nav-floating');
  rootEl.classList.remove('nav-sticky');
  rootEl.classList.remove('nav-hidden');
}
