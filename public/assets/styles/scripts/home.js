$(document).ready(function () {
    $("#btnSubmit").click(function () {
        debugger;
        var courseName = $("#txtCourse").val();
        if (courseName != undefined && courseName != null) {
            window.location = '/Home/SearchCourse?courseName=' + courseName;
        }
    });
});
