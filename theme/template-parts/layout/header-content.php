<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _m12
 */

?>

<header id="masthead" class="z-40 flex gap-4 w-full flex-row fixed top-0 left-0 right-0 flex-nowrap items-center justify-between ">
	<div class="bg-dark w-full navbar">
		<div class="absolute top-0 items-center bg-gradient-to-b from-gray-500 to-transparent opacity-50 h-1/2 w-full"></div>
		<div class="max-w-7xl w-full py-3 items-center justify-between mx-auto">
			<nav id="site-navigation" class="sticky top-0 mx-auto bg-transparent w-full flex items-center text-white rounded-[40px]" aria-label="<?php esc_attr_e('Main Navigation', 'main12'); ?>">
				<div class="w-full mx-auto flex items-center text-white rounded-[40px] p-1 justify-between">
					<div class="flex basis-1/5 sm:basis-full justify-start">
						<ul class="flex gap-4 max-w-fit items-center">
							<li>
								<a class="flex justify-start items-center gap-1 max-w-full" href="/" style="width: 190px;">
									<img src="https://main12.com/wp-content/uploads/2023/03/Main12-logo-1-e1708556759936.webp" class="h-7 w-auto max-w-full" alt="MAIN12">
								</a>
							</li>
							<li>
								<div class="hidden lg:flex z gap-4 justify-start items-center ml-2">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
											'container'      => false,
											'menu_class'     => 'flex gap-4',
											'link_before'    => '<span class="text-white data-[active=true]:text-primary data-[active=true]:font-medium">',
											'link_after'     => '</span>',
										)
									);
									?>
								</div>
							</li>
						</ul>
					</div>

					<div class="flex">
						<button class="sm:hidden pr-8">
							<!-- Mobile menu toggle button -->
							<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
							</svg>
						</button>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header><!-- #masthead -->

<!-- Mobile Menu (WordPress Menu) -->
<div class="hidden mx-4 mt-2 flex flex-col gap-2">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu-mobile',
			'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'container'      => false,
			'menu_class'     => 'flex flex-col gap-2',
			'link_before'    => '<span class="text-lg">',
			'link_after'     => '</span>',
		)
	);
	?>
</div>