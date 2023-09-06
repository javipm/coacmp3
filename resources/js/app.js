import "./bootstrap";
import launchConfetti from "./confetti";
import player from "./player";

window.launchConfetti = launchConfetti;
window.player = player;
document.addEventListener("DOMContentLoaded", launchConfetti, false);

/** HOME HIDE SCROLL ICON */
let scrollPos = 0;
const nav = document.querySelector("#scroll-icon");

function checkPosition() {
    let windowY = window.scrollY + 50;
    if (window.scrollY === 0) {
        // Scrolling UP
        nav.classList.add("opacity-100");
        nav.classList.remove("opacity-0");
    } else {
        // Scrolling DOWN
        nav.classList.add("opacity-0");
        nav.classList.remove("opacity-100");
    }
    scrollPos = windowY;
}

if (nav !== null) window.addEventListener("scroll", checkPosition);
