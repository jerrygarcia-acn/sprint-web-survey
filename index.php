<?php
//Specify the page title (Optional)
//  Default page title: Sprint | Works for Business
$pageTitle = "This is a custom title";
?>

<!--Import HTML head tags-->
<?php include('./includes/head.php'); ?>
<body>
<main>
    <!--Import navbar and header of page-->
    <?php include('./includes/header.php') ?>
    <!--Import navbar and header of page-->
    <section>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <img class='img-fluid' src="./images/homeBanner.png" alt="page banner" srcset="images/homeBanner_1680px.png 1680w, images/homeBanner_1024px.png 1024w,
                    images/homeBanner_800px.png 800w, images/homeBanner_480px.png 480w">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="survey-title h2">Measure your readiness in these key trends</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <div class="key-trend">
                        <img src="./images/Trend1.png" alt="Digitalization">
                        <span class="key-trend-title">Digitalization</span>
                        <p class="index-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa laborum
                            deleniti ea qui, architecto
                            ipsum eos earum atque porro aperiam deserunt optio labore</p>
                        <hr class="hidden-md-up not-visible">
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="key-trend">
                        <img src="./images/Trend2.png" alt="Changing Workforce">
                        <span class="key-trend-title">Changing Workforce</span>
                        <p class="index-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem sapiente
                            minima asperiores ea,
                            debitis dolorum eius sint eos, quas laudantium</p>
                        <hr class="hidden-md-up not-visible">
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="key-trend">
                        <img src="./images/Trend3.png" alt="Predictive Disruption">
                        <span class="key-trend-title">Predictive Disruption</span>
                        <p class="index-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim perspiciatis
                            cupiditate excepturi
                            dignissimos fugiat! Officia ipsum eius
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section class="start-survey">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-12 px-0 px-md-3">
                        <p>Lorem ipsum dolor sit amet consectetur eligendi? </p>
                    </div>
                    <div class="col-md-2 col-12 px-0 px-md-3">
                        <a class="previous" href="choosePath.php">Start Survey</a>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="survey-info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="survey-title h2">Learn how your business is performing</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="key-trend-info">
                        <img src="./images/speed.png" alt="Predictive Disruption">
                        <span class="key-trend-title">Digital Score</span>
                        <p class="index-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim perspiciatis
                            cupiditate excepturi
                            dignissimos fugiat! Officia ipsum eius</p>
                        <p class="hidden-md-up not-visible see-more-text">See More</p>
                        <hr class="hidden-md-up not-visible ">

                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="key-trend-info">
                        <img src="./images/email.png" alt="Predictive Disruption">
                        <span class="key-trend-title">In-Depth Report</span>
                        <p class="index-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim perspiciatis
                            cupiditate excepturi
                            dignissimos fugiat! Officia ipsum eius</p>
                        <p class="hidden-md-up not-visible see-more-text">See More</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Import navbar and header of page-->
    <?php include('./includes/footer.php') ?>
    <!--Import navbar and header of page-->
</main>
</body>
</html>
