<html>
<head>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">

</head>
</html>

<?php

require_once "controllers/template.controller.php";

$template = new TemplateController();


$template->ctrGetTemplate();
