//Get the resultss from
function getSurveyResults() {

    const chosenPaths = Cookies.getJSON('chosenPaths');
    const chosenPathKeys = Object.keys(chosenPaths).filter(key => chosenPaths[key]);

    const postParameters = {
        answers: Cookies.get('answers'),
        userInfo: Cookies.get('userInfo'),
        chosenPaths: Cookies.get('chosenPaths'),
        companyInfo: Cookies.get('companyInfo'),
        chosenPathsKeys: JSON.stringify(chosenPathKeys)
    };

    $.post('./generateResults.php', postParameters)
        .done(function (data) {
            const results = JSON.parse(data);

            $("#CurrentScore").append(results.currentPercentage * 100 + '%');
            $("#CurrentScoreMessage").append(results.currentMessage);
            $("#FutureScore").append(results.futurePercentage * 100 + '%');
            $("#FutureScoreMessage").append(results.futureMessage);
            $("#IndustryScore").append(results.industryBenchmarkPercentage + '%');
            $("#IndustryScoreMessage").append(results.industryBenchmarkMessage);

            const trendMessages = results.trendMessages;

            if (chosenPaths.digitalization) {
                $("#DigitalizationMessage").append(trendMessages.digitalization);
                $("#DigitalizationMessageContainer").removeClass('d-none');
                $('#DigitalizationContainerDivider').removeClass('d-none');
            }

            if (chosenPaths.changingWorkforce) {
                $("#ChangingForceMessage").append(trendMessages.changingWorkforce);
                $("#ChangingForceMessageContainer").removeClass('d-none');
                $('#ChangingForceContainerDivider').removeClass('d-none');
            }

            if (chosenPaths.predictableDisruption) {
                $("#PredictableMessage").append(trendMessages.predictableDisruption);
                $("#PredictableMessageContainer").removeClass('d-none');
            }

            console.log(trendMessages);
        });
}

$(document).ready(function () {
    getSurveyResults();
});