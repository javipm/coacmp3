import Amplitude from "amplitudejs";

export default function run() {
    const songList = document.querySelectorAll("#song-list li");

    const initialSong = document
        .querySelector("#song-list")
        .getAttribute("data-start");

    const songs = [];

    songList.forEach((item) => {
        const name = item.getAttribute("data-title");
        const artist = item.getAttribute("data-artist");
        const url = item.getAttribute("data-url");

        const song = {
            name: name,
            artist: artist,
            url: url,
        };

        songs.push(song);
    });

    Amplitude.init({
        bindings: {
            37: "prev",
            39: "next",
            32: "play_pause",
        },
        callbacks: {
            timeupdate: function () {
                let percentage = Amplitude.getSongPlayedPercentage();

                if (isNaN(percentage)) {
                    percentage = 0;
                }

                let slider = document.getElementById("song-percentage-played");
                slider.style.backgroundSize = percentage + "% 100%";
            },
            initialized: function () {
                document.querySelector(".loader").classList.add("hidden");

                document
                    .querySelector("#audio-player")
                    .classList.remove("opacity-0");
            },
        },
        songs: songs,
        start_song: initialSong,
    });
}
