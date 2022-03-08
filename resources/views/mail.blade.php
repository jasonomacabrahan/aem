<!DOCTYPE html>
<html>
<head>
    <title>iMC3 Portal [AEM Confirmation]</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Confirmation Code: {{ $ccode }}</p>
    <hr>
    <h5>Instruction</h5>
    <ol>
        <li>Login to your account using the email address and password you provide.</li>
        <li>After login, the system will ask for confirmation code.</li>
        <li>Enter the code: {{ $ccode }}</li>
    </ol>
</body>
</html>