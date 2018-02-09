//OBJECT DECLARATIONS

//Declaration of PathsChosen Object
const PathsChosen = (function (digitalization, changingWorkforce, predictableDisruption) {
    this.digitalization = !!digitalization;
    this.changingWorkforce = !!changingWorkforce;
    this.predictableDisruption = !!predictableDisruption;
});

//Company information object
const CompanyInformation = (function (companyName, industry, sector, employees, currentBusiness) {
    this.companyName = companyName;
    this.industry = industry;
    this.sector = sector;
    this.employees = employees;
    this.currentBusiness = currentBusiness;
});

//OBJECT DECLARATIONS

//Helper function to get data from different input field types into an object
function getDataFromInput(inputs, type, storage) {

    switch (type) {
        case 'text': case 'select': case 'checkbox':
        inputs.each(function () {
            storage[$(this).prop('name')] = $(this).val();
        });
        break;
        case 'radio':
            inputs.each(function () {
                if ($(this).is(':checked')) {
                    storage[$(this).prop('name')] = $(this).val();
                }
            });
            break;
        default:
            console.log('ERROR: type not supported.');
    }
}