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
            <div class="row">
                <div class="col-12 col-md-6 p-0 pt-5 pb-4 limit-width">
                    <div class="row m-0">
                        <div class="col-12">
                            <p class="user-info-align h4">Lastly, tell us a little more about you.</p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12 pt-5">
                            <form action="resultPage.php" method="post" class="form" id="userInfoForm">
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="firstName">First Name: *</label>
                                        <input class="text-style" id="firstName" type="text" name="firstName" value=""
                                               size="40" required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="lastName">Last Name: *</label>
                                        <input class="text-style" id="lastName" type="text" name="lastName" value=""
                                               size="40" required>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="title">Title: *</label>
                                        <select class="text-style" id="title" name="title" required>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Miss">Miss</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="department">Department: *</label>
                                        <select class="text-style" id="department" name="department" required>
                                            <option value="Department 1">Department 1</option>
                                            <option value="Department 2">Department 2</option>
                                            <option value="Department 3">Department 3</option>
                                            <option value="Department 4">Department 4</option>
                                            <option value="Department 5">Department 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="zipCode">Zip Code: *</label>
                                        <input class="text-style" type="number" name="zipCode" id="zipCode" value=""
                                               required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="phone">Phone Number: *</label>
                                        <input class="text-style" type="tel" name="phone" id="phone"
                                               pattern="^\d{10}$" value="" size="40" maxlength="10"
                                               minlength="10"
                                               placeholder="Enter your Phone with 10 digits"
                                               required>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-6">
                                        <label class="bold-subtitle" for="email">Email Address: *</label>
                                        <input class="text-style" type="email" name="email" id="email"
                                               value="" size="40"
                                               pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"
                                               required>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-md-12">
                                        <p class="form-footer leyend" id="terms">By
                                            submiting this form, you agree that Sprint or a Sprint Authorized
                                            Business
                                            Dealer may contact you about your request and that Sprint may also send
                                            you additional information about business solutions and other service
                                            and product promotions to the email address provided.</p>
                                        <span class="not-valid-tip" id="errorChoosePath" style="display:none;"
                                              role="alert">The field is required.</span>
                                    </div>
                                </div>
                                <div class="row m-0 pt-5 nextBtnSurvey">
                                    <div class="col-6 p-0 text-center">
                                        <input id='previousButton' type="button" value="Previous"
                                               class="previous float-left">
                                    </div>
                                    <div class="col-6 p-0 text-center">
                                        <input type="submit" value="Next" class="submit float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="survey-sidebar sidebar-hidden offset-md-2 col-md-4 col-12" id="survey-sidebar-div">
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
                        <!--Start over modal import-->
                        <?php include('./includes/startOverModal.php') ?>
                        <!--Start over modal import-->
                    </div>
                </div>
            </div>
    </section>

    <!--Import footer tag-->
    <?php include('./includes/footer.php'); ?>
    <!--Import footer tag-->

    <!--Import JS-->
    <script src="./js/userInformation.js"></script>
    <!--Import JS-->

    <!--Show sidebar button-->
    <button id="mobile-sidebar-button" class="btn d-sm-block d-md-none">
        <span class="fa fa-chevron-right"></span>
    </button>
    <!--Show sidebar button-->

</main>
</body>

</html>