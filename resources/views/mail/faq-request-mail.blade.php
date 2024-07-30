<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>New FAQ Request</title>
</head>
<body>
    <h1>New FAQ Request From {{ $question['name'] }}</h1>
    <p><strong>E-mail:</strong> {{ $question['email'] }}</p>
    <p><strong>Faq Request:</strong> <br> {{ $question['message'] }}</p>
</body>
</html>
