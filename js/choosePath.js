//Variable that will hold chosen paths
var chosenPaths;

//Load selected paths function
function loadExistingData() {

    //If chosenPaths cookie does not exist, create a new instance of PathsChosen
    if (!(chosenPaths = Cookies.getJSON('chosenPaths'))) {
        chosenPaths = new PathsChosen();
    }
}

//On submit form validations
function saveChosenPaths() {

    //Verify if there is at least a path selected
    if (!chosenPaths.digitalization && !chosenPaths.changingWorkforce && !chosenPaths.predictableDisruption) {
        alert('You have to select at least one path before continuing.');
        return false;
    } else {
        //Save chosenPaths object in cookies
        Cookies.set('chosenPaths', chosenPaths, {expires: 30});
        return true;
    }
}

//Prepare form input fields with necessary event bindings
function prepareForm() {

    //Get references to chceboxes and form
    const checkboxes = $('#submitChoosePath').find('input:checkbox');
    const form = $(document).find('#submitChoosePath');

    checkboxes.each(function () {

        //Set checked if existing in cookies from another session
        $(this).prop('checked', chosenPaths[$(this).val()]);

        //Add class to div so it turns yellow since the start
        if (chosenPaths[$(this).val()])
            $(this).parent().addClass('item-select');

        //Toggle class item-select on box whenever it's clicked
        $(this).click(function () {
            $(this).is(':checked') ? $(this).parent().addClass('item-select') : $(this).parent().removeClass('item-select');
            chosenPaths[$(this).val()] = $(this).is(':checked');
        });
    });

    //Bind on submit form function
    form.submit(function () {
        if (!saveChosenPaths()) {
            return false;
        }
    });
}

$(document).ready(function () {
    //Check for existing data on load
    loadExistingData();

    //Prepare form with binding functions
    prepareForm();
});