<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div id="error"></div>
        <input type="text" id="operand1" name="operand1" value="<?= $_POST['operand1'] ?>">

        <button name="operation" value="sum">+</button>
        <button name="operation" value="minus">-</button>
        <button name="operation" value="multiplic">*</button>
        <button name="operation" value="division">/</button>

        <input type="text" id="operand2" name="operand2" value="<?= $_POST['operand2'] ?>">
        
        <label for="result">=</label>
        <input type="text" id="result" name="result" value="<?= $result ?>">

    <script src="ajax.js"></script>
    <script>
        function calc(eventObj) {
            data = {
                operand1: document.getElementById('operand1').value,
                operand2: document.getElementById('operand2').value,
                operation: eventObj.srcElement.value,
            };
            if(data['operand1'] == "" || data['operand2'] == "") {
                document.getElementById('error').innerHTML = "Указаны не все операнды!";
            } else {
                calculate('calcAjax.php', data)
                .then(result => document.getElementById('result').value = result['result'])
                .catch(error => console.error(error));
                document.getElementById('error').innerHTML = "";
            }     
        }

        window.onload = function() {
        document.getElementsByName('operation').forEach(button => {
            button.onclick = calc;
        });
    };
    </script>

</body>

</html>

