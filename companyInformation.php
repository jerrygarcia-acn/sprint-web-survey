<html>

<head>
    <title>Sprint | Works for Business</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/customjs.js"></script>
    <script src="js/companyInformation.js"></script>

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
                <div class="container container-ipad-portraid inline">
                    <div class="row">
                        <div class="col-12 col-lg-9 mainContent">
                            <div class="row">
                                <div class="col-12 col-12-Company">
                                    <h4>Tell us more about your company.</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form action="/SprintSurvey/surveyQuestions.php" method="post" class="form" id="companyForm">
                                        <input hidden name="pathChosen" id="pathChosen" value="">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <p class="bold-subtitle">Company Name: *</p>
                                                    <p>
                                                        <span>
                                                            <input class="text-style" id="company" type="text" name="companyName" value="" size="40" required>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="bold-subtitle">Industry: *</p>
                                                    <p>
                                                        <span>
                                                            <select id="induChosen" name="induChosen" class="options" required>
                                                                <option value="">---</option>
                                                                <option value="Banking / Insurance">Banking / Insurance</option>
                                                                <option value="Construction / Field Service">Construction / Field Service</option>
                                                                <option value="Education">Education</option>
                                                                <option value="Energy">Energy</option>
                                                                <option value="Health">Health</option>
                                                                <option value="Media &amp; Entertainment">Media &amp; Entertainment</option>
                                                                <option value="Professional Services">Professional Services</option>
                                                                <option value="Public">Public</option>
                                                                <option value="Retail">Retail</option>
                                                                <option value="Technology">Technology</option>
                                                                <option value="Transportation">Transportation</option>
                                                                <option value="Utilities">Utilities</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <p class="bold-subtitle">Sector: *</p>
                                                    <p>
                                                        <div class="btn-group col-12 nopadding company-radios" data-toggle="buttons">
                                                            <label class="btn btn-primary col-6">
                                                                <input type="radio" name="sector" value="Private">Private
                                                            </label>
                                                            <label class="btn btn-primary col-6">
                                                                <input type="radio" name="sector" value="Public">Public
                                                            </label>
                                                        </div>
                                                        <span class="not-valid-tip" id="errorChoosePathSector" style="display:none;" role="alert">The field is required.</span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="bold-subtitle">Number of Employees: *</p>
                                                    <p>
                                                        <span class="Emp">
                                                            <select id="employees" name="employees" class="select validates-as-required" required>
                                                                <option value="">---</option>
                                                                <option value="1-10">1-10</option>
                                                                <option value="11-100">11-100</option>
                                                                <option value="101-1,000">101-1,000</option>
                                                                <option value="+1,000">+1,000</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <p class="bold-subtitle">Current Business Customer? *</p>
                                                    <p>
                                                        <div class="btn-group col-12 nopadding company-radios" data-toggle="buttons">
                                                            <label class="btn btn-primary col-6">
                                                                <input type="radio" name="currentBusiness" value="Yes">Yes
                                                            </label>
                                                            <label class="btn btn-primary col-6">
                                                                <input type="radio" name="currentBusiness" value="No">No
                                                            </label>
                                                        </div>
                                                        <span class="not-valid-tip" id="errorChoosePathBusiness" style="display:none;" role="alert">The field is required.</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row next-btn-company">
                                                <div class="col-6 text-center">
                                                    <input type="button" id="prevBtnCompanyInfo" value="Previous" class="previous">
                                                </div>
                                                <div class="col-6 text-center">
                                                    <input type="submit" id="nextBtnCompanyInfo" value="Next" class="submit">
                                                </div>
                                                <img class="hidden-md-up not-visible go-btn-company" src="/SprintSurvey/images/goBtn.jpg">
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="response-output display-none validation-errors" id="errorChoosePathMsg" role="alert">
                                                        One or more fields have an error. Please check and try again.
                                                    </div>
                                                </div>
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
                        <div class="inner-survey-path done sideDesktop">
                            <span class="icon done">
                                <i class="fa fa-road"></i>
                            </span> 
                            <span>01. Choose your Path</span>
                        </div>
                        <div class="inner-survey-path yellow sideDesktop">
                            <span class="icon yellow">
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