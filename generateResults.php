<?php
/**
 * Created by PhpStorm.
 * User: a.valdez
 * Date: 2/14/2018
 * Time: 11:34 AM
 */

//Import GlobalResults class
include_once('./classes/GlobalResults.php');

//Import TrendResults class
include_once('./classes/TrendResults.php');

//Get POST information sent on request
$answers = json_decode($_POST['answers']);
$userInfo = json_decode($_POST['userInfo']);
$chosenPaths = json_decode($_POST['chosenPaths']);
$companyInfo = json_decode($_POST['companyInfo']);
$chosenPathsKeys = json_decode($_POST['chosenPathsKeys']);

//Initialize GlobalResults object
$globalResults = new GlobalResults();

//Filtered answers variable reservation
$filteredAnswers = null;

//Current and future weights constants
define('CURRENT_WEIGHT', 0.6);
define('FUTURE_WEIGHT', 0.7);
define('BASE_SCORE', 0.25);

//Prepare arrays of answers for faster access and understandable process
foreach ($chosenPathsKeys as $chosenPath) {

    //Create new TrendResults object for an individual trend
    $trendResults = new TrendResults();

    $trendResults->name = $chosenPath;
    $filteredAnswers[$chosenPath] = [];


    foreach ($answers as $answer) {

        //Store the answers that are from the same trend
        if ($answer->trend == $chosenPath) {
            array_push($filteredAnswers[$chosenPath], $answer);
        }
    }

    //Save single trend information placeholder
    $globalResults->trendResults[$chosenPath] = $trendResults;
}

//Start processing individual trend information
foreach ($chosenPathsKeys as $chosenPathsKey) {
    //Count how many questions do affect each time
    $futureCountingAnswers = 0;
    $todayCountingAnswers = 0;

    //Cumulative score of each time
    $futureCumulativeScore = 0;
    $todayCumulativeScore = 0;

    foreach ($filteredAnswers[$chosenPathsKey] as $trendAnswers) {
        if ($trendAnswers->questionImpactOnTodayScore) {
            $todayCountingAnswers++;

            foreach($trendAnswers->todayAnswers as $answerScore) {
                $todayCumulativeScore += $answerScore;
            }
        }

        if ($trendAnswers->questionImpactOnFutureScore) {
            $futureCountingAnswers++;

            foreach($trendAnswers->futureAnswers as $answerScore) {
                $futureCumulativeScore += $answerScore;
            }
        }
    }

    //Calculate scores of each time for each trend selected
    $todayDivider = ($todayCountingAnswers * 5) / CURRENT_WEIGHT;
    $futureDivider = ($futureCountingAnswers * 5) / FUTURE_WEIGHT;

    $todayScore = ($todayCumulativeScore / $todayDivider) + BASE_SCORE;
    $futureScore = ($futureCumulativeScore / $futureDivider) + BASE_SCORE;

    $globalResults->trendResults[$chosenPathsKey]->currentPercentage = $todayScore;
    $globalResults->trendResults[$chosenPathsKey]->futurePercentage = $futureScore;
}

echo json_encode($globalResults);
