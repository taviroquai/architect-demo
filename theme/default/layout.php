<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter - Architect PHP Framework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" 
          content="<?=empty($description) ? '' : $description?>">
    <meta name="author" content="<?=empty($author) ? '' : $author?>">

    <!-- Le styles -->
    <?php $this->slot('css', function($item) { ?>
    <link href="<?=$item?>" rel="stylesheet" />
    <?})?>
    <style type="text/css">
      body {
        padding-top: 60px !important;
        padding-bottom: 40px !important;
      }
    </style>
    
    <script type="text/javascript">
        var BASE_URL = '<?=BASE_URL?>/';
        var INDEX_FILE = '<?=INDEX_FILE?>';
    </script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=BASE_URL?>/theme/default/js/html5shiv.js"></script>
    <![endif]-->
    <script src="<?=BASE_URL?>/theme/default/js/jquery.js"></script>
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" 
                  data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=app()->url('/')?>"><?=t('TITLE')?></a>
          
          <div class="nav-collapse collapse">
            <?php $this->slot('topbar', function($item) { ?>
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
      <?php $this->slot('content', function($item) { ?>
        <div><?=$item?></div>
      <?})?>

      <hr>

      <footer>
        <p>Architect PHP Framework &copy; Marco Afonso 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php $this->slot('js', function($item) { ?>
    <script src="<?=$item?>" type="text/javascript"></script>
    <?})?>

  </body>
</html>
