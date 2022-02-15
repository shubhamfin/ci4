<div></div>
<label for="username">User name</label>
<input id="username" type="text" name="name" placeholder="Username" value="<?= old('name', esc($user->name)) ?>" />
</div>

<input type="text" name="email" placeholder="Email" value="<?= old('email', esc($user->email)) ?>" />
<input type="password" name="password" placeholder="Password" />
<input type="password" name="password_cnf" placeholder="Confirm Password " />