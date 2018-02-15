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

//Create ENUM that helps with category position name
abstract class Position {
    const TRAILING = 1;
    const AVERAGE = 2;
    const OPTIMIZED = 3;
    const LEADING = 4;
}

//Create ENUM to handle growth levels
abstract class ChangePosition {
    const UP = 1;
    const SAME = 0;
    const DOWN = -1;
}

//Create ENUM to handle Growth Outlook table
abstract class GrowthOutlook {
    const FALLBACK = 1;
    const LOW = 2;
    const MEDIUM = 3;
    const HIGH = 4;
    const AGGRESSIVE = 5;
    const UNREALISTIC = 6;
}

//Set the position of the score sent, using ranges defined in excel
function setPosition($score, $time, $globalResults, $chosenPathsKey = null) {

    //Reuse same function for globals and trends
    if ($chosenPathsKey != null) {
        //Time corresponding to current variables
        if ($time == 'today') {
            if (($score >= 0) && ($score <= 0.39)) $globalResults->trendResults[$chosenPathsKey]->currentPosition = Position::TRAILING;
            if (($score >= 0.40) && ($score <= 0.59)) $globalResults->trendResults[$chosenPathsKey]->currentPosition = Position::AVERAGE;
            if (($score >= 0.60) && ($score <= 0.72)) $globalResults->trendResults[$chosenPathsKey]->currentPosition = Position::OPTIMIZED;
            if (($score >= 0.73) && ($score <= 1)) $globalResults->trendResults[$chosenPathsKey]->currentPosition = Position::LEADING;
        } else {
            //Time corresponding to future variables
            if (($score >= 0) && ($score <= 0.44)) $globalResults->trendResults[$chosenPathsKey]->futurePosition = Position::TRAILING;
            if (($score >= 0.45) && ($score <= 0.64)) $globalResults->trendResults[$chosenPathsKey]->futurePosition = Position::AVERAGE;
            if (($score >= 0.65) && ($score <= 0.82)) $globalResults->trendResults[$chosenPathsKey]->futurePosition = Position::OPTIMIZED;
            if (($score >= 0.83) && ($score <= 1)) $globalResults->trendResults[$chosenPathsKey]->futurePosition = Position::LEADING;
        }
    } else {
        if ($time == 'today') {
            if ((0 <= $score) && ($score <= 0.39)) $globalResults->currentPosition = Position::TRAILING;
            if ((0.40 <= $score) && ($score <= 0.59)) $globalResults->currentPosition = Position::AVERAGE;
            if ((0.60 <= $score) && ($score <= 0.72)) $globalResults->currentPosition = Position::OPTIMIZED;
            if ((0.73 <= $score) && ($score <= 1)) $globalResults->currentPosition = Position::LEADING;
        } else {
            //Time corresponding to future variables
            if ((0 <= $score) && ($score <= 0.44)) $globalResults->futurePosition = Position::TRAILING;
            if ((0.45 <= $score) && ($score <= 0.64)) $globalResults->futurePosition = Position::AVERAGE;
            if ((0.65 <= $score) && ($score <= 0.82)) $globalResults->futurePosition = Position::OPTIMIZED;
            if ((0.83 <= $score) && ($score <= 1)) $globalResults->futurePosition = Position::LEADING;
        }
    }
}

//Set the position change using future and current positions
function setPositionChange($currentPosition, $futurePosition, $globalResults, $chosenPathsKey = null) {
    //One operation done instead of every if
    $result = round($futurePosition - $currentPosition, 2);

    //Reuse same function for globals and trends
    if ($chosenPathsKey != null) {
        //Check for growth outlet using future and current positions
        if ($result > 0) $globalResults->trendResults[$chosenPathsKey]->positionChange = ChangePosition::UP;
        if ($result == 0) $globalResults->trendResults[$chosenPathsKey]->positionChange = ChangePosition::SAME;
        if ($result < 0) $globalResults->trendResults[$chosenPathsKey]->positionChange = ChangePosition::DOWN;
    } else {
        if ($result > 0) $globalResults->positionChange = ChangePosition::UP;
        if ($result == 0) $globalResults->positionChange = ChangePosition::SAME;
        if ($result < 0) $globalResults->positionChange = ChangePosition::DOWN;
    }
}

//Set the growth outlook using future and current scores
function setGrowthOutlook($currentScore, $futureScore, $globalResults, $chosenPathsKey = null) {
    //One operation done instead of every if
    $result = round($futureScore - $currentScore, 2);

    //Reuse same function for globals and trends
    if ($chosenPathsKey != null) {
        //Trend GrowthOutlook selection
        if (($result >= -0.60) && ($result <= 0)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::FALLBACK;
        if (($result >= 0.01) && ($result <= 0.04)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::LOW;
        if (($result >= 0.05) && ($result <= 0.08)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::MEDIUM;
        if (($result >= 0.09) && ($result <= 0.16)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::HIGH;
        if (($result >= 0.17) && ($result <= 0.34)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::AGGRESSIVE;
        if (($result >= 0.35) && ($result <= 1)) $globalResults->trendResults[$chosenPathsKey]->growthOutlook = GrowthOutlook::UNREALISTIC;
    } else {
        if (($result >= -0.60) && ($result <= 0)) $globalResults->growthOutlook = GrowthOutlook::FALLBACK;
        if (($result >= 0.01) && ($result <= 0.04)) $globalResults->growthOutlook = GrowthOutlook::LOW;
        if (($result >= 0.05) && ($result <= 0.08)) $globalResults->growthOutlook = GrowthOutlook::MEDIUM;
        if (($result >= 0.09) && ($result <= 0.16)) $globalResults->growthOutlook = GrowthOutlook::HIGH;
        if (($result >= 0.17) && ($result <= 0.34)) $globalResults->growthOutlook = GrowthOutlook::AGGRESSIVE;
        if (($result >= 0.35) && ($result <= 1)) $globalResults->growthOutlook = GrowthOutlook::UNREALISTIC;
    }
}

//Function that selects the narratives of a trend result or global result
function setNarratives($narratives, $globalResults, $chosenPathsKey = null) {

    if ($chosenPathsKey != null) {
        //Set individual trend messages
        foreach ($narratives as $narrative) {
            if ($globalResults->trendResults[$chosenPathsKey]->currentPosition == $narrative->currentPosition
                && $globalResults->trendResults[$chosenPathsKey]->futurePosition == $narrative->futurePosition
                && $globalResults->trendResults[$chosenPathsKey]->positionChange == $narrative->positionChange
                && $globalResults->trendResults[$chosenPathsKey]->growthOutlook == $narrative->growthOutlook) {
                $globalResults->trendResults[$chosenPathsKey]->currentMessage = $narrative->currentMessage;
                $globalResults->trendResults[$chosenPathsKey]->futureMessage = $narrative->futureMessage;
            }
        }
    } else {
        //Set global results messages
        foreach ($narratives as $narrative) {
            if ($globalResults->currentPosition == $narrative->currentPosition
                && $globalResults->futurePosition == $narrative->futurePosition
                && $globalResults->growthOutlook == $narrative->growthOutlook
                && $globalResults->positionChange == $narrative->positionChange) {
                $globalResults->currentMessage = $narrative->currentMessage;
                $globalResults->futureMessage = $narrative->futureMessage;
                $globalResults->trendMessages['changingWorkforce'] = $narrative->whatDoesThisMean_CW;
                $globalResults->trendMessages['digitalization'] = $narrative->whatDoesThisMean_DZ;
                $globalResults->trendMessages['predictableDisruption'] = $narrative->whatDoesThisMean_PD;
            }
        }
    }
}

//Get industry narratives and value for global result
function setIndustryNarratives($globalResults, $selectedIndustry, $chosenPaths) {
    //Industry Benchmark Messages
    $indNarrativesJson = file_get_contents('./json/industryNarratives.json');
    $indNarrativesData = json_decode($indNarrativesJson);
    $indNarratives = $indNarrativesData->IndustryNarratives;

    //Get industry narrative for global result depending on selected trends
    switch (count($globalResults->trendResults)) {
        //One trend selected
        case 1:
            if ($chosenPaths->digitalization) {
                foreach($indNarratives as $indNarrative) {
                    if ($globalResults->currentPosition == $indNarrative->DigPosition
                        && $selectedIndustry->industryGroup == $indNarrative->group
                        && $selectedIndustry->industryName == $indNarrative->industry) {
                        $globalResults->industryBenchmarkMessage = $indNarrative->DI;
                    }
                }
            }

            if ($chosenPaths->changingWorkforce) {
                foreach($indNarratives as $indNarrative) {
                    if ($globalResults->currentPosition == $indNarrative->CWPosition
                        && $selectedIndustry->industryGroup == $indNarrative->group
                        && $selectedIndustry->industryName == $indNarrative->industry) {
                        $globalResults->industryBenchmarkMessage = $indNarrative->CW;
                    }
                    break;
                }
            }

            if ($chosenPaths->predictableDisruption) {
                foreach($indNarratives as $indNarrative) {
                    if ($globalResults->currentPosition == $indNarrative->PDPosition
                        && $selectedIndustry->industryGroup == $indNarrative->group
                        && $selectedIndustry->industryName == $indNarrative->industry) {
                        $globalResults->industryBenchmarkMessage = $indNarrative->PD;
                    }
                    break;
                }
            }
            break;
        //Two trends selected
        case 2:
            if ($chosenPaths->changingWorkforce && $chosenPaths->digitalization) {
                foreach($indNarratives as $indNarrative) {
                    if ($selectedIndustry->industryGroup == $indNarrative->group
                        && $selectedIndustry->industryName == $indNarrative->industry) {
                        $globalResults->industryBenchmarkMessage = $indNarrative->CW_DI;
                        break;
                    }

                }
            }

            if ($chosenPaths->changingWorkforce && $chosenPaths->predictableDisruption) {
                foreach($indNarratives as $indNarrative) {
                    if ($selectedIndustry->industryGroup == $indNarrative->group
                        && $selectedIndustry->industryName == $indNarrative->industry) {
                        $globalResults->industryBenchmarkMessage = $indNarrative->CW_PD;
                        break;
                    }
                }
            }

            if ($chosenPaths->digitalization && $chosenPaths->predictableDisruption) {
            foreach($indNarratives as $indNarrative) {
                if ($selectedIndustry->industryGroup == $indNarrative->group
                    && $selectedIndustry->industryName == $indNarrative->industry) {
                    $globalResults->industryBenchmarkMessage = $indNarrative->DI_PD;
                    break;
                }
            }
        }
            break;
        //Three trends selected
        case 3:
            foreach($indNarratives as $indNarrative) {
                if ($selectedIndustry->industryGroup == $indNarrative->group
                    && $selectedIndustry->industryName == $indNarrative->industries) {
                    $globalResults->industryBenchmarkMessage = $indNarrative->CW_DI_PD;
                    break;
                }
            }
            break;
        default:
            echo json_encode('{error: "Cannot get results"}');
            return;
            break;
    }
}

//Get the industry benchmark value of global results
function setIndustryValue($globalResults, $selectedIndustry, $chosenPaths) {

    //Industry Benchmark Values
    $indValuesJson = file_get_contents('./json/industryBenchmarkValues.json');
    $indValuesData = json_decode($indValuesJson);
    $indNarrativeValues = $indValuesData->IndustryBenckmarkValues;

    //Get industry narrative for global result depending on selected trends
    switch (count($globalResults->trendResults)) {
        //One trend selected
        case 1:
            if ($chosenPaths->digitalization) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->DI;
                    }
                }
            }

            if ($chosenPaths->changingWorkforce) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->CW;
                    }
                    break;
                }
            }

            if ($chosenPaths->predictableDisruption) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->PD;
                    }
                    break;
                }
            }
            break;
        //Two trends selected
        case 2:
            if ($chosenPaths->changingWorkforce && $chosenPaths->digitalization) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->CW_DI;
                        break;
                    }

                }
            }

            if ($chosenPaths->changingWorkforce && $chosenPaths->predictableDisruption) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->CW_PD;
                        break;
                    }
                }
            }

            if ($chosenPaths->digitalization && $chosenPaths->predictableDisruption) {
                foreach($indNarrativeValues as $indNarrativeValue) {
                    if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                        && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                        $globalResults->industryBenchmarkPercentage = $indNarrativeValue->DI_PD;
                        break;
                    }
                }
            }
            break;
        //Three trends selected
        case 3:
            foreach($indNarrativeValues as $indNarrativeValue) {
                if ($selectedIndustry->industryGroup == $indNarrativeValue->group
                    && $selectedIndustry->industryName == $indNarrativeValue->industry) {
                    $globalResults->industryBenchmarkPercentage = $indNarrativeValue->CW_DI_PD;
                    break;
                }
            }
            break;
        default:
            echo json_encode('{error: "Cannot get results"}');
            return;
            break;
    }

}

//Get POST information sent on request
$answers = json_decode($_POST['answers']);
$userInfo = json_decode($_POST['userInfo']);
$chosenPaths = json_decode($_POST['chosenPaths']);
$companyInfo = json_decode($_POST['companyInfo']);
$chosenPathsKeys = json_decode($_POST['chosenPathsKeys']);

//Get industries information on load
$industryJson = file_get_contents('./json/industries.json');
$industryJsonData = json_decode($industryJson);
$industries = $industryJsonData->Industries;
$selectedIndustry = null;

//Get narratives json objects
$narrativesJson = file_get_contents('./json/narratives.json');
$narrativesData = json_decode($narrativesJson);
$narratives = $narrativesData->Narratives;

//Get the selected industry object from companyInfo->industry
foreach ($industries as $industry) {
    if ($companyInfo->industry == $industry->industryName) {
        $industrySelected = $industry;
        break;
    }
}

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

            foreach ($trendAnswers->todayAnswers as $answerScore) {
                $todayCumulativeScore += $answerScore;
            }
        }

        if ($trendAnswers->questionImpactOnFutureScore) {
            $futureCountingAnswers++;

            foreach ($trendAnswers->futureAnswers as $answerScore) {
                $futureCumulativeScore += $answerScore;
            }
        }
    }

    //Calculate scores of each time for each trend selected
    $todayDivider = ($todayCountingAnswers * 5) / CURRENT_WEIGHT;
    $futureDivider = ($futureCountingAnswers * 5) / FUTURE_WEIGHT;

    //Calculate the score of each trend in today and future
    $todayScore = round((($todayCumulativeScore / $todayDivider) + BASE_SCORE), 2);
    $futureScore = round((($futureCumulativeScore / $futureDivider) + BASE_SCORE), 2);

    //Save trend result on its corresponding TrendResults object
    $globalResults->trendResults[$chosenPathsKey]->currentPercentage = $todayScore;
    $globalResults->trendResults[$chosenPathsKey]->futurePercentage = $futureScore;

    //Set the position of each score for each trend
    setPosition($todayScore, 'today', $globalResults, $chosenPathsKey);
    setPosition($futureScore, 'future', $globalResults, $chosenPathsKey);

    //Select the growth outlet from positions
    setPositionChange($globalResults->trendResults[$chosenPathsKey]->currentPosition,
        $globalResults->trendResults[$chosenPathsKey]->futurePosition,
        $globalResults,
        $chosenPathsKey);

    //Select the growth outlet from positions
    setGrowthOutlook($globalResults->trendResults[$chosenPathsKey]->currentPercentage,
        $globalResults->trendResults[$chosenPathsKey]->futurePercentage,
        $globalResults,
        $chosenPathsKey);

    //Set narratives on each trend
    setNarratives($narratives, $globalResults, $chosenPathsKey);

    //Cumulative score to get global scores at the end
    $globalResults->currentPercentage += $todayScore;
    $globalResults->futurePercentage += $futureScore;
}

//Get the average of trend scores for global scores
$globalResults->currentPercentage = round(($globalResults->currentPercentage / count($globalResults->trendResults)), 2);
$globalResults->futurePercentage = round(($globalResults->futurePercentage / count($globalResults->trendResults)), 2);

//Set the position of global scores
setPosition($globalResults->currentPercentage, 'today', $globalResults);
setPosition($globalResults->futurePercentage, 'future', $globalResults);

//Select the global position change from positions
setPositionChange($globalResults->currentPosition, $globalResults->futurePosition, $globalResults);

//Select the global growth outlooks from positions
setGrowthOutlook($globalResults->currentPercentage, $globalResults->futurePercentage, $globalResults);

//Set narratives on global results
setNarratives($narratives, $globalResults);

//Set industry narrative message
setIndustryNarratives($globalResults, $industrySelected, $chosenPaths);

//Set industry benchmark values
setIndustryValue($globalResults, $industrySelected, $chosenPaths);

//Return JSON with generated results
echo json_encode($globalResults);
