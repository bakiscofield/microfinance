<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Rapport journalier des récoltes</title>
</head>
<body>
    <div class="container">
        <h1>Rapport journalier des récoltes</h1>

        <div class="row">
            @foreach ($exercices as $exercice)
            <div class="col-md-6">
                <h2>Tontine {{ $exercice->id }}</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Récolte</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rapport as $donnees)
                        <tr>
                            <td>{{ $donnees }} FCFA</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
