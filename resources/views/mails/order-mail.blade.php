<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virginia Maternity Coach: conferma dell'ordine</title>
</head>

<body style="background-color:#e9ecef;font-family: sans-serif;">
    <div style="background-color:#fff;border-radius:40px;padding:2rem;">
    <p>Ciao {{ $order->customer_name }},</p>
    <p>Il tuo ordine è stato creato con successo!</p>
    <p>Accedi subito al corso e comincia ad allenarti! :) <a href="http://www.virginiamaternitycoach.it/courses/{{$order->purchased_course_id}}">Accedi a {{ $order->purchased_course_title }}</a></p>
    <p>Ecco il riepilogo del tuo ordine!</p>
    <table style="width:600px;margin:1rem0;">
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
      <p>I tuoi dati:</p>
      <div>
          <p>
            {{$order->customer_name}}<br>
            {{$order->user_email}}<br>
            {{$order->customer_street}} {{$order->customer_apartment}}<br>
            {{$order->customer_city}}<br>
            {{$order->customer_zip}}<br>
            {{$order->customer_country}}<br>
            {{$order->customer_state}}<br>
            {{$order->customer_phone}}
        </p>
      </div>
      <p>Hai problemi con l'accesso al corso? Rispondi a questa email!</p>
      <p><i>Virginia</i></p>
      <p><a href="https://www.virginiamaternitycoach.it">Virginia Maternity Coach</a></p>
    </div>
</body>

</html>
