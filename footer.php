<?php if (is_user_logged_in() ) : ?>
<?php get_template_part('templates/navbar/logged_in_nav'); ?>
<?php else: ?>
<?php get_template_part('templates/navbar/logged_out_nav'); ?>
<?php endif; ?>   

<?php wp_footer(); ?>

</body>
</html>