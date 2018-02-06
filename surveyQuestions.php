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
<script src="js/customjs.js"></script>
<script src="../SprintSurvey/js/surveyQuestions.js"></script>
    
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
                    <img class="hidden-md-down not-visible" src="/SprintSurvey/images/SprintLogo.png">
                    <img class="logo-mobile hidden-lg-up visible" src="/SprintSurvey/images/SprintLogoAlone.png">
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
                <img class="menu-icon" src="/SprintSurvey/images/burgerMenuNew.svg">
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
        </div>
    </div>
</header>
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
                                        <input type="button" id="prevBtnUserInfo2"  value="Previous" class="previous">
                                    </div>
                                    <div class="col-6 text-center">
                                            <input type="submit" id="nextBtnUserInfo2" value="Next" class="submit">
                                    </div>
                                </div>
                                <div class="response-output display-none validation-errors" id="errorChoosePathMsg" role="alert">
                                            One or more fields have an error. Please check and try again.
                                </div>
                                <img class="hidden-md-up not-visible go-btn-company" src="/SprintSurvey/images/goBtn.jpg">
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
        <footer  class="footer-desktop">
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
                <div class="row">
                    <div class="col-12">
                        <p class="copyright">&copy; 2018 Sprint.com. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
</main>  
</body>
</html>