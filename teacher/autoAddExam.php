<?php
session_start();




if (isset($_SESSION['ID']) && isset($_SESSION['account']) && isset($_SESSION['db']) && $_SESSION['isTeacher']) {
    $db = $_SESSION['db'];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>

    <body>
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading" style="font-size: 24px">Tạo bài kiểm tra</div>
                <div class="panel-body">
                    <div class="studentOnly container text-center">

                        <div class="col-lg-4">
                            <label for="">Test ID:</label>
                            <input type="text" class="testID" name="testID">
                        </div>
                        <div class="col-lg-4">
                            <label for="">Test name:</label>
                            <input type="text" class="testName" name="testName">
                        </div>
                        <div class="col-lg-4">
                            <label for="">Time to do test (s):</label>
                            <input type="text" class="timePeriod" name="timePeriod">
                        </div>
                        <div class="col-lg-4"><label>Student in class only?</label>
                            <label><input type="radio" class="true" name="studentOnly?">true</label>
                            <label><input type="radio" class="false" name="studentOnly?">false</label>
                        </div>

                    </div>
                    <br>
                    <div class="time container text-center">
                        <div class="col-lg-6">
                            <label>Time start test</label><input type="datetime-local" class="timeStart">
                        </div>

                        <div class="col-lg-6">
                            <label>Time end test</label><input type="datetime-local" class="timeEnd">
                        </div>

                    </div>
                    <br>
                    <div id="questions">
                        <div id="1" class="qtest">
                            <fieldset>
                                <div class="container">
                                    <div class="col-lg-12 text-center">
                                        <div class="col-lg-4">
                                            <label>Number of question:</label>
                                            <input type="text" class="quantityofQuest" name="quantityofQuest">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>in chapter:</label>
                                            <input type="text" class="chapter" name="chapter">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>with hardmode:</label>
                                            <input type="text" class="hardmode" name="hardmode" placeholder="From 1 to 4">
                                        </div>
                                    </div>

                                </div>


                            </fieldset>

                        </div>
                        <hr>
                    </div>
                    <button type="button" onClick="addQuestion()"> Add Question </button>
                    <button type="button" onClick="addExam.php"> Thêm câu hỏi thủ công </button>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="button" name="button" class="btn btn-danger" id="btnFinish">Xác nhận</button>
                        </div>
                    </div>
                    <button id = "btnBack" class="btn" style="float: left; margin-left: auto; margin-right: auto"> <i class="bi bi-arrow-left" style="margin-right: 5%"></i> <a href="teacherIndex.php">Nhập dữ liệu thành công, quay về trang chủ</a></button>

                </div>
            </div>
        </div>

    </body>

    </html>

    <script>
        let cnt = 1;

        function addQuestion() {
            cnt = cnt + 1;
            const divID = document.createElement('div');
            divID.setAttribute('id', cnt);
            divID.setAttribute('class', 'qtest');
            const more = document.createElement('fieldset');
            divID.appendChild(more);
            const div1 = document.createElement('div');
            div1.setAttribute('class', 'container');
            more.appendChild(div1);
            const div2 = document.createElement('div');
            div2.setAttribute('class', 'col-lg-12 text-center');
            div1.appendChild(div2);

            const div21 = document.createElement('div');
            div21.setAttribute('class', 'col-lg-4');
            const label21 = document.createElement('label');
            label21.innerHTML = "Number of question: ";
            const input21 = document.createElement('input');
            input21.setAttribute('type', 'text');
            input21.setAttribute('class', 'quantityofQuest');
            input21.setAttribute('name', 'quantityofQuest');
            div21.appendChild(label21);
            div21.appendChild(input21);

            const div22 = document.createElement('div');
            div22.setAttribute('class', 'col-lg-4');
            const label22 = document.createElement('label');
            label22.innerHTML = "in chapter: ";
            const input22 = document.createElement('input');
            input22.setAttribute('type', 'text');
            input22.setAttribute('class', 'chapter');
            input22.setAttribute('name', 'chapter');
            div22.appendChild(label22);
            div22.appendChild(input22);

            const div23 = document.createElement('div');
            div23.setAttribute('class', 'col-lg-4');
            const label23 = document.createElement('label');
            label23.innerHTML = "with hardmode: ";
            const input23 = document.createElement('input');
            input23.setAttribute('type', 'text');
            input23.setAttribute('class', 'hardmode');
            input23.setAttribute('name', 'hardmode');
            input23.setAttribute('placeholder', "From 1 to 4");
            div23.appendChild(label23);
            div23.appendChild(input23);

            div2.appendChild(div21);
            div2.appendChild(div22);
            div2.appendChild(div23);

            const hr = document.createElement('hr');
            divID.appendChild(hr);


            const t = document.getElementById("questions");
            t.appendChild(divID);






        }


        $(document).ready(function() {
       
        $('#btnBack').hide();
        
       
    });
        var map = new Map();
        let choice;
        var data;
        let testID;
        var timeStart = flatpickr('.timeStart', {});
        var timeEnd = flatpickr('.timeEnd', {});

        function getResult() {
            let studentOnly = $('input[type = "radio"]:checked').attr('class');
            switch (studentOnly) {
                case 'true':
                    choice = 1;
                    break;
                case 'false':
                    choice = 0;
                    break;
            }
            testID = $('.testID').val();
            let testName = $('.testName').val();
            let timePeriod = $('.timePeriod').val();
            var timeStart = $('.timeStart').val();
            var timeEnd = $('.timeEnd').val();
            
            console.log(timeStart);
            console.log(timeEnd);
            console.log(timePeriod);
            console.log(testID);
            console.log(testName);
            console.log(choice);
            
            data = testID + "_" + testName + "_" + timeStart + "_" + timeEnd + "_" + timePeriod + "_" + choice;
            console.log(data);

            $('#questions div.qtest').each(function(k, v) {
                let quantity = $(v).find('fieldset .quantityofQuest').val();
                let chapter = $(v).find('fieldset .chapter').val();
                let hardmode = $(v).find('fieldset .hardmode').val();
                let chapmode = chapter + "." + hardmode;
                console.log(quantity);
                console.log(chapmode);
                if (map.has(chapmode)) {
                    let oldquantity = map.get(chapmode);
                    map.set(chapmode, parseInt(quantity) + parseInt(oldquantity));
                } else {
                    map.set(chapmode, quantity);
                }
                console.log(map);


            })
        }

        function toDatabase() {
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                };
                xmlhttp.open("GET", "createTest.php?data=" + data);
                xmlhttp.send();

            var get_keys = map.keys();
            for(var ele of get_keys) {
                const val = map.get(ele);
                const str = ele + "_" + val + "_" + testID;
                console.log(str);
                var xmlhttp1 = new XMLHttpRequest();
                xmlhttp1.onreadystatechange = function() {
                };
                xmlhttp1.open("GET", "phpMethod.php?q=" + str, true);
                xmlhttp1.send();
            }
        }

        $('#btnFinish').click(function() {
            getResult();
            toDatabase();
            $(this).hide();
            $('#btnBack').show();

        })
    </script>

<?php
    
    


    }else {
    header("Location: ../login/adminLogin.php");
} ?>