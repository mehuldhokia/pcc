$(document).ready(function () {
    $(".display_None").css("display", "none");
    $("#btnSubmit").click(function () {
        debugger;
        $(".display_None").css("display", "none");
        if ($("#txtCertificate").val().length == 0) {
            $(".tblstudentverification").html('');
            alert("Please Enter Student Enrollment No.");
            return false;
        }

        //debugger;
        $.ajax({
            type: 'Post',
            url: "/Home/CertificateDetails",
            dataType: 'json',
            async: false,
            data: {
                Name: $("#txtCertificate").val()
            },
            success: function (response) {
                //debugger;
                $(".tblstudentverification").html('');

                if (response.IsSucess == "False") {
                    $(".NotFoundDiv").css("display","inline");
                }
                else if (response.IsSucess == "True")
                {
                    $(".NotFoundDiv").css("display", "none");
                    $(".display_None").css("display", "inline");
                    $htmlstring = "";
                    $htmlstring += " <tbody>";
                    $.each(response.Result, function (index, value) {
                        $htmlstring += "<tr><th scope ='row'> Student Name</th ><td>:</td><td>" + value.Stud_Name + "</td></tr>";
                        $htmlstring += "<tr><th scope ='row'> Enrollment No.</th ><td>:</td><td>" + value.Entrollment_No + "</td></tr>";
                        $htmlstring += "<tr><th scope ='row'> Course Name</th ><td>:</td><td>" + value.Veri_Course_Name + "</td></tr>";
                        $htmlstring += "<tr><th scope ='row'> City</th ><td>:</td><td>" + value.CityName + "</td></tr>";
                        $htmlstring += "<tr><th scope ='row'> Center Name</th ><td>:</td><td>" + value.Center_Name + "</td></tr>";
                    });
                    $htmlstring += " </tbody>";
                    $(".tblstudentverification").append($htmlstring);
                }
            },
            error: function (ex) {
                alert(ex.responseText);
            }
        });
    });
});