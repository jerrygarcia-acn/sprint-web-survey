<?php
//Specify page title
$pageTitle = 'Sprint | Works for Business';
?>

<!--Import HTML head tag-->
<?php include('./includes/head.php'); ?>
<!--Import HTML head tag-->

<body>
<main id="page">

    <!--Import header/navbar tag-->
    <?php include('./includes/header.php'); ?>
    <!--Import header/navbar tag-->

    <section class="survey-content">
        <div class="container">
            <div class="row m-0">
                <div class="col-12 col-md-6 p-0 pt-5 pb-4 limit-width">
                    <form action="userInformation.php" method="post" class="form" novalidate="novalidate" id="questionsForm">
                        <div class="row m-0">
                            <div class="col-12" id="questionsContainer">
                                <div class="row pb-5" id="today">
                                    <div class="col-md-12 col-12" id="today-title">
                                        <p class="h4 questions-time">Today</p>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <p class="h5" id="today-question"></p>
                                    </div>
                                    <div class="col-md-12 col-12" id="today-subtext">
                                        <!-- Today subtext -->
                                    </div>
                                    <div class="col-md-12 col-12 btn-vertical">
                                        <div class="row" id="today-answers">
                                            <!-- Today Answers -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="future">
                                    <div class="col-md-12 col-12" id="future-title">
                                        <p class="h4 questions-time">Future</p>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <p class="h5" id="future-question"></p>
                                    </div>
                                    <div class="col-md-12 col-12" id="future-subtext">
                                        <!-- Future Subtext -->
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="row" id="future-answers">
                                            <!-- Future Answers -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 pt-5 nextBtnSurvey">
                            <div class="col-6 p-0 text-center">
                                <input id='previousButton' type="button" value="Previous"
                                       class="previous float-left">
                            </div>
                            <div class="col-6 p-0 text-center">
                                <input type="submit" value="Next" class="submit float-right">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="survey-sidebar hidden-md-down not-visible offset-2 col-md-4 col-12">
                    <div class="survey-path-sidebar">
                        <div class="inner-survey-path done sideDesktop">
                        <span class="icon done">
                            <i class="fa fa-road"></i>
                        </span>
                            <span>01. Choose your Path</span>
                        </div>
                        <div class="inner-survey-path done sideDesktop">
                        <span class="icon done">
                            <i class="fa fa-briefcase"></i>
                        </span>
                            <span>02. Company Information</span>
                        </div>
                        <div class="inner-survey-path yellow sideDesktop">
                        <span class="icon yellow">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                            <span>03. Survey Questions</span>
                        </div>
                        <div class="inner-survey-path sideDesktop">
                        <span class="icon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                            <span>04. User Information</span>
                        </div>
                        <div class="inner-survey-path sideDesktop">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                            <span>05. Results</span>
                        </div>
                        <div class="sprint-refresh">
                            <button id="SprintModalBtn">
                                <i class="fa fa-refresh"></i> Start Over
                            </button>
                        </div>
                        <!--Start over modal import-->
                        <?php include('./includes/startOverModal.php') ?>
                        <!--Start over modal import-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Import footer tag-->
    <?php include('./includes/footer.php'); ?>
    <!--Import footer tag-->

    <!--Import JS questionSelection.js-->
    <script src="./js/questionSelection.js"></script>
    <!--Import JS questionSelection.js-->

    <!--Show sidebar button-->
    <button id="mobile-sidebar-button" class="btn d-sm-block d-md-none">
        <span class="fa fa-chevron-right"></span>
    </button>
    <!--Show sidebar button-->

</main>
</body>
</html>