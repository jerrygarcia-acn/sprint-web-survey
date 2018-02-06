$(document).ready(function () {
    var modal = document.getElementById('SprintModal');
    var btn = document.getElementById("SprintModalBtn");
    var span = document.getElementsByClassName("close-SprintModal")[0];
    var startOver = document.getElementById("start-over-btn");
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    startOver.onclick = function() { 
        location.href = "../SprintSurvey/choosePath.php";
    }
});

