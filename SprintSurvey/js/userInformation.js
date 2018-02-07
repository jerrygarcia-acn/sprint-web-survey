$(document).ready(function () {
    var $prevBtnUserInfo = $('#prevBtnUserInfo'), 
        $nextBtnUserInfo = $('#nextBtnUserInfo');

    $prevBtnUserInfo.on('click', function(){
        localStorage.setItem("fromUserPage", true);
        window.history.back();
    })

    $nextBtnUserInfo.on('click', function(){
        localStorage.clear();
    })
});