<html>
    <head>
        <title><?= $title?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>css/bootstrap.css">
    </head>
    <body>
        <?php $this->load->view('frontend/part/header');?>
        <?php $this->load->view('frontend/pages/'.$page);?>
        <?php $this->load->view('frontend/part/footer');?>
    </body>
</html>