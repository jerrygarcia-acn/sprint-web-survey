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
            <div class="container inline">
                <div class="row">
                    <div class="col-12 col-lg-8 mainContent">
                        <div class="row">
                            <div class="col-12 col-12-ChoosePath">
                                <h4>Choose your path.</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-12-ChoosePath">
                                <p class="p-subtitle">Lorem ipsum dolor sit amet, cons adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore. Lorem ipsum dolor sit amet. (Select all that apply)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="companyInformation.php" method="post" novalidate="novalidate" id="submitChoosePath">
                                    <div class="row choosePath" id="path-id">
                                        <div class="col-12 col-lg-4 text-center chooseBox">
                                            <div class="path">
                                                <label class="first" for="dg">
                                                    <input id="dg" name="dg" value="Digitalization" type="checkbox">
                                                    <img class="choose-img" src="./images/Trend1.png" alt="Digitalization">
                                                    <span>Digitalization</span>
                                                    <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 text-center chooseBox">
                                            <div class="path">
                                                <label class="second" for="cw">
                                                    <input id="cw" name="cw" value="Changing Workforce" type="checkbox">
                                                    <img class="choose-img" src="./images/Trend2.png" alt="Changing Workforce">
                                                    <span>Changing Workforce</span>
                                                    <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 text-center chooseBox">
                                            <div class="path">
                                                <label class="third" for="pd">
                                                    <input id="pd" name="pd" value="Predictable Disruption" type="checkbox">
                                                    <img class="choose-img" src="./images/Trend3.png" alt="Predictive Disruption">
                                                    <span>Predictable Disruption</span>
                                                    <p>Lorem ipsum dolor sit amet, cons adipiscing elit, sed do.</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 .hidden-lg-up text-center">
                                        </div>
                                        <div class="col-12 col-lg-6 text-center nextBtnChoose">
                                            <input id="choosePathNext" value="Next" class="submit" type="submit">
                                        </div>
                                        <img class="hidden-md-up not-visible go-btn" src="./images/goBtn.jpg">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="not-valid-tip" id="errorChoosePath" style="display: none;" role="alert">The field is required.
                                            </span>
                                            <div class="response-output display-none validation-errors" id="errorChoosePathMsg" role="alert">One or more fields have an error. Please check and try again.</div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="survey-sidebar hidden-md-down not-visible">
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
                            <i class="fa fa-refresh"></i> Start Over</button>
                    </div>
                    <div id="SprintModal" class="SprintModal">
                        <div class="SprintModal-content">
                            <span class="close-SprintModal">&times;</span>
                            <h4>Are you sure?</h4>
                            <p>Your answers will not be saved</p>
                            <a class="start-over-btn" id="start-over-btn">Start Over</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Import footer tag-->
        <?php include('./includes/footer.php'); ?>
        <!--Import footer tag-->
        
    </main>
</body>

</html>