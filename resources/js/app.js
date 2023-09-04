import "./bootstrap";
import confetti from "canvas-confetti";

/** HOME CONFETTI */
var canvas = document.getElementById("confetti");

if (canvas !== null) {
    canvas.confetti =
        canvas.confetti || confetti.create(canvas, { resize: true });

    document.addEventListener(
        "DOMContentLoaded",
        function () {
            let imagePosition = document
                .querySelector("#imagen-falla")
                .getBoundingClientRect();

            let positionX =
                imagePosition.left / window.innerWidth +
                imagePosition.width / window.innerWidth / 2;
            let positionY = imagePosition.top / window.innerHeight + 0.05;

            canvas.confetti({
                particleCount: 100,
                spread: 100,
                startVelocity: 30,
                origin: {
                    x: positionX,
                    y: positionY,
                },
            });
        },
        false
    );
}

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

window.addEventListener("scroll", checkPosition);
