<?php 
session_start();
include "../config.php";
if (isset($_GET['testID'])) {
    $_SESSION['testID'] = $_GET['testID'];
    $testID = $_SESSION['testID'];
    $sql = "SELECT * FROM  test where testID = '$testID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/questions.css">
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="startDiv">
        <div id="headerDiv">Welcome to the Exam</div>
        <div id="bodyDiv" class=" position-relative">
        <label>Start: <?php echo $row['timeStart']?><i style="margin-left: 4px"class="bi bi-pencil-fill"></i></label>
        <label>End: <?php echo $row['timeEnd']?><i style="margin-left: 4px"class="bi bi-pencil-fill"></i></label>
        <div id="signIn">
                <label>Sau khi ấn nút start sẽ bắt đầu tính giờ làm bài.<i style="margin-left: 4px"class="bi bi-pencil-fill"></i></label>
                <label>Số lượt làm bài còn lại: <?php echo $row['turn']; ?><i style="margin-left: 4px"class="bi bi-pencil-fill"></i></label>
        </div>
        <button type="button" name="button" class="btn btn-lg btn-danger customBtnL" id="btnReturn"> 
        <i class="bi bi-box-arrow-left"></i><a href="studentUI.php">Back</a>    
        </button> 
        <button type="button" name="button" class="btn btn-lg btn-success customBtnR" id="btnStart"> Start</button>
        </div>
    </div>

    <div id = "timeleft" style = "text-align: center;
    font-size: 30px;
    margin-top: 20px;
    width: auto;"></div>
    <div id="questions" class="container"></div>
    <button type="button" name="button" class="btn btn-primary btn-lg position-relative bottom-0 start-50 translate-middle-x" id="btnFinish" style="margin-top: 5%">Nộp bài</button>
    <button type="button" name="button" class="btn btn-primary btn-lg position-relative bottom-0 start-50 translate-middle-x" id="btnBack" style="margin-top: 5%"><a href="studentIndex.php">Quay về trang chủ</a></button>

    <div class="row showGrade" style="margin-top: 5%">
        <div class="col-sm-12 text-center">
            <h4 id="mark" class="text-info"></h4>
        </div>
    </div>
</body>
<script type="text/javascript">




    let timer; // 45'
    let timerStart;
    let isChecked;
    var start;
    var end;
    
    var timeTestStart;
    var timeTestEnd;
    var timePeriod;
    var turn;





    $(document).ready(function() {
        $('#btnFinish').hide();
        $('#btnBack').hide();
        $('#questions').hide();
        $('#timeleft').hide();
        timer = 10;
        timerStart = 0;
       
    });
    const solve = setInterval(function() {
        if (timerStart == 0) {
            $(document).ready(function() {
                $('#btnFinish').hide();
                $('#btnBack').hide();
                $('#questions').hide();
                $('#timeleft').hide();
                timer = 10;
                timerStart = 0;
            });
        } else {
            
            var minutes = Math.floor((timer % (60*60)) / 60);
            var seconds = Math.floor(timer % 60);
            minutes = pad(minutes, 2)
            seconds = pad(seconds, 2);
            document.getElementById("timeleft").innerHTML = "Time left: " + minutes + ":" + seconds;
            if (timer > 0 && timerStart == 1) {
                timer--;
            } else {
                $('#btnFinish').hide();
                var date = new Date();
                end   = date.getFullYear() + "-"
                + pad((date.getMonth()+1),2)  + "-" 
                + pad(date.getDate(),2) + " "  
                + pad(date.getHours(),2) + ":"  
                + pad(date.getMinutes(),2) + ":" 
                + pad(date.getSeconds(),2);
                CheckResult();
                clearInterval(solve);
                $('#btnBack').show();
               
            }
            
        }
    }, 1000);

    function pad(num, size) {
    num = num.toString();
    while (num.length < size) num = "0" + num;
    return num;
    }
    

    var questions;
    
    let index = 1;
    var uname = "";
    

    // Khi ấn nút start
    $('#btnStart').click(function() {
        
        $.ajax({
            url: './getPreInfo.php',
            type: 'get',    
            async : false, 
            success: function(data) {
                preInfo = jQuery.parseJSON(data);
                $.each(preInfo, function(k, v) {
                    timeTestStart = v['timeStart'];
                    timeTestEnd = v['timeEnd'];
                    timePeriod = v['timePeriod'];
                    turn = v['turn'];
                })
                var currentdate = new Date();
                start   = currentdate.getFullYear() + "-"
                + pad((currentdate.getMonth()+1),2)  + "-" 
                + pad(currentdate.getDate(),2) + " "  
                + pad(currentdate.getHours(),2) + ":"  
                + pad(currentdate.getMinutes(),2) + ":" 
                + pad(currentdate.getSeconds(),2);

                if(start < timeTestEnd && start >= timeTestStart) {
                    GetQuestions();
                $('#questions').show();
                $('#btnFinish').show();
                $('#btnBack').hide();
                $('#timeleft').show();
                $('#startDiv').hide();
                timer = timePeriod;
                timerStart = 1;
                }
                else {
                    let c = ' <label>Bạn đã vào không đúng thời gian<i style="margin-left: 4px"class="bi bi-pencil-fill"></i></label>'
                    $('#signIn').html(c);
                }
            }

            
        })
                
            
            
        

    });

    function sum(a, b) {
        return a + b;
    }


    //khi ấn nút nộp bài
    $('#btnFinish').click(function() {
        var date = new Date();
        end   = date.getFullYear() + "-"
                + pad((date.getMonth()+1),2)  + "-" 
                + pad(date.getDate(),2) + " "  
                + pad(date.getHours(),2) + ":"  
                + pad(date.getMinutes(),2) + ":" 
                + pad(date.getSeconds(),2);
        $(this).hide();
        //$('#btnStart').show();
        CheckResult();
        $('#btnBack').show();

        timerStart = 2;
        <?php
        ?>
    });

    function GetInfo(grade) {
        $.ajax({
		url: "getResult.php",
		type: "POST",
		data: {
            grade: grade,
            start: start,
            end: end,
		},
		cache: false,
    })
};

    function CheckResult() {
        let mark = 0;
        if (isChecked == 1) {
            return;
        }
        isChecked = 1;
        $('#questions div.qtest ').each(function(k, v) {

            // Bước 1: lấy đáp án đúng của câu hỏi
            let id = $(v).find('h5').attr('id');

            let question = questions.find(x => x.id == id);
            let answer = question['ranswer'];
            //Bước 2: lấy từ người dùng
            let da = $(v).find('fieldset input[type = "radio"]:checked').attr('class');
            //da: đáp án của người dùng
            let choice = '';
            switch (da) {
                case 'rdOptionA':
                    choice = "answer1";
                    break;
                case 'rdOptionB':
                    choice = "answer2";
                    break;
                case 'rdOptionC':
                    choice = "answer3";
                    break;
                case 'rdOptionD':
                    choice = "answer4";
                    break;
            }
            if (choice == answer) {
                mark++;
                $('#question_' + id + ' >.answer>fieldset>div>label.' + answer).append('<span class="glyphicon glyphicon-ok"></span>');
            } else {
                $('#question_' + id + ' >.answer>fieldset>div>label.' + choice).append('<span class="glyphicon glyphicon-remove"></span>');
            }
            $("input").prop("disabled", true);
            // Bước 3: đánh dấu câu hỏi nào đúng, câu nào sai
            
        });
        console.log('Điểm của bạn là: ' + mark + '/' + sum(index, -1));
        var ugrade = 0.00;
        if (mark != 0) {
        ugrade = (mark * 10) / sum(index, -1);
        } else {
            
        }

        grade = ugrade.toFixed(2);

        $('#mark').text('Điểm của bạn là: ' + grade);
        GetInfo(grade);

    };
    // $('#btnStart').click(function() {
    //     GetQuestions();
    //     timerStart = 1;
    // });

    function GetQuestions() {
        $.ajax({
            url: '../renderQ.php',
            type: 'get',
            success: function(data) {
                questions = jQuery.parseJSON(data);
                index = 1;
                let d = '';
                $.each(questions, function(k, v) {
                    d += '<div id="aQuestion" class="container">'

                    d += '<div class = "qtest" id = "question_' + v['id'] + '"> ';
                    d += '<div class="question">';
                    d += '<h5 id =' + v['id'] + '> <span class = "text-danger">Câu ' + index + ': </span>' + v['quest'] + '</h5>';
                    if (v['filepath'] != null) {
                        d += '<img src = assets/image/' + v['filepath'] + ' style = "width:100%;">';
                    }
                    d += '</div>';


                    d += '<div class="answer">'

                    d += '<fieldset id = "group' + index + '">';
                    d += '<div class="radio choice">';
                    d += '    <label  class = "answer1"><input type="radio" class="rdOptionA" name = "group' + index + '"><span class = "text-warning">A: </span> ' + v['answer1'] + ' </label>';
                    d += '</div>';
                    d += '<div class="radio choice">';
                    d += '    <label class = "answer2"><input type="radio" class="rdOptionB" name = "group' + index + '"><span class = "text-warning">B: </span> ' + v['answer2'] + '</label>';
                    d += '</div>';
                    d += '<div class="radio choice">';
                    d += '    <label class = "answer3"><input type="radio" class="rdOptionC" name = "group' + index + '"><span class = "text-warning">C: </span> ' + v['answer3'] + '</label>';
                    d += '</div>';
                    d += '<div class="radio choice">';
                    d += '    <label class = "answer4"><input type="radio" class="rdOptionD" name = "group' + index + '"><span class = "text-warning">D: </span> ' + v['answer4'] + '</label>';
                    d += '</div>';
                    d += '</fieldset>';
                    d += '</div>';
                    d += '</div>';
                    d += '</div>';
                    index++;

                });

                $('#questions').html(d);
            }
        });
    }
</script>

</html>

<?php } ?>