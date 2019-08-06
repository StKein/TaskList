<form action="/" method="POST" role="form" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="task_email">Text</label>
        <div class="input-group">
            <textarea name="text" class="form-control" id="task_text" rows="1" placeholder="Enter task text" required><?=$task["task"]?></textarea>
            <div class="invalid-feedback">Please provide task text.</div>
        </div>
    </div>
<?php if( $_SESSION["admin"] ):?>
    <div class="form-group form-check">
        <input name="done" type="checkbox" class="form-check-input" id="task_is_completed"<?=( $task["is_completed"] ) ? " checked" : ""?> />
        <label class="form-check-label" for="task_is_completed">Task is completed</label>
    </div>
<?php endif;?>
    <input name="task" type="hidden" value="<?=$task["hash"]?>" />
    <div class="row">
        <button type="submit" class="btn btn-primary ml-3 mr-2">Submit</button>
        <a href="/tasks" class="btn btn-danger">Cancel</a>
    </div>
</form>