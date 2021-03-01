<?php

  include("ctrl.session-start.php");
  include("ctrl.session-portal.php");
  if($_SESSION["role"] != "admin"){
    header("Location: ?home");
    exit;
  }

  include("model/model.default.php");
  include("view/view.gererUsers.php");
  exit;