<div class="main">
	<h1>Pages, Sup</h1>
	<div class="actions bottom">
		<a class="label label-inverse create">Add Page</a>
	</div>

	<div class="create-page">
		<h2><label for="page-title">Page Title</label></h2>
		<input type="text" name="page-title" id="page-title" />
		<h2><label for="page-content">Content</label></h2>
		<textarea name="page-content" id="page-content" class="editor"></textarea>
		<h2><label for="page-type">Page Type</label></h2>
		<select name="page-type" id="page-type">
			<option value="homepage">Homepage</option>
			<option value="level">Level Page</option>
		</select>
		<div class="clearfix" />
		<button class="btn btn-success first-child">Create Page</button>
		<button class="btn btn-danger">Cancel</button>
	</div>

	<?php foreach($pages->result_array() as $p): ?>
	<article class="page">
		<a href="#"><?=$p['title'];?></a>
		<div class="actions">
			<a class="label label-info edit">Edit</a>
			<a class="label label-important delete" data-page-id="<?=$p['id'];?>">Delete</a>
		</div>
	</article>
	<?php endforeach;?>
</div>