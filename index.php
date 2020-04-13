<?php require_once('config.php') ?>
<?php $assets_PATH= ROOT_PATH . "/assets/php";?>
<?php include($assets_PATH . "/header.php"); ?>
  <body>
    <?php  include($assets_PATH . "/nav.php"); ?>
    <div class="container">
        <?php include($assets_PATH . "/aboutme.php"); ?>
        <hr id="projects-hr" />
        <?php include($assets_PATH . "/projects.php"); ?>
        <hr / >
        <?php include($assets_PATH . "/footer.php"); ?>
    <div/>
  </body>
  
</html>
