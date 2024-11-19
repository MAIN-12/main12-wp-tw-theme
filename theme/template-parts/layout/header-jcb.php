<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _m12
 */

?>

<header id="masthead" class="sticky z-40 flex px-6 gap-4 w-full flex-row relative flex-nowrap items-center justify-between h-[4rem] max-w-[1280px] mx-auto pt-1">
	<nav id="site-navigation" class=" mx-auto bg-transparent w-full flex items-center bg-dark text-white rounded-[40px]" aria-label="<?php esc_attr_e('Main Navigation', 'main12'); ?>">
		<div class="w-full mx-auto flex items-center bg-dark text-white rounded-[40px] p-1">
			<div class="flex basis-1/5 sm:basis-full justify-start">
				<ul class="flex gap-4 max-w-fit items-center">
					<li>
						<a class="flex justify-start items-center gap-1" href="/">
							<svg
								fill="none"
								height="50"
								viewBox="0 0 10.583 10.583"
								width="50"
								{...props}>


								<path
									clipRule="evenodd"
									fill="currentColor"
									strokeWidth=".12847"
									d="M4.937 10.575a5.297 5.297 0 0 1-4.84-6.3A5.295 5.295 0 0 1 9.82 2.554a5.3 5.3 0 0 1-.312 5.937 5.3 5.3 0 0 1-3.44 2.037 6.3 6.3 0 0 1-1.131.047m.797-.175A5.13 5.13 0 0 0 9.58 8.098a5.124 5.124 0 1 0-6.575 1.78 5.2 5.2 0 0 0 1.978.532c.165.011.584.005.75-.01m-.77-1.95a.51.51 0 0 1-.344-.35c-.014-.048-.016-.128-.016-.556v-.5l.024-.022c.025-.024.077-.03.11-.012.038.02.04.06.04.549 0 .425.002.478.019.524.025.072.1.15.176.184l.061.028.867-.003.866-.003.052-.027a.4.4 0 0 0 .15-.153l.025-.046.002-1.721c.003-1.29 0-1.733-.009-1.766a.36.36 0 0 0-.206-.215c-.04-.017-.113-.019-.856-.021-.843-.004-.892-.002-.972.039a.4.4 0 0 0-.145.152c-.024.048-.024.051-.03.553l-.004.506-.025.026a.08.08 0 0 1-.12.001l-.026-.026.003-.521c.003-.518.003-.522.027-.579a.56.56 0 0 1 .29-.288c.1-.038.205-.041 1.035-.038.782.003.8.004.863.025a.52.52 0 0 1 .336.352c.015.05.016.225.016 1.78 0 1.881.004 1.761-.057 1.882a.6.6 0 0 1-.197.2c-.126.068-.083.065-1.035.065-.799 0-.868-.002-.92-.02m-1.11-2.037a1 1 0 0 1-.113-.025.53.53 0 0 1-.315-.35c-.011-.041-.014-.368-.014-1.773 0-1.887-.004-1.76.059-1.885a.6.6 0 0 1 .203-.203c.12-.061.085-.06 1.022-.06.946 0 .905-.002 1.03.064.07.038.16.13.196.2.059.115.06.12.06.662v.5l-.025.022c-.025.024-.077.03-.109.012-.039-.02-.042-.06-.041-.549 0-.426-.002-.479-.018-.524a.36.36 0 0 0-.172-.182l-.062-.03H3.837l-.056.027a.35.35 0 0 0-.163.153l-.027.052-.003 1.721c-.002 1.289 0 1.733.009 1.765a.36.36 0 0 0 .206.216c.04.016.113.018.851.021.835.003.899 0 .976-.039a.4.4 0 0 0 .147-.152c.023-.048.023-.051.028-.554l.006-.505.025-.027a.08.08 0 0 1 .119 0l.025.024v.497c0 .514-.002.54-.044.635a.53.53 0 0 1-.315.273c-.053.018-.118.02-.88.02-.451.002-.851-.001-.888-.006" />

							</svg>
						</a>
					</li>

					<li>
						<div class="hidden lg:flex md:flex gap-4 justify-start items-center ml-2">
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

			<div class="flex justify-end">
				<div class="hidden md:flex lg:flex pr-4">
					<!-- Theme switch component -->
					<ThemeSwitch />
				</div>
				<button class="sm:hidden pr-8">
					<!-- Mobile menu toggle button -->
					<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
					</svg>
				</button>
			</div>

			<!-- Mobile Menu (WordPress Menu) -->
			<div class="sm:hidden mx-4 mt-2 flex flex-col gap-2">
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
		</div>
	</nav>



</header><!-- #masthead -->