<?php
/*
Template Name: CRB Лендинг
*/
?>
<?php get_header(); ?>
<main>
	<?php
	$hero = get_field('hero');
	$color = get_field('colors');
	?>
	<style>
		.hero-wrapper {
			background: url(<?php echo $hero['hero_img_desktop'] ?>);
			background-size: cover;
		}

		.hero-form {
			background-color: #fff;
		}

		@media (min-width: 130000px) {
			.hero-wrapper {
				background: url(<?php echo $hero['hero_img_mobile'] ?>);
				background-size: cover;
				background-position: bottom;
				background-repeat: no-repeat;
			}
		}

		.hero__character {
			object-fit: contain;
			object-position: bottom;
		}

		:root {
			/*--c-prim: <?php echo $colors['primary'] ?>;*/
			/*--bg-prim: linear-gradient(142.3deg ,<?php echo $colors['primary'] ?> 4.7%, <?php echo $colors['darker'] ?> 97.22%);*/
		}
	</style>
	<div class="hero-wrapper">
		<div class="container">
			<div class="hero">
				<div class="hero-start">
					<p>Старт:</p>
					<time><?php echo $hero['date']; ?></time>
					<div class="hero-start__shevron">
						<svg width="50" height="74" viewBox="0 0 50 74" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 3C0 1.34315 1.34315 0 3 0H47C48.6569 0 50 1.34315 50 3V70.0035C50 72.224 47.6713 73.675 45.678 72.6965L26.322 63.1944C25.4882 62.7851 24.5118 62.7851 23.678 63.1944L4.32202 72.6965C2.32867 73.675 0 72.2241 0 70.0035V3Z" fill="#118A0F"></path>
						</svg><img src="<?php echo get_stylesheet_directory_uri() ?>/img/2-why-we/alarm.png" alt="time-icon">
					</div>
				</div>
				<div class="hero-content">
					<div class="hero-offer">
						<h1 class="headliner"><?php echo $hero['offer'] ?></h1>
						<div class="hero-bullets">
							<?php echo $hero['bullets'] ?>
						</div>
						<?php
						$current_domain = $_SERVER['HTTP_HOST'];
						$current_page_url = get_permalink();

						$current_page_url = str_replace('xn--h1aitq.xn--80aqxj.xn--p1ai', $current_domain, $current_page_url);
						?>
						<form class="hero-form form" method="post">
							<div class="hidden">
								<input type="hidden" name="from" value="Заявка с первого экрана курса «<?php the_title(); ?>»">
								<input type="hidden" name="page" value="<?php echo $current_page_url; ?>">
							</div>
							<div class="input-wrap">
								<input class="hero__input input--name" type="text" placeholder="Ваше имя" name="name" required>
							</div>
							<div class="input-wrap">
								<input class="hero__input input--phone" type="tel" placeholder="Ваш номер телефона" name="tel" autocorrect="off" autocomplete="tel" required>
							</div>
							<div class="input-wrap">
								<button class="hero-cta form_button"><?php echo $hero['button'] ?></button>
							</div>
						</form>
					</div>



					<div class="hero-character">
						<img class="hero__character" src="<?php echo $hero['character'] ?>" alt="">
					</div>


				</div>
			</div>
		</div>
		<?php
		//https://www.youtube.com/embed/-w99BreXD3M
		$get_embed_link = $hero['video_link'];

		if (!empty($hero['video_link'])) {
			$get_embed_link = str_replace('watch?v=', 'embed/', $get_embed_link);
		?>
			<div class="hero-video"><img class="hero-play" src="<?php echo get_stylesheet_directory_uri() ?>/img/0-general/watch-video-big-button.svg" alt="">
				<button class="video-button video-button--hero"><?php echo $hero['video_button'] ?></button>
			</div>

			<div class="pop-video-wrapper">
				<button class="pop-closer">×</button>
				<div class="pop-aligner">
					<div class="pop-video">
						<iframe class="pop-video--youtube" src="<?php echo $get_embed_link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>










	<?php
	$why_we = get_field('why_we');
	?>
	<section class="why-we-wrapper">
		<div class="container">
			<div class="why-we">
				<h2 class="section__title"><?php echo $why_we['title'] ?></h2>
				<p class="section__descriptor"><?php echo $why_we['subtitle'] ?></strong></p>
				<div class="why-we-list">

					<div class="why-we-item">
						<?php if (!empty($why_we['bullet_1']['img'])) { ?>
							<picture class="why-we-pic"><img src="<?php echo $why_we['bullet_1']['img'] ?>" alt=""></picture>
						<?php } ?>
						<?php if (!empty($why_we['bullet_1']['title'])) { ?>
							<h3 class="why-we__title"><?php echo $why_we['bullet_1']['title'] ?></h3>
						<?php } ?>
						<div class="why-we__text"><?php echo $why_we['bullet_1']['description'] ?></div>
					</div>
					<div class="why-we-item">
						<?php if (!empty($why_we['bullet_2']['img'])) { ?>
							<picture class="why-we-pic"><img src="<?php echo $why_we['bullet_2']['img'] ?>" alt=""></picture>
						<?php } ?>
						<?php if (!empty($why_we['bullet_2']['title'])) { ?>
							<h3 class="why-we__title"><?php echo $why_we['bullet_2']['title'] ?></h3>
						<?php } ?>
						<div class="why-we__text"><?php echo $why_we['bullet_2']['description'] ?></div>
					</div>
					<div class="why-we-item">
						<?php if (!empty($why_we['bullet_3']['img'])) { ?>
							<picture class="why-we-pic"><img src="<?php echo $why_we['bullet_3']['img'] ?>" alt=""></picture>
						<?php } ?>
						<?php if (!empty($why_we['bullet_3']['title'])) { ?>
							<h3 class="why-we__title"><?php echo $why_we['bullet_3']['title'] ?></h3>
						<?php } ?>
						<div class="why-we__text"><?php echo $why_we['bullet_3']['description'] ?></div>
					</div>

				</div>
			</div>
		</div>
	</section>








	<section class="after-wrapper">
		<?php
		$after = get_field('after');
		?>
		<?php if (!empty($after['bg_desktop'])) { ?>
			<style>
				.after-wrapper {
					background: url(<?php echo $after['bg_desktop'] ?>);
				}
			</style>
		<?php } ?>
		<?php if (!empty($after['bg_mobile'])) { ?>
			<style>
				@media (max-width: 1300px) {
					.after-wrapper {
						background: url(<?php echo $after['bg_mobile'] ?>);
						background-size: cover;
						background-position: bottom;
					}
				}
			</style>
		<?php } ?>
		<div class="container">
			<div class="after">
				<h2 class="section__title section__title--left"><?php echo $after['title'] ?></h2>
				<p class="section__descriptor section__descriptor--left"><?php echo $after['subtitle'] ?></p>
				<h3 class="after__descriptor"><?php echo $after['bullets_title'] ?></h3>
				<div class="after-bullets list-dotted-bullets">
					<?php echo $after['bullets'] ?>
				</div>
			</div>
		</div>
	</section>





	<section class="program-wrapper">
		<?php
		$program = get_field('program');
		?>
		<div class="container">
			<h2 class="section__title"><?php echo $program['title'] ?></h2>
			<div class="program" id="program">
				<div class="program-tabs-controls">
					<button class="program-tabs__control program-tabs__control--current js-program-tabs__control--theory"><?php echo $program['tab_1']['title'] ?></button>
					<button class="program-tabs__control js-program-tabs__control--practice"><?php echo $program['tab_2']['title'] ?></button>
				</div>
				<div class="program-tabs">
					<div class="program-tab program-tab--theory program-tab--current">
						<div class="program-tab-descr-wrapper">
							<h3 class="program-tab__title"><?php echo $program['tab_1']['title'] ?></h3>
							<p class="program-tab__descr"><?php echo $program['tab_1']['descr'] ?></p>
						</div>
						<div class="program-tab-bullets list-dotted-bullets">
							<div class="program-tab-bullets--left">
								<?php echo $program['tab_1']['bullets_left'] ?>
							</div>
							<div class="program-tab-bullets--right">
								<?php echo $program['tab_1']['bullets_right'] ?>
							</div>
						</div>
					</div>
					<div class="program-tab program-tab--practice">
						<div class="program-tab-descr-wrapper">
							<h3 class="program-tab__title"><?php echo $program['tab_2']['title'] ?></h3>
							<ul class="practice-bullets">

								<li class="practice-bullet">
									<?php if (!empty($program['tab_2']['bullets_pics']['pic_1'])) { ?>
										<picture class="practice-picture"><img src="<?php echo $program['tab_2']['bullets_pics']['pic_1'] ?>" alt="<?php $program['tab_2']['bullets_pics']['bullet_1'] ?>"></picture>
									<?php } ?>
									<p><?php echo $program['tab_2']['bullets_pics']['bullet_1'] ?></p>
								</li>

								<li class="practice-bullet">
									<?php if (!empty($program['tab_2']['bullets_pics']['pic_2'])) { ?>
										<picture class="practice-picture"><img src="<?php echo $program['tab_2']['bullets_pics']['pic_2'] ?>" alt="<?php $program['tab_2']['bullets_pics']['bullet_2'] ?>"></picture>
									<?php } ?>
									<p><?php echo $program['tab_2']['bullets_pics']['bullet_2'] ?></p>
								</li>

								<li class="practice-bullet">
									<?php if (!empty($program['tab_2']['bullets_pics']['pic_3'])) { ?>
										<picture class="practice-picture"><img src="<?php echo $program['tab_2']['bullets_pics']['pic_3'] ?>" alt="<?php $program['tab_2']['bullets_pics']['bullet_3'] ?>"></picture>
									<?php } ?>
									<p><?php echo $program['tab_2']['bullets_pics']['bullet_3'] ?></p>
								</li>

							</ul>
						</div>
						<div class="program-tab-bullets list-dotted-bullets">
							<div class="program-tab-bullets--left">
								<?php echo $program['tab_2']['bullets_left'] ?>
							</div>
							<div class="program-tab-bullets--right">
								<?php echo $program['tab_2']['bullets_right'] ?>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>








	<section class="after-complete-wrapper">

		<?php
		$complete = get_field('course_complete');
		?>
		<div class="container">




			<?php if (empty($complete['pic']) && !empty($complete['bullets'])) { ?>

				<div class="after-complete after-complete--list">
					<h2 class="section__title section__title--mini">По окончанию курса</h2>
					<div class="after-complete-bullets">
						<?php echo $complete['bullets'] ?>
						<div class="clearfix"></div>
					</div>
				</div>

			<?php } else if (!empty($complete['pic']) && !empty($complete['bullets'])) { ?>

				<div class="after-course"><img class="after-course__pic" src="<?php echo $complete['pic'] ?>" alt="По окончанию курса">
					<div class="after-course-text">
						<?php echo $complete['bullets'] ?>
					</div>
				</div>
			<?php } ?>

		</div>
	</section>










	<?php
	$autor = get_field('autor');
	?>

	<?php if (!empty($autor['name_2'])) { ?>
		<section class="autor-wrapper">
			<div class="container">
				<div class="autor">
					<div class="autor-about--more-one">
						<h2 class="section__title"><?php echo $autor['title_1'] ?></h2>
						<?php if (!empty($autor['pic_1'])) { ?>
							<picture class="autor__picture"><img src="<?php echo $autor['pic_1'] ?>" alt="<?php echo $autor['name_1'] ?>"></picture>
						<?php } ?>
						<div class="autor-descr">
							<h3 class="autor__name"><?php echo $autor['name_1'] ?></h3>
							<div class="autor-bullets list-dotted-bullets">
								<?php echo $autor['bullets_1'] ?>
							</div>
						</div>
					</div>

					<div class="autor-about--more-one">
						<h2 class="section__title"><?php echo $autor['title_2'] ?></h2>
						<?php if (!empty($autor['pic_2'])) { ?>
							<picture class="autor__picture"><img src="<?php echo $autor['pic_2'] ?>" alt="<?php echo $autor['name_2'] ?>"></picture>
						<?php } ?>
						<div class="autor-descr">
							<h3 class="autor__name"><?php echo $autor['name_2'] ?></h3>
							<div class="autor-bullets list-dotted-bullets">
								<?php echo $autor['bullets_2'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } else { ?>

		<section class="autor-single-wrapper">
			<div class="container autor-single">
				<h2 class="section__title section__title--left"><?php echo $autor['title_1'] ?></h2>
				<div class="autor-single-bullets list-dotted-bullets">
					<?php echo $autor['bullets_1'] ?>
				</div>
				<div class="autor-single-image">
					<div class="autor-single__who">
						<h3 class="autor-single__name"><?php echo $autor['name_1'] ?></h3>
						<p class="autor-single__post"><?php echo $autor['post'] ?></p>
					</div><img class="autor-single__image" src="<?php echo $autor['pic_1'] ?>" alt="<?php echo $autor['name_1'] ?>" style="right: <?php echo $autor['offset'] ?>">
				</div>
			</div>
		</section>
	<?php } //end only one autor
	?>














	<?php
	$testimonialsCheckbox = get_field('testimonials');
	if ($testimonialsCheckbox['video']) {
	?>

		<section class="testimonials-wrapper">
			<div class="container">
				<div class="testimonials"><a class="testimonials-video">
						<picture class="testimonials-watch"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/0-general/watch-video-big-button.svg" alt=""></picture><span>Посмотреть видео</span>
					</a>
					<div class="testimonials-latest">
						<h2 class="section__title section__title--left testimonials__title">Отзывы</h2>
						<div class="testimonials-list">
							<p>Очень благодарны за возможность пройти этот курс...</p>
							<p>Материал очень подробный</p>
							<p>Очень понятно, лектор отвечает на абсолютно все вопросы...</p>
							<p>Детальное пособие по оказанию практической помощи...</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php
	// if ($testimonialsCheckbox['slider']) {
	// $args = array(
	//   'supress_filters' => false,
	//   'post_type' => 'testimonials',
	//   'numberposts' => 20,
	// );
	// $testimonial_posts = get_posts($args);


	$page_id = get_the_ID();

	$page_args = array(
		'parent' => $page_id,
	);
	$page_testimonials = get_pages($page_args);

	// echo '<pre>';
	// var_dump($page_testimonials);
	// echo '</pre>';


	if (count($page_testimonials) > 1) {
	?>
		<section class="testimonials-wrapper">
			<h2 class="section__title testimonials__title">Отзывы</h2>
			<div class="container testimonials">
				<div class="swiper-container testimonials-slider">
					<div class="swiper-wrapper">


						<?php foreach ($page_testimonials as $testimonial) {
							// $id = $testimonial->to_array['ID'];
							setup_postdata($testimonial);
							// echo '<pre>';
							// var_dump($testimonial);
							// echo '</pre>';
						?>
							<div class="swiper-slide testimonials-item">
								<div class="testimonial-top">
									<?php if (!empty(get_field('pic', $id))) { ?>
										<img src="<?php the_field('pic', $id) ?>" alt="<?php the_field('name', $id) ?>">
									<?php } ?>
									<div class="testiomoial-person">
										<h3 class="testiomoial-person__name"><?php the_field('name', $id) ?></h3>
										<?php if (!empty(get_field('profile', $id))) { ?>
											<a href="<?php the_field('profile_link', $id) ?>" class="testiomoial-person__social"><?php the_field('profile', $id) ?></a>
										<?php } ?>
									</div>
									<?php if (!empty(get_field('date', $id))) {  ?>
										<time class="testimonial-date"><?php the_field('date', $id) ?></time>
									<?php } ?>
								</div>
								<div class="testimonial-text"><?php the_field('testimonial', $id) ?></div>
							</div>
						<?php }
						wp_reset_postdata(); ?>
						<?php //тут уже кончились отзывы
						?>


					</div>
				</div>
				<div class="swiper-pagination testimonials-pagination"></div>
				<div class="swiper-button-next testimonials-button-next"></div>
				<div class="swiper-button-prev testimonials-button-prev"></div>
				<script>
					// startTestimonialSlider = true;
					var testimonialsSlider = new Swiper('.testimonials-slider', {
						autoHeight: true,
						slidesPerView: 1,
						spaceBetween: 19,
						pagination: {
							el: '.swiper-pagination.testimonials-pagination',
						},
						breakpoints: {
							1300: {
								slidesPerView: 2,
								navigation: {
									nextEl: '.swiper-button-next.testimonials-button-next',
									prevEl: '.swiper-button-prev.testimonials-button-prev',
								},
							}
						},

					})
				</script>
			</div>
		</section>
	<?php } ?>

</main>
<?php get_footer(); ?>
