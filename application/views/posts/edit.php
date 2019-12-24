<h2> <?= $title ?> </h2><br/>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
	<input type="hidden" name="id" value="<?php echo $posts['id']; ?>">

	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $posts['title']?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $posts['body']?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>