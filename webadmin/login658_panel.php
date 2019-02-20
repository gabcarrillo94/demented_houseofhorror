<?php
  require_once('layouts/headerHtml.php');
?>
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        The credentials you just entered are not correct
      </div>
    <?php endif; ?>

		<h2>Sign In</h2>
		<form action="auth.php" method="post">
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>

			<div class="login-w3">
					<input type="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>

				<div class="footer">
					 <p>© 2017 Demented. All Rights Reserved | Design by  HerdzDesign </p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>
