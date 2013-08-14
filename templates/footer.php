<footer id="footer" class="content-info" role="contentinfo">
	<div class="footer__inner  pane  wrap  container">
		<?php dynamic_sidebar('sidebar-footer'); ?>
		<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
