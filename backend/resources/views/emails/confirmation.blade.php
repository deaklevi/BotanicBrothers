<!DOCTYPE html>
<html>
<head>
    <title>Sikeres ajánlatkérés</title>
</head>
<body>
    <h2>Kedves {{ $formData['firstName'] }}!</h2>
    
    <p>Köszönjük, hogy megkeresett minket! Ez egy automatikus üzenet, mellyel visszaigazoljuk, hogy ajánlatkérése sikeresen beérkezett a rendszerünkbe.</p>
    
    <p>Kollégáink hamarosan feldolgozzák a kérést, és <strong>24 órán belül</strong> felveszik Önnel a kapcsolatot a megadott elérhetőségek egyikén.</p>
    
    <hr>
    <h3>Az Ön által elküldött adatok másolata:</h3>
    <p><strong>Név:</strong> {{ $formData['lastName'] }} {{ $formData['firstName'] }}</p>
    <p><strong>E-mail:</strong> {{ $formData['email'] }}</p>
    <p><strong>Telefonszám:</strong> {{ $formData['phone'] ?? 'Nem adott meg' }}</p>
    <p><strong>Üzenet:</strong><br> {{ $formData['message'] }}</p>
    <hr>

    <p>Üdvözlettel,<br>A Botanic Brothers csapata</p>
</body>
</html>