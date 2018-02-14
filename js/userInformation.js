//Function that collects user information from fields and creates userInfo cookie
function getUserInfo(form) {
    const inputs = form.find('input[type=text]');
    const numbers = form.find('input[type=number]');
    const emails = form.find('input[type=email]');
    const phones = form.find('input[type=tel]');
    const selects = form.find('select');

    const userInfo = new UserInfo();

    getDataFromInput(inputs, 'text', userInfo);
    getDataFromInput(selects, 'select', userInfo);
    getDataFromInput(numbers, 'number', userInfo);
    getDataFromInput(emails, 'email', userInfo);
    getDataFromInput(phones, 'phone', userInfo);

    const keys = Object.keys(userInfo);

    keys.forEach(function (key) {
        if (!userInfo[key]) {
            alert('Make sure to fill all the information requested.');
            return false;
        }
    });

    Cookies.set('userInfo', userInfo);
    return true;
}

$(document).ready(function () {
    const form = $(document).find('#userInfoForm');

    form.submit(function () {
        return getUserInfo(form);
    });
});