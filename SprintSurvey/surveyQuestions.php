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
                <div class="col-12 col-lg-9 mainContent">
                    <form action="userInformation.php" method="post" class="form" novalidate="novalidate">
                        <div class="container">
                            <div class="row">
                                <div class="col-12" id="questionsCon">
                                    <?php
                                    $pathChosen = $_POST["pathChosen"];
                                    $induChosen = $_POST["induChosen"];
                                    ?>
                                    <div id="pathChosen" style="display:none;"><?php echo $pathChosen ?></div>
                                    <div id="induChosen" style="display:none;"><?php echo $induChosen ?></div>
                                    <input hidden name="company" id="company" value="">
                                    <input hidden name="sector" id="sector" value="">
                                    <input hidden name="employees" id="employees" value="">
                                    <input hidden name="currentBusiness" id="currentBusiness" value="">
                                    <input hidden id="answerStorageArray" name="answerStorageArray" value="">
                                    <input hidden id="jsonAnswer" name="jsonAnswer" value="">
                                    <div id="questionsContainer">
                                        <!-- /Here is adding the questions -->
                                    </div>
                                </div>
                            </div>

                            <div class="row nextBtnSurvey" id="hidemeondone">
                                <div class="col-6 text-center" id="hidemeondone2">
                                    <input type="button" id="prevBtnUserInfo1" value="Previous" class="previous">
                                </div>
                                <div class="col-6 text-center">
                                    <input type="button" id="nextBtnUserInfo1" value="Next" class="submit">
                                </div>
                            </div>
                            <div class="row nextBtnSurvey" id="hidemetillend">
                                <div class="col-6 text-center" id="hidemetillend2">
                                    <input type="button" id="prevBtnUserInfo2" value="Previous" class="previous">
                                </div>
                                <div class="col-6 text-center">
                                    <input type="submit" id="nextBtnUserInfo2" value="Next" class="submit">
                                </div>
                            </div>
                            <div class="response-output display-none validation-errors" id="errorChoosePathMsg"
                                 role="alert">
                                One or more fields have an error. Please check and try again.
                            </div>
                            <img class="hidden-md-up not-visible go-btn-company" src="./images/goBtn.jpg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="survey-sidebar hidden-md-down not-visible">
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