<!DOCTYPE html>
<html lang="en">
<?php
	get_header();
?>
<body>
	<?php
	if (have_posts()) {
		while(have_posts()) {
			the_post();
			the_content();
		}
	}
	?>
</body>

<?php
	// find footer.php and 
	get_footer();
?>
</html>