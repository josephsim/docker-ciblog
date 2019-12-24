<h2> <?php echo $posts['title']; ?> </h2>

<small class="post-date"> Posted on:
	<?php echo $posts['created_at']; ?> 
	<!-- <span class="poster"<em>Posted by: <?php echo $posts['poster'] ?></em></span> -->
</small>

<div>
	<?php echo $posts['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $posts['user_id']): ?>
<hr/>
<a class="btn btn-secondary" href="<?php echo base_url();?>posts/edit/<?php echo $posts['slug']; ?>">
	Edit
</a>

<?php echo form_open('/posts/delete/'.$posts['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>

<?php endif; ?>