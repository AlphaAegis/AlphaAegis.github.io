document.addEventListener("DOMContentLoaded", function() {
    const playImage = document.getElementById("playImage");
    const audioContainer = document.getElementById("audioContainer");
    const audioPlayer = document.getElementById("audioPlayer");
    const playButton = document.getElementById("playButton");

    playImage.addEventListener("click", function() {
        playImage.style.display = "none";
        audioContainer.style.display = "block";
    });

    playButton.addEventListener("click", function() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playButton.textContent = "Pause Sound";
        } else {
            audioPlayer.pause();
            playButton.textContent = "Play Sound";
        }
    });
});
