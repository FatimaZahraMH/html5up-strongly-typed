<?php
session_start(); // Démarrer la session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Contact Form</title>
</head>
<body>
<div class="container">
    <header>
        <h2>Questions or comments? <strong>Get in touch:</strong></h2>

        <!-- Message de succès -->
        <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?= htmlspecialchars($_SESSION['success']); ?></strong>
        </div>
        <?php unset($_SESSION['success']); endif; ?>

        <!-- Message d'erreur -->
        <?php if (isset($_SESSION['err'])): ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>
            <strong><?= htmlspecialchars($_SESSION['err']); ?></strong>
        </div>
        <?php unset($_SESSION['err']); endif; ?>
    </header>

    <!-- Formulaire -->
    <div class="row">
        <div class="col-6 col-12-medium">
            <section>
                <form method="post" action="sendmail.php">
                    <div class="row gtr-50">
                        <div class="col-6 col-12-small">
                            <input name="name" placeholder="Name" type="text" required />
                        </div>
                        <div class="col-6 col-12-small">
                            <input name="email" placeholder="Email" type="email" required />
                        </div>
                        <div class="col-12">
                            <textarea name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
