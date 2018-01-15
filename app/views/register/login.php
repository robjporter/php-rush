<?php $this->setSiteTitle('Login'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-4 col-md-offset-3 well">
  <div class="avatar">
    <i class="fa fa-user fa-4x"></i>
	</div>
  <form class="form" action="<?=SROOT?>register/login" method="POST">
    <h3 class="text-center">Log in</h3>
    <div class="validation"><?=$this->displayErrors?></div>
    <div class="form-group">
      <label for="username">Username/Email address</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" style="height:48px;"><i class="fa fa-user fa-fw fa-2x"></i></div>
        </div>
      <input type="text" name="username" id="username" placeholder="Email address" class="form-control form-control-lg">
      </div>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" style="height:48px;"><i class="fa fa-key fa-fw fa-2x"></i></div>
        </div>
      <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-lg">
      </div>
    </div>
    <div class="form-group">
      <label for="remember_me"><input type="checkbox" id="remember_me" name="remember_me" value="on" class="big-checkbox"> <h5 style="display:inline;">Remember Me</h5></label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-lg btn-block btn-login" value="Login">
    </div>
    <div class="text-right">
      <a href="<?=SROOT?>register/register" class="text-primary">Register</a>
    </div>
  </form>
</div>
<?php $this->end(); ?>
