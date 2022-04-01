<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
// function callback(){

	$name = htmlspecialchars($_POST['name']);
	$phone = htmlspecialchars($_POST['tel']);
	$formname = htmlspecialchars($_POST['from']);
	$page = htmlspecialchars($_POST['page']);


	if ($phone) {

		$subj = $formname;

		$message2 = '<table width="350" border="0" cellspacing="0" cellpadding="0" style="font: 300 14px Arial;">';
		$message2 .= '<tr><td colspan="2" style="padding-top:15px; font-weight:bold;"><strong>Данные: </strong></td>';
		if (!empty($name)){
			$message2 .= '<tr><td>Имя: </td><td>' . $name . '</td></tr>';
		}
		$message2 .= '<tr><td>Телефон: </td><td>' . $phone . '</td></tr>';
		$message2 .= '<tr><td>Страница заявки: </td><td>' . $page . '</td></tr>';

		// if ($message) {
			// $message2 .= '<tr><td>Сообщение: </td><td>' . $message . '</td></tr>';
		// }

		$message2 .= '</table>';

		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: <mailer@арит.рф>\r\n";

		// $mailstat1 = wp_mail('boffeechane@gmail.com', $subj, $message2, $headers);
		$mailstat2 = wp_mail('dpo@dpoarit.ru', $subj, $message2, $headers);
		$mailstat1;
		$mailstat2;
		
	//   wp_send_json([
	//     'success' => true,
	//     'message' => 'Спасибо, ваша заявка отправлена!'
	//   ]);
	//   wp_send_json([
	//     'success' => false,
	//     'message' => 'Заполните все обязательные поля'
 	//   ]);
	}
	// echo $name;

	wp_die();
// }
