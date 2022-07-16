$(document).ready(function () {
    debugger;
        $.ajax({
            type: 'POST',
            url: "/Home/CourseSearch",
            dataType: 'json',
            data: {
                courseName: location.href.split('?')[1].split('=')[1]
                //CryptoJS.AES.decrypt(location.href.split('?')[1].split('=')[1], "Secret Passphrase")
            },
            success: function (data)
            {
                debugger;
                if(data.CourseList.length>0)
                {
                    $.each(data.CourseList, function (i, item) {
                        debugger;
                        var htmlstring = '<div class="col-sm-6 col-md-3 coursediv">' +
                              '<div class="mc-item mc-item-1">' +
                                  '<div class="image-heading"><img src="../images/Course/' + item.Image + '" alt=""> </div>' +
                                  '<div class="content-item">' +
                                      '<h4><a href="../Home/CourseDetails/' + item.Course_Id + '" class="text_Limit" data-toggle="tooltip" data-placement="top" title="' + item.Title + '">' + item.Title + '</a></h4>' +
                                  '</div>' +
                                  '<div class="ft-item">' +
                                      '<a href="../Home/CourseDetails/' + item.Course_Id + '" class="mc-btn btn-style-1">View Course</a>' +
                                      '<div class="price price_index">' + item.Amount + ' /-</div>' +
                                  '</div>' +
                                  '</div>' +
                      '</div>';
                        $(".SearchCourse").append(htmlstring);
                    });
                }
                else {

                    $(".SearchCourse").append('<div class="col-md-12 text-center bg-color-2 pt-50 pb-50 NotFoundDiv"><img id="theImg" src="../Images/no-records.png" /></div>');
                }
            },
            error: function (ex) {
                alert(ex.responseText);
            }
        });
});
