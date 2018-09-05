<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="Plateforme de Gestion">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="MAMALE Liliane / TAHRI Mostapha / CORNEA Claudiu">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    </head>

    <body>
      <header class="columns">
          <div class="column is-offset-1 is-1">
              <p class="image is-3by1">
                  <img src="public/img/logo.jpg">
              </p>
          </div>
          <div class="column is-8">
              <h1 class="title has-text-centered">
                  <!-- à changer ! -->
                  <strong>Welcome to COGIP</strong>
              </h1>
          </div>
          <div class="column is-offset-1 is-1">
              <button class="button is-rounded">Déconnection</button>
          </div>
      </header>
      <nav class="columns is-centered">
          <div class="column is-offset-1 is-2">
              <button class="button is-rounded">Accueil</button>
          </div>
          <div class="column is-2">
              <button class="button is-rounded">Fournisseurs</button>
          </div>
          <div class="column is-2">
              <button class="button is-rounded">Clients</button>
          </div>
      </nav>
        <?= $content ?>
        <footer class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-right">
                        <strong>Vive la COGIP !</strong>
                    </h1>
                </div>
            </div>
        </footer>
    </body>
</html>
