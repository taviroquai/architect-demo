<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Architect PHP Framework - Theme from Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" 
          content="<?=empty($description) ? '' : $description?>">
    <meta name="author" content="<?=empty($author) ? '' : $author?>">
    <base href="<?=conf('BASE_URL')?>/" />
    
    <!-- Le styles -->
    <?php $this->render('css', function($item) { ?>
    <link href="<?=$item?>" rel="stylesheet" />
    <?})?>
    <style type="text/css">
      body {
        padding-top: 60px !important;
        padding-bottom: 40px !important;
      }
    </style>
    
    <script type="text/javascript">
        var BASE_URL = '<?=conf('BASE_URL')?>/';
        var INDEX_FILE = '<?=conf('INDEX_FILE')?>';
    </script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="theme/default/js/html5shiv.js"></script>
    <![endif]-->
    <script src="theme/default/js/jquery.js"></script>
    
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" 
                  data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=u('/')?>">
              <img src="theme/default/img/arch_logo.png" />
          </a>
          
          <div class="nav-collapse collapse">
            <?php $this->render('topbar', function($item) { ?>
            <div><?=$item?></div>
            <?})?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Add flash messages -->
      <?=$messages?>
      
      <!-- Add content items -->
      <?php $this->render('content', function($item) { ?>
        <div><?=$item?></div>
      <?})?>

      <hr>

      <footer>
          <p>Copyright 2013 &copy; Marco Afonso</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php $this->render('js', function($item) { ?>
    <script src="<?=$item?>" type="text/javascript"></script>
    <?})?>

  </body>
</html>
