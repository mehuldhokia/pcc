$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/Home/getQualification",
        data: "{ }",
        success: function (data) {
            debugger;
            var s = '<option value="-1">Please Select Qualification</option>';
            for (var i = 0; i < data.length; i++) {
                s += '<option value="' + data[i].StdId + '">' + data[i].StdName + '</option>';
            }
            $("#ddlStd").html(s);
        }
    });
});