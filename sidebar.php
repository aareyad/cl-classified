<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Helper;
use RadiusTheme\ClassifiedLite\Options;

?>
<div id="sticky_sidebar" class="<?php Helper::the_sidebar_class(); ?>">
	<?php
	if ( Options::$sidebar && is_active_sidebar( Options::$sidebar ) ) { ?>
        <aside class="sidebar-widget main-sidebar-wrapper">
            <?php dynamic_sidebar( Options::$sidebar ); ?>
        </aside>
    <?php
	} elseif( is_active_sidebar( 'sidebar' ) ) { ?>
        <aside class="sidebar-widget main-sidebar-wrapper sidebar__inner">
			<?php dynamic_sidebar( 'sidebar' ); ?>
        </aside>
		<?php
	}
	?>
</div>