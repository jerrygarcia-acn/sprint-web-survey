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
                            <p class="h4">Tell us more about your company.</p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12 pt-5">
                            <form action="surveyQuestions.php" method="post" class="form" id="companyForm">
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="companyName">Company Name: *</label>
                                        <input class="text-style" id="companyName" type="text" name="companyName"
                                               value=""
                                               size="40" required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="industry">Industry: *</label>
                                        <select id="industry" name="industry" class="options" required>
                                            <option value="">---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="sec">Sector: *</label>
                                        <div class="row m-0">
                                            <div class="btn-group col-12 p-0 company-radios" data-toggle="buttons">
                                                <label class="btn btn-primary col-6">
                                                    <input type="radio" name="sector" value="Private">Private
                                                </label>
                                                <label class="btn btn-primary col-6">
                                                    <input type="radio" name="sector" value="Public">Public
                                                </label>
                                            </div>
                                        </div>
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

    <!--Load companyInformation.js-->
    <script src="./js/companyInformation.js"></script>
    <!--Load companyInformation.js-->

</main>
</body>
</html>