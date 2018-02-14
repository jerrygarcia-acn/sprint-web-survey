//Load needed cookies
const chosenPaths = Cookies.getJSON('chosenPaths');
const companyInfo = Cookies.getJSON('companyInfo');
const chosenPathsCount = Object.values(chosenPaths).filter(value => value).length;

//Declaring global variables to use on script
var totalQuestions;
var totalSections;
var forwardIndex = 0;
var questions;

//Helper variable to access answers object
var currentQuestionId;

//Variables to JQuery references
var $todayQuestion;
var $todaySubtext;
var $todayAnswers;
var $futureQuestion;
var $futureSubtext;
var $futureAnswers;


//Answers object
var answers = {};

//Load questions in page
function getQuestions() {
    $.post('./questionSelectionV2.php', {
        chosenPaths: Cookies.get('chosenPaths'),
        chosenPathsCount: chosenPathsCount,
        industry: companyInfo.industry
    })
        .done(function (data) {
            questions = JSON.parse(data);

            //Total question count
            totalQuestions = questions.length;
            console.log(totalQuestions + ' questions');

            //Question pairs (pages)
            totalSections = totalQuestions / 2;
            console.log(totalSections + ' pairs');


            //Create for each question an answer object associated with that question
            var lastQuestionId = null;

            questions.forEach(function (question) {
                const questionId = question.questionId;

                if (!(questionId === lastQuestionId)) {
                    answers[questionId] = new Answer(question.questionType);
                    lastQuestionId = questionId;
                } else {
                    answers[questionId].futureQuestionType = question.questionType;
                }
            });

            //Save a cookie with the questions that where selected for future purpose
            Cookies.set('questions', questions);

            //Prepare form after
            prepareForm();
        });
}

//Prepare bindings and initialize references of DOM elements needed on form
function prepareForm() {
    //Get reference to form
    const form = $(document).find('#questionsForm');

    //Get previousButton reference
    const previousButton = $(document).find('#previousButton');

    //Get references to dynamic elements
    $todayQuestion = $(document).find('#today-question');
    $todaySubtext = $(document).find('#today-subtext');
    $todayAnswers = $(document).find('#today-answers');

    //Get references to dynamic elements
    $futureQuestion = $(document).find('#future-question');
    $futureSubtext = $(document).find('#future-subtext');
    $futureAnswers = $(document).find('#future-answers');

    //Bind form submit
    form.submit(function () {

        if (forwardIndex < totalQuestions && collectAnswers(currentQuestionId)) {
            showNextQuestion(questions[forwardIndex], questions[forwardIndex + 1]);

            //Select history answers if there is any
            selectHistoryAnswers(currentQuestionId);
            return false;
        } else {

            //Save answers to a cookie
            Cookies.set('answers', answers);
            return true;
        }
    });

    //Create previous button function binding when clicked
    previousButton.click(function () {
        showPreviousQuestion();
    });


    //Show the first question on load
    showNextQuestion(questions[forwardIndex], questions[forwardIndex + 1]);
}

//Show today and future questin description and answer blocks
function showNextQuestion(todayQuestion, futureQuestion) {

    //Print today question in elements
    $todayQuestion.text(todayQuestion.question);

    //If any subtext exists
    if (todayQuestion.subtext) {
        $todaySubtext.empty().append($('<p>', {class: 'help-text', text: todayQuestion.subtext}));
    }

    //Add answers to question
    addAnswerBlock('today', todayQuestion);

    //Print future question in elements
    $futureQuestion.text(futureQuestion.question);

    //If any subtext exists
    if (futureQuestion.subtext) {
        $futureSubtext.empty().append($('<p>', {class: 'help-text', text: futureQuestion.subtext}));
    }

    //Add answers to question
    addAnswerBlock('future', futureQuestion);

    //Increment on how many questions were shown (always two)
    forwardIndex = forwardIndex + 2;
}

function showPreviousQuestion() {
    //Go back 4 questions, the cumulative of the ones shown up to that moment
    if (forwardIndex > 2) {
        forwardIndex = forwardIndex - 4;
        showNextQuestion(questions[forwardIndex], questions[forwardIndex + 1]);

        //Select history answers if any
        selectHistoryAnswers(currentQuestionId);
    }
}

//Create the answer block that belongs to question
function addAnswerBlock(time, question) {
    const answerColumn = $('<div>', {
        id: '',
        class: 'btn-group btn-group-lg btn-vertical col-12 answerSquares',
        'data-toggle': 'buttons'
    });

    //Get the keys that are associated with the weight of the answer and its text
    const answerKeys = Object.keys(question.answers);

    if (question.questionType === 'multiple-answer') {
        //For each key we have to create a label with its input
        answerKeys.forEach(function (key) {
            //Create label input container
            const label = $('<label>', {
                class: 'btn btn-primary col-md-12 col-12'
            });

            //Create input field
            const input = $('<input>', {
                type: 'checkbox',
                name: question.questionId,
                value: key
            });

            //Append input inside label element
            label.append(input);

            //Put text to label
            label.append(question.answers[key]);

            //Append
            answerColumn.append(label);

        });
    } else {
        //For each key we have to create a label with its input
        answerKeys.forEach(function (key) {
            //Create label input container
            const label = $('<label>', {
                class: 'btn btn-primary col-md-12 col-12'
            });

            //Create input field
            const input = $('<input>', {
                type: 'radio',
                name: question.questionId,
                value: key
            });

            //Append input inside label element
            label.append(input);

            //Put text into label
            label.append(question.answers[key]);

            //Append
            answerColumn.append(label);
        });
    }

    //Append answer column to answer section
    if (time === 'today') {
        $todayAnswers.empty().append(answerColumn);
    } else {
        $futureAnswers.empty().append(answerColumn);
    }

    //Update currentQuestionId
    currentQuestionId = question.questionId;
}

//Collect answers of current question
function collectAnswers(questionId) {
    const todayInputs = $todayAnswers.find('[name="' + questionId + '"]');
    const futureInputs = $futureAnswers.find('[name="' + questionId + '"]');

    //Clear answer history to prevent duplicates if any history
    answers[questionId].todayAnswers = [];
    answers[questionId].futureAnswers = [];

    //Check for values that are checked or active class on parent element (Just to make sure)
    todayInputs.each(function () {
        ($(this).is(':checked') || $(this).parent().hasClass('active')) ? answers[questionId].todayAnswers.push($(this).val()) : '';
    });

    futureInputs.each(function () {
        ($(this).is(':checked') || $(this).parent().hasClass('active')) ? answers[questionId].futureAnswers.push($(this).val()) : '';
    });

    if (answers[questionId].todayAnswers.lenght === 0 || answers[questionId].futureAnswers.length === 0) {
        alert('Make sure you select at least one answer on both questions before continuing.');

        //Reset answers array to secure unique answers
        answers[questionId].todayAnswers = [];
        answers[questionId].futureAnswers = [];
        return false;
    }

    return true;
}

//Select questions from they history (if they have any)
function selectHistoryAnswers(questionId) {
    const todayInputs = $todayAnswers.find('[name="' + questionId + '"]');
    const futureInputs = $futureAnswers.find('[name="' + questionId + '"]');

    const todayAnswers = answers[questionId].todayAnswers;
    const futureAnswers = answers[questionId].futureAnswers;

    //Today answers
    if (todayAnswers.lenght > 1) {
        todayAnswers.forEach(function (answer) {
            todayInputs.each(function () {
                if ($(this).val() === answer) {
                    $(this).prop('checked', true);
                    $(this).parent().addClass('active');
                }
            })
        });
    } else {
        todayInputs.each(function () {
            if ($(this).val() === todayAnswers[0]) {
                $(this).prop('checked', true);
                $(this).parent().addClass('active');
            }
        });
    }

    //Future answers
    if (futureAnswers.lenght > 1) {
        futureInputs.each(function () {
                futureAnswers.forEach(function (answer) {
                    if ($(this).val() === answer) {
                        $(this).prop('checked', true);
                        $(this).parent().addClass('active');
                    }
                });
            }
        );
    } else {
        futureInputs.each(function () {
            if ($(this).val() === futureAnswers[0]) {
                $(this).prop('checked', true);
                $(this).parent().addClass('active');
            }
        });
    }
}

$(document).ready(function () {
    getQuestions();
});

