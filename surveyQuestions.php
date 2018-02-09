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
                    <form action="userInformation.php" method="post" class="form" novalidate="novalidate">
                        <div class="row m-0">
                            <div class="col-12" id="questionsCon">
                                <input hidden name="company" id="company" value="">
                                <input hidden name="sector" id="sector" value="">
                                <input hidden name="employees" id="employees" value="">
                                <input hidden name="currentBusiness" id="currentBusiness" value="">
                                <input hidden id="answerStorageArray" name="answerStorageArray" value="">
                                <input hidden id="jsonAnswer" name="jsonAnswer" value="">
                                <div id="questionsContainer">
                                    <!-- Here is adding the questions -->
                                </div>
                            </div>

                            <div class="row m-0 nextBtnSurvey" id="hidemeondone">
                                <div class="col-6 text-center" id="hidemeondone2">
                                    <input type="button" id="prevBtnUserInfo1" value="Previous" class="previous">
                                </div>
                                <div class="col-6 text-center">
                                    <input type="button" id="nextBtnUserInfo1" value="Next" class="submit">
                                </div>
                            </div>
                            <!-- Hide until the end (SUBMIT) -->
                            <div class="row m-0 pt-5 nextBtnSurvey" id="hidemetillend">
                                <div class="col-6 text-center" id="hidemetillend2">
                                    <input type="button" id="prevBtnUserInfo2" value="Previous" class="previous">
                                </div>
                                <div class="col-6 text-center">
                                    <input type="submit" id="nextBtnUserInfo2" value="Next" class="submit">
                                </div>
                                <div class="col-6 p-0 text-center">
                                    <input type="button" value="Previous"
                                           class="previous float-left">
                                </div>
                                <div class="col-6 p-0 text-center">
                                    <input type="submit" value="Next" class="submit float-right">
                                </div>
                                <div class="col-12">
                                    <img class="hidden-md-up not-visible go-btn" src="./images/goBtn.jpg">
                                </div>
                            </div>
                            <!-- Hide until the end (SUBMIT) -->
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
            </div>
        </div>
    </section>

    <!--Import footer tag-->
    <?php include('./includes/footer.php'); ?>
    <!--Import footer tag-->

</main>
</body>
</html>