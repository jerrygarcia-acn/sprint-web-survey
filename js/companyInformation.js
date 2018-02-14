//CompanyInformation variable container reserved
var companyInfo;

//Load company information (if any) of create new object for cookie
function loadCompanyInformation() {
    if (!(companyInfo = Cookies.getJSON('companyInfo'))) {
        companyInfo = new CompanyInformation();
    }
}

//Retrieve all information
function getFormData() {
    const form = $(document).find('#companyForm');
    const textFields = form.find('input:text');
    const radioFields = form.find('input:radio');
    const selectFields = form.find('select');

    getDataFromInput(textFields, 'text', companyInfo);
    getDataFromInput(radioFields, 'radio', companyInfo);
    getDataFromInput(selectFields, 'select', companyInfo);
}

//Save companyInfo into cookies and validate if input is valid
function saveCompanyInformation() {

    //Get information from fields
    getFormData();

    //If any field is missing...
    if (!companyInfo.companyName || !companyInfo.industry || !companyInfo.sector ||
        !companyInfo.employees || !companyInfo.currentBusiness) {
        alert('Please fill of the information requested.');
        return false;
    } else {
        //If not, save object in cookies
        Cookies.set('companyInfo', companyInfo, { expires: 30 });
        return true;
    }
}

function prepareForm() {
    //Get element references
    const form = $(document).find('#companyForm');
    const previousButton = $(document).find('#prevBtnCompanyInfo');
    const names = Object.keys(companyInfo);

    //Fill Industry select options using industries.json info
    $.get('./json/industries.json')
        .done(function (data) {
            const industries = data.Industries;
            const industrySelect = $(document).find('[name=industry]');

            //Create an option element for every industry
            industries.forEach(function (industry) {
                industrySelect.append($('<option>', {
                    value: industry.industryName,
                    text: industry.industryName
                }));
            });

            //Get past information about the company and fill it instantly after load
            names.forEach(function (name) {
                const element = $(document).find('[name=' + name + ']');

                //Filling in radio type inputs
                if (element.prop('type') === 'radio') {
                    for (var i = 0; i < element.length; i++) {
                        if (element[i].value === companyInfo[name]) {
                            element[i].checked = true;
                            element[i].parentElement.classList.add('focus');
                            element[i].parentElement.classList.add('active');
                            break;
                        }
                    }
                }

                //Filling in text tye inputs
                if (element.prop('type') === 'text') {
                    element.val(companyInfo[name]);
                }

                //Filling in select type inputs
                if (element.prop('tagName') === 'SELECT') {

                    const options = element.children();
                    options.each(function () {
                        ($(this).val() === companyInfo[name]) ? $(this).prop('selected', true) : '';
                    })
                }

                //Bind previous button to click event
                previousButton.click(function () {
                    goBack();
                });

                //Bind the checking function on submit
                form.submit(function () {
                    if (!saveCompanyInformation()) {
                        return false;
                    }
                });
            });
        });
}

$(document).ready(function () {

    //Load information about the company (if any)
    loadCompanyInformation();

    //Prepare bindings and form elements
    prepareForm();
});
