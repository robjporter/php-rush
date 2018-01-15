<?php $this->setSiteTitle('Register'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-4 col-md-offset-3 well">
  <form class="form" action="" method="post">
      <h2 class="text-center">Register</h2>
      <p class="text-center">Please fill in this form to create an account!</p>
      <hr>
      <div class="bg-danger"><?= $this->displayErrors ?></div>
      <div class="form-group">
          <div class="row">
              <div class="col">
                  <input type="text" class="form-control form-control-lg" name="fname" placeholder="First Name" required="required" value="<?= $this->post['fname'] ?>">
              </div>
              <div class="col">
                  <input type="text" class="form-control form-control-lg" name="lname" placeholder="Last Name" required="required" value="<?= $this->post['lname'] ?>">
              </div>
          </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" style="height:48px;"><i class="fa fa-user fa-fw fa-2x"></i></div>
          </div>
          <input type="username" class="form-control form-control-lg" name="username" placeholder="Username" required="required" value="<?= $this->post['username'] ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" style="height:48px;"><i class="fa fa-envelope fa-fw fa-2x"></i></div>
          </div>
          <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required="required" value="<?= $this->post['email'] ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" style="height:48px;"><i class="fa fa-key fa-fw fa-2x"></i></div>
          </div>
          <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required="required" value="<?= $this->post['password'] ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" style="height:48px;"><i class="fa fa-key fa-fw fa-2x"></i></div>
          </div>
          <input type="password" class="form-control form-control-lg" name="confirm" placeholder="Confirm Password" required="required" value="<?= $this->post['confirm'] ?>">
        </div>
      </div>
      <div class="form-group">
          <label class="checkbox-inline">
              <input type="checkbox" required="required" class="big-checkbox"> I accept the
              <a href="#">Terms of Use</a> &amp;
              <a href="#">Privacy Policy</a>
          </label>
      </div>
      <div class="form-group pull-right">
          <button type="submit" class="btn btn-primary btn-lg">Register</button>
      </div>
  </form>
</div>
<?php $this->end(); ?>
