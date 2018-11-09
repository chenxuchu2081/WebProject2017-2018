function SlideDownShowLink() {
    var x = document.getElementById("down_link");
    if (x.className === "all_link") {
        x.className += " responsive";
    } else {
        x.className = "all_link";
    }
}

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the video
var video = document.getElementById("myVideo");

// Get the button
var btn = document.getElementById("videoBtn");

// Pause and play the video, and change the button text
function VideoStop() {
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
}

/////////////////////////////////////////////////////////////////////////////////*/


