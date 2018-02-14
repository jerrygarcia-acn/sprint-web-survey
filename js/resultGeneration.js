//Get the results from
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
            console.log(JSON.parse(data));
        });
}

$(document).ready(function () {
    getSurveyResults();
});