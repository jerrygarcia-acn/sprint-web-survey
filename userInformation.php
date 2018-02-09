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
                    <div class="row">
                        <div class="col-12">
                            <h4 class="user-info-align">Lastly, tell us a little more about you.</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="resultPage.php" method="post" class="form" id="submitCompanyInformation">
                                <?php
                                $jsonAnswer = $_POST["jsonAnswer"];
                                ?>
                                <input hidden name="jsonAnswer" value='<?php echo $jsonAnswer ?>'>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">First Name: *</p>
                                            <p>
                                                <span>
                                                    <input class="text-style" id="FName" type="text" name="FName"
                                                           value="" size="40" required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Last Name: *</p>
                                            <p>
                                                <span>
                                                    <input class="text-style" id="LName" type="text" name="LName"
                                                           value="" size="40" required>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Title: *</p>
                                            <p>
                                                <span>
                                                    <select class="text-style" id="Title" name="Title" required>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Ms">Ms</option>
                                                        <option value="Miss">Miss</option>
                                                    </select>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Department: *</p>
                                            <p>
                                                <span>
                                                    <select class="text-style" id="Dept" name="Dept" required>
                                                        <option value="Department 1">Department 1</option>
                                                        <option value="Department 2">Department 2</option>
                                                        <option value="Department 3">Department 3</option>
                                                        <option value="Department 4">Department 4</option>
                                                        <option value="Department 5">Department 5</option>
                                                    </select>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Zip Code: *</p>
                                            <p>
                                                <span>
                                                    <input class="text-style" type="number" name="Zip" id="Zip"
                                                           value="" required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Phone Number: *</p>
                                            <p>
                                                <span>
                                                    <input class="text-style" type="tel" name="Tel" id="Tel"
                                                           pattern="^\d{10}$" value="" size="40" maxlength="10"
                                                           minlength="10"
                                                           placeholder="Enter your Phone with 10 digits"
                                                           required>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <p class="bold-subtitle">Email Address: *</p>
                                            <p>
                                                <span>
                                                    <input class="text-style" type="email" name="Mail" id="Mail"
                                                           value="" size="40"
                                                           pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"
                                                           required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="form-footer leyend" style="color:#777777; font-size:14px;">By
                                                submiting this form, you agree that Sprint or a Sprint Authorized
                                                Business
                                                Dealer may contact you about your request and that Sprint may also send
                                                you additional information about business solutions and other service
                                                and product promotions to the email address provided.</p>
                                            <span class="not-valid-tip" id="errorChoosePath" style="display:none;"
                                                  role="alert">The field is required.</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <input type="button" value="Previous" class="previous" id="prevBtnUserInfo">
                                        </div>
                                        <div class="col-6 text-center">
                                            <input type="submit" value="Next" class="submit" id="nextBtnUserInfo">
                                        </div>
                                        <img class="hidden-md-up not-visible go-btn-company"
                                             src="/SprintSurvey/images/goBtn.jpg">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="response-output display-none validation-errors"
                                                 id="errorChoosePathMsg" role="alert">
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
                <div class="inner-survey-path done sideDesktop">
                        <span class="icon done">
                            <i class="fa fa-briefcase"></i>
                        </span>
                    <span>02. Company Information</span>
                </div>
                <div class="inner-survey-path done sideDesktop">
                        <span class="icon done">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                    <span>03. Survey Questions</span>
                </div>
                <div class="inner-survey-path yellow sideDesktop">
                        <span class="icon yellow">
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