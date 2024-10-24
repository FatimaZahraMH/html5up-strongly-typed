<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Document</title>
    <style>
        .success-message {
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h2>Questions or comments? <strong>Get in touch:</strong></h2>
    </header>
    <div class="row">
        <div class="col-6 col-12-medium">
            <section>
                <form method="post" action="">
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
                            <button type="submit" class="form-button-submit button icon solid fa-envelope">Send Message</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <?php
    // Traitement du formulaire après la soumission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs du formulaire
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Afficher un message de succès avec le nom de l'utilisateur
        echo "<p class='success-message'>Message envoyé avec succès, $name !</p>";
    }
    ?>

</div>

</body>
</html>
