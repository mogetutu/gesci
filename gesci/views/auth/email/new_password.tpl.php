<html>
<body>
	<h1>New Password for <?php echo $identity;?></h1>

	<p>Your password has been reset to: <?php echo $new_password;?></p>
	<p>Please click this link to <?php echo anchor('auth/login/', 'Login into Your Account');?>.</p>
</body>
</html>