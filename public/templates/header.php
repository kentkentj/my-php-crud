<html>
    <head>
        <title>Phonebook Project</title>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <meta name="viewport" content="width=device">
        <meta charset="utf-8">

        <link href="css/style.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>

    </head>
    <body class="bg-primary bg-gradient">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container-xxl">
            <div class="container-fluid">
                <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand mt-2 mt-lg-0" href="../public/">
                        <h1 class="fw-bold" id="header-title">Phonebook Project</h1>
                    </a>
                </div>

                <div class="d-flex align-items-center">
                    <button type="button" id="create-user" class="text-reset me-3 btn btn-link" data-mdb-toggle="modal" data-mdb-target="#create">
                        <i class="far fa-plus-square"></i>
                        <span id="contact-padding">Create Contact</span>
                    </button>
                </div>
            </div>
        </nav>