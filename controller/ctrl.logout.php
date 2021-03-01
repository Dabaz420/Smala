<?php

  // session start & close !
  include("ctrl.session-start.php");
  include("ctrl.session-close.php");

  // display goodbye
  header("Location: ?Deco");
  exit;