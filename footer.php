<?php
if (get_page_template_slug() == 'page-landing.php') {
	$final_form = get_field('final_form');
	$privacy_url = carbon_get_theme_option('privacy');
?>
	<section class="lead-form-wrapper">
		<img class="lead-form-img--left" src="<?php echo get_stylesheet_directory_uri() ?>/img/8-cta/pills.png" alt="pills">
		<img class="lead-form-img--right" src="<?php echo get_stylesheet_directory_uri() ?>/img/8-cta/aid.png" alt="aid">
		<div class="container">
			<h2 class="section__title"><?php echo $final_form['title'] ?></h2>
			<p class="section__descriptor"><strong><?php echo $final_form['subtitle'] ?></strong></p>
			<div class="lead-form">
				<div class="lead-form-bullets">
					<!--<h3 class="lead-form-bullets__title">А желающих обычно больше, чем мест</h3>-->
					<p>Поэтому, если хотите:</p>
					<div class="lead-form-list list-dotted-bullets">
						<?php echo $final_form['bullets'] ?>
					</div>
				</div>

				<?php
				$current_domain = $_SERVER['HTTP_HOST'];
				$current_page_url = get_permalink();

				$current_page_url = str_replace('xn--h1aitq.xn--80aqxj.xn--p1ai', $current_domain, $current_page_url);
				?>
				<form class="lead-form__form form" method="post">
					<h3 class="form__title"><?php echo $final_form['form_title'] ?></h3>
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
						<button class="form_button primary-button"><?php echo $final_form['form_button'] ?></button>
					</div>
					<div class="gdpr">Нажимая на кнопку, вы принимаете<strong><a class="gdpr__link" href="<?php echo $privacy_url; ?>"> политику конфиденциальности</a></strong></div>
				</form>
			</div>
			<?php if (!empty($final_form['nmo'])) { ?>
				<p class="nmo">и напоминаем про <?php echo $final_form['nmo'] ?> баллов в системе НМО</p>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<footer class="footer-wrapper">
	<div class="container">
		<style>
			.footer-logo {
				color: #e8e8e8;
				text-decoration: none;
			}
		</style>
		<div class="footer"><a href="https://арит.рф" class="footer-logo">
				<picture class="footer__picture"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/0-general/logo.svg" alt="logo"></picture>
				<p class="footer-logo__descriptor">Занятия проходят на базе Академии развития инновационных технологий АРИТ</p>
			</a>
			<div class="footer-center">
				<div class="socials"><a class="socials-item" href="<?php the_field('vk', 402) ?>">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.5 0C5.59667 0 0 5.59642 0 12.5C0 19.4036 5.59667 25 12.5 25C19.4033 25 25 19.4036 25 12.5C25 5.59642 19.4033 0 12.5 0ZM18.8407 13.8519C19.4233 14.421 20.0396 14.9565 20.5627 15.5844C20.7944 15.8621 21.0128 16.1494 21.179 16.4724C21.4164 16.933 21.202 17.4381 20.7898 17.4655L18.2289 17.465C17.5675 17.5197 17.0412 17.2529 16.5974 16.8008C16.2432 16.4404 15.9146 16.0555 15.5734 15.6829C15.434 15.5299 15.2872 15.3859 15.1123 15.2726C14.7632 15.0455 14.4598 15.1151 14.2598 15.4798C14.056 15.8509 14.0095 16.2621 13.99 16.6752C13.9621 17.279 13.7801 17.4368 13.1742 17.4652C11.8795 17.5258 10.6512 17.3294 9.50946 16.6767C8.5023 16.101 7.72276 15.2885 7.04348 14.3685C5.72072 12.5752 4.70767 10.6069 3.79744 8.5821C3.59258 8.12609 3.74246 7.8821 4.24552 7.87263C5.08133 7.85652 5.91714 7.85857 6.75294 7.87187C7.09309 7.87724 7.31816 8.07187 7.44885 8.39284C7.90051 9.50409 8.45422 10.5614 9.14808 11.5419C9.33299 11.8031 9.52174 12.0634 9.79054 12.2478C10.0872 12.4514 10.3133 12.3841 10.4532 12.0529C10.5427 11.8425 10.5813 11.6174 10.6008 11.3918C10.6673 10.6192 10.6752 9.8468 10.5601 9.07724C10.4885 8.59565 10.2176 8.28465 9.7376 8.19361C9.49309 8.14731 9.5289 8.05678 9.64783 7.91714C9.85422 7.6757 10.0476 7.52634 10.434 7.52634L13.3274 7.52583C13.7834 7.61535 13.8857 7.81995 13.9476 8.27928L13.9501 11.4946C13.9448 11.6724 14.0394 12.1992 14.3586 12.3156C14.6143 12.4 14.7831 12.1949 14.9361 12.033C15.6299 11.2967 16.1243 10.4276 16.567 9.52813C16.7624 9.13146 16.9309 8.72097 17.0946 8.30972C17.2164 8.00563 17.4056 7.85601 17.7488 7.86112L20.535 7.86445C20.6171 7.86445 20.7005 7.86522 20.7818 7.87928C21.2514 7.95959 21.3801 8.16164 21.2348 8.61969C21.0061 9.33939 20.5619 9.93887 20.1276 10.5399C19.6621 11.1834 19.1657 11.8043 18.7049 12.4506C18.2813 13.0414 18.3148 13.3389 18.8407 13.8519Z" fill="#ffffff"></path>
						</svg></a><a class="socials-item" href="<?php the_field('instagram', 402) ?>">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.8926 12.5C14.8926 13.8214 13.8214 14.8926 12.5 14.8926C11.1786 14.8926 10.1074 13.8214 10.1074 12.5C10.1074 11.1786 11.1786 10.1074 12.5 10.1074C13.8214 10.1074 14.8926 11.1786 14.8926 12.5Z" fill="#ffffff"></path>
							<path d="M18.0952 8.26682C17.9802 7.95516 17.7967 7.67307 17.5583 7.44151C17.3267 7.20309 17.0448 7.01961 16.733 6.90459C16.48 6.80637 16.1001 6.68945 15.4003 6.65759C14.6433 6.62307 14.4163 6.61563 12.4998 6.61563C10.5831 6.61563 10.3561 6.62288 9.59928 6.6574C8.89948 6.68945 8.51934 6.80637 8.26662 6.90459C7.95477 7.01961 7.67267 7.20309 7.44131 7.44151C7.20289 7.67307 7.0194 7.95497 6.9042 8.26682C6.80597 8.51974 6.68905 8.89987 6.6572 9.59968C6.62267 10.3565 6.61523 10.5835 6.61523 12.5002C6.61523 14.4167 6.62267 14.6437 6.6572 15.4007C6.68905 16.1005 6.80597 16.4804 6.9042 16.7334C7.0194 17.0452 7.2027 17.3271 7.44112 17.5587C7.67267 17.7971 7.95457 17.9806 8.26643 18.0956C8.51934 18.194 8.89948 18.3109 9.59928 18.3428C10.3561 18.3773 10.5829 18.3845 12.4996 18.3845C14.4165 18.3845 14.6435 18.3773 15.4001 18.3428C16.0999 18.3109 16.48 18.194 16.733 18.0956C17.3589 17.8541 17.8537 17.3593 18.0952 16.7334C18.1934 16.4804 18.3103 16.1005 18.3424 15.4007C18.3769 14.6437 18.3841 14.4167 18.3841 12.5002C18.3841 10.5835 18.3769 10.3565 18.3424 9.59968C18.3105 8.89987 18.1936 8.51974 18.0952 8.26682ZM12.4998 16.1858C10.4641 16.1858 8.81384 14.5357 8.81384 12.5C8.81384 10.4643 10.4641 8.81423 12.4998 8.81423C14.5353 8.81423 16.1855 10.4643 16.1855 12.5C16.1855 14.5357 14.5353 16.1858 12.4998 16.1858ZM16.3313 9.52987C15.8556 9.52987 15.4699 9.1442 15.4699 8.66851C15.4699 8.19282 15.8556 7.80715 16.3313 7.80715C16.807 7.80715 17.1926 8.19282 17.1926 8.66851C17.1924 9.1442 16.807 9.52987 16.3313 9.52987Z" fill="#ffffff"></path>
							<path d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM19.6344 15.4593C19.5997 16.2233 19.4782 16.745 19.3008 17.2016C18.928 18.1658 18.1658 18.928 17.2016 19.3008C16.7452 19.4782 16.2233 19.5995 15.4594 19.6344C14.694 19.6693 14.4495 19.6777 12.5002 19.6777C10.5507 19.6777 10.3064 19.6693 9.54075 19.6344C8.77686 19.5995 8.255 19.4782 7.79858 19.3008C7.31945 19.1206 6.88572 18.8381 6.52714 18.4729C6.16207 18.1145 5.87959 17.6805 5.69935 17.2016C5.52197 16.7452 5.40047 16.2233 5.36575 15.4594C5.33047 14.6938 5.32227 14.4493 5.32227 12.5C5.32227 10.5507 5.33047 10.3062 5.36556 9.54075C5.40028 8.77666 5.52158 8.255 5.69897 7.79839C5.87921 7.31945 6.16188 6.88553 6.52714 6.52714C6.88553 6.16188 7.31945 5.8794 7.79839 5.69916C8.255 5.52177 8.77666 5.40047 9.54075 5.36556C10.3062 5.33066 10.5507 5.32227 12.5 5.32227C14.4493 5.32227 14.6938 5.33066 15.4593 5.36575C16.2233 5.40047 16.745 5.52177 17.2016 5.69897C17.6805 5.87921 18.1145 6.16188 18.4731 6.52714C18.8381 6.88572 19.1208 7.31945 19.3008 7.79839C19.4784 8.255 19.5997 8.77666 19.6346 9.54075C19.6695 10.3062 19.6777 10.5507 19.6777 12.5C19.6777 14.4493 19.6695 14.6938 19.6344 15.4593Z" fill="#ffffff"></path>
						</svg></a><a class="socials-item" href="<?php the_field('facebook', 402) ?>">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M25 12.5C25 5.5957 19.4043 0 12.5 0C5.5957 0 0 5.5957 0 12.5C0 19.4043 5.5957 25 12.5 25C12.5732 25 12.6465 25 12.7197 24.9951V15.2686H10.0342V12.1387H12.7197V9.83398C12.7197 7.16309 14.3506 5.70801 16.7334 5.70801C17.876 5.70801 18.8574 5.79102 19.1406 5.83008V8.62305H17.5C16.2061 8.62305 15.9521 9.23828 15.9521 10.1416V12.1338H19.0527L18.6475 15.2637H15.9521V24.5166C21.1768 23.0176 25 18.208 25 12.5Z" fill="#ffffff"></path>
						</svg></a><a class="socials-item" href="<?php the_field('youtube', 402) ?>">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.9429 14.8418L15.009 12.5L10.9429 10.1582V14.8418Z" fill="#ffffff"></path>
							<path d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM20.3106 12.5128C20.3106 12.5128 20.3106 15.0478 19.989 16.2703C19.8088 16.9394 19.2812 17.4669 18.6121 17.647C17.3897 17.9688 12.5 17.9688 12.5 17.9688C12.5 17.9688 7.6231 17.9688 6.3879 17.6342C5.7188 17.4541 5.19123 16.9264 5.01099 16.2573C4.68922 15.0478 4.68922 12.5 4.68922 12.5C4.68922 12.5 4.68922 9.96513 5.01099 8.74271C5.19104 8.07362 5.73158 7.53307 6.3879 7.35302C7.61032 7.03125 12.5 7.03125 12.5 7.03125C12.5 7.03125 17.3897 7.03125 18.6121 7.3658C19.2812 7.54585 19.8088 8.07362 19.989 8.74271C20.3236 9.96513 20.3106 12.5128 20.3106 12.5128Z" fill="#ffffff"></path>
						</svg></a></div>
				<!--<div class="footer-copy">© 2021 Инновационный центр<br><?php //the_field('footer_address')
																																		?></div>-->
				<div class="footer-copy"><?php the_field('footer_address') ?></div>
			</div>
			<div class="contacts contacts--footer"><a class="contacts-item contacts-item--email" href="mailto:dpo@dpoarit.ru">
					<svg class="contacts__icon" width="30" height="30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect width="30" height="30" rx="5" fill="#ffffff"></rect>
						<path d="M17.606 15.0821L23 18.4921V11.5281L17.606 15.0821Z" fill="#333333"></path>
						<path d="M7 11.5281V18.4921L12.394 15.0821L7 11.5281Z" fill="#333333"></path>
						<path d="M22 9.5H8.00003C7.50103 9.5 7.10503 9.872 7.03003 10.351L15 15.602L22.97 10.351C22.895 9.872 22.499 9.5 22 9.5Z" fill="#333333"></path>
						<path d="M16.69 15.6861L15.275 16.6181C15.191 16.6731 15.096 16.7001 15 16.7001C14.904 16.7001 14.809 16.6731 14.725 16.6181L13.31 15.6851L7.03198 19.6561C7.10898 20.1311 7.50298 20.5001 7.99998 20.5001H22C22.497 20.5001 22.891 20.1311 22.968 19.6561L16.69 15.6861Z" fill="#333333"></path>
					</svg><span class="contacts__text">dpo@dpoarit.ru</span></a><a class="contacts-item contacts-item--phone" href="tel:+74997026069">
					<svg class="contacts__icon" width="30" height="30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect width="30" height="30" rx="5" fill="#ffffff"></rect>
						<g clip-path="url(#clip0)">
							<path d="M22.5877 18.8057L20.5991 16.8167C20.0686 16.2862 19.1416 16.2853 18.6102 16.8167L18.2786 17.1483L22.2562 21.1257L22.5877 20.7942C23.1383 20.2436 23.1364 19.3535 22.5877 18.8057Z" fill="#333333"></path>
							<path d="M17.5973 17.7929C17.1789 18.117 16.582 18.1041 16.1996 17.7209L12.2679 13.7864C11.8846 13.4032 11.8717 12.8058 12.1959 12.3884L8.22743 8.42017C6.52021 10.4102 6.58696 13.4087 8.47118 15.2929L14.6931 21.5176C16.5013 23.3256 19.463 23.5654 21.566 21.7612L17.5973 17.7929Z" fill="#333333"></path>
							<path d="M13.1719 9.38723L11.1834 7.39826C10.6528 6.8677 9.72582 6.86679 9.19439 7.39826L8.86279 7.72985L12.8404 11.7073L13.1719 11.3758C13.7224 10.8252 13.7206 9.93507 13.1719 9.38723Z" fill="#333333"> </path>
						</g>
						<defs>
							<clippath id="clip0">
								<rect width="16" height="16" fill="#333333" transform="translate(7 7)"></rect>
							</clippath>
						</defs>
					</svg><span class="contacts__text">+7 (499) 702-60-69</span></a></div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>
<style>
	.form_button--pressed {
		opacity: 0.8;
		transition: all 0.3s;
	}

	.primary-button:hover {
		transform: scale(1) !important;
	}
</style>
<script>
	// var formElement = document.querySelector("#mainform");
	var getForms = [...document.querySelectorAll(".form")];
	var formData = new FormData();
	var actor = "<?php echo get_template_directory_uri() . '/form.php' ?>";

	var strToSend = '';


	getForms.map(function(formItem) {
		formItem.addEventListener('submit', function(e) {
			e.preventDefault();
			var inputs = [...this.querySelectorAll("input")];
			inputs.map(function(inputItem) {
				strToSend = strToSend + inputItem.name + '=' + inputItem.value + '&';
			})

			console.log(strToSend)
			var xhr = new XMLHttpRequest;
			xhr.onload = function() {
				if (xhr.status != 200) {
					console.log('статус', xhr.status);
					console.log(xhr.statusText);
				} else {
					console.log('Форма отправлена')
				}
			}

			xhr.open('POST', actor);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(strToSend);

			setTimeout(function() {
				formItem.querySelector('.form_button').classList.add('form_button--pressed');
				formItem.querySelector('.form_button').setAttribute('disabled', 'disabled')
				formItem.querySelector('.form_button').innerText = 'Заявка отправлена!'
			}, 200);

			return false
		})
	});
</script>
<!— Facebook Pixel Code —>
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '432801571357457');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=432801571357457&ev=PageView&noscript=1" /></noscript>
	<!— End Facebook Pixel Code —>
		</body>

		</html>
