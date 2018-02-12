//Load needed cookies
const chosenPaths = Cookies.getJSON('chosenPaths');
const companyInfo = Cookies.getJSON('companyInfo');
const chosenPathsCount = Object.values(chosenPaths).filter(value => value).length;

$.post('./questionSelectionV2.php', {
        chosenPaths: Cookies.get('chosenPaths'),
        chosenPathsCount: chosenPathsCount,
        industry: companyInfo.industry
    })
    .done(function (data) {

        const questions = JSON.parse(data);
        console.log(questions.length + ' questions');
        console.table(questions);

    });

/*
$.get('./json/questions.json')
    .done(function (data) {

        console.log("asjkdhfkljasdh");
        console.log(data);

    });*/
