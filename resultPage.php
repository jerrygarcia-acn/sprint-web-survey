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

    <section class="result-info">
        <div class="container">
            <div class="row">
                <div class="col-12 titles-results">
                    <h1>Your Current Competitiveness Scores</h1>
                    <h5 class="result-subtitle">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h5>
                </div>
            </div>
            <hr class="yellowRule hidden-lg-up">
            <div class="row yellowLeftBorder">
                <div class="col-12 col-lg-2 results-section">
                    <div class="percentages" id="CurrentScore">
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="results-text" id="CurrentScoreMessage">
                        <h4>Your Current Score</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                    <p></p>
                </div>
            </div>
            <div class="row yellowLeftBorder">
                <div class="col-12 col-lg-2 results-section">
                    <div class="percentages benchmark" id="IndustryScore">
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="results-text" id="IndustryScoreMessage">
                        <h4>Your Industry Benchmark</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 titles-results">
                    <h1>Your Future Competitiveness Score</h1>
                    <h5 class="result-subtitle">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h5>
                    <hr class="yellowRule hidden-lg-up">
                </div>
            </div>
            <div class="row yellowLeftBorder">
                <div class="col-12 col-lg-2 results-section">
                    <div class="percentages" id="FutureScore">
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="results-text" id="FutureScoreMessage">
                        <h4>Your Future Score</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <p class="hidden-md-up not-visible see-more-text">See More</p>
        </div>
    </section>
    <section class="competitiveness-trend">
        <div class="container result-container">
            <div class="row results-section2">
                <div class="col-12 col-lg-7 results-section2 results-score">
                    <span>Your Competitiveness by Trend</span>
                    <p></p>
                </div>
                <div id="retakeSurveydiv" class="col-lg-4 hidden-md-down not-visible information-page-yellow ">
                    <p id="retakeSurvey" class="information-take-survey">Want to take the
                        <br>survey again?</p>
                    <p>
                        <a id="SprintModalBtnResults" class="survey-button" href="index.php">Retake
                            Survey</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row results-section3 d-none" id="DigitalizationMessageContainer">
                <div class="col-12 col-lg-2 results-score ">
                    <img src="./images/Trend1.jpg">
                </div>
                <div class="col-12 col-lg-10 results-score" id="DigitalizationMessage">
                    <h4>Digitalization</h4>
                    <p class="results-text"></p>
                </div>
                <p class="hidden-md-up not-visible see-more-text-result">See More</p>
            </div>
            <hr id="DigitalizationContainerDivider" class="d-none">
            <div class="row results-section3 d-none" id="ChangingForceMessageContainer">
                <div class="col-12 col-lg-2 results-score ">
                    <img src="./images/Trend2.jpg">
                </div>
                <div class="col-12 col-lg-10 results-score" id="ChangingForceMessage">
                    <h4 class="result-mobile">Changing Workforce</h4>
                    <p class="results-text"></p>
                </div>
                <p class="hidden-md-up not-visible see-more-text-result">See More</p>
            </div>
            <hr id="ChangingForceContainerDivider" class="d-none">
            <div class="row results-section3 d-none" id="PredictableMessageContainer">
                <div class="col-12 col-lg-2 results-score ">
                    <img src="./images/Trend3.jpg">
                </div>
                <div class="col-12 col-lg-10 results-score" id="PredictableMessage">
                    <h4>Predictive Disruption</h4>
                    <p class="results-text"></p>
                </div>
                <p class="hidden-md-up not-visible see-more-text-result">See More</p>
            </div>
        </div>
        <div class="container result-container">
            <div class="row">
                <div id="retakeSurveydiv2" class="col-12 hidden-md-up not-visible information-page-yellow">
                    <div class="retake-survey-mobile">
                        <p id="retakeSurvey2" class="information-take-survey">Want to take the
                            <br>survey again?</p>
                        <p>
                            <a id="SprintModalBtnResults2" class="submit" href="index.php">Retake
                                Survey</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="yellow-section">
        <div class="container">
            <div class="row">
                <div class="col-12 hidden-lg-up not-visible">
                    <img src="./images/email.png" alt="email" class="icon-email-mobile">
                </div>
                <div class="col-12 col-lg-10 results-section2 results-score">
                    <h4>Check your email to access your In-Depth Report.</h4>
                </div>
                <div class="col-2 results-section2 results-score  hidden-md-down not-visible ">
                    <img src="./images/email.png" alt="email">
                </div>
            </div>
        </div>
    </section>
    <section class="recommended-solutions">
        <div class="container">
            <div class="row">
                <div class="col-12  titles-results">
                    <h4>Recommended Solutions</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <input type="radio" name="cardRadio" id="slt-1" class="card-selcted">
                    <label for="slt-1">
                        <div class="solution-card">
                            <img src="./images/solution.png"/>
                            <h4>Small Business Tech Glosary</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed
                                interdum
                                dignissim, arcu ipsum vulputate tellus, et luctus orci diam nec neque.
                            </p>
                            <div class="card-footer"></div>
                        </div>
                    </label>
                </div>
                <div class="col-12 col-lg-4">
                    <input type="radio" name="cardRadio" id="slt-2" class="card-selcted">
                    <label for="slt-2">
                        <div class="solution-card">
                            <img src="./images/solution.png"/>
                            <h4>Small Business Tech Glosary</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed
                                interdum
                                dignissim, arcu ipsum vulputate tellus, et luctus orci diam nec neque.
                            </p>
                            <div class="card-footer"></div>
                        </div>
                    </label>
                </div>
                <div class="col-12 col-lg-4">
                    <input type="radio" name="cardRadio" id="slt-3" class="card-selcted">
                    <label for="slt-3">
                        <div class="solution-card">
                            <img src="./images/solution.png"/>
                            <h4>Small Business Tech Glosary</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed
                                interdum
                                dignissim, arcu ipsum vulputate tellus, et luctus orci diam nec neque.
                            </p>
                            <div class="card-footer"></div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </section>
    <section class="yellow-section">
        <div class="container">
            <div class="row">
                <div class="col-12 results-section4 results-score ">
                    <h5>Want to talk</h5>
                    <h3>1-866-700-0034</h3>
                </div>
            </div>
        </div>
    </section>

    <!--Import footer tag-->
    <?php include('./includes/footer.php'); ?>
    <!--Import footer tag-->

    <!--Import JS-->
    <script src="./js/resultGeneration.js"></script>
    <!--Import JS-->

</main>
</body>
</html>