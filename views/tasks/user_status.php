<?php if( $_SESSION["admin"] ):?>
<div class="mb-2">User status: <a href="/admin">admin</a></div>
<?php else:?>
<div class="mb-2">User status: guest. <a href="/admin">Log in as admin</a></div>
<?php endif;?>