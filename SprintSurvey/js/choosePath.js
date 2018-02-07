$(document).ready(function () {
  
    setTimeout(function(){
        $('#submitChoosePath input[type="checkbox"]').each(function() {
            $(this).parent().removeClass("item-select");
        });
        $('#submitChoosePath input[type="checkbox"]:checked').each(function() {
            $(this).parent().addClass("item-select");
        });
        $('#submitChoosePath input[type="radio"]').each(function() {
            $(this).parent().parent().siblings().removeClass("item-select");
        });
        $('#submitChoosePath input[type="radio"]:checked').each(function() {
            $(this).parent().parent().addClass("item-select");
        });
    }, 500);

    $('#submitChoosePath').click(function() {
        $('#submitChoosePath input[type="checkbox"]').each(function() {
            $(this).parent().removeClass("item-select");
        });
        $('#submitChoosePath input[type="checkbox"]:checked').each(function() {
            $(this).parent().addClass("item-select");
        });
    });

    $('#submitChoosePath').click(function() {
        $('#submitChoosePath input[type="radio"]').each(function() {
            $(this).parent().parent().siblings().removeClass("item-select");
        });
        $('#submitChoosePath input[type="radio"]:checked').each(function() {
            $(this).parent().parent().addClass("item-select");
        });
    });

	loadExistenInformation();
	var storeExistentData = {},
		$choosePathNextBtn = $('#choosePathNext');

		$choosePathNextBtn.on('click', function(){
			storeExistentData();
		});

    function loadExistenInformation(){   
      if(localStorage){
        var dg = localStorage.getItem("dg");
        var cw = localStorage.getItem("cw");
        var pd = localStorage.getItem("pd");
        if(dg == "true"){
          $('#dg').prop('checked',true);
        }
        if(cw == "true"){
          $('#cw').prop('checked',true);
        }
        if(pd == "true"){
          $('#pd').prop('checked',true);
        }        
      } 
      else{
			  alert("Sorry, your browser do not support local storage.");
		}
	}
	
  storeExistentData = function(){
    if(localStorage){
      localStorage.setItem("dg", $('#dg').prop('checked'));
      localStorage.setItem("cw", $('#cw').prop('checked'));
      localStorage.setItem("pd", $('#pd').prop('checked'));
    } else{
        alert("Sorry, your browser do not support local storage.");
    }
  }    

  $("#submitChoosePath").submit(function(){
		if ($('input:checkbox').filter(':checked').length < 1){
        $("#errorChoosePath").show();
        $("#errorChoosePathMsg").show();
		return false;
		}
  });
});