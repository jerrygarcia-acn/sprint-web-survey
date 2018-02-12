<?php
/**
 * Created by PhpStorm.
 * User: a.valdez
 * Date: 2/12/2018
 * Time: 10:59 AM
 */

//Function to optimize search instead of in_array (optional approach)
function isInArray($array, $key) {
    foreach($array as $element) {
        $new[$element] = 1;
    }

    return isset($new[$key]);
}

//Function that filters questions depending on user input in past forms
function filterQuestions($questions, $selectedIndustry, $chosenPathsCount, $chosenPathsKeys) {
    //Global questions array that will be returned after question filtering
    $filteredQuestions = [];

    //Switch depending on how many trends were selected
    switch ($chosenPathsCount) {
        case 1:
            foreach($questions as $question) {
                if ($chosenPathsKeys[0] == $question->trend
                    && in_array($selectedIndustry->industryGroupName, $question->industryGroups)){
                    array_push($filteredQuestions, $question);
                }
            }
            break;
        case 2:
            foreach($questions as $question) {
                if (($chosenPathsKeys[0] == $question->trend
                    || $chosenPathsKeys[1] == $question->trend)
                    && in_array($selectedIndustry->industryGroupName, $question->industryGroups)
                    && $question->selectedTrends > 1) {
                    array_push($filteredQuestions, $question);
                }
            }
            break;
        case 3:
            foreach($questions as $question) {
                if (($chosenPathsKeys[0] == $question->trend
                    || $chosenPathsKeys[1] == $question->trend
                    || $chosenPathsKeys[2] == $question->trend)
                    && in_array($selectedIndustry->industryGroupName, $question->industryGroups)
                    && $question->selectedTrends == 3) {
                    array_push($filteredQuestions, $question);
                }
            }
            break;
        default:
            echo "Error: Could not get questions from json file.";
            break;
    }

    echo json_encode($filteredQuestions);
}

//Get user input information from POST
$chosenPaths = json_decode($_POST['chosenPaths'], true);
$chosenPathsCount = $_POST['chosenPathsCount'];
$industrySelected = $_POST['industry'];

//Chosen Paths key names
$chosenPathsKeys = array_keys($chosenPaths, true);

//Get industries information on load
$industryJson = file_get_contents('./json/industries.json');
$industryJsonData = json_decode($industryJson);
$industries = $industryJsonData->Industries;

//Get the selected industry object from industry name
foreach($industries as $industry) {
    if ($industrySelected == $industry->industryName) {
        $industrySelected = $industry;
        break;
    }
}

//Get questions on load
$questionsJson = file_get_contents('./json/questions.json');
$questionsJsonData = json_decode($questionsJson);
$questions = $questionsJsonData->Questions;

//Call question filter function
filterQuestions($questions, $industrySelected, $chosenPathsCount,$chosenPathsKeys);