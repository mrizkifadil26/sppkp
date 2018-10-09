<?php

  $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
  foreach($crumbs as $crumb){
    $strcrumb = ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' / ');
  }

?>

<!-- Breadcrumb Content -->

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active"><?=$strcrumb;?></li>
</ol>

<!-- Breadcrumb end -->