<form action="<?=$_SERVER["REQUEST_URI"]?>" method="POST" role="form">
	<div class="form-row">
		<div class="form-check-inline col-3">
			<label class="form-check-label">Sort by:</label>
		</div>
		<div class="form-check-inline col-2">
			<input type="radio" class="form-check-input radio-inline" id="sort_user" name="sort" value="user" 
				<?=( !$_SESSION["sorting_field"] || $_SESSION["sorting_field"] == "user" ) ? " checked" : ""?> />
			<label class="form-check-label" for="sort_user">User</label>
		</div>
		<div class="form-check-inline col-2">
			<input type="radio" class="form-check-input radio-inline" id="sort_mail" name="sort" value="mail" 
				<?=( $_SESSION["sorting_field"] == "mail" ) ? " checked" : ""?> />
			<label class="form-check-label" for="sort_mail">Mail</label>
		</div>
		<div class="form-check-inline col-2">
			<input type="radio" class="form-check-input radio-inline" id="sort_status" name="sort" value="status" 
				<?=( $_SESSION["sorting_field"] == "status" ) ? " checked" : ""?> />
			<label class="form-check-label" for="sort_status">Status</label>
		</div>
		<button type="submit" class="btn btn-primary">Sort</button>
	</div>
</form>
<div class="list-group list-group-flush">
<?php while( $task = $tasks->fetch_assoc() ):?>
    <a href="<?=( $_SESSION["admin"] ) ? "/task/".htmlspecialchars( $task["hash"] ) : "#"?>" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <span class="mb-1 col-3 text-info"><?=htmlspecialchars( $task["username"] )?></span>
            <span class="mb-1 col-4 text-primary"><?=htmlspecialchars( $task["email"] )?></span>
			<span class="mb-1 col-3 text-success"><?=( $task["is_completed"] ) ? "edited by admin" : "&nbsp;"?></span>
        </div>
        <div class="mb-1 text-secondary"><?=htmlspecialchars( $task["task"] )?></div>
    </a>
<?php endwhile;?>
</div>
<?php if( $pages_count > 1 ):?>
<div class="list-group list-group-flush list-group-horizontal">
    <?php for( $i = 1; $i <= $pages_count; $i++ ):?>
    <a href="/tasks/<?=$i?>" class="list-group-item list-group-item-action flex-column<?=( $i == $route[1] ) ? " active" : ""?>"><?=$i?></a>
    <?php endfor;?>
</div>
<?php endif;?>
<div class="mb-2">&nbsp;</div>
<div>
	<a href="/task" class="btn btn-primary">Create task</a>
</div>