<?php
	$PathSelected = $_GET["pathChosen"];
	$InduSelected = $_GET["induChosen"];

	$PathSelectedArray = explode(", ", $PathSelected);
	$industrySelected = $InduSelected;
	$trendSelected = sizeof($PathSelectedArray);
	if($trendSelected == 1){
		$option1 = $PathSelectedArray[0];
	}
	elseif($trendSelected == 2){
		$i = 0;
		foreach($PathSelectedArray as $value){
			if($value == "Changing Workforce"){
				$option1 = $value;
				$i = 1;
			}	
		}
		if($i == 1){
			foreach($PathSelectedArray as $value){
				if($value != "Changing Workforce"){
					$option2 = $value;
				}	
			}
		}else{
			foreach($PathSelectedArray as $value){
				if($value == "Digitalization"){
					$option1 = $value;
					$i = 1;
				}
			}
			if($i == 1){
				foreach($PathSelectedArray as $value){
					if($value != "Digitalization"){
						$option2 = $value;
					}	
				}
			}
		}
	}
	elseif($trendSelected == 2){
		$option1 = "Changing Workforce";
		$option2 = "Digitalization";
		$option3 = "Predictable Disruption";
	}

	//obtain the industry group
	$industryJson = file_get_contents('./json/industries.json');
	$data = json_decode($industryJson);
	foreach($data->Industries as $industry){
		//echo "Select trend $question->trend"; echo "<br>";
		if($industry->industryName == $industrySelected){
			$industryGroup = $industry->industryGroupName;
		}
	}

	// Question selection
	$questionJson = file_get_contents('./json/questions.json');
	$data = json_decode($questionJson);
	$i = 0;

	$questionsArray = Array();
	//One Trend Selection 
	if($trendSelected == 1){
		foreach($data->Questions as $question){
			if($option1 == "Changing Workforce" && $question->trend == "Changing Workforce"){
				$questionAdd = QuestionVerification($question, $industryGroup);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}
			}
			elseif($option1 == "Digitalization" && $question->trend == "Digitalization"){
				$questionAdd = QuestionVerification($question, $industryGroup);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}		
			}
			elseif($option1 == "Predictable Disruption" && $question->trend == "Predictable Disruption"){
				$questionAdd = QuestionVerification($question, $industryGroup);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}		
			}	
		}
	}
	//Two Trend Selection
	elseif($trendSelected == 2){
		foreach($data->Questions as $question){
			if(($option1 == "Changing Workforce" && $option2 == "Digitalization") && ($question->trend == "Changing Workforce" || $question->trend == "Digitalization")){
				$questionAdd = QuestionVerification2($question, $industryGroup, $trendSelected);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}
			}
			elseif(($option1 == "Changing Workforce" && $option2 == "Predictable Disruption") && ($question->trend == "Changing Workforce" || $question->trend == "Predictable Disruption")){
				$questionAdd = QuestionVerification2($question, $industryGroup, $trendSelected);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}		
			}
			elseif(($option1 == "Digitalization" && $option2 == "Predictable Disruption") && ($question->trend == "Digitalization" || $question->trend == "Predictable Disruption")){
				$questionAdd = QuestionVerification2($question, $industryGroup, $trendSelected);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}		
			}	
		}		
	}
	//Three Trend Selection
	elseif($trendSelected == 3){
		foreach($data->Questions as $question){
			if($question->trendsSelected == 3){
				$questionAdd = QuestionVerification3($question, $industryGroup);
				if($questionAdd == 1){
					$questionsArray[$i] = $question;
					$i = $i+1;
				}
			}
		}		
	}	

	echo json_encode($questionsArray);

	//Function verify the question one trend selection
	function QuestionVerification ($question, $industryGroup){
		$addQuestion = 0;
		if($industryGroup == "Task"){
			if($question->task == "Task"){
				$addQuestion = 1;
			}
		}
		if($industryGroup == "Knowledge"){
			if($question->knowledge == "Knowledge"){
				$addQuestion = 1;			
			}
		}
		if($industryGroup == "Hep"){
			if($question->hep == "HEP"){
				$addQuestion = 1;									
			}
		}
		return($addQuestion);
	}	

	//Function verify the question two trend selection
	function QuestionVerification2 ($question, $industryGroup, $trendSelected){
		$addQuestion = 0;
		if($industryGroup == "Task"){
			if($question->task == "Task"){
				if($question->trendsSelected == 2 || $question->trendsSelected == 3){
					$addQuestion = 1;
				}
			}
		}
		if($industryGroup == "Knowledge"){
			if($question->knowledge == "Knowledge"){
				if($question->trendsSelected == 2 || $question->trendsSelected == 3){
					$addQuestion = 1;
				}			
			}
		}
		if($industryGroup == "Hep"){
			if($question->hep == "HEP"){
				if($question->trendsSelected == 2 || $question->trendsSelected == 3){
					$addQuestion = 1;
				}			
			}
		}
		return($addQuestion);
	}	

	//Function verify the question three trend selection
	function QuestionVerification3 ($question, $industryGroup){
		$addQuestion = 0;
		if($industryGroup == "Task"){
			if($question->task == "Task"){
				$addQuestion = 1;
			}
		}
		if($industryGroup == "Knowledge"){
			if($question->knowledge == "Knowledge"){
				$addQuestion = 1;
			}
		}
		if($industryGroup == "Hep"){
			if($question->hep == "HEP"){
				$addQuestion = 1;
			}
		}
		return($addQuestion);
	}	
?>