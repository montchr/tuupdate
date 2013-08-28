<?php
	if (post_password_required()) {
		return;
	}

 if (have_comments()) : ?>
	<section id="comments" class="comments-section">
		<h3 class="comments-section__title"><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'exai'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

		<ol class="media-list">
			<?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav>
			<ul class="nav  pagination">
				<?php if (get_previous_comments_link()) : ?>
					<li class="pagination__prev"><?php previous_comments_link(__('&larr; Older comments', 'exai')); ?></li>
				<?php endif; ?>
				<?php if (get_next_comments_link()) : ?>
					<li class="pagination__next"><?php next_comments_link(__('Newer comments &rarr;', 'exai')); ?></li>
				<?php endif; ?>
			</ul>
		</nav>
		<?php endif; ?>

		<?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
		<div class="alert">
			<?php _e('Comments are closed.', 'exai'); ?>
		</div>
		<?php endif; ?>
	</section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<section id="comments">
		<div class="alert">
			<?php _e('Comments are closed.', 'exai'); ?>
		</div>
	</section><!-- /#comments -->
<?php endif; ?>

<?php if (comments_open()) : ?>
	<section id="respond">
		<h3><?php comment_form_title(__('Leave a Reply', 'exai'), __('Leave a Reply to %s', 'exai')); ?></h3>
		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
			<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'exai'), wp_login_url(get_permalink())); ?></p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form  form--aligned">
				<fieldset>
					<?php if (is_user_logged_in()) : ?>
						<p>
							<?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'exai'), get_option('siteurl'), $user_identity); ?>
							<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'exai'); ?>"><?php _e('Log out &raquo;', 'exai'); ?></a>
						</p>
					<?php else : ?>

							<div class="form__control-group">
								<label for="author"><?php _e('Name', 'exai'); ?></label>
								<input type="text" class="text-input  palm-one-whole  lap-one-half  desk-one-third" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
								<?php if ($req) _e('<span class="help-text">(required)</span>', 'exai'); ?>
							</div>
							<div class="form__control-group">
								<label for="email"><?php _e('Email (will not be published)', 'exai'); ?></label>
								<input type="email" class="text-input  palm-one-whole  lap-one-half  desk-one-third" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
								<?php if ($req) _e('<span class="help-text">(required)</span>', 'exai'); ?>
							</div>
							<div class="form__control-group">
								<label for="url"><?php _e('Website', 'exai'); ?></label>
								<input type="url" class="text-input  palm-one-whole  lap-one-half  desk-one-third" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
							</div>

					<?php endif; ?>
					<div class="form__control-group">
						<label for="comment"><?php _e('Comment', 'exai'); ?></label>
						<textarea name="comment" id="comment" class="palm-one-whole  lap-one-half  desk-one-half" rows="5" aria-required="true"></textarea>
					</div>
					<div class="form__controls">
						<input name="submit" class="btn btn--dark" type="submit" id="submit" value="<?php _e('Submit Comment', 'exai'); ?>">
					</div>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
				</fieldset>
			</form>
		<?php endif; ?>
	</section><!-- /#respond -->
<?php endif; ?>
