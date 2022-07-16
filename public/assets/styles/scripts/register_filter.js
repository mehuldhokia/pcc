$(document).ready(function () {
    $(document).on('click', '#btnSearch', function () {
        fillStudentList();
    });
    function fillStudentList() {
        debugger;
        //$projNo = +$(".ddlProjectMaster option:selected").val().split("_")[0];
        //$fromDate = $("#daterangepicker").val().split("-")[0].trim();
        //$toDate = $("#daterangepicker").val().split("-")[1].trim();
        //$suppGrpId = +$(".supplierGroup option:selected").val();
        //$supplierId = isNaN(+$(".ddlSupplier option:selected").val()) == true ? '' : getMultipleDdlVal("ddlSupplier");
        $UserStauts = $("#ddlStatus option:selected").val();
        //$poNo = isNaN(+$(".ddlPoNo option:selected").val()) == true ? 0 : +$(".ddlPoNo option:selected").val();
        //$poStatIds = isNaN(+$(".ddlPoStatus option:selected").val()) == true ? -1 : getMultipleDdlVal("ddlPoStatus");
        //$advStatIds = isNaN(+$(".ddlAdvanceStatus option:selected").val()) == true ? 0 : getMultipleDdlVal("ddlAdvanceStatus");
        //$guid = +$("input[id*='hdGuid']").val();
        //$PageSize = $GlobalPageSize;
        //$PageIndex = $GlobalPageIndex;
        //alert($UserStauts);

        //$("#tblAdvanceBrowse thead").empty();
        //$("#tblAdvanceBrowse tbody").empty();
        //$("#tblAdvanceBrowse tfoot").empty();
        $.ajax({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            url: "/Dashboard/BindUserList",
            data: '{"Status":' + $UserStauts + '}',
            //data: '{"ProjectId":' + $projNo + ', "FromDate":"' + $fromDate + '","ToDate":"' + $toDate + '","SuppGrpId":' + $suppGrpId + ',"SupplierId":"' + $supplierId + '","PoTypeId":' + $poTypeId + ', "PoNo":' + $poNo + ',"PoStatIds":"' + $poStatIds + '","AdvStatIds":"' + $advStatIds + '","Guid":' + $guid + ',"PageIndex":' + $GlobalPageIndex + ',"PageSize":' + $GlobalPageSize + '}',
            dataType: "json",
            success: function (data) {
                $objJsonResult = jQuery.parseJSON(data.d);
                debugger;
                if ($objJsonResult.Table.length == 0) {
                    MsgBox("info", "Advance records not found, Please change the filter criteria");
                    $("#SearchPnl").addClass("disp-none");
                }
                else if ($objJsonResult.Table.length > 0) {
                    $("#SearchPnl").removeClass("disp-none");
                    $advAmt = 0; $recAmt = 0; $advBalAmt = 0;
                    $("#tblAdvanceBrowse thead").append($("#tblTemplate thead").html());
                    $tmpRow = $("#tblTemplate tbody");
                    $.each($objJsonResult.Table, function ($idx, $adv) {
                        if ($idx == 0) {
                            $totalofData = $adv.Total_Rows;
                            $("#TotRecords").text($adv.Total_Rows);
                        }
                        $tmpRow.find(".rowAdvId").text($adv.PV_Id);
                        $tmpRow.find(".rowAdvDate").text(convertDate($adv.PV_Date));
                        $tmpRow.find(".rowProjName").text($adv.Project.trim());
                        $tmpRow.find(".rowSupplier").text($adv.Party_Name.trim());
                        $tmpRow.find(".rowAdvStatus").text($adv.PV_Status);
                        $tmpRow.find(".rowAdvAcVoucherNo").text($adv.Acc_VNo);
                        $tmpRow.find(".rowPoSrNo").text($adv.PO_SrNo);
                        $tmpRow.find(".rowPoNo").text($adv.PO_No);
                        $tmpRow.find(".rowPoStatus").text($adv.PO_Status);
                        $tmpRow.find(".rowAdvAmt").text(parseFloat($adv.Amount).toFixed(2));
                        $tmpRow.find(".rowRecAmt").text(parseFloat($adv.RecoveryAmount).toFixed(2));
                        $tmpRow.find(".rowBalAmt").text(parseFloat($adv.AdvBalance).toFixed(2));
                        $("#tblAdvanceBrowse tbody").append($("#tblTemplate tbody").html());

                        $advAmt = parseFloat($advAmt + $adv.Amount);
                        $recAmt = parseFloat($recAmt + $adv.RecoveryAmount);
                        $advBalAmt = parseFloat($advBalAmt + $adv.AdvBalance);
                    });
                    $tmpft = $("#tblTemplate tfoot");
                    $tmpft.find(".tfTotAdv").text(parseFloat($advAmt).toFixed(2))
                    $tmpft.find(".tfTotRec").text(parseFloat($recAmt).toFixed(2))
                    $tmpft.find(".tfTotAdvBal").text(parseFloat($advBalAmt).toFixed(2))
                    $("#tblAdvanceBrowse tfoot").append($("#tblTemplate tfoot").html());
                }
            },
            error: function (error) { },
            fail: function (fail) { },
            before: function () { $(".HighriseLoaderBG,.HighriseLoaderInner").show(); },
            complete: function () {
                $(".HighriseLoaderBG,.HighriseLoaderInner").hide();
                if ($("#tableDatapagination").length == 0) {
                    $('#SearchPnl .scroller').append($PagerData)
                    loadPagination($PageSize, $totalofData, $PageIndex + 1);
                }
            }
        });

    }


    debugger;
    //$(".display_None").css("display", "none");
    //$("#btnSubmit").click(function () {
    //    debugger;
    //    //$(".display_None").css("display", "none");
    //    $abc = $('#ddlStatus :selected').text();
    //    console.log($abc);
        
    //    //debugger;
    //    $.ajax({
    //        type: 'Post',
    //        url: "/Dashboard/StudentFilter",
    //        dataType: 'json',
    //        async: false,
    //        data: {
    //            Status: $abc
    //        },
    //        success: function (response) {
    //            //debugger;
    //            $(".tblstudentverification").html('');

    //            if (response.IsSucess == "False") {
    //                $(".NotFoundDiv").css("display", "inline");
    //            }
    //            else if (response.IsSucess == "True") {
    //                $(".NotFoundDiv").css("display", "none");
    //                $(".display_None").css("display", "inline");
    //                $htmlstring = "";
    //                $htmlstring += " <tbody>";
    //                $.each(response.Result, function (index, value) {
    //                    $htmlstring += "<tr><th scope ='row'> Student Name</th ><td>:</td><td>" + value.Stud_Name + "</td></tr>";
    //                    $htmlstring += "<tr><th scope ='row'> Enrollment No.</th ><td>:</td><td>" + value.Entrollment_No + "</td></tr>";
    //                    $htmlstring += "<tr><th scope ='row'> Course Name</th ><td>:</td><td>" + value.Veri_Course_Name + "</td></tr>";
    //                    $htmlstring += "<tr><th scope ='row'> City</th ><td>:</td><td>" + value.CityName + "</td></tr>";
    //                    $htmlstring += "<tr><th scope ='row'> Center Name</th ><td>:</td><td>" + value.Center_Name + "</td></tr>";
    //                });
    //                $htmlstring += " </tbody>";
    //                $(".tblstudentverification").append($htmlstring);
    //            }
    //        },
    //        error: function (ex) {
    //            alert(ex.responseText);
    //        }
    //    });
    //});
});