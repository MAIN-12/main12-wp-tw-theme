<?php

/**
 * Sidebar Template.
 */

if (is_active_sidebar('primary_widget_area') || is_archive() || is_single()) :
?>
	<style>
		#sidebarNav h3 {
			text-align: center !important;
			margin-bottom: 20px;
			border-bottom: solid 1px lightgrey;
		}

		.nav-item {
			padding-right: 2rem;
			padding-left: 0;
			margin-bottom: 0.5rem;
			transition: padding-left 0.3s ease;
		}

		.nav-item.active a.nav-link {
			color: var(--color-primary);
			font-weight: bolder;
		}

		.nav-item.active {
			padding-right: 0;
			padding-left: 1.2rem;
		}

		.previous,
		.next {
			padding-right: 0.4rem;
			padding-left: 0.8rem;
		}

		.previous-2,
		.next-2 {
			padding-right: 0.6rem;
			padding-left: 0.6rem;
		}
	</style>

	<div id="sidebar" class="col-span-12 md:col-span-3 order-first ">
		<div class="sticky top-24 overflow-y-auto border border-gray-300 rounded">
			<div class="p-3">
				<?php get_table_of_content(); ?>
			</div>
		</div>
	</div><!-- /#sidebar -->
<?php
endif;
