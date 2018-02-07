$(document).ready(function () {
    loadCompanyInfo();
    var $previousBtn = $('#prevBtnCompanyInfo'), 
        $nextBtn = $('#nextBtnCompanyInfo'),
        $companyForm = $('#companyForm');

    $previousBtn.on('click', function(){
        goBack();
    });

    $(document).on('submit', '#companyForm', function() {
        if(!radioValidation()){
            return false;
        }
    });

    function goBack() {
        location.href = "../SprintSurvey/choosePath.php";
    }
    
    function radioValidation(){
        var sectorRadios = $('[name="sector"]'),
            businessRadios = $('[name="currentBusiness"]'),
            isSectorRadioSelected,
            isBusinessRadioSelected,
            $errorMsgSelector = $("#errorChoosePathSector"),
            $errorMsgPath = $("#errorChoosePathBusiness"),
            $errorMsg = $("#errorChoosePathMsg");

            $errorMsgSelector.hide();
            $errorMsgPath.hide();
            $errorMsg.hide();

        isSectorRadioSelected = selectedRadioValidation(sectorRadios);
        if (!isSectorRadioSelected){
            $errorMsgSelector.show();
            $errorMsg.show();
            return false;
        }
        isBusinessRadioSelected = selectedRadioValidation(businessRadios);
        if (!isBusinessRadioSelected){
            $errorMsgPath.show();
            $errorMsg.show();
            return false;
        }
        storeExistentData();
        return true;
    }

    function selectedRadioValidation(radios){
        var isRadioSelected = false;
        $.each(radios,function(){
            var $this = $(this);
            if($this.prop('checked')){
                isRadioSelected = true;
            }
        });
        return isRadioSelected;
    }

    function loadCompanyInfo(){
    if(localStorage){
        var company = localStorage.getItem("company"),
            induChosen = localStorage.getItem("induChosen"),
            sector = localStorage.getItem("sector"),
            employees = localStorage.getItem("employees"),
            currentBusiness = localStorage.getItem("currentBusiness"),
            dg = localStorage.getItem("dg"),
            cw = localStorage.getItem("cw"),
            pd = localStorage.getItem("pd"),
            radios = $('input[type="radio"]');

        $('#company').val(company);
        $('#induChosen').val(induChosen);
        $('#employees').val(employees);

        $.each(radios,function(){
            var $this = $(this);
            if($this.val() == sector || $this.val() == currentBusiness){
                $this.prop('checked', true); 
                $this.parent().addClass('active');
            }        
        });
        var pathChosen = "";
        if(dg == "true"){
            pathChosen = '"Digitalization"';
        }
        if(cw == "true"){
            if(pathChosen != ""){
                pathChosen = pathChosen + ', "Changing Workforce"'; 
                }
                else {
                pathChosen = '"Changing Workforce"'; 
                }      
        }
        if(pd == "true"){
            if(pathChosen != ""){
                pathChosen = pathChosen + ', "Predictable Disruption"'; 
                }
                else {
                pathChosen = '"Predictable Disruption"'; 
                } 
            }
            $('#pathChosen').val(pathChosen);
        } else{
            alert("Sorry, your browser do not support local storage.");
        }
    }

    storeExistentData = function(){
        if(localStorage){
            var radios = $('input[type="radio"]');

            localStorage.setItem("company", $('#company').val());
            localStorage.setItem("induChosen", $('#induChosen').val());
            localStorage.setItem("employees", $('#employees').val());
            localStorage.setItem("pathChosen", $('#pathChosen').val());

            $.each(radios,function(){
                var $this = $(this);
                if($this.prop('checked') && $this.attr('name') == "sector"){
                    localStorage.setItem("sector", $this.val()); 
                } 
                else if($this.prop('checked') && $this.attr('name') == "currentBusiness"){
                    localStorage.setItem("currentBusiness", $this.val()); 
                }       
            });
        } else{
            alert("Sorry, your browser do not support local storage.");
        }
    }

    
});