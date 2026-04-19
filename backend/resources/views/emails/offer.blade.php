<!DOCTYPE html>
<html>
<head>
    <title>Új ajánlatkérés</title>
</head>
<body>
    <h2>Új megkeresés érkezett a weboldalról!</h2>
    
    <p><strong>Név:</strong> {{ $formData['lastName'] }} {{ $formData['firstName'] }}</p>
    <p><strong>E-mail:</strong> {{ $formData['email'] }}</p>
    <p><strong>Telefonszám:</strong> {{ $formData['phone'] ?? 'Nem adott meg' }}</p>
    
    <h3>Üzenet:</h3>
    <p>{{ $formData['message'] }}</p>
</body>
</html>