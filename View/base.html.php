<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/index.php?c=user" title="Utilisateurs">Utilisateurs</a></li>
                <li><a href="/index.php?c=article&a=add-article" title="Utilisateurs">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <?= $html ?>
    </main>

    <footer>
        <div>Infos de contact</div>
        <div>Horaires</div>
    </footer>
    <script src="/assets/js/app.js"></script>
</body>
</html>
