<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?=SITE_DESCRIPTION;?>">
    <meta name="keywords" content="<?=SITE_KEYWORDS;?>">
    <meta name="author" content="<?=SITE_AUTHOR;?>">
    <meta name="revisit-after" content="30 days">
    <meta name="distribution" content="web">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->

    <title><?= $this->siteTitle();?></title>
    <link href="<?=SROOT?>css/bootstrap.min.css" rel="stylesheet" media="screen" title="no title" charset="utf-8">
    <link href="<?=SROOT?>css/custom.min.css" rel="stylesheet" media="screen" title="no title" charset="utf-8">
    <link href="<?=SROOT?>css/fontawesome.min.css" rel="stylesheet" media="screen" title="no title" charset="utf-8">
    <?= $this->content('head');?>
</head>
  <body>
    <?php include 'main_menu.php'; ?>
    <div class="container-fluid" style="min-height:cal(100%-125px);">
      <?= $this->content('body');?>
    </div>
    <script src="<?=SROOT?>js/jquery.slim.min.js"></script>
    <script src="<?=SROOT?>js/bootstrap.min.js"></script>
  </body>
</html>
