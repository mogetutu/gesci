<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>African Leadership in ICT (ALICT) | GESCI | ICT in Education</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="African Leadership in ICT course" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=site_url('media/css/bootstrap.css');?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }
      #content{
        background: #fff;
      }
      ul li {
        padding-left: 5px;
        background: none;
    }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=site_url('media/css/bootstrap-responsive.css');?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
        <div class="container-fluid">
        <h2>Application for African Leadership in ICT (ALICT)</h2>
          <div class="row-fluid">
            <div class="span12">
              <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success">
                  <a class="close" data-dismiss="alert">&times;</a>
                  <?=$this->session->flashdata('message');?>
                </div>
              <?php endif;?>
              <?=$yield;?>
            </div><!--/span-->
          </div><!--/row-->
          <hr>

          <footer>
            <p>&copy; GESCI ORG <?php echo date('Y'); ?></p>
          </footer>

        </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=site_url('media/js/jquery.js');?>"></script>
    <script src="<?=site_url('media/js/bootstrap.min.js');?>"></script>
    <script src="<?=site_url('media/js/widgets.js');?>"></script>

  </body>
</html>
