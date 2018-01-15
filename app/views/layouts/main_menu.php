<?php
  $menu = Router::getMenu('menu_acl');
  $currentPage = currentPage();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:50px;">
  <img src="<?=SROOT?>/imgs/bootstrap-brand.svg" width="30" height="30" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php foreach($menu as $key => $value):
        $active = '';?>

        <?php if(is_array($value)): ?>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$key?></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php foreach($value as $k => $v):
                  $active = ($v == $currentPage)? 'active':'';?>
                  <?php if($k == 'separator'): ?>
                    <div class="dropdown-divider"></div>
                  <?php else: ?>
                    <a class="dropdown-item <?=$active?>" href="<?=$v?>"><?=$k?></a>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
          </li>
        <?php else:
          $active = ($value == $currentPage)? 'active':'';?>
          <li class="nav-item  <?=$active?>">
            <a class="nav-link" href="<?=$value?>"><?=$key?></a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
      <span class="navbar-text">
            <?php if(currentUser()): ?>
              <a href="#">Hello <?=currentUser()->fname?></a>
            <?php endif; ?>
      </span>
  </div>
</nav>
