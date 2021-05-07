<?php
$uikitJs = '/assets/js/uikit.js';
$uikitCss = '/assets/css/compiler.css';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>La Boîte Immo</title>
        <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
        <link rel="icon" href="/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo $uikitCss; ?>">
        <link rel="stylesheet" href="<?php echo "/assets/css/pages/".$newView['id'].".css"; ?>">
        <meta name="viewport" content="width=device-width, user-scalable =no">
    </head>
    <body class="BxAnimPage" data-transition="transition750" id="<?php echo $newView['id']; ?>Page">
        <?php
            require CONTROLLER . DS . "uikit/header.php";
        ?>
        <main class="pageContainer">
            <?php include CONTROLLER . DS . "pages" . DS . $newView['id'] . ".php"; ?>
        </main>
        <?php
        require CONTROLLER . DS . "uikit/footer.php";
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo $uikitJs; ?>"></script>
    </body>
</html>





