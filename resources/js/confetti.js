import confetti from "canvas-confetti";

/** HOME CONFETTI */

function launchConfetti() {
    var canvas = document.getElementById("confetti");
    if (canvas === null) {
        return;
    }

    let imagePosition = document
        .querySelector("#imagen-falla")
        .getBoundingClientRect();

    let positionX =
        imagePosition.left / window.innerWidth +
        imagePosition.width / window.innerWidth / 2;
    let positionY = imagePosition.top / window.innerHeight + 0.05;

    canvas.confetti =
        canvas.confetti || confetti.create(canvas, { resize: true });

    canvas.confetti({
        particleCount: 100,
        spread: 100,
        startVelocity: 30,
        origin: {
            x: positionX,
            y: positionY,
        },
    });

    canvas.confetti({
        particleCount: 100,
        spread: 100,
        startVelocity: 30,
        origin: {
            x: positionX,
            y: positionY,
        },
    });
}

export default launchConfetti;
