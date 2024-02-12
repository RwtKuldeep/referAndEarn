<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw Money</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .withdraw-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .withdraw-section label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .withdraw-section input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .withdraw-section button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="withdraw-section">
        <label for="tax">Tax: 10% (applied tax)</label>
        <label for="amount">Enter amount ₹</label>
        <input type="text" id="amount" placeholder="Enter amount">
        <label for="balance">Balance: Rs 500</label>
        <label for="finalAmount">Final Amount after applying tax</label>
        <div class="result" id="finalAmount">₹ 0.00</div>
        <button onclick="calculateFinalAmount()">Withdraw</button>
    </div>

    <script>
        $(document).ready(function () {
            // Attach a keyup event listener to the input field
            $('#amount').keyup(function () {
                // Get the entered amount
                var enteredAmount = parseFloat($(this).val());

                // Check if the enteredAmount is a valid number
                if (!isNaN(enteredAmount)) {
                    // Calculate 10% of the entered amount
                    var tenPercent = enteredAmount * 0.1;

                    // Display the result
                    $('#finalAmount').text('₹ '+tenPercent.toFixed(2));
                } else {
                    // Display an error message if the entered value is not a valid number
                    $('#finalAmount').text('₹ 0.00');
                }
            });
        });
    </script>

</body>
</html>
