<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Kavlingan.id</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>

    <h3>{{ $details['body'] }}</h3>
    <img src="{{ $details['img_bukti_tf'] }}" alt="">

    <h3>{{ $details['data'] }}</h3>
    <h3>{{ $details['pesan'] }}</h3>

    <a href="http://127.0.0.1:8000/login">Tekan untuk masuk</a>
</body>

</html>
