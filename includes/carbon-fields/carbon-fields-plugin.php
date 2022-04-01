<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'arit_landing_page_options');
function arit_landing_page_options()
{
	$bullets_labels = array(
		'plural_name' => 'буллеты',
		'singular_name' => 'буллет',
	);

	Container::make('post_meta', 'Langin info')
		->where('post_type', '=', 'page')
		->where('post_template', '=', 'template-crb-landing.php')
		->add_tab(__('Блок 1. Первый экран'), array(
			Field::make('textarea', 'crb_landing_block_1_title', __('Оффер')),
			Field::make('complex', 'crb_landing_block_1_bullets', __('Буллеты'))
				->add_fields(array(
					Field::make('text', 'bullet', __('Буллет')),
				)),
			Field::make('image', 'crb_landing_block_1_hero', __('Фото'))
				->set_value_type('url')
				->set_width(50),
			Field::make('image', 'crb_landing_block_1_background', __('Фон'))
				->set_value_type('url')
				->set_width(50),
			Field::make('date', 'crb_landing_block_1_date', __('Дата')),
			Field::make('url', 'crb_landing_block_1_video', __('Ссылка на видео о курсе')),
			Field::make('text', 'crb_landing_block_1_button_submit', __('Текст на кнопке в форме на первом экране'))
				->set_default_value('Получить консультацию'),
			Field::make('text', 'crb_landing_block_1_button_video', __('Текст на кнопке в форме на первом экране'))
				->set_default_value('Видео о курсе'),
		))
		->add_tab(__('Блок 2, Заголовок, подзаголовок и 3 буллета'), array(
			Field::make('textarea', 'crb_landing_block_2_title', __('Заголовок')),
			Field::make('textarea', 'crb_landing_block_2_subtitle', __('Подзаголовок')),
			Field::make('complex', 'crb_landing_block_2_bullets', __('Буллеты'))
				->add_fields(array(
					Field::make('image', 'img', __('Картинка')),
					Field::make('text', 'title', __('Заголовок')),
					Field::make('textarea', 'desc', __('Текст')),
				)),
		))
		->add_tab(__('Блок 3, После курса. Слева текст, справа картинка'), array(
			Field::make('text', 'crb_landing_block_3_title', __('Заголовок'))
				->set_default_value('После курса сможете сразу оперировать'),
			Field::make('textarea', 'crb_landing_block_3_subtitle', __('Подзаголовок')),
			Field::make('complex', 'crb_landing_block_3_bullets', __('Буллеты'))
				->setup_labels($bullets_labels)
				->add_fields(array(
					Field::make('textarea', 'bullet', __('Буллет')),
				)),
			Field::make('image', 'crb_landing_block_3_background-desktop', __('Фон, компьютер'))
				->set_value_type('url'),
			Field::make('image', 'crb_landing_block_3_background-mobile', __('Фон, компьютер'))
				->set_value_type('url'),
		))
		->add_tab(__('Блок 4, Программа курса. Теория и практика'), array(
			Field::make('text', 'crb_landing_block_4_title', __('Заголовок'))
				->set_default_value('Программа курса'),
			Field::make('complex', 'crb_landing_block_4_tabs', __('Вкладки'))
				->setup_labels(array(
					'plural_name' => 'вкладки',
					'singular_name' => 'вкладку',
				))
				->add_fields(
					array(
						Field::make('text', 'tab_title', __('Заголовок вкладки'))
							->set_default_value('10 часов теории'),
						Field::make('radio', 'tab_top_type', 'Тип верхней части вкладки')
							->add_options(array(
								'text' => 'Текст',
								'cards' => 'Карточки',
							)),
						Field::make('textarea', 'tab_top_text', 'Текст вверху вкладки')
							->set_conditional_logic(array(
								'relation' => 'AND', // Optional, defaults to "AND"
								array(
									'field' => 'tab_top_type',
									'value' => 'text', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
									'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
								)
							)),
						Field::make('complex', 'tab_top_cards', 'Карточки вверху вкладки')
							->setup_labels(array(
								'plural_name' => 'карточки вверху влкадки программы',
								'singular_name' => 'карточку вверху вкладки программы',
							))
							->set_conditional_logic(array(
								'relation' => 'AND', // Optional, defaults to "AND"
								array(
									'field' => 'tab_top_type',
									'value' => 'cards', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
									'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
								)
							))
							->add_fields(
								array(
									Field::make('image', 'img', __('Картинка')),
									Field::make('text', 'title', __('Заголовок'))
										->set_help_text('Если оставить пустым, то будет отображаться карточки без подложки'),
									Field::make('textarea', 'desc', __('Текст'))
								)
							),
						Field::make('text', 'program_bullet_name', __('Название части программы'))
							->set_help_text('Например День или Модуль. Будет отображаться как «День 1», «День 2» или «Модуль 1», «Модуль 2»')
							->set_default_value('День'),

						Field::make('radio', 'tab_programm_type', 'Тип выпадайки в программе')
							->add_options(array(
								'table' => '1. Задача + время прохождения + результат + план',
								'theory_and_practice' => '2. Длительность + Теория + практика + результат',
								'task_theory_and_practice' => '3. Задача + время и план теории + время и план практики + результат',
							)),
						Field::make('complex', 'tab_progarmm_1', 'Программа курса')
							->setup_labels(array(
								'plural_name' => 'элементы программы',
								'singular_name' => 'элемент программы',
							))
							->set_conditional_logic(array(
								'relation' => 'AND',
								array(
									'field' => 'tab_programm_type',
									'value' => 'table',
									'compare' => '=',
								)
							))
							->add_fields(array(
								Field::make('textarea', 'title', __('Название модуля')),
								Field::make('textarea', 'task', __('Задача')),
								Field::make('text', 'duration', __('Длительность')),
								Field::make('textarea', 'result', __('Результат')),
								Field::make('text', 'plan_name', __('Название пунктов плана'))
									->set_default_value('Тема'),
								Field::make('complex', 'plan', __('План'))
									->setup_labels(array(
										'plural_name' => 'пункты плана',
										'singular_name' => 'пункт плана',
									))
									->add_fields(array(
										Field::make('text', 'bullet', __('Пункт плана')),
									)),
							)),
						Field::make('complex', 'tab_progarmm_2', 'Программа курса')
							->setup_labels(array(
								'plural_name' => 'элементы программы',
								'singular_name' => 'элемент программы',
							))
							->set_conditional_logic(array(
								'relation' => 'AND',
								array(
									'field' => 'tab_programm_type',
									'value' => 'theory_and_practice',
									'compare' => '=',
								)
							))
							->add_fields(
								array(
									Field::make('text', 'title', __('Нвазвание модуля')),
									Field::make('text', 'duration', __('Длительность'))
										->set_default_value('8 часов'),
									Field::make('text', 'plan_name', __('Название пунктов плана'))
										->set_default_value('Тема'),
									Field::make('textarea', 'theory_title', __('Заголовок про теорию'))
										->set_default_value('Разбор теоретических основ и клинических случаев по темам:'),
									Field::make('complex', 'theory', __('Теория'))
										->setup_labels(array(
											'plural_name' => 'пункты теории',
											'singular_name' => 'пункт теории',
										))
										->add_fields(array(
											Field::make('textarea', 'bullet', __('Пункт теории')),
										)),
									Field::make('textarea', 'practice_title', __('Заголовок про практику'))
										->set_default_value('Практическая отработка:'),
									Field::make('complex', 'practice', __('Практика'))
										->setup_labels(array(
											'plural_name' => 'пункты практики',
											'singular_name' => 'пункт практики',
										))
										->add_fields(array(
											Field::make('textarea', 'bullet', __('Пункт практики')),
										)),
									Field::make('complex', 'results', __('Результаты'))
										->setup_labels(array(
											'plural_name' => 'результаты',
											'singular_name' => 'результат',
										))
										->add_fields(array(
											Field::make('text', 'result', __('Результат')),
										)),
								)
							),
						Field::make('complex', 'tab_progarmm_3', 'Программа курса')
							->setup_labels(array(
								'plural_name' => 'элементы программы',
								'singular_name' => 'элемент программы',
							))
							->set_conditional_logic(array(
								'relation' => 'AND',
								array(
									'field' => 'tab_programm_type',
									'value' => 'task_theory_and_practice',
									'compare' => '=',
								)
							))
							->add_fields(array(
								Field::make('text', 'title', __('Нвазвание модуля')),
								Field::make('text', 'task', __('Задача')),
								Field::make('text', 'theory_duration', __('Длительность теории'))
									->set_default_value('1 час 20 минут'),
								Field::make('text', 'practice_duration', __('Длительность практики'))
									->set_default_value('15 минут'),
								Field::make('text', 'plan_name', __('Название пунктов плана'))
									->set_default_value('Тема'),
								Field::make('textarea', 'theory_title', __('Заголовок про теорию'))
									->set_default_value('Разбор теоретических основ и клинических случаев по темам:'),
								Field::make('complex', 'theory', __('Теория'))
									->setup_labels(array(
										'plural_name' => 'пункты теории',
										'singular_name' => 'пункт теории',
									))
									->add_fields(array(
										Field::make('text', 'bullet', __('Пункт теории')),
									)),
								Field::make('textarea', 'practice_title', __('Заголовок про практику'))
									->set_default_value('Практическая отработка:'),
								Field::make('complex', 'practice', __('Практика'))
									->setup_labels(array(
										'plural_name' => 'пункты практики',
										'singular_name' => 'пункт практики',
									))
									->add_fields(array(
										Field::make('text', 'bullet', __('Пункт практики')),
									)),
								Field::make('complex', 'results', __('Результаты'))
									->setup_labels(array(
										'plural_name' => 'результаты',
										'singular_name' => 'результат',
									))
									->add_fields(array(
										Field::make('image', 'result_img', __('Картинка результата')),
										Field::make('text', 'result_title', __('Заголовок результата')),
										Field::make('textarea', 'result_desc', __('Результат')),
									)),
							))
					)
				)
		));
}