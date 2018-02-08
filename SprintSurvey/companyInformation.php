<?php
//Specify page title (Optional)
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
                        <div class="col-12 col-12-Company">
                            <h4>Tell us more about your company.</h4>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12 pt-5">
                            <form action="./surveyQuestions.php" method="post" class="form" id="companyForm">
                                <input hidden name="pathChosen" id="pathChosen" value="">
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="company">Company Name: *</label>
                                        <input class="text-style" id="company" type="text" name="companyName" value=""
                                               size="40" required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="induChosen">Industry: *</label>
                                        <select id="induChosen" name="induChosen" class="options" required>
                                            <option>---</option>
                                            <option value="Banking / Insurance">Banking / Insurance</option>
                                            <option value="Construction / Field Service">Construction / Field Service
                                            </option>
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
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="sec">Sector: *</label>
                                        <div class="row m-0">
                                            <div class="btn-group col-12 p-0 company-radios" data-toggle="buttons">
                                                <label class="btn btn-primary col-6 align-middle">
                                                    <input type="radio" name="sector" value="Private">Private
                                                </label>
                                                <label class="btn btn-primary col-6">
                                                    <input type="radio" name="sector" value="Public">Public
                                                </label>
                                            </div>
                                        </div>
                                        <span class="not-valid-tip" id="errorChoosePathSector" style="display:none;"
                                              role="alert">The field is required.</span>
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="employees">Number of Employees: *</label>
                                        <select id="employees" name="employees"
                                                class="select validates-as-required" required>
                                            <option value="">---</option>
                                            <option value="1-10">1-10</option>
                                            <option value="11-100">11-100</option>
                                            <option value="101-1,000">101-1,000</option>
                                            <option value="+1,000">+1,000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle">Current Business Customer? *</label>
                                        <div class="row m-0">
                                            <div class="btn-group col-12 p-0 company-radios" data-toggle="buttons">
                                                <label class="btn btn-primary col-6">
                                                    <input type="radio" name="currentBusiness" value="Yes">Yes
                                                </label>
                                                <label class="btn btn-primary col-6">
                                                    <input type="radio" name="currentBusiness" value="No">No
                                                </label>
                                            </div>
                                        </div>
                                        <span class="not-valid-tip" id="errorChoosePathBusiness"
                                              style="display:none;" role="alert">The field is required.</span>
                                    </div>
                                </div>
                                <div class="row m-0 pt-5">
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="response-output display-none validation-errors"
                                             id="errorChoosePathMsg" role="alert">
                                            One or more fields have an error. Please check and try again.
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="survey-sidebar hidden-md-down not-visible offset-2 col-md-4 col-12">
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