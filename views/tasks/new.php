<form action="/" method="POST" role="form" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="task_username">Username</label>
        <div class="input-group">
            <input name="user" type="text" class="form-control" id="task_username" placeholder="Enter username" required />
            <div class="invalid-feedback">Please provide username.</div>
        </div>
    </div>
    <div class="form-group">
        <label for="task_email">Email address</label>
        <div class="input-group">
            <input name="mail" type="email" class="form-control" id="task_email" placeholder="Enter email" required />
            <div class="invalid-feedback">Please provide valid email.</div>
        </div>
    </div>
    <div class="form-group">
        <label for="task_email">Text</label>
        <div class="input-group">
            <textarea name="text" class="form-control" id="task_text" rows="1" placeholder="Enter task text" required></textarea>
            <div class="invalid-feedback">Please provide task text.</div>
        </div>
    </div>
<?php if( $_SESSION["admin"] ):?>
    <div class="form-group form-check">
        <input name="done" type="checkbox" class="form-check-input" id="task_is_completed" />
        <label class="form-check-label" for="task_is_completed">Task is completed</label>
    </div>
<?php endif;?>
    <input name="task" type="hidden" value="" />
    <div class="row">
        <button type="submit" class="btn btn-primary ml-3 mr-2">Submit</button>
        <a href="/tasks" class="btn btn-danger">Cancel</a>
    </div>
</form>