<div></div>
<label for="username">User name</label>
<input id="username" type="text" name="name" placeholder="Username" value="<?= old('name', esc($user->name)) ?>" />
</div>

<input type="text" name="email" placeholder="Email" value="<?= old('email', esc($user->email)) ?>" />
<?php if ($user->id) : ?>
    <p>Leave empty if dont want to change password</p>
<?php endif ?>
<input type="password" name="password" placeholder="Password" />

<input type="password" name="password_cnf" placeholder="Confirm Password " />