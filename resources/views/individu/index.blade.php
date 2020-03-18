<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index individus</title>
</head>
<body>
    @foreach ($individus as $key => $individu)
        <tr>
            <td>
                {{ $individu->id }}
            </td>
            <td>
                {{ $individu->nom }}
            </td>
            <td>
                {{ $individu->prenom }}
            </td>
            <td>
                {{ $individu->email }}
            </td>
        </tr>
    @endforeach
</body>
</html>