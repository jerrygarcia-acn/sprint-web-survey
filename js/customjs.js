function toggleSidebar(sidebar) {
    if (sidebar.hasClass('sidebar-hidden')) {
        sidebar.removeClass('sidebar-hidden');
        sidebar.addClass('sidebar-shown');
    } else {
        sidebar.removeClass('sidebar-shown');
        sidebar.addClass('sidebar-hidden');
    }
}

$(document).ready(function () {
    const modal = document.getElementById('SprintModal');
    const btn = document.getElementById("SprintModalBtn");
    const span = document.getElementsByClassName("close-SprintModal")[0];
    const startOver = document.getElementById("start-over-btn");
    const sidebarButton = $(document).find('#mobile-sidebar-button');
    const pathSidebar = $(document).find('#survey-sidebar-div');

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

    if (sidebarButton) {
        sidebarButton.click(function () {
            toggleSidebar(pathSidebar);
            console.log('pressed');
        });
    }
});

