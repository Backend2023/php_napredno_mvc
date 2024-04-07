<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Quiz App
        <?php if (isset($title)) {
            echo " | $title";
        } ?>
    </title>
    <link rel="stylesheet" href="/assets/global.css">
</head>

<body>
    <header class="header-wrapper">
        <div class="header container">
            <a class="header__link header__link-home" href="/">
                <svg class="header__link__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
                <span>MVC Quiz</span>

            </a>
            <a class="header__link header__link-create" href="/quiz/create">
                <svg class="header__link__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Kreiraj quiz</span> </a>
        </div>
    </header>
    <?php if (isset($_GET["message"])) { ?>
        <div class="message-wrapper">
            <div class="message">
                <?php echo $_GET["message"]; ?>
            </div>

            <svg class="message__close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>





        </div>
    <?php } ?>



    <div class="content container">



        <?php echo $content; ?>

    </div>


    <footer class="footer-wrapper">
        <div class="footer container">
            <h3>Footer</h3>
        </div>
    </footer>

    <script src="/assets/script.js" type="module"></script>
</body>

</html>