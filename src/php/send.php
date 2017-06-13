<?
  if(!isset($_POST)) {
    exit();
  };

  $locales = [
    'ru' => 'Русский',
    'uk' => 'Украинский'
  ];
  $blocks = [
    'header' => 'Заголовок',
    'no_employees' => 'Предприниматель',
    'company' => 'Предприятие',
    'it' => 'Бухгалтер для IT-компаний',
    'contacts' => 'Контакты',
  ];
  function parseData($name) {
    return isset($_POST[$name]) && count($_POST[$name]) ? filter_var($_POST[$name], FILTER_SANITIZE_STRING) : false;
  }

  $date_time = new DateTime('', new DateTimeZone('Europe/Kiev'));
  $date =  $date_time->format('Y-m-d H:i:s');
  $site = $_SERVER['HTTP_HOST'];
  $name = parseData('name');
  $phone = parseData('phone');
  $email = parseData('email');
  $message = parseData('message');
  $block = parseData('block');
  $language = parseData('language');

  if(!$phone) {
    echo json_encode('no_phone');
  }
  if(!$block) {
    $subject = "Заказ звонка с сайта $site";
    $text = "Заказ звонка с сайта $site \r\n\r\n";
    $html = "<h1>Заказ звонка с сайта $site</h1>";
    $text .= "Номер телефона: $phone \r\n";
    $html .= "<p><strong>Номер телефона:</strong> $phone</p>";
  }
  else {
    $subject = "Заявка с сайта $site";
    $text = "Заявка с сайта $site \r\n\r\n";
    $html = "<h1>Заявка с сайта $site</h1>";
    if($name) {
      $text .= "Имя: $name \r\n";
      $html .= "<p><strong>Имя:</strong> $name</p>";
    }
    $text .= "Номер телефона: $phone \r\n";
    $html .= "<p><strong>Номер телефона:</strong> $phone</p>";
    if($message) {
      $text .= "Сообщение: $message \r\n";
      $html .= "<p><strong>Сообщение:</strong> $message</p>";
    }
    $text .= "\r\nФорма: $blocks[$block] \r\n";
    $html .= "<br><p><strong>Форма:</strong> $blocks[$block]</p>";
  };
  if($language) {
    $text .= "Язык: $locales[$language] \r\n";
    $html .= "<p><strong>Язык:</strong> $locales[$language]</p>";
  }
  $text .= "Отправлено: $date \r\n\r\n\r\n";
  $html .= "<p><strong>Отправлено:</strong> $date</p>";

$coin = rand(0, 1);
$result = $coin ? 'ok' : 'error';
echo json_encode($result);
exit;

  require_once './config.php';

  if(isset($config['log'])) {
    file_put_contents($config['log'], $text, FILE_APPEND | LOCK_EX);
  }

  require_once './phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail -> CharSet = "UTF-8";
  $mail->setLanguage($language, './phpmailer/language/');

  $mail->SMTPDebug = 3;                                 // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = $config['username'];                          // SMTP username
  $mail->Password = $config['password'];                          // SMTP password
  $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, `tsl` also accepted
  $mail->Port = 465;                                    // TCP port to connect to

  $mail->setFrom($config['admin'], $config['admin_title']);
  $mail->addAddress($config['admin']);     // Add a recipient
  $mail->addReplyTo($config['admin'], $config['admin_title']);

  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = $subject;
  $mail->Body    = $html;
  $mail->AltBody = $text;

  if(!$mail->send()) {
    echo json_encode('error');
  }
  else {
    echo json_encode('ok');
  }
?>