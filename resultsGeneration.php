<?php 
	header('Content-type: application/json');
	$content = file_get_contents('php://input');
	$data = json_decode($content);

	//Get the trends selected  ###########################
	$trendsSelected = sizeof($data->ChoosePath);
	foreach($data->ChoosePath as $numbers){
		if($numbers == "Changing Workforce"){
			$trendOne = 1;
		}
		elseif($numbers == "Digitalization"){
			$trendTwo = 1;
		}
		elseif($numbers == "Predictable Disruption"){
			$trendThree = 1;
		}
	}

	//Get Industry Selected
	$industrySelected = $data->Industry;
	//Get Industry Group
	$industryJson = file_get_contents('../SprintSurvey/json/industries.json');
	$industrydata = json_decode($industryJson);
	foreach($industrydata->Industries as $industry){
		if($industry->industryName == $industrySelected){
			$industryGroup = $industry->industryGroup;
		}
	}

	//****** Start points addition
	//get Questions and answers
	foreach($data->Questions as $question){
		// verify impact to score, trend and time
		if($question->impactToScore == "Y"){
			foreach($question->answerId as $answer){
				if($question->trend == "Changing Workforce"){
					if($question->time == "Today"){
						$trendScoreId1_current = $trendScoreId1_current + $answer;
						++$trendId1_TotalQuestionsImpactScore_Current;
					}
					else{
						$trendScoreId1_future = $trendScoreId1_future + $answer;
						++$trendId1_TotalQuestionsImpactScore_Future;
					}            
				}
				elseif($question->trend == "Digitalization"){
					if($question->time == "Today"){
						$trendScoreId2_current = $trendScoreId2_current + $answer;
						++$trendId2_TotalQuestionsImpactScore_Current;
					}
					else{
						$trendScoreId2_future = $trendScoreId2_future + $answer;
						++$trendId2_TotalQuestionsImpactScore_Future;
					}
				}
				elseif($question->trend == "Predictable Disruption"){
					if($question->time == "Today"){
						$trendScoreId3_current = $trendScoreId3_current + $answer;
						++$trendId3_TotalQuestionsImpactScore_Current;
					}
					else{
						$trendScoreId3_future = $trendScoreId3_future + $answer;
						++$trendId3_TotalQuestionsImpactScore_Future;
					}
				
				}
			}
		}
	}
	//set constants information
	$currentWeight = number_format(.6, 2);
	$futureWeight = number_format(.7, 2);
	$baseScore = number_format(.25, 2);

	//****** Current score calculation
	// Current score calculation by trend
	if ($trendOne == 1){
		$trendId1_TotalQuestionsImpactScore_Current = $trendId1_TotalQuestionsImpactScore_Current * 5;
		$div = $trendScoreId1_current / $trendId1_TotalQuestionsImpactScore_Current;
		$trendScoreId1_current = $div * $currentWeight;
		$trendScoreId1_current = $trendScoreId1_current + $baseScore;
		$trendScoreId1_current = (float)number_format($trendScoreId1_current, 2, '.', '');
		$trendScoreId1_current = $trendScoreId1_current * 100;
	}
	if ($trendTwo == 1){
		$trendId2_TotalQuestionsImpactScore_Current = $trendId2_TotalQuestionsImpactScore_Current * 5;
		$div = $trendScoreId2_current / $trendId2_TotalQuestionsImpactScore_Current;
		$trendScoreId2_current = $div * $currentWeight;
		$trendScoreId2_current = $trendScoreId2_current + $baseScore;
		$trendScoreId2_current = (float)number_format($trendScoreId2_current, 2, '.', '');
		$trendScoreId2_current = $trendScoreId2_current * 100;
	}
	if ($trendThree == 1){
		$trendId3_TotalQuestionsImpactScore_Current = $trendId3_TotalQuestionsImpactScore_Current * 5;
		$div = $trendScoreId3_current / $trendId3_TotalQuestionsImpactScore_Current;
		$trendScoreId3_current = $div * $currentWeight;
		$trendScoreId3_current = $trendScoreId3_current + $baseScore;
		$trendScoreId3_current = (float)number_format($trendScoreId3_current, 2, '.', '');
		$trendScoreId3_current = $trendScoreId3_current * 100;
	}
	// Composite Current score calculation by trend
	$compositeCurrentScore = ($trendScoreId1_current + $trendScoreId2_current + $trendScoreId3_current) / $trendsSelected;
	$compositeCurrentScore = (float)number_format($compositeCurrentScore, 0, '.', '');

	// Future score calculation by trend
	if ($trendOne == 1){	
		$trendId1_TotalQuestionsImpactScore_Future = $trendId1_TotalQuestionsImpactScore_Future * 5;
		$div = $trendScoreId1_future / $trendId1_TotalQuestionsImpactScore_Future;
		$trendScoreId1_future = $div * $futureWeight; 
		$trendScoreId1_future = $trendScoreId1_future + $baseScore;
		$trendScoreId1_future = (float)number_format($trendScoreId1_future, 2, '.', '');
		$trendScoreId1_future = $trendScoreId1_future * 100;
	}

	if ($trendTwo == 1){
		$trendId2_TotalQuestionsImpactScore_Future = $trendId2_TotalQuestionsImpactScore_Future * 5;
		$div = $trendScoreId2_future / $trendId2_TotalQuestionsImpactScore_Future;
		$trendScoreId2_future = $div * $futureWeight;
		$trendScoreId2_future = $trendScoreId2_future + $baseScore;
		$trendScoreId2_future = (float)number_format($trendScoreId2_future, 2, '.', '');
		$trendScoreId2_future = $trendScoreId2_future * 100;
	}
		
	if ($trendThree == 1){
		$trendId3_TotalQuestionsImpactScore_Future = $trendId3_TotalQuestionsImpactScore_Future * 5;
		$div = $trendScoreId3_future / $trendId3_TotalQuestionsImpactScore_Future;
		$trendScoreId3_future = $div * $futureWeight;
		$trendScoreId3_future = $trendScoreId3_future + $baseScore;
		$trendScoreId3_future = (float)number_format($trendScoreId3_future, 2, '.', '');
		$trendScoreId3_future = $trendScoreId3_future * 100;
	}

	// Composite Future score calculation by trend
	$compositeFutureScore = ($trendScoreId1_future + $trendScoreId2_future + $trendScoreId3_future) / $trendsSelected;	
	$compositeFutureScore = (float)number_format($compositeFutureScore, 0, '.', '');

	// ****** Position value selection
	// Get the lower and upper values for current
	$positionJson = file_get_contents('../SprintSurvey/json/positions.json');
	$positionsData = json_decode($positionJson);
	$positionArrayCurrent = Array();
	$positionArrayFuture = Array();
	$i = 0;
	foreach($positionsData->Positions as $position){
		if($position->time == "Today" && $i <= 4){
			$positionArrayCurrent[$i] = $position;
			$i = $i+1;
		}
	}
	$i = 0;
	foreach($positionsData->Positions as $position){
		if($position->time == "Future" && $i <= 4){
			$positionArrayFuture[$i] = $position;
			$i = $i+1;
		}
	}

	//Position Selection Current
	if($trendOne == 1){
		$result = PositionSelection($positionArrayCurrent, $trendScoreId1_current);
		$currentPositionTrend1_value = $result->positionValue;
		$currentPositionTrend1_name = $result->position;
	}
	if($trendTwo == 1){
		$result = PositionSelection($positionArrayCurrent, $trendScoreId2_current);
		$currentPositionTrend2_value = $result->positionValue;
		$currentPositionTrend2_name = $result->position;
	}
	if($trendThree == 1){
		$result = PositionSelection($positionArrayCurrent, $trendScoreId3_current);
		$currentPositionTrend3_value = $result->positionValue;
		$currentPositionTrend3_name = $result->position;
	}
	
	// Composition Position Selection Current
	$result = PositionSelection($positionArrayCurrent,$compositeCurrentScore);
	$compositeCurrentPosition_value = $result->positionValue;
	$compositeCurrentPosition_name = $result->position;

	//Position Selection Future
	if($trendOne == 1){
		$result = PositionSelection($positionArrayFuture, $trendScoreId1_future);
		$futurePositionTrend1_value = $result->positionValue;
		$futurePositionTrend1_name = $result->position;
	}
	if($trendTwo == 1){
		$result = PositionSelection($positionArrayFuture, $trendScoreId2_future);
		$futurePositionTrend2_value = $result->positionValue;
		$futurePositionTrend2_name = $result->position;
	}
	if($trendThree == 1){
		$result = PositionSelection($positionArrayFuture, $trendScoreId3_future);
		$futurePositionTrend3_value = $result->positionValue;
		$futurePositionTrend3_name = $result->position;
	}
	// Composite Position value selection
	$result = PositionSelection($positionArrayFuture, $compositeFutureScore);
	$compositeFuturePosition_value = $result->positionValue;
	$compositeFuturePosition_name = $result->position;

	// Position Change
	if($trendOne == 1){
		$positionChangeTrend1 = PositionChange ($currentPositionTrend1_value, $futurePositionTrend1_value);
	}
	if($trendTwo == 1){
		$positionChangeTrend2 = PositionChange ($currentPositionTrend2_value, $futurePositionTrend2_value);
	}
	if($trendThree == 1){
		$positionChangeTrend3 = PositionChange ($currentPositionTrend3_value, $futurePositionTrend3_value);
	}
	$compositePositionChange = PositionChange ($compositeCurrentPosition_value, $compositeFuturePosition_value);


	//Growth Outlook
	// Get the lower and upper values for current
	$growthJson = file_get_contents('../SprintSurvey/json/growth.json');
	$growthData = json_decode($growthJson);
	$growthArray = Array();
	$i = 0;
	foreach($growthData->Growths as $growth){
		$growthArray[$i] = $growth;
		$i = $i+1;
	}
	if($trendOne == 1){
		$growthOutlookTrend1 = GrowthSelection($growthArray, $trendScoreId1_current, $trendScoreId1_future);
	}
	if($trendTwo == 1){
		$growthOutlookTrend2 = GrowthSelection($growthArray,$trendScoreId2_current, $trendScoreId2_future);
	}
	if($trendThree == 1){
		$growthOutlookTrend3 = GrowthSelection($growthArray, $trendScoreId3_current, $trendScoreId3_future);
	}

	$compositeGrowthOutlook = GrowthSelection($growthArray, $compositeCurrentScore, $compositeFutureScore);
	
	//Competitiviness Score Messages
	$narrativesJson = file_get_contents('../SprintSurvey/json/narratives.json');
	$narrativesData = json_decode($narrativesJson);$narrativesJson = file_get_contents('../SprintSurvey/json/narratives.json');
	$narrativesData = json_decode($narrativesJson);
	foreach($narrativesData->Narratives as $narrative){

		//Composite message
		if($narrative->currentPosition == $compositeCurrentPosition_name &&  $narrative->growthOutlook == $compositeGrowthOutlook
			&& $narrative->positionChange == $compositePositionChange && $narrative->futurePosition == $compositeFuturePosition_name){
			$competitivinessCurrentMessage = $narrative->currentMessage;
			$competitivinessFutureMessage = $narrative->futureMessages;

		}
		//Competitiveness By Trend Messages selected
		if($trendOne == 1){
			if($narrative->currentPosition == $currentPositionTrend1_name && $narrative->growthOutlook == $growthOutlookTrend1
			&& $narrative->positionChange == $positionChangeTrend1 && $narrative->futurePosition == $futurePositionTrend1_name){
				$trend1Message = $narrative->whatDoesThisMean_CW;
				$trend1CurrentMessage = $narrative->currentMessage;
				$trend1FutureMessage = $narrative->futureMessages;				
			}
		}
		if($trendTwo == 1){			
			if($narrative->currentPosition == $currentPositionTrend2_name && $narrative->futurePosition == $futurePositionTrend2_name
			&& $narrative->positionChange == $positionChangeTrend2 && $narrative->growthOutlook == $growthOutlookTrend2){
				$trend2Message = $narrative->whatDoesThisMean_DZ;
				$trend2CurrentMessage = $narrative->currentMessage;
				$trend2FutureMessage = $narrative->futureMessages;
			}
		}
		if($trendThree == 1){
			if($narrative->currentPosition == $currentPositionTrend3_name && $narrative->futurePosition == $futurePositionTrend3_name
			&& $narrative->positionChange == $positionChangeTrend3 && $narrative->growthOutlook == $growthOutlookTrend3){
				$trend3Message = $narrative->whatDoesThisMean_PD;
				$trend3CurrentMessage = $narrative->currentMessage;
				$trend3FutureMessage = $narrative->futureMessages;
			}
		}
	}

	// Industry Benchmark
	//If the trend is one
	$indNarrativesJson = file_get_contents('../SprintSurvey/json/industryNarratives.json');
	$indNarrativesData = json_decode($indNarrativesJson);
	foreach($indNarrativesData->IndustryNarratives as $narrative){
		if ($trendsSelected == 1){
			if ($trendOne == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->CW;
				}
			}
			elseif($trendTwo == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->DI;
				}
			}
			elseif($trendThree == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->PD;
				}				
			}
		}
		//If the trend is two
		if ($trendsSelected == 2){
			if($trendOne == 1 && $trendTwo == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->CW_DI;
				}
			}
			if($trendOne == 1 && $trendThree == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->CW_PD;
				}
			}
			if($trendTwo == 1 && $trendThree == 1){
				if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
					$industryMsg = $narrative->DI_PD;
				}
			}
		}
		//If the trend is three
		if ($trendsSelected == 3){
			if ($narrative->group == $industryGroup && $narrative->industries == $industrySelected){
				$industryMsg = $narrative->CW_DI_PD;
			}
		}
	}

	//Industry Benchmark Values
	$indValuesJson = file_get_contents('../SprintSurvey/json/industryBenchmarkValues.json');
	$indValuesData = json_decode($indValuesJson);
	foreach($indValuesData->IndustryBenckmarkValues as $narrativeVal){
		if ($narrativeVal->group == $industryGroup && $narrativeVal->industries == $industrySelected){
			if($trendsSelected == 1){
				if ($trendOne == 1){
					$industryValue = $narrativeVal->CW;
				}
				elseif($trendTwo == 1){
					$industryValue = $narrativeVal->DI;
				}
				elseif($trendThree == 1){
					$industryValue = $narrativeVal->PD;	
				}
			}
			//If the trend is two
			if ($trendsSelected == 2){
				if($trendOne == 1 && $trendTwo == 1){
					$industryValue = $narrativeVal->CW_DI;
				}
				if($trendOne == 1 && $trendThree == 1){
					$industryValue = $narrativeVal->CW_PD;
				}
				if($trendTwo == 1 && $trendThree == 1){
					$industryValue = $narrativeVal->DI_PD;
				}
			}
			//If the trend is three
			if ($trendsSelected == 3){
				$industryValue = $narrativeVal->CW_DI_PD;
			}
		}
	}

	$resultMessage = "{\"currentScorePercentage\":\"$compositeCurrentScore%\",
		\"currentScoreMessage\":\"$competitivinessCurrentMessage\",
		\"futureScorePercentage\":\"$compositeFutureScore%\",
		\"futureScoreMessage\":\" $competitivinessFutureMessage\",
		\"industryBenchmarkPercentage\":\"$industryValue%\",
		\"industryBenchmarkMessage\":\"$industryMsg\",
		\"changingWorkforce\":\"$trend1Message\",
		\"digitalization\":\"$trend2Message\",
		\"predictableDisruption\":\"$trend3Message\",
		\"changingWorkforceCurrentPercentage\":\"$trendScoreId1_current\",
		\"changingWorkforceCurrentMessage\":\"$trend1CurrentMessage\",		
		\"changingWorkforceFuturePercentage\":\"$trendScoreId1_future\",
		\"changingWorkforceFutureMessage\":\"$trend1FutureMessage\",
		\"digitalizationCurrentPercentage\":\"$trendScoreId2_current\",
		\"digitalizationCurrentMessage\":\"$trend2CurrentMessage\",
		\"digitalizationFuturePercentage\":\"$trendScoreId2_future\",
		\"digitalizationFutureMessage\":\"$trend2FutureMessage\",
		\"predictableDisruptionCurrentPercentage\":\"$trendScoreId3_current\",
		\"predictableDisruptionCurrentMessage\":\"$trend3CurrentMessage\",
		\"predictableDisruptionFuturePercentage\":\"$trendScoreId3_future\",
		\"predictableDisruptionFutureMessage\":\"$trend3FutureMessage\"}";
		
	echo $resultMessage;


	//Function that selects the position according the percentajes
	function PositionSelection ($array, $score){
		$count = 0;
		foreach($array as $data){
			$lowerLimit = $data->lowerLimit;
			$upperLimit = $data->upperLimit;
			$position = $data->positionValue;
			if($score < $lowerLimit && $count == 0){
				break 1;
			}
			if($score >= $data->lowerLimit && $score <= $data->upperLimit){
				break 1;
			}
			$count = 1;
		}
		return($data);
	}
		
	//Function that define the Position Change
	function PositionChange ($currentPostion, $futurePosition){
		$positionDifference = $futurePosition - $currentPostion;
		if($positionDifference == 0){
			$positionChange = "Same";
		}
		elseif($positionDifference < 0){
			$positionChange = "Down";
		}
		elseif($positionDifference > 0){
			$positionChange = "Up";
		}
		return($positionChange);
	}

	//Function that selects the Growth Outlook
	function GrowthSelection($array, $currentScore, $futureScore){
		$score = $futureScore - $currentScore;
		if($score <= 0){
			$legend = "Fall Behind";
		}else{
			foreach($array as $data){
				$lowerLimit = $data->lowerLimit;
				$upperLimit = $data->upperLimit;
				$legend = $data->legend;
				if($score >= $lowerLimit && $score <= $upperLimit){
					break 1;
				}
			}
		}
		return($legend);
	}
?>