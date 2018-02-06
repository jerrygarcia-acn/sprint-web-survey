<html>

    <head>
        <title>Sprint | Works for Business</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/resultPage.js"></script>

    </head>

    <body>
        <main id="page">
            <header>
                <div class="container">
                    <div class="row hidden-md-down not-visible">
                        <div class="col-md-12">
                            <ul class="top-link">
                                <li>
                                    <a href="">Mobility-as-a-service</a>
                                </li>
                                <li>
                                    <a href="">Small Business </a>
                                </li>
                                <li>
                                    <a href="">Consumer Site</a>
                                </li>
                                <li>
                                    <a href="">Wholesale Site</a>
                                </li>
                                <li>
                                    <a href="">Find a Store</a>
                                </li>
                                <li>
                                    <a href="">Shopping Cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="logo">
                                <img class="hidden-md-down not-visible" src="images/SprintLogo.png">
                                <img class="logo-mobile hidden-lg-up visible" src="images/SprintLogoAlone.png">
                            </div>
                        </div>
                        <div class="col-8 col-lg-9">
                            <div class="slogan">
                                <h3>Works for Business
                                    <sup>™</sup>
                                </h3>
                            </div>
                        </div>
                        <div class="col-2 col-lg-1 hidden-lg-up visible ">
                            <img class="menu-icon" src="images/burgerMenuNew.svg">
                        </div>
                    </div>
                    <div class="row hidden-md-down not-visible">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">I would like to...</a>
                                </li>
                                <li>
                                    <a href="#">Solutions</a>
                                </li>
                                <li>
                                    <a href="#">New Ideas</a>
                                </li>
                                <li>
                                    <a href="#">Why Sprint</a>
                                </li>
                                <li>
                                    <a href="#">Shop</a>
                                </li>
                                <li>
                                    <a href="#">My Sprint</a>
                                </li>
                                <li>
                                    <a href="#">Sign in</a>
                                </li>
                            </ul>
                        </nav>
                        <span class="search-icon"></span>
                    </div>
                </div>
            </header>
            <section class="result-info">
                <div class="container">
                    
                    <?php
                        $jsonAnswer = $_POST["jsonAnswer"];
                        $FName = $_POST["FName"];
                        $LName = $_POST["LName"];
                        $Title = $_POST["Title"];
                        $Dept = $_POST["Dept"];
                        $Zip = $_POST["Zip"];
                        $Tel = $_POST["Tel"];
                        $Mail = $_POST["Mail"];
                    ?>
                
                       
                    <div id="jsonAnswer" style="display:none;"><?php echo $jsonAnswer ?></div>
                    <div id="FName" style="display:none;"><?php echo $FName ?></div>
                    <div id="LName" style="display:none;"><?php echo $LName ?></div>
                    <div id="Title" style="display:none;"><?php echo $Title ?></div>
                    <div id="Dept" style="display:none;"><?php echo $Dept ?></div>
                    <div id="Zip" style="display:none;"><?php echo $Zip ?></div>
                    <div id="Tel" style="display:none;"><?php echo $Tel ?></div>
                    <div id="Mail" style="display:none;"><?php echo $Mail ?></div>
                    

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
                                <a id="SprintModalBtnResults" class="survey-button" href="/SprintSurvey/index.php">Retake Survey</a>
                            </p>
                        </div>
                    </div>
                </div>              
            </section>
            <section>
                <div class="container">
                    <div class="row results-section3" id="DigitalizationMsg">
                        <div class="col-12 col-lg-2 results-score ">
                            <img src="../SprintSurvey/images/Trend1.jpg">
                        </div>
                        <div class="col-12 col-lg-10 results-score" id="DigitalizationMessage">
                            <h4>Digitalization</h4>
                            <p  class="results-text"></p>
                        </div>
                        <p class="hidden-md-up not-visible see-more-text-result">See More</p>
                    </div>
                    <hr>
                    <div class="row results-section3" id="ChangingForceMsg">
                        <div class="col-12 col-lg-2 results-score ">
                            <img src="../SprintSurvey/images/Trend2.jpg">
                        </div>
                        <div class="col-12 col-lg-10 results-score" id="ChangingForceMessage">
                            <h4 class="result-mobile">Changing Workforce</h4>
                            <p  class="results-text"></p>
                        </div>
                        <p class="hidden-md-up not-visible see-more-text-result">See More</p>
                    </div>
                    <hr>
                    <div class="row results-section3" id="PredictableMsg">
                        <div class="col-12 col-lg-2 results-score ">
                            <img src="../SprintSurvey/images/Trend3.jpg">
                        </div>
                        <div class="col-12 col-lg-10 results-score" id="PredictableMessage">
                            <h4>Predictive Disruption</h4>
                            <p  class="results-text"></p>
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
                                    <a id="SprintModalBtnResults2" class="survey-button" href="/SprintSurvey/index.php">Retake Survey</a>
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
                            <img src="../SprintSurvey/images/email.png" alt="email" class="icon-email-mobile">
                        </div>
                        <div class="col-12 col-lg-10 results-section2 results-score">
                            <h4>Check your email to access your In-Depth Report.</h4>
                        </div>
                        <div class="col-2 results-section2 results-score  hidden-md-down not-visible ">
                            <img src="../SprintSurvey/images/email.png" alt="email">
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
                                        <img src="/SprintSurvey/images/solution.png" />
                                        <h4>Small Business Tech Glosary</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed interdum
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
                                    <img src="/SprintSurvey/images/solution.png" />
                                    <h4>Small Business Tech Glosary</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed interdum
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
                                    <img src="/SprintSurvey/images/solution.png" />
                                    <h4>Small Business Tech Glosary</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend, dolor sed interdum
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
                            <h5>Want to talk</h4>
                                <h3>1-866-700-0034</h4>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-lg-9">
                            <div class="row">
                                <div class="col-12">
                                    <ul>
                                        <li>
                                            <a href="#">News</a>
                                        </li>
                                        <li>
                                            <a href="#">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Legal</a>
                                        </li>
                                        <li>
                                            <a href="#">Privacy</a>
                                        </li>
                                        <li>
                                            <a href="#">Ad Choices</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="copyright">&copy; 2018 Sprint.com. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <ul class="social-links">
                                        <li>
                                            <a href="https://www.facebook.com/sprint" target="_blank" class="btn btn-social-icon btn-facebook">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/sprintbusiness" target="_blank" class="btn btn-social-icon btn-twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/sprint" target="_blank" class="btn btn-social-icon btn-linkedin">
                                                <span class="fa fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/u/0/+Sprint/posts" target="_blank" class="btn btn-social-icon btn-google">
                                                <span class="fa fa-google"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </body>

</html>