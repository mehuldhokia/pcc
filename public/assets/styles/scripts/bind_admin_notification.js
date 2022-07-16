$(document).ready(function () {
    BindNewUserList();
    BindNewReceiptList();
});

function BindNewUserList() {
    //debugger;
    $.ajax({
        type: "GET",
        url: "/Dashboard/GetNewUserList",
        data: '{}',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response != null) {
                debugger;
                var j = ""; var p = 0; var Q = "";
                $.each(response, function (k, v) {
                    var a = new Date(parseInt(v.RDate.substr(6)));
                    var RDate = a.getDate() + '/' + (a.getMonth() + 1) + '/' + a.getFullYear();
                    p++;
                    if (p < 6) {
                        j += "<a href='#' class='dropdown-item'><div class='media'><img src='/Images/UserImages/" + v.UImage + " 'alt='User Avatar' class='img-size-50 mr-3' style='border-radius:5px;' /><div class='media-body'><h3 class='dropdown-item-title  text-primary'>" + v.FullName + "</h3><p class='text-sm'> is registred with ref.of " + v.ReferBy + "</p><p class='text-sm text-muted'><i class='far fa-clock mr-1'></i>on " + RDate + "</p></div></div></a><div class='dropdown-divider'></div>";
                    }
                    Q += "<a href='#' class='dropdown-item'><div class='media'><img src='/Images/UserImages/" + v.UImage + " 'alt='User Avatar' class='img-size-50 mr-3' style='border-radius:5px;' /><div class='media-body'><h3 class='dropdown-item-title  text-primary'>" + v.FullName + "</h3><p class='text-sm'> is registred with ref.of " + v.ReferBy + "</p><p class='text-sm text-muted'><i class='far fa-clock mr-1'></i>on " + RDate + "</p></div></div></a><div class='dropdown-divider'></div>";
                });
                $('#UserCount').html("" + p + "");
                $('#UserList').html("");
                $('#UserList').append(Q);
            }
        },
        failure: function (response) {
            alert(response.d);
        }
    });
}

function BindNewReceiptList() {
    $.ajax({
        type: "GET",
        url: "/Dashboard/GetNewRecieptList",
        data: '{}',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response != null) {
                var j = ""; var p = 0; var Q = "";
                $.each(response, function (k, v) {
                    var a = new Date(parseInt(v.RDate.substr(6)));
                    var RDate = a.getDate() + '/' + (a.getMonth() + 1) + '/' + a.getFullYear();
                    p++;
                    if (p < 6) {
                        j += "<a href='#' class='dropdown-item'><div class='media'><img src='/Images/UserImages/" + v.UImage + " 'alt='User Avatar' class='img-size-50 mr-3' style='border-radius:5px'><div class='media-body'><h3 class='dropdown-item-title text-primary'>" + v.FullName + "</h3><p class='text-sm'>is uploaded payment receipt.</p><p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> " + RDate + " </p></div></div></a><div class='dropdown-divider'></div>";
                    }
                    Q += "<a href='#' class='dropdown-item'><div class='media'><img src='/Images/UserImages/" + v.UImage + " 'alt='User Avatar' class='img-size-50 mr-3' style='border-radius:5px'><div class='media-body'><h3 class='dropdown-item-title text-primary'>" + v.FullName + "</h3><p class='text-sm'>is uploaded payment receipt.</p><p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> " + RDate + " </p></div></div></a><div class='dropdown-divider'></div>";
                });
                $('#ReceiptCount').html("" + p + "");
                $('#ReceiptList').html("");
                $('#ReceiptList').append(Q);
            }
        },
        failure: function (response) {
            alert(response.d);
        }
    });
}