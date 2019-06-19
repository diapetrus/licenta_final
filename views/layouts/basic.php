<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?> | Dia s Pizza</title>
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet"/>
    <?php echo $css; ?>

</head>
<body class="<?php echo $userStateClass; ?>">
<?php include SITE_ROOT . '/views/layouts/partials/header.php' ?>

<content class="col-lg-12">
    <div id="messages"><?php echo $messages; ?></div>
    <div><?php echo $content; ?></div>
</content>

<?php include SITE_ROOT . '/views/layouts/partials/footer.php' ?>
<?php echo $scriptElements; ?>
</body>
</html>