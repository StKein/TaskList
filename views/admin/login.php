<form action="/" method="POST" role="form" class="needs-validation" novalidate>
	<div class="form-group">
		<label for="admin_login">Login</label>
		<div class="input-group">
			<input name="login" type="text" class="form-control" id="admin_login" placeholder="Enter username" required />
			<div class="invalid-feedback">Please provide login.</div>
		</div>
	</div>
	<div class="form-group">
		<label for="admin_pass">Password</label>
		<div class="input-group">
			<input name="pass" type="text" class="form-control" id="admin_pass" placeholder="Enter password" required />
			<div class="invalid-feedback">Please provide password.</div>
		</div>
	</div>
	<input name="admin_login" type="hidden" value="1" />
	<div class="row">
		<button type="submit" class="btn btn-primary ml-3 mr-2">Submit</button>
		<a href="/" class="btn btn-danger">Cancel</a>
	</div>
</form>