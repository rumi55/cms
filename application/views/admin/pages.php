<div class="main">
	<h1>Pages, Sup</h1>
	<div class="actions bottom">
		<a class="label label-inverse create -add">Add Page</a>
	</div>

	<div class="create-page -create-page">
		<form action="<?php echo base_url(); ?>adminactions/newpage" method="post" class="-form-create">
			<h2><label for="page-title">Page Title</label></h2>
			<input type="text" name="page-title" id="page-title" />
			<h2><label for="page-url">Page URL</label></h2>
			<input type="text" id="page-url" name="page-url" value="" class="-page-url" />
			<h2><label for="page-content">Content</label></h2>
			<textarea name="page-content" id="page-content" class="editor"></textarea>
			<h2><label for="page-tags">Page Tags</label></h2>
			<input type="text" name="page-tags" id="page-tags" />
			<h2><label for="page-type">Page Type</label></h2>
			<select name="page-type" id="page-type">
				<option value="homepage">Homepage</option>
				<option value="level">Level Page</option>
			</select> <div class="error">You already have a homepage!</div>
			<div class="clearfix"></div>
			<button type="submit" class="btn btn-success disabled first-child -create-btn">Create Page</button>
			<button class="btn btn-danger">Cancel</button>
		</form>
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