<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
    <meta name="description" content="réseau social des étudiants du Collège Maisonneuve">
    <meta name="author" content="Rostyslav Luchyshyn">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('./css/sidebars.css')}}">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="{{asset('./js/sidebars.js')}}"></script>
</head>

<body>
    <nav>
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <span class="m-10">&#9776;</span>
        </button>
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="flex-shrink-0 p-3" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                      <span class="fs-5 fw-semibold">Accueil</span>
                    </a>
                    <ul class="list-unstyled ps-0">
                      <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#student-collapse" aria-expanded="false">
                          Étudiants
                        </button>
                        <div class="collapse" id="student-collapse">
                          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="/etudiant" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Liste des étudiants</a></li>
                            <li><a href="/etudiant-create" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Ajouter un étudiant</a></li>
                          </ul>
                        </div>
                      </li>
                      <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                          Mon compte
                        </button>
                        <div class="collapse" id="account-collapse">
                          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Se connecter</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">S'inscrir</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
        </nav>
    <main>
        <!-- message -->
        @if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
        @endif
        <!-- end message -->
        @yield('content')
    </main>
    <footer class="footer mt-5 py-3">
        <div class="container">
          <span class="text-muted">© 2023 Rostyslav Luchyshyn</span>
        </div>
      </footer>
</body>
</html>