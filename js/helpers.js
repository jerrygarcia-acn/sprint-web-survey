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