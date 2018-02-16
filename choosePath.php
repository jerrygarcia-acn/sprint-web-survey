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
            <div class="row">
                <div class="col-12 col-md-6 p-0 pt-5 pb-4 limit-width">
                    <div class="row m-0">
                        <div class="col-md-12">
                            <h4>Choose your path.</h4>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-12">
                            <p class="p-subtitle">Lorem ipsum dolor sit amet, cons adipiscing elit, sed do eiusmod temp
                                incididunt ut labore et dolore. Lorem ipsum dolor sit amet. (Select all that apply)</p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12">
                            <form action="companyInformation.php" method="post" novalidate="novalidate"
                                  id="submitChoosePath">
                                <div class="row choosePath m-0" id="path-id">
                                    <div class="col-12 col-md-4 px-0 pr-md-1 text-center chooseBox"
                                         id="choosePathGroup">
                                        <div class="path">
                                            <label class="first" for="digitalization">
                                                <input id="digitalization" name="paths[]" value="digitalization"
                                                       type="checkbox">
                                                <img class="choose-img" src="./images/Trend1.png" alt="Digitalization">
                                                <span>Digitalization</span>
                                                <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 px-0 pr-md-1 text-center chooseBox">
                                        <div class="path">
                                            <label class="second" for="changingWorkforce">
                                                <input id="changingWorkforce" name="paths[]" value="changingWorkforce"
                                                       type="checkbox">
                                                <img class="choose-img" src="./images/Trend2.png"
                                                     alt="Changing Workforce">
                                                <span>Changing Workforce</span>
                                                <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 px-0 pr-md-1 text-center chooseBox">
                                        <div class="path">
                                            <label class="third" for="predictableDisruption">
                                                <input id="predictableDisruption" name="paths[]"
                                                       value="predictableDisruption" type="checkbox">
                                                <img class="choose-img" src="./images/Trend3.png"
                                                     alt="Predictive Disruption">
                                                <span>Predictable Disruption</span>
                                                <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-6 col-md-6 offset-6 text-center">
                                        <input id="choosePathNext" value="Next" class="submit float-right"
                                               type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="survey-sidebar sidebar-hidden offset-md-2 col-md-4 col-12" id="survey-sidebar-div">
                    <div class="survey-path-sidebar">
                        <div class="inner-survey-path yellow sideDesktop">
                        <span class="icon yellow">
                            <i class="fa fa-road"></i>
                        </span>
                            <span>01. Choose your Path</span>
                        </div>
                        <div class="inner-survey-path sideDesktop">
                        <span class="icon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                            <span>02. Company Information</span>
                        </div>
                        <div class="inner-survey-path sideDesktop">
                        <span class="icon">
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

    <!-- Import choosePath.js -->
    <script src="./js/choosePath.js"></script>
    <!-- Import choosePath.js -->

    <!--Show sidebar button-->
    <button id="mobile-sidebar-button" class="btn d-sm-block d-md-none">
        <span class="fa fa-chevron-right"></span>
    </button>
    <!--Show sidebar button-->

</main>
</body>

</html>