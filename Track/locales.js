window.DT_LOCALES["en"] =
{
    SEARCH: "search",
    PER_PAGE: "{NUM} per page",
    SHOWING_TO: "rows {FROM} to {TO} of {SIZE}",
    GOTO_FIRST: "go to page 1",
    GOTO_PREV: "go to previous page",
    GOTO_PAGE: "go to page {NUM}",
    GOTO_NEXT: "go to next page",
    GOTO_LAST: "go to last page",
    ASC_ACTIVE: "ascending order active",
    DESC_ACTIVE: "descending order active",
    NOT_ACTIVE: "not active"
}

const nav = document.querySelector(".nav"),
    searchIcon = document.querySelector("#searchIcon"),
    navOpenBtn = document.querySelector(".navOpenBtn"),
    navCloseBtn = document.querySelector(".navCloseBtn");
searchIcon.addEventListener("click", () => {
    nav.classList.toggle("openSearch");
    nav.classList.remove("openNav");
    if (nav.classList.contains("openSearch")) {
        return searchIcon.classList.replace("uil-search", "uil-times");
    }
    searchIcon.classList.replace("uil-times", "uil-search");
});
navOpenBtn.addEventListener("click", () => {
    nav.classList.add("openNav");
    nav.classList.remove("openSearch");
    searchIcon.classList.replace("uil-times", "uil-search");
});
navCloseBtn.addEventListener("click", () => {
    nav.classList.remove("openNav");
});
document.querySelector('.section.collapsible').classList.toggle('collapsed');
