$(document).ready(function () {
    
    var jsonAnswer = $("#jsonAnswer").text();
    var FName = $("#FName").text();
    var LName = $("#LName").text();
    var Title = $("#Title").text();
    var Dept = $("#Dept").text();
    var ZipCode = $("#Zip").text();
    var Tel = $("#Tel").text();
    var Mail = $("#Mail").text();

    jsonAnswer = jsonAnswer + '"Title":"' + Title + '", ';
    jsonAnswer = jsonAnswer + '"First Name":"' + FName + '", ';
    jsonAnswer = jsonAnswer + '"Last Name":"' + LName + '", ';
    jsonAnswer = jsonAnswer + '"Department":"' + Dept + '", ';
    jsonAnswer = jsonAnswer + '"Zip Code":"' + ZipCode + '", ';
    jsonAnswer = jsonAnswer + '"Phone Number":"' + Tel + '", ';
    jsonAnswer = jsonAnswer + '"EMail":"' + Mail + '" }';

    evaluateResults(jsonAnswer);



    function evaluateResults(jsonAnswer){
    var contenido = jsonAnswer;
    console.log(contenido);
    var resultados = JSON.parse(contenido);
    
        $.ajax({
        headers: {
            'Accept' : 'application/json',
            'Content-Type' : 'application/json; charset=utf-8'
        },
        type: "POST",
        url: "../SprintSurvey/resultsGeneration.php",
        data: JSON.stringify(resultados),
        success : function(data, textStatus, jqXHR) {
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert("Apologies, an error occured");
        },
        contentType: "application/json",
        complete : function(jqXHR, textStatus) {
            if(jqXHR.status == "200") {
            var result = JSON.parse(jqXHR.responseText);
            console.log(result);
            $("#CurrentScore").append(result.currentScorePercentage);
            $("#CurrentScoreMessage").append(result.currentScoreMessage);
            $("#FutureScore").append(result.futureScorePercentage);
            $("#FutureScoreMessage").append(result.futureScoreMessage);
            $("#IndustryScore").append(result.industryBenchmarkPercentage);
            $("#IndustryScoreMessage").append(result.industryBenchmarkMessage);
            if(result.digitalization== ""){
                document.getElementById("DigitalizationMsg").style.display = "none";
            }
            if(result.changingWorkforce== ""){
                document.getElementById("ChangingForceMsg").style.display = "none";
            }
            if(result.predictableDisruption== ""){
                document.getElementById("PredictableMsg").style.display = "none";
            }
            $("#ChangingForceMessage").append(result.changingWorkforce);
            $("#DigitalizationMessage").append(result.digitalization);
            $("#PredictableMessage").append(result.predictableDisruption);
            }
        }
        });
    }
});