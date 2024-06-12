<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Payment</title>
</head>
<body>
    <h1>Create Payment</h1>
    <form method="POST" action="/create_payment">
        @csrf <!-- Tambahkan CSRF token untuk keamanan -->
        <label for="external_id">External ID:</label><br>
        <input type="text" id="external_id" name="external_id"><br>
        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount"><br>
        <label for="payer_email">Payer Email:</label><br>
        <input type="email" id="payer_email" name="payer_email"><br><br>
        <button type="submit">Create Payment</button>
    </form>
</body>
</html>
