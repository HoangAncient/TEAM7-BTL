<?php
include "../config.php";

$sql = "SELECT *FROM question";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>New exam:</h2>
        <form action = "adminUI.php" method = "POST">
            <legend>Insert question</legend>
            <div id = "insertQuestion">
            <fieldset>
                <label> Question 1: </label>
                <br>
                <input type="text" name="quest">
                <br>
                <label> 1st answer </label>
                <br>
                <input type="text" name="answer1">
                <br>
                <label> 2nd answer </label>
                <br>
                <input type="text" name="answer2">
                <br>
                <label> 3rd answer </label>
                <br>
                <input type="text" name="answer3">
                <br>
                <label> 4th answer </label>
                <br>
                <input type="text" name="answer4">
                <br>
                <label> Right answer </label>
                <br>
                <input type="text" name="ranswer">
                <br>
            </fieldset>
            </div>
            <br>
            <button type="submit" name="submit" value="submit"> Save </button>
            <button type ="button" onClick = "addQuestion()"> Add Question </button>
        </form>
    </div>

</body>

<script>
let cnt = 1;

function addQuestion() {
    cnt = cnt + 1;
    const more = document.createElement('fieldset');

    const hr = document.createElement('hr');
    more.appendChild(hr);

    const Question = document.createElement('label');
    Question.innerText = 'Question ' + cnt + ':';
    const br = document.createElement('br');
    const inputQuestion = document.createElement('input');
    inputQuestion.setAttribute('type', 'text');
    inputQuestion.setAttribute('name', 'quest');
    more.appendChild(Question);
    more.appendChild(br);
    more.appendChild(inputQuestion);

    const br1 = document.createElement('br');
    more.appendChild(br1);

    const Question1 = document.createElement('label');
    Question1.innerText = '1st answer:';
    const br2 = document.createElement('br');
    more.appendChild(br2);
    const inputQuestion1 = document.createElement('input');
    inputQuestion1.setAttribute('type', 'text');
    inputQuestion1.setAttribute('name', 'answer1');
    more.appendChild(Question1);
    more.appendChild(br2);
    more.appendChild(inputQuestion1);

    const br3 = document.createElement('br');
    more.appendChild(br3);

    const Question2 = document.createElement('label');
    Question2.innerText = '2nd answer:';
    const br4 = document.createElement('br');
    more.appendChild(br4);
    const inputQuestion2 = document.createElement('input');
    inputQuestion2.setAttribute('type', 'text');
    inputQuestion2.setAttribute('name', 'answer2');
    more.appendChild(Question2);
    more.appendChild(br4);
    more.appendChild(inputQuestion2);

    const br5 = document.createElement('br');
    more.appendChild(br5);

    const Question3 = document.createElement('label');
    Question3.innerText = '3rd answer:';
    const inputQuestion3 = document.createElement('input');
    inputQuestion3.setAttribute('type', 'text');
    inputQuestion3.setAttribute('name', 'answer3');
    more.appendChild(Question3);
    const br6 = document.createElement('br');
    more.appendChild(br6);
    more.appendChild(inputQuestion3);

    const br7 = document.createElement('br');
    more.appendChild(br7);

    const Question4 = document.createElement('label');
    Question4.innerText = '4th answer:';
    const inputQuestion4 = document.createElement('input');
    inputQuestion4.setAttribute('type', 'text');
    inputQuestion4.setAttribute('name', 'answer4');
    more.appendChild(Question4);
    const br8 = document.createElement('br');
    more.appendChild(br8);
    more.appendChild(inputQuestion4);

    const br9 = document.createElement('br');
    more.appendChild(br9);

    const rightAnswer = document.createElement('label');
    rightAnswer.innerText = 'Right answer:';
    const inputRightAnswer = document.createElement('input');
    inputRightAnswer.setAttribute('type', 'text');
    inputRightAnswer.setAttribute('name', 'ranswer');
    more.appendChild(rightAnswer);
    const br10 = document.createElement('br');
    more.appendChild(br10);
    more.appendChild(inputRightAnswer);

    const br11 = document.createElement('br');
    more.appendChild(br11);
/*
    more.innerText = 'Question 1: <br>'
                + '<input type="text" name="quest">'
                + '<br>'
                + 'answer1:<br>'
                + '<input type="text" name="answer1">'
                + '<br>'
                + 'answer2:<br>'
                + '<input type="text" name="answer2">'
                + '<br>'
                + 'answer3:<br>'
                + '<input type="text" name="answer3">'
                + '<br>'
                + 'answer4:<br>'
                + '<input type="text" name="answer4">'
                + '<br>'
                + 'ranswer:<br>'
                + '<input type="text" name="ranswer">'
                + '<br>'
                + '<br>';
*/
    // more.innerText = "haha";
    document.getElementById('insertQuestion').appendChild(more);
}

</script>

</html>