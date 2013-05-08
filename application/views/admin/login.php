
    <div class="container">
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="message alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Error, with your login!</div>
        <input type="text" class="input-block-level" placeholder="Email address" name="email">
        <input type="password" class="input-block-level" placeholder="Password" name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button><span class="loader"><img src="<?php echo asset_url(); ?>img/loader.gif" /></span>
      </form>

    </div> <!-- /container -->
