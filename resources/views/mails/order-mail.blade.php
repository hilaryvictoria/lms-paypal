<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virginia Maternity Coach: conferma dell'ordine</title>
</head>

<body>
    <p>Ciao {{ $order->customer_name }},</p>
    <p>Il tuo ordine è stato creato con successo!</p>
    <table style="width:600px;text-align:right;">
        <thead>
            <tr>
                <th>Corso</th>
                <th>Prezzo</th>
                <th>Id transazione</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->purchased_course_title }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->transaction_id }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
