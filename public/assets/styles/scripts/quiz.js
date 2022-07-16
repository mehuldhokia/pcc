
$GlobalQuestionData = "";
$GlobalQuestionOptionData = "";
$GlobalQuizQuestionCount = 0;
$ExamTime = 920;


var QuestionAnswerArray = {};

$(document).ready(function () {
    debugger;
    $.ajax({
        type: "GET",
        url: "/Home/getQualification",
        data: "{}",
        success: function (data) {
            debugger;
            var s = '<option value="-1">Please Select Qualification</option>';
            for (var i = 0; i < data.length; i++) {
                s += '<option value="' + data[i].StdId + '">' + data[i].StdName + '</option>';
            }
            $("#ddlStd").html(s);
        }
    });
    //LoadQuiz();
});

$('body').bind('copy paste cut drag drop', function (e) {
    e.preventDefault();
});

//document.addEventListener('contextmenu', (e) => {
//    e.preventDefault();
//}
//);
//document.onkeydown = function (e) {
//    if (event.keyCode == 123) {
//        return false;
//    }
//    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//        return false;
//    }
//    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//        return false;
//    }
//    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//        return false;
//    }
//    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//        return false;
//    }
//}

function startCountdown(timeLeft) {
    var interval = setInterval(countdown, 1000);
    update();

    function countdown() {
        if (--timeLeft > 0) {
            update();
        } else {
            clearInterval(interval);
            update();
            completed();
        }
    }

    function update() {
        hours = Math.floor(timeLeft / 3600);
        minutes = Math.floor((timeLeft % 3600) / 60);
        seconds = timeLeft % 60;

        document.getElementById('time-left').innerHTML = '' + hours + ':' + minutes + ':' + seconds;
    }

    function completed() {
        $("#btnSubmit").prop("disabled", "disabled");
        alert("Time over");
        SubmitTestResult(0);
    }
}



function LoadQuiz() {
    $.ajax({
        type: 'Get',
        url: "/Home/LoadQuiz",
        dataType: 'json',
        data: {},
        complete: function () {
            startCountdown($ExamTime);
        },
        success: function (data) {
            //debugger;
            if (data.IsSucess == "True") {

                $GlobalQuizQuestionCount = parseInt(data.RecCount);
                if ($GlobalQuizQuestionCount > 0) {
                    $GlobalQuestionData = data.Result.Table;
                    $GlobalQuestionOptionData = data.Result.Table1;

                    if (!$.isEmptyObject($GlobalQuestionData)) {
                        diplayQuestion($GlobalQuestionData[0].Row_Num, $GlobalQuestionData[0].QId);
                    }
                }
            }
        },
        error: function (ex) {
            alert(ex.responseText);
        }
    });
}


function diplayQuestion($srno, $quetionID) {
    var filterData = $GlobalQuestionData.filter(function (obj) {
        return obj.QId === parseInt($quetionID);
    });

    if (!$.isEmptyObject(filterData)) {
        $("#lblQuestionCount").text("Question " + filterData[0].Row_Num);
        $("#lblQuestion").text(filterData[0].question);
    }

    var filterData2 = $GlobalQuestionOptionData.filter(function (obj) {
        return obj.QId === parseInt($quetionID);
    });

    if (parseInt($srno) == 1) {
        $("#btnPrevQuestion").attr("disabled", "disabled");
        $("#btnNextQuestion").attr("data-id", parseInt($srno) + 1);
    } else {
        $("#btnPrevQuestion").attr("data-id", parseInt($srno) - 1);
        $("#btnNextQuestion").attr("data-id", parseInt($srno) + 1);
        $("#btnPrevQuestion").removeAttr("disabled");
    }

    if (parseInt($srno) >= parseInt($GlobalQuizQuestionCount)) {
        $("#btnNextQuestion").attr("disabled", "disabled");
    }
    else {
        $("#btnNextQuestion").removeAttr("disabled");
    }

    if (!$.isEmptyObject(filterData2)) {
        $answerData = "";
        for ($count = 0; $count < filterData2.length; $count++) {
            $answerData = $answerData + '<li><input type = "radio" name = "radio" id = "radio-' + filterData2[$count].OptionId + '" data-questionid=' + $quetionID + ' data-optionid=' + filterData2[$count].OptionId + ' class="radioquestionoption"><label for="radio-' + filterData2[$count].OptionId + '"><i class="icon icon_radio"></i>' + filterData2[$count].optionText + '</label></li >';
        }
        $("#lblQuestioAns").html($answerData);
    }
}


$(document).on('click', '#btnPrevQuestion', function () {
    $dataid = $(this).attr("data-id");
    //debugger;
    
    var filterData = $GlobalQuestionData.filter(function (obj) {
        return obj.Row_Num === parseInt($dataid);
    });

    diplayQuestion($dataid, filterData[0].QId);

    $valid = parseInt(QuestionAnswerArray[$dataid]);
    if (!isNaN($valid)) {
        $("#radio-" + $valid).prop('checked', true);
    }

});


$(document).on('click', '#btnNextQuestion', function () {
    //debugger;
    $dataid = $(this).attr("data-id");
    

    var filterData = $GlobalQuestionData.filter(function (obj) {
        return obj.Row_Num === parseInt($dataid);
    });

    diplayQuestion($dataid, filterData[0].QId);

    $valid = parseInt(QuestionAnswerArray[$dataid]);
    if (!isNaN($valid)) {
        $("#radio-" + $valid).prop('checked', true);
    }

});

function SubmitTestResult($flag) {
    //debugger;

    if ($flag == 1 && parseInt($GlobalQuizQuestionCount) != parseInt(Object.keys(QuestionAnswerArray).length)) {
        alert("ALL Quesnsions are mandatory to Submit Quiz");
        return false;
    }
    if (parseInt($GlobalQuizQuestionCount) == parseInt(Object.keys(QuestionAnswerArray).length)) {
        $.ajax({
            type: 'Post',
            url: "/Home/SubmitQuiz",
            dataType: 'text',
            data: "jsonstring=" + JSON.stringify(QuestionAnswerArray),
            success: function (data) {
                window.location.href = '/Home/TestResult';
            },
            error: function (ex) {
                alert(ex.responseText);
            }
        });
    }
}
$(document).on('click', '#btnSubmit', function () {
    SubmitTestResult(1);
});



$(document).on('change', '.radioquestionoption', function () {
    $qid = $(this).attr("data-questionid");
    $oid = $(this).attr("data-optionid");
    QuestionAnswerArray[$qid] = $oid;
});
