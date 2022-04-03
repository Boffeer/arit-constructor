<?php
/*
Template Name: CRB Лендинг
*/
?>
<?php get_header(); ?>
<main>
	<?php
	$privacy_url = carbon_get_theme_option('privacy');
	$page_id = get_the_ID();
	$hero = array(
		'offer' => carbon_get_post_meta($page_id, 'crb_landing_block_1_title'),
		'bullets' => carbon_get_post_meta($page_id, 'crb_landing_block_1_bullets'),
		'hero' => carbon_get_post_meta($page_id, 'crb_landing_block_1_hero'),
		'background' => carbon_get_post_meta($page_id, 'crb_landing_block_1_background'),
		'date' => carbon_get_post_meta($page_id, 'crb_landing_block_1_date'),
		'video' => carbon_get_post_meta($page_id, 'crb_landing_block_1_video'),
		'button_submit' => carbon_get_post_meta($page_id, 'crb_landing_block_1_button_submit'),
		'button_video' => carbon_get_post_meta($page_id, 'crb_landing_block_1_button_video'),
	);
	?>

	<style>
		.hero-wrapper {
			background: url(<?php echo $hero['background'] ?>);
			background-size: cover;
		}

		.hero-form {
			background-color: #fff;
		}

		@media (min-width: 130000px) {
			.hero-wrapper {
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
							<?php if ($hero['bullets']) : ?>
								<?php foreach ($hero['bullets'] as $bullet) : ?>
									<p>
										<?php echo $bullet['bullet'] ?>
									</p>
								<?php endforeach; ?>
							<?php endif; ?>
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
								<button class="hero-cta form_button"><?php echo $hero['button_submit'] ?></button>
							</div>
						</form>
					</div>



					<div class="hero-character">
						<img class="hero__character" src="<?php echo $hero['hero'] ?>" alt="<?php echo $hero['title']; ?>">
					</div>


				</div>
			</div>
		</div>
		<?php
		//https://www.youtube.com/embed/-w99BreXD3M
		$get_embed_link = $hero['video'];

		if (!empty($hero['video'])) {
			$get_embed_link = str_replace('watch?v=', 'embed/', $get_embed_link);
		?>
			<div class="hero-video"><img class="hero-play" src="<?php echo get_stylesheet_directory_uri() ?>/img/0-general/watch-video-big-button.svg" alt="">
				<button class="video-button video-button--hero"><?php echo $hero['button_video'] ?></button>
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
	$why_we = array(
		'title' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_2_title'),
		'subtitle' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_2_subtitle'),
		'bullets' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_2_bullets'),
	)
	?>
	<section class="why-we-wrapper">
		<div class="container">
			<div class="why-we">
				<h2 class="section__title"><?php echo $why_we['title'] ?></h2>
				<p class="section__descriptor"><?php echo $why_we['subtitle'] ?></strong></p>
				<div class="why-we-list">

					<?php if (!empty($why_we['bullets'])) : ?>
						<?php foreach ($why_we['bullets'] as $bullet) : ?>
							<div class="why-we-item">
								<?php if (!empty($bullet['img'])) { ?>
									<picture class="why-we-pic"><img src="<?php echo $bullet['img'] ?>" alt="<?php echo $bullet['title'] ?>"></picture>
								<?php } ?>
								<?php if (!empty($bullet['title'])) { ?>
									<h3 class="why-we__title"><?php echo $bullet['title'] ?></h3>
								<?php } ?>
								<div class="why-we__text"><?php echo $bullet['desc'] ?></div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>








	<section class="after-wrapper">
		<?php
		$after = array(
			'title' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_title'),
			'subtitle' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_subtitle'),
			'bullets' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_bullets'),
			'bullets' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_bullets'),
			'image_desktop' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_image'),
			'image_mobile' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_3_image_mobile'),
		);
		?>
		<?php if (!empty($after['image_desktop'])) : ?>
			<style>
				.after-wrapper {
					background: url(<?php echo $after['image_desktop'] ?>);
				}
			</style>
		<?php endif; ?>
		<?php if (!empty($after['image_mobile'])) : ?>
			<style>
				@media (max-width: 1300px) {
					.after-wrapper {
						background: url(<?php echo $after['image_mobile'] ?>);
						background-size: cover;
						background-position: bottom;
					}
				}
			</style>
		<?php endif; ?>
		<div class="container">
			<div class="after">
				<h2 class="section__title section__title--left"><?php echo $after['title'] ?></h2>
				<p class="section__descriptor section__descriptor--left"><?php echo $after['subtitle'] ?></p>
				<h3 class="after__descriptor"><?php echo $after['bullets_title'] ?></h3>
				<div class="after-bullets list-dotted-bullets">
					<?php if (!empty($after['bullets'])) : ?>
						<?php foreach ($after['bullets'] as $bullet) : ?>
							<p>
								<?php echo $bullet['bullet'] ?>
							</p>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>





	<section class="program-wrapper">
		<?php
		$program = array(
			'title' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_4_title'),
			'tabs' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_4_tabs'),
		)
		?>
		<div class="container">
			<h2 class="section__title"><?php echo $program['title'] ?></h2>
			<div class="program" id="program">
				<div class="program-tabs-controls">
					<?php foreach ($program['tabs'] as $key => $tab) : ?>
						<?php
						$classes = '';
						if ($key == 0) {
							$classes = 'program-tabs__control--current';
						}
						?>
						<button data-tab="<?php echo $key; ?>" class="program-tabs__control <?php echo $classes; ?>"><?php echo $tab['tab_title'] ?></button>
					<?php endforeach; ?>
				</div>
				<div class="program-tabs">
					<?php foreach ($program['tabs'] as $key => $tab) : ?>
						<?php
						$tab_classes = '';
						if ($key == 0) {
							$tab_classes = 'program-tab--current';
						}
						?>
						<div data-tab="<?php echo $key; ?>" class="program-tab program-tab--theory <?php echo $tab_classes; ?>">
							<?php if ($tab['tab_top_type'] == 'text') : ?>
								<div class="program-tab-descr-wrapper">
									<p class="program-tab__descr"><?php echo $tab['tab_top_text']; ?></p>
								</div>
							<?php elseif ($tab['tab_top_type'] == 'cards') : ?>
								<?php
								$cards_gallery_class = 'gallery--2';
								if ($tab['tab_top_cards'][0]['title'] == '') {
									$cards_gallery_class = 'gallery--3';
								}
								?>
								<div class="program-tab__cards <?php echo $cards_gallery_class; ?>">
									<?php foreach ($tab['tab_top_cards'] as $card) : ?>
										<?php
										$card_class = '';
										if (!empty($card['title'])) {
											$card_class = 'program-tab__card--material';
										}
										?>
										<div class="program-tab-card <?php echo $card_class; ?>">
											<?php if ($card['img']) : ?>
												<img src="<?php echo $card['img']; ?>" alt="" class="program-tab-card__img">
											<?php endif; ?>
											<?php if ($card['title']) : ?>
												<h3 class="program-tab-card__title">
													<?php echo $card['title']; ?>
												</h3>
											<?php endif; ?>
											<p class="program-tab-card__desc">
												<?php echo $card['desc']; ?>
											</p>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<!-- <div class="program-tab-bullets list-dotted-bullets">
								<div class="program-tab-bullets--left">
									<?php echo $program['tab_1']['bullets_left'] ?>
								</div>
								<div class="program-tab-bullets--right">
									<?php echo $program['tab_1']['bullets_right'] ?>
								</div>
							</div> -->

							<div class="program__modules">
								<?php
								$modules = array();
								$modules_classes = '';
								if ($tab['tab_programm_type'] == 'table') {
									$modules = $tab['tab_progarmm_1'];
								} elseif ($tab['tab_programm_type'] == 'theory_and_practice') {
									$modules = $tab['tab_progarmm_2'];
									$modules_classes = 'programm-module__heading--splitted';
								} elseif ($tab['tab_programm_type'] == 'task_theory_and_practice') {
									$modules = $tab['tab_progarmm_3'];
								}
								?>
								<?php if (!empty($modules)) : ?>
									<?php foreach ($modules as $key => $module) : ?>
										<div class="programm-module bayan">
											<div class="programm-module__heading <?php echo $modules_classes; ?>">
												<div class="programm-module__heading-name">
													<p class="programm-module__suptitle">
														<?php echo $tab['program_bullet_name']; ?>
													</p>
													<h3 class="programm-module__title">
														<?php echo $module['title']; ?>
													</h3>
												</div>
												<?php if ($tab['tab_programm_type'] == 'theory_and_practice') : ?>
													<div class="programm-module__heading-duration">
														<p class="programm-module__suptitle programm-module__stat-title">
															Длительность
														</p>
														<p class="programm-moudle__stat-value">
															<?php echo $module['duration']; ?>
														</p>
													</div>
												<?php endif; ?>
											</div>
											<div class="programm-module__content">
												<?php if ($tab['tab_programm_type'] == 'table') : ?>
													<div class="programm-module__task">
														<div class="program-module__stat">
															<p class="programm-module__stat-title">
																Задача:
															</p>
															<p class="programm-moudle__stat-value">
																<?php echo $module['task']; ?>
															</p>
														</div>
														<div class="program-module__stat">
															<p class="programm-module__stat-title">
																Длительность:
															</p>
															<p class="programm-moudle__stat-value">
																<?php echo $module['duration']; ?>
															</p>
														</div>
														<div class="program-module__stat">
															<p class="programm-module__stat-title programm-module__stat-title--result">
																Результат:
															</p>
															<p class="programm-moudle__stat-value">
																<?php echo $module['result']; ?>
															</p>
														</div>
													</div>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															План модудей:
														</h3>
														<ul class="programm-module-bullets__list">
															<?php foreach ($module['plan'] as $bullet) : ?>
																<li data-prefix="<?php echo $module['plan_name']; ?>" class="programm-module-bullets__item">
																	<?php echo $bullet['bullet']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
												<?php elseif ($tab['tab_programm_type'] == 'theory_and_practice') : ?>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															<?php echo $module['theory_title']; ?>
														</h3>
														<ul class="programm-module-bullets__list">
															<?php foreach ($module['theory'] as $bullet) : ?>
																<li data-prefix="<?php echo $module['plan_name']; ?>" class="programm-module-bullets__item">
																	<?php echo $bullet['bullet']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															<?php echo $module['practice_title']; ?>
														</h3>
														<ul class="programm-module-bullets__list">
															<?php foreach ($module['practice'] as $bullet) : ?>
																<li data-prefix="<?php echo $module['plan_name']; ?>" class="programm-module-bullets__item">
																	<?php echo $bullet['bullet']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															Результат:
														</h3>
														<ul class="programm-module-bullets__list programm-module-bullets__list--results">
															<?php foreach ($module['results'] as $bullet) : ?>
																<li class="programm-module-bullets__item--result programm-module-bullets__item">
																	<?php echo $bullet['result']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
												<?php elseif ($tab['tab_programm_type'] == 'task_theory_and_practice') : ?>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															<?php echo $module['theory_title']; ?>
														</h3>
														<ul class="programm-module-bullets__list">
															<?php foreach ($module['theory'] as $bullet) : ?>
																<li data-prefix="<?php echo $module['plan_name']; ?>" class="programm-module-bullets__item">
																	<?php echo $bullet['bullet']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
													<div class="programm-module-bullets">
														<h3 class="programm-moudle-bullets__title">
															<?php echo $module['practice_title']; ?>
														</h3>
														<ul class="programm-module-bullets__list">
															<?php foreach ($module['practice'] as $bullet) : ?>
																<li data-prefix="<?php echo $module['plan_name']; ?>" class="programm-module-bullets__item">
																	<?php echo $bullet['bullet']; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													</div>
													<div class="programm-module-bullets programm-module-bullets--results">
														<h4 class="programm-module-cards__title programm-module-cards__title--result">
															Результат:
														</h4>
														<div class="programm-module-cards cards__list cards__list--3">
															<?php foreach ($module['results'] as $card) : ?>
																<article class="card">
																	<?php if ($card['result_img']) : ?>
																		<img src="<?php echo $card['result_img'] ?>" alt="<?php echo $card['result_desc'] ?>" class="card__img">
																	<?php endif; ?>
																	<?php if ($card['result_title']) : ?>
																		<h3 class="card__title">
																			<?php echo $card['result_title'] ?>
																		</h3>
																	<?php endif; ?>
																	<p class="card__desc">
																		<?php echo $card['result_desc'] ?>
																	</p>
																</article>
															<?php endforeach; ?>
														</div>

													</div>

											</div>
										<?php endif; ?>
										</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
						</div>

				</div>
			<?php endforeach; ?>
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




	<!-- <section class="after-complete-wrapper">

		<?php
		$complete = get_field('course_complete');
		// $complete = array()
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
	</section> -->



	<?php
	$text_reviews = array(
		'reviews' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_5_reviews'),
	);
	?>

	<?php if (count($text_reviews) > 0) : ?>
		<section class="testimonials-wrapper">
			<h2 class="section__title testimonials__title">Отзывы</h2>
			<div class="container testimonials">
				<div class="swiper-container testimonials-slider">
					<div class="swiper-wrapper">
						<?php foreach ($text_reviews['reviews'] as $review) : ?>
							<article class="swiper-slide testimonials-item">
								<div class="testimonial-top">
									<?php if (!empty($review['review_img'])) { ?>
										<img src="<?php echo $review['review_img']; ?>" alt="<?php echo $review['review_name']; ?>?>">
									<?php } ?>
									<div class="testiomoial-person">
										<h3 class="testiomoial-person__name">
											<?php echo $review['review_name']; ?>
										</h3>
									</div>
								</div>
								<div class="testimonial-text"><?php echo $review['review_desc']; ?></div>
							</article>
						<?php endforeach; ?>


					</div>
				</div>
				<div class="swiper-scrollbar slider__scrollbar testimonials__scrollbar"></div>
				<div class="swiper-pagination testimonials-pagination"></div>
				<div class="swiper-button-next testimonials-button-next"></div>
				<div class="swiper-button-prev testimonials-button-prev"></div>
				<script>
					var testimonialsSlider = new Swiper('.testimonials-slider', {
						autoHeight: true,
						slidesPerView: 1,
						spaceBetween: 19,
						pagination: {
							el: '.swiper-pagination.testimonials-pagination',
							dynamicBullets: true,
						},
						navigation: {
							nextEl: '.testimonials-button-next',
							prevEl: '.testimonials-button-prev',
						},
						breakpoints: {
							1200: {
								slidesPerView: 2,
							}
						},
						scrollbar: {
							el: '.testimonials__scrollbar',
							draggable: true,
						},

					})
				</script>
			</div>
		</section>
	<?php endif; ?>


	<?php
	$video_reviews = array(
		'reviews' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_6_videoreviews'),
	);
	?>

	<section class="video-reviews__wrap">
		<div class="container">
			<h2 class="section__title video-reviews__title">Видео отзывы</h2>
			<div class="video-reviews">
				<div class="swiper video-reviews-slider">
					<div class="swiper-wrapper">
						<?php foreach ($video_reviews['reviews'] as $review) : ?>
							<?php
							$yt_id = preg_replace('/.+\?v\=/i', '', $review['review_link']);
							$thumbnail = "https://i.ytimg.com/vi/{$yt_id}/hqdefault.jpg";
							$embed_url = "https://www.youtube.com/embed/{$yt_id}";
							?>
							<div class="swiper-slide video-reviews-slider-slide">
								<img src="<?php echo $thumbnail; ?>" alt="" class="video-reviews-slider-slide__media video-reviews-slider-slide__img">
								<iframe class="video-reviews-slider-slide__media video-reviews-slider-slide__video" data-src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							</div>
						<?php endforeach; ?>
					</div>
					<div class="swiper-scrollbar slider__scrollbar video-reviews-slider__scrollbar"></div>
					<div class="swiper-pagination video-reviews-slider__pagination slider__pagination"></div>
					<div class="swiper-button-prev video-reviews-slider__button-prev slider__button slider__button-prev"></div>
					<div class="swiper-button-next video-reviews-slider__button-next slider__button slider__button-next"></div>
				</div>
			</div>
		</div>
	</section>
	<script>
		window.addEventListener('DOMContentLoaded', (event) => {

			let videoReviews = new Swiper('.video-reviews-slider', {
				navigation: {
					nextEl: '.video-reviews-slider__button-next',
					prevEl: '.video-reviews-slider__button-prev',
				},
				centeredSlides: true,
				slidesPerView: 'auto',
				effect: "creative",
				creativeEffect: {
					prev: {
						translate: ["-35%", 0, 0],
						opacity: 0.3,
						scale: 0.7,
					},
					next: {
						translate: ["35%", 0, 0],
						opacity: 0.3,
						scale: 0.7,
					},
					limitProgress: 2,
				},
				pagination: {
					el: '.video-reviews-slider__pagination',
					dynamicBullets: true,
				},
				scrollbar: {
					el: '.video-reviews-slider__scrollbar',
					draggable: true,
				},
			});
			const videoSlides = document.querySelectorAll('.video-reviews-slider-slide ');
			videoSlides.forEach((slide) => {
				slide.addEventListener('click', (event) => {
					let video = slide.querySelector('.video-reviews-slider-slide__video');
					let thumb = slide.querySelector('.video-reviews-slider-slide__img');
					let videoSrc = video.dataset.src;
					video.src = videoSrc;
					thumb.classList.add('video-reviews-slider-slide__img--hidden');
					video.classList.add('video-reviews-slider-slide__video--visible');
					slide.classList.add('video-reviews-slider-slide--active');
				});
			});
		});
	</script>

	<!-- Если 1 отзыв, то это, если больше, то то, что выше -->
	<?php if (false) : ?>
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
	<?php endif; ?>


	<?php
	$pricing = array(
		'title' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_7_title'),
		'pricing' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_7_pricing'),
		'bullets' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_7_bullets'),
		'pop_title' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_7_pop_title'),
	);
	?>

	<?php if (!empty($pricing['pricing'])) : ?>
		<section class="pricing-wrapper">
			<div class="container pricing-container">
				<h2 class="section__title pricing__title">
					<?php echo $pricing['title']; ?>
				</h2>
				<div class="pricing">
					<div class="pricing__list">
						<?php foreach ($pricing['pricing'] as $bundle) : ?>
							<article class="pricing-bundle">
								<h3 class="pricing-bundle__title">
									<?php echo $bundle['title']; ?>
								</h3>
								<ul class="pricing-bundle__bullets">
									<?php foreach ($bundle['bullets_positive'] as $positive) : ?>
										<li class="pricing-bundle__bullet"><?php echo $positive['bullet']; ?></li>
									<?php endforeach; ?>
									<?php if (!empty($bundle['bullets_negative'])) : ?>
										<?php foreach ($bundle['bullets_negative'] as $negative) : ?>
											<li class="pricing-bundle__bullet pricing-bundle__bullet--negative">
												<?php echo $negative['bullet']; ?>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
								<button type="button" class="pricing-bundle__button button button--primary button-form" data-pricing="<?php echo $bundle['title']; ?>">Узнать подробнее</button>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="pricing-popup">
				<form class="lead-form__form form" method="post">
					<h3 class="form__title"><?php echo $pricing['pop_title'] ?></h3>
					<div class="hidden">
						<input type="hidden" name="from" value="Заявка с нижней формы на «<?php the_title() ?>»">
						<input type="hidden" name="page" value="<?php echo $current_page_url; ?>">
					</div>
					<div class="input-wrap">
						<input class="form__input input__regular input--phone" type="text" placeholder="Ваше имя" name="name" required>
					</div>
					<div class="input-wrap">
						<input class="form__input input__regular input--phone" type="tel" placeholder="Ваш номер телефона" name="tel" autocorrect="off" autocomplete="tel" required>
					</div>
					<div class="input-wrap">
						<button class="pricing-popup__button form_button primary-button">Отправить</button></button>
					</div>
					<div class="gdpr">Нажимая на кнопку, вы принимаете<strong><a class="gdpr__link" href="<?php echo $privacy_url; ?>"> политику конфиденциальности</a></strong></div>
				</form>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($pricing['bullets'])) : ?>
		<?php if (!$pricing['bullets'][0]['title']) : ?>
			<div class="pricing-bullets">
				<div class="container">
					<div class="pricing-bullets__list">
						<?php foreach ($pricing['bullets'] as $bullet) : ?>
							<article class="pricing-bullets-bullet">
								<img src="<?php echo $bullet['img']; ?>" alt="<?php echo $bullet['bullet']; ?>" class="pricing-bullets-bullet__img">
								<p class="pricing-bullets-bullet__desc">
									<?php echo $bullet['bullet']; ?>
								</p>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="container">
				<div class="programm-module-cards cards__list cards__list--3">
					<?php foreach ($pricing['bullets'] as $bullet) : ?>
						<article class="card">
							<?php if ($bullet['img']) : ?>
								<img src="<?php echo $bullet['img']; ?>" alt="<?php echo $bullet['bullet'] ?>" class="card__img">
							<?php endif; ?>
							<?php if ($bullet['title']) : ?>
								<h3 class="card__title">
									<?php echo $bullet['title']; ?>
								</h3>
							<?php endif; ?>
							<p class="card__desc">
								<?php echo $bullet['bullet']; ?>
							</p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php
	$author = array(
		'spec' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_9_spec'),
		'author' => carbon_get_post_meta(get_the_ID(), 'crb_landing_block_9_author'),
	);
	?>
	<?php if (count($author['author']) == 1) : ?>
		<section class="autor-single-wrapper">
			<div class="container autor-single">
				<h2 class="section__title section__title--left">
					<?php echo $author['spec']; ?>
				</h2>
				<?php foreach ($author['author'] as $speaker) : ?>
					<div class="autor-single-bullets list-dotted-bullets">
						<?php foreach ($speaker['bullets'] as $bullet) : ?>
							<p>
								<?php echo $bullet['bullet']; ?>
							</p>
						<?php endforeach; ?>
					</div>
					<div class="autor-single-image">
						<div class="autor-single__who">
							<h3 class="autor-single__name"><?php echo $speaker['name'] ?></h3>
							<!-- <p class="autor-single__post"></p> -->
						</div><img class="autor-single__image" src="<?php echo $speaker['img'] ?>" alt="<?php echo $speaker['name'] ?>">
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php elseif (count($author['author']) > 1) : ?>
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
	<?php endif; ?>

</main>

<?php get_footer(); ?>
