$(document).ready(function () {
    const modal = document.getElementById('SprintModal');
    const btn = document.getElementById("SprintModalBtn");
    const span = document.getElementsByClassName("close-SprintModal")[0];
    const startOver = document.getElementById("start-over-btn");


    if (btn) {
        btn.onclick = function() {
            modal.style.display = "block";
        };
    }

    if (span) {
        span.onclick = function() {
            modal.style.display = "none";
        };
    }

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    if (startOver) {
        startOver.onclick = function() {
            location.href = "./choosePath.php";
        };
    }
});

