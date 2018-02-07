$(document).ready(function () { 
	loadQuestions();
	var pathChosen = $("#pathChosen").text().replace (/"/g, ""),
		induChosen = $("#induChosen").text(),
		$prevBtnUserInfo1 = $('#prevBtnUserInfo1'), 
		$nextBtnUserInfo1 = $('#nextBtnUserInfo1');
		$prevBtnUserInfo2 = $('#prevBtnUserInfo2'), 
		$nextBtnUserInfo2 = $('#nextBtnUserInfo2');

	$prevBtnUserInfo1.on('click', function(){
		plusDivs(-1, 1)
	})

	$nextBtnUserInfo1.on('click', function(){
		plusDivs(1, 2);
	})
		
	$prevBtnUserInfo2.on('click', function(){
		plusDivs(-1, 1)
	})

	$nextBtnUserInfo2.on('click', function(){
		generateAnswers();
		storeData();
	})

	$.get( "./SprintSurvey/questionSelection.php", {"pathChosen":pathChosen, "induChosen":induChosen } )
	.done(function( data ) {
		var questions = JSON.parse(data),
			answerStorage =  document.getElementById("answerStorageArray").value;
		  
		if( answerStorage.length == 0){
			var answerStorageArray = [];
		}
		else{
			var answerStorageArray = answerStorage.split(",");
		}

		for (var i = 0; i < questions.length; i += 2) {
			var j = i + 1;
			var k = i + 2;
			var questNo = [];
			var questOp = [];
			var questCo = 0;
			var cantCla = "";
			if(questions[i].answer0 != undefined) {
				questNo[questCo] = 0;
				questOp[questCo] = questions[i].answer0;
				questCo = questCo + 1;
			}
			if(questions[i].answer1 != undefined) {
				questNo[questCo] = 1;
				questOp[questCo] = questions[i].answer1;
				questCo = questCo + 1;
			}
			if(questions[i].answer2 != undefined) {
				questNo[questCo] = 2;
				questOp[questCo] = questions[i].answer2;
				questCo = questCo + 1;
			}
			if(questions[i].answer3 != undefined) {
				questNo[questCo] = 3;
				questOp[questCo] = questions[i].answer3;
				questCo = questCo + 1;
			}
			if(questions[i].answer4 != undefined) {
				questNo[questCo] = 4;
				questOp[questCo] = questions[i].answer4;
				questCo = questCo + 1;
			}
			if(questions[i].answer5 != undefined) {
				questNo[questCo] = 5;
				questOp[questCo] = questions[i].answer5;
				questCo = questCo + 1;
			}
			if(questCo == 2){cantCla = "two-options";}
			if(questCo == 3){cantCla = "three-options";}
			if(questCo == 4){cantCla = "four-options";}
			if(questCo == 5){cantCla = "five-options";}
			if(questCo == 6){cantCla = "six-options";}

			var questNo2 = [];
			var questOp2 = [];
			var questCo2 = 0;
			var cantCla2 = "";

			if(questions[j].answer0 != undefined) {
				questNo2[questCo2] = 0;
				questOp2[questCo2] = questions[j].answer0;
				questCo2 = questCo2 + 1;
			}
			if(questions[j].answer1 != undefined) {
				questNo2[questCo2] = 1;
				questOp2[questCo2] = questions[j].answer1;
				questCo2 = questCo2 + 1;
			}
			if(questions[j].answer2 != undefined) {
				questNo2[questCo2] = 2;
				questOp2[questCo2] = questions[j].answer2;
				questCo2 = questCo2 + 1;
			}
			if(questions[j].answer3 != undefined) {
				questNo2[questCo2] = 3;
				questOp2[questCo2] = questions[j].answer3;
				questCo2 = questCo2 + 1;
			}
			if(questions[j].answer4 != undefined) {
				questNo2[questCo2] = 4;
				questOp2[questCo2] = questions[j].answer4;
				questCo2 = questCo2 + 1;
			}
			if(questions[j].answer5 != undefined) {
				questNo2[questCo2] = 5;
				questOp2[questCo2] = questions[j].answer5;
				questCo2 = questCo2 + 1;
			}

			if(questCo2 == 2){cantCla2 = "two-options";}
			if(questCo2 == 3){cantCla2 = "three-options";}
			if(questCo2 == 4){cantCla2 = "four-options";}
			if(questCo2 == 5){cantCla2 = "five-options";}
			if(questCo2 == 6){cantCla2 = "six-options";}


			if (i == 0) {
				var todayQuestionInfo = questions[i].questionId + "|" + questions[i].time + "|" + questions[i].trend + "|" + questions[i].impactToScore + "|" + questions[i].questionType;
				var futureQuestionInfo = questions[j].questionId + "|" + questions[j].time + "|" + questions[j].trend + "|" + questions[j].impactToScore + "|" + questions[j].questionType;
				var str1 = "<div class='Sprint-Slides sprint-slides-survey' style='display:block'><h4 class='questions-time'>Today</h4><h5>" + questions[i].question + "</h5><div class='row'><span name='questionInfo' style='display:none'>" + todayQuestionInfo + "</span><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
			
				var str6 = [];
				var questionTypeToday = questions[i].questionType;
				var selectedAnswersArray = [];
				if(answerStorageArray.length > 0){
					var selectedAnswersArray = answerStorageArray[i].split("|");
				}
				var answerCounter = 0;
				for(var m = 0; m < questCo; m++) {
					var checkValue = 0;
					if(selectedAnswersArray.length > 0){
						for(var tmpCounter = 0; tmpCounter < selectedAnswersArray.length - 1; tmpCounter++){
							if(questNo[m] == selectedAnswersArray[tmpCounter]){
								checkValue = 1;
							}
						}
					}
					if(questions[i].questionType == "Multi-Select"){
						answerCounter++;
						if(checkValue > 0){
							var intStr1 = "<label class='btn btn-primary col-12 active'><input type='checkbox' checked name='QID";
						}
						if(checkValue == 0){
							var intStr1 = "<label class='btn btn-primary col-12'><input type='checkbox' name='QID";
						}
					}
					else{
						if(checkValue > 0){
							var intStr1 = "<label class='btn btn-primary col-12 active'><input type='radio' checked name='QID";
						}
						else {
							var intStr1 = "<label class='btn btn-primary col-12'><input type='radio' name='QID";
						}
					}
					var intStr2 = String(j);
					var intStr3 = "' value='";
					var intStr4 = String(questNo[m]);
					var intStr5 = "'>";
					var intStr6 = String(questOp[m]);
					var intStr7 = "</label>";
					var lineIndicator = questCo - 2;
					var lastAnswer = false;
					if(m == lineIndicator){
						lastAnswer = true;
					}
					if(answerCounter == 2){
						if(lastAnswer){
							intStr7 = intStr7 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares multi-selection' data-toggle='buttons'>";
						}
						else{
						intStr7 = intStr7 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
						}
						answerCounter = 0;
					}

					str6[m] = intStr1.concat(intStr2, intStr3, intStr4, intStr5, intStr6, intStr7);
				}
				var str6concat = str6.join("");
				if(questions[i].subtext != ""){
					var str7 = "</div><div class='help-text'>" + questions[i].subtext + "</div></div>";
				}
				else{
					var str7 = "</div></div>";
				}		
				//Future first question
				var str8 = "<h4 class='futureSpace questions-time'>Future</h4><h5>" + questions[j].question + "</h5><div class='row'><span name='questionInfo' style='display:none'>" + futureQuestionInfo + "</span><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";			
				
				var str13 = [];
				var questionTypeFuture = questions[j].questionType;

				var selectedAnswersArray = [];
				if(answerStorageArray.length > 0){
					var selectedAnswersArray = answerStorageArray[j].split("|");
				}
				var answerCounter = 0;
				for(var n = 0; n < questCo2; n++) {
					var checkValue = 0;
					if(selectedAnswersArray.length > 0){
						for(var tmpCounter = 0; tmpCounter < selectedAnswersArray.length - 1; tmpCounter++){
							if(questNo2[n] == selectedAnswersArray[tmpCounter]){
								checkValue = 1;
							}
						}
					}
					if(questions[j].questionType == "Multi-Select"){
						answerCounter++;
						if(checkValue > 0){
							var intStr8 = "<label class='btn btn-primary col-12 active'><input type='checkbox' checked name='QID";
						}
						else{
							var intStr8 = "<label class='btn btn-primary col-12'><input type='checkbox' name='QID";
						}
					}
					else {
						if(checkValue > 0){
							var intStr8 = "<label class='btn btn-primary col-12 active'><input type='radio' checked name='QID";
						}
						else{
							var intStr8 = "<label class='btn btn-primary col-12'><input type='radio' name='QID";
						}
					}
					var intStr9 = String(k);
					var intStr10 = "' value='";
					var intStr11 = String(questNo2[n]);
					var intStr12 = "'>";
					var intStr13 = String(questOp2[n]);
					var intStr14 = "</label>";
					var lineIndicator = questCo2 - 2;
					var lastAnswer = false;
					if(n == lineIndicator){
						lastAnswer = true;
					}
					if(answerCounter == 2){
						if(lastAnswer){
							intStr14 = intStr14 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares multi-selection' data-toggle='buttons'>";
						}
						else{
							intStr14 = intStr14 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
						}
						answerCounter = 0;
					}					
					str13[n] = intStr8.concat(intStr9, intStr10, intStr11, intStr12, intStr13, intStr14);
				}
				var str13concat = str13.join("");

				if(questions[j].subtext != ""){
					
					var str14 = "</div><div class='help-text'>" + questions[j].subtext + "</div></div></div>";
				}
				else{
					var str14 = "</div></div></div>";
				}
				var resultConcat = str1.concat(str6concat, str7, str8, str13concat, str14);
				$( "#questionsContainer" ).append( resultConcat );
			} // Here Start the second part
			else{
				var todayQuestionInfo = questions[i].questionId + "|" + questions[i].time + "|" + questions[i].trend + "|" + questions[i].impactToScore + "|" + questions[i].questionType;
				var futureQuestionInfo = questions[j].questionId + "|" + questions[j].time + "|" + questions[j].trend + "|" + questions[j].impactToScore + "|" + questions[j].questionType;
				var str1 = "<div class='Sprint-Slides sprint-slides-survey'><h4 class='questions-time'>Today</h4><h5>" + questions[i].question + "</h5><div class='row'><span name='questionInfo' style='display:none'>" + todayQuestionInfo + "</span><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";

				var str6 = [];
				var selectedAnswersArray = [];
				if(answerStorageArray.length > 0){
					var selectedAnswersArray = answerStorageArray[i].split("|");
				}
				var answerCounter = 0;
				for(var m = 0; m < questCo; m++) {
					var checkValue = 0;
					if(selectedAnswersArray.length > 0){
						for(var tmpCounter = 0; tmpCounter < selectedAnswersArray.length - 1; tmpCounter++){
							if(questNo[m] == selectedAnswersArray[tmpCounter]){
								checkValue = 1;
							}
						}
					}
					if(questions[i].questionType == "Multi-Select"){
						answerCounter++;
						if(checkValue > 0){
							var intStr1 = "<label class='btn btn-primary col-12 active'><input type='checkbox' checked name='QID";
						}
						if(checkValue == 0){
							var intStr1 = "<label class='btn btn-primary col-12'><input type='checkbox' name='QID";
						}
					}
					else{
						if(checkValue > 0){
							var intStr1 = "<label class='btn btn-primary col-12 active'><input type='radio' checked name='QID";
						}
						else {
							var intStr1 = "<label class='btn btn-primary col-12'><input type='radio' name='QID";
						}
					}
					var intStr2 = String(j);
					var intStr3 = "' value='";
					var intStr4 = String(questNo[m]);
					var intStr5 = "'>";
					var intStr6 = String(questOp[m]);
					var intStr7 = "</label>";
					var lineIndicator = questCo - 2;
					var lastAnswer = false;
					if(m == lineIndicator){
						lastAnswer = true;
					}
					if(answerCounter == 2){
						if(lastAnswer){
							intStr7 = intStr7 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares multi-selection' data-toggle='buttons'>";
						}
						else{
							intStr7 = intStr7 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
						}
						answerCounter = 0;
					}					
					str6[m] = intStr1.concat(intStr2, intStr3, intStr4, intStr5, intStr6, intStr7);
				}
				var str6concat = str6.join("");

				if(questions[i].subtext != ""){
					var str7 = "</div><div class='help-text'>" + questions[i].subtext + "</div></div>";
				}
				else{
					var str7 = "</div></div>";
				}
				var str8 = "<h4 class='futureSpace questions-time'>Future</h4><h5>" + questions[j].question + "</h5><div class='row'><span name='questionInfo' style='display:none'>" + futureQuestionInfo + "</span><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
				var str13 = [];
				var selectedAnswersArray = [];
				if(answerStorageArray.length > 0){
					var selectedAnswersArray = answerStorageArray[j].split("|");
				}
				var answerCounter = 0;
				for(var n = 0; n < questCo2; n++) {
					var checkValue = 0;
					if(selectedAnswersArray.length > 0){
						for(var tmpCounter = 0; tmpCounter < selectedAnswersArray.length - 1; tmpCounter++){
							if(questNo2[n] == selectedAnswersArray[tmpCounter]){
								checkValue = 1;
							}
						}
					}
					if(questions[j].questionType == "Multi-Select"){
						answerCounter++;
						if(checkValue > 0){
							var intStr8 = "<label class='btn btn-primary col-12 active'><input type='checkbox' checked name='QID";
						}
						else{
							var intStr8 = "<label class='btn btn-primary col-12'><input type='checkbox' name='QID";
						}
					}
					else{
						if(checkValue > 0){
							var intStr8 = "<label class='btn btn-primary col-12 active'><input type='radio' checked name='QID";
						}
						else{
							var intStr8 = "<label class='btn btn-primary col-12'><input type='radio' name='QID";
						}
					}
					var intStr9 = String(k);
					var intStr10 = "' value='";
					var intStr11 = String(questNo2[n]);
					var intStr12 = "'>";
					var intStr13 = String(questOp2[n]);
					var intStr14 = "</label>";
					var lineIndicator = questCo2 - 2;
					var lastAnswer = false;
					if(n == lineIndicator){
						lastAnswer = true;
					}
					if(answerCounter == 2){
						if(lastAnswer){
							intStr14 = intStr14 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares multi-selection' data-toggle='buttons'>";
						}
						else{
							intStr14 = intStr14 + "</div><div class='btn-group btn-group-lg btn-vertical col-12 answersSquares' data-toggle='buttons'>";
						}
						answerCounter = 0;
					}

					str13[n] = intStr8.concat(intStr9, intStr10, intStr11, intStr12, intStr13, intStr14);
				}
				var str13concat = str13.join("");

				if(questions[j].subtext != ""){
					
					var str14 = "</div><div class='help-text'>" + questions[j].subtext + "</div></div></div>";
				}
				else{
					var str14 = "</div></div></div>";
				}
				var resultConcat = str1.concat(str6concat, str7, str8, str13concat, str14);
				$( "#questionsContainer" ).append( resultConcat );
			}
		}
	SliderSprintControl();
});

var slideIndex = 1;

function SliderSprintControl(){
	showDivs(slideIndex);
}
function plusDivs(n, path) {
  showDivs(slideIndex += n, path);
}
function currentDiv(n) {
  showDivs(slideIndex);
}
function showDivs(n, path) {
	if (n < 1) { 
		location.href = "companyInformation.php";
	   }
	else{
		var i;
		var x = document.getElementsByClassName("Sprint-Slides");
		document.getElementById("hidemetillend").style.display = "none";
		document.getElementById("hidemeondone").style.display = "-webkit-box";

		if (n >= x.length) {		
			slideIndex = x.length;
			document.getElementById("hidemeondone").style.display = "none";
			document.getElementById("hidemetillend").style.display = "-webkit-box";
		}   
		$("#errorChoosePathMsg").hide();
		fieldVerification(n,path, x);
	}
}

function fieldVerification(n, path, x){
	if(path == 2){
		var divs = $("div.Sprint-Slides");
		var todayCount = 0;
		var todayIndice = n - 2;
		var futureCount = 0;

		for(var i = 0; i < divs.length; i++) {
			var spans = $(x[i]).find("span[name='questionInfo']");
			var paragraphs = $(x[i]).find(".row");
			var questionInfo1= $(spans[0]).text();
			var questionInfo1Array = questionInfo1.split("|");
			var responsesRequired = questionInfo1Array[4];
			if(i == todayIndice){
				var inputs1 = $(paragraphs[0]).find("input");
				for(var j = 0; j < inputs1.length; j++) {
					if($(inputs1[j]).is(":checked")) {
						todayCount ++;
					}
				}
				var inputs2 = $(paragraphs[1]).find("input")
				for(var j = 0; j < inputs2.length; j++) {
					if($(inputs2[j]).is(":checked")) {
						futureCount ++;
					}
				}
			}
		}
		if(todayCount == 0 || futureCount == 0){
			slideIndex = slideIndex - 1;
			n = n - 1;
			$("#errorChoosePathMsg").show();
			return false
		}

	}
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}

	var fromUserPage = localStorage.getItem("fromUserPage");
  	if(fromUserPage == "true"){
			localStorage.removeItem("fromUserPage")
			slideIndex =  x.length;
			document.getElementById("hidemeondone").style.display = "none";
			document.getElementById("hidemetillend").style.display = "-webkit-box";
	}

	x[slideIndex-1].style.display = "block";
	
}

function generateAnswers() {
	var pathChosen = $("#pathChosen").text().replace (/"/g, "");
	var pathChosenArray = pathChosen.split(", ");

	var induChosen = $("#induChosen").text();
	var company = $("#company").text();
	var sector = $("#sector").text();
	var employees = $("#employees").text();
	var currentBusiness = $("#currentBusiness").text();
	var jsonData = '{ "ChoosePath":[';
	var answerStorageArray = [];
	
	for(var i = 0; i < pathChosenArray.length; i++) {
		jsonData = jsonData + '"' + pathChosenArray[i] + '"';
		if (i == pathChosenArray.length - 1){
			jsonData = jsonData + '], ';
		}
		else {
			jsonData = jsonData + ', ';				
		}
	}
	
	jsonData = jsonData + '"CompanyName": "' + company + '", ';
	jsonData = jsonData + '"Sector": "' + sector + '", ';
	jsonData = jsonData + '"CurrentBusinessCustomer": "' + currentBusiness + '", ';
	jsonData = jsonData + '"Industry": "' + induChosen + '", ';
	jsonData = jsonData + '"NumberOfEmployees": "' + employees + '", ';
	jsonData = jsonData + '"Questions": [ ';

	var divs = $("div.Sprint-Slides");
	var seconJsonC = document.getElementsByClassName('ListOfAnswersId');
	for(var i = 0; i < divs.length; i++) {
		var spans = $(divs[i]).find("span[name='questionInfo']"); 
		var paragraphs = $(divs[i]).find(".row");
		
		//First question
		var questionInfo1= $(spans[0]).text();
		var questionInfo1Array = questionInfo1.split("|");
		
		var inputs1 = $(paragraphs[0]).find("input")
		jsonData = jsonData + '{"questionId": "' + questionInfo1Array[0] + '", "answerId": [';
		var count = 0;	
		var tmpAnswer = "";
		for(var j = 0; j < inputs1.length; j++) {
			var tmpAnswer;
			if($(inputs1[j]).is(":checked")) {
				tmpAnswer = tmpAnswer +$(inputs1[j]).val() + "|";
				if(count == 0){
					jsonData = jsonData + '"' + $(inputs1[j]).val() + '"';
				}
				if(count > 0){
					jsonData = jsonData + ', "' + $(inputs1[j]).val() + '"';
				}
				count ++;
			}
		}
		answerStorageArray.push(tmpAnswer);

		jsonData = jsonData + '], "time": "' + questionInfo1Array[1] + '", "trend": "' + questionInfo1Array[2] + '", "impactToScore": "' + questionInfo1Array[3] + '"},';

		//Second question
		var questionInfo2= $(spans[1]).text();
		var questionInfo2Array = questionInfo2.split("|");

		
		var inputs2 = $(paragraphs[1]).find("input")
		jsonData = jsonData + '{"questionId": "' + questionInfo2Array[0] + '", "answerId": [';
		var count = 0;
		var tmpAnswer = "";
		for(var j = 0; j < inputs2.length; j++) {
			if($(inputs2[j]).is(":checked")) {
				tmpAnswer = tmpAnswer +$(inputs2[j]).val() + "|";
				if(count == 0){ 
					jsonData = jsonData + '"' + $(inputs2[j]).val() + '"';
				}
				else{
					jsonData = jsonData + ', "' + $(inputs2[j]).val() + '"';
				}		
				count ++;		
			}
		}
		answerStorageArray.push(tmpAnswer);
		
		if(i ==  (divs.length - 1)){
			jsonData = jsonData + '], "time": "' + questionInfo2Array[1] + '", "trend": "' + questionInfo2Array[2] + '", "impactToScore": "' + questionInfo2Array[3] + '"} ],';
		}
		else if(i < divs.length){
			jsonData = jsonData + '], "time": "' + questionInfo2Array[1] + '", "trend": "' + questionInfo2Array[2] + '", "impactToScore": "' + questionInfo2Array[3] + '"},';
		}
	}	
	document.getElementById("jsonAnswer").value = jsonData;
	document.getElementById("answerStorageArray").value = answerStorageArray;
}

function loadQuestions(){   
	if(localStorage){
		var company = localStorage.getItem("company");
		var sector = localStorage.getItem("sector");
		var employees = localStorage.getItem("employees");
		var currentBusiness = localStorage.getItem("currentBusiness");
		var answerStorageArray = localStorage.getItem("answerStorageArray");
		
		if(answerStorageArray != null){
			document.getElementById("answerStorageArray").value = answerStorageArray;
		}


		document.getElementById("company").value = company;
		document.getElementById("sector").value = sector;
		document.getElementById("employees").value = employees;   
		document.getElementById("currentBusiness").value = currentBusiness;
		
	} else{
			alert("Sorry, your browser do not support local storage.");
	}
}

function storeData(){
if(localStorage){
	localStorage.setItem("answerStorageArray", document.getElementById("answerStorageArray").value);
	} else{
			alert("Sorry, your browser do not support local storage.");
	}
}
	

});