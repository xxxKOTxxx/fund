<?php
  /***** Translations file *****/
  /*** Translations functions ***/
  function set($data, $check = false, $replace = false) {
    if($check) {
      if(!isset($data) || !$data) {
        return false;
      }
    }
    if($replace) {
      $data = $replace;
    }
    echo $data;
    return;
  };
  function setLink($data, $type) {
    switch($type) {
      case 'phone':
        echo 'tel:'.preg_replace('/\D/', '', $data);
        break;
      case 'email':
        echo 'mailto:'.trim($data);
        break;
      default:
        break;
    }
    return;
  }

  $config = [
    'phone' => [
      'text' => '+380&nbsp;(68)&nbsp;804&nbsp;80&nbsp;44',
      'link' => '+380688048044'
    ],
    'email' => 'info@entrout.com.ua',
    'work_time' => [
      'from' => '9:00',
      'to' => '18:00'
    ],
    'protocol' => isset($_SERVER['HTTPS']) ? "https://" : "http://",
    'domain' => $_SERVER['HTTP_HOST']
  ];

  /*** Microdata translations ***/
  $languages['microdata'] = [
    'logo' => [
      'ru' => $config['protocol'].$config['domain'].'/images/common/logo_ru.png',
      'uk' => $config['protocol'].$config['domain'].'/images/common/logo_uk.png',
    ],
    'google' => [
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg'
      ],
    ],
    'facebook' => [
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg'
      ],
      'type' => 'image/jpeg',
      'width' => 1200,
      'height' => 630
    ],
    'twitter' => [
      'creator' => '',
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg'
      ],
    ]
  ];

  /*** Site translations ***/
  $languages['site'] = [
    'title' => [
      'ru' => 'Бухгалтерские услуги для компаний и предпринимателей',
      'uk' => 'Бухгалтерські послуги для компаній і підприємств',
    ],
    'description' => [
      'ru' => 'Ведение бухгалтерии предприятия на общей системе, НДС, сотрудники, бухгалтерские услуги для частного предпринимателя на едином налоге от 1000 грн, бухгалтер для IT-компании.',
      'uk' => 'Ведення бухгалтерії для підприємств на загальній системі, ПДВ, працівники, бухгалтерські послуги для приватного підприємця на єдиному податку від 1000 грн, бухгалтер IT-компанії.',
    ],
    'keywords' => [
      'ru' => 'ведение бухгалтерии фоп, бухгалтер для фоп киев, ведение спд, бухгалтерские услуги для флп киев, сколько стоят услуги бухгалтера для спд, бухгалтерские услуги киев стоимость, стоимость услуг бухгалтера на дому, бухгалтерские услуги цена киев, бухгалтер в it компанию киев, ведение бухгалтерского учёта аутсорсинг, бухгалтерский учет в it компаниях, бухгалтер для программиста, бухгалтер отчетность, бухгалтер на нулевую отчётность',
      'uk' => 'ведення бухгалтерії фоп, бухгалтер для фоп київ, ведення спд, бухгалтерські послуги для фоп київ, скільки коштують послуги бухгалтера для спд, бухгалтерські послуги прайс, бухгалтерські послуги київ вартість, бухгалтерські послуги ціна київ, бухгалтер в it компанію київ, ведення бухгалтерського обліку аутсорсинг, бухгалтерський облік в it компаніях, бухгалтер для програміста, бухгалтер звітність, бухгалтер на нульову звітність',
    ],
    'button' => [
      'ru' => 'Оставить заявку',
      'uk' => 'Залишити запит',
    ]
  ];

  /*** Locales translations ***/
  $languages['locales'] = [
    'ru' => [
      'text' => 'Укр',
      'title' => 'Украинский язык',
      'href' => './uk',
      'locale' => 'ru'
    ],
    'uk' => [
      'text' => 'Рос',
      'title' => 'Російська мова',
      'href' => './ru',
      'locale' => 'uk'
    ]
  ];

  /*** Menu translations ***/
  $languages['menu'] = [
    'title' => [
      'ru' => 'Меню',
      'uk' => 'Меню',
    ],
    'close_title' => [
      'ru' => 'Закрыть меню',
      'uk' => 'Закрити меню',
    ],
    'items' => [
      'advantages' => [
        'ru' => 'Преимущества',
        'uk' => 'Переваги',
      ],
      'services' => [
        'ru' => 'Услуги',
        'uk' => 'Послуги',
      ],
      'process' => [
        'ru' => 'Как мы работаем',
        'uk' => 'Як ми працюємо',
      ],
      'faq' => [
        'ru' => 'Вопрос-ответ',
        'uk' => 'Запитання-відповіді',
      ],
      'contacts' => [
        'ru' => 'Контакты',
        'uk' => 'Контакти',
      ],
    ],
  ];

  /*** Header translations ***/
  $languages['header'] = [
    'logo' => [
      'ru' => 'Бухгалтер на аутсорсе',
      'uk' => 'Бухгалтер на аутсорсі',
    ],
    'title' => [
      'ru' => 'Бухгалтерские услуги для&nbsp;предпринимателей и&nbsp;компаний',
      'uk' => 'Бухгалтерські послуги для&nbsp;підприємців і&nbsp;компаній',
    ],
    'subtitle' => [
      'ru' => 'Работаем с&nbsp;бизнесами на&nbsp;едином налоге и&nbsp;на&nbsp;общей системе с&nbsp;НДС',
      'uk' => 'Працюємо з&nbsp;бізнесами на&nbsp;єдиному податку і&nbsp;на&nbsp;загальній системі з&nbsp;ПДВ',
    ],
  ];

  /*** Footer translations ***/
  $languages['footer'] = [
    'address' => [
      'country' => [
        'ru' => 'Украина',
        'uk' => 'Україна',
      ],
      'city' => [
        'ru' => 'г.&nbsp;Киев',
        'uk' => 'м.&nbsp;Київ',
      ],
      'street' => [
        'ru' => 'ул.&nbsp;Эспланадная,&nbsp;1',
        'uk' => 'вул.&nbsp;Еспланадна,&nbsp;1',
      ],
      'description' => [
        'ru' => 'БЦ&nbsp;Гулливер',
        'uk' => 'БЦ&nbsp;Гуллівер',
      ],
      'location' => [
        'ru' => 'БЦ Гулливер',
        'uk' => 'БЦ Гуллівер',
      ],
    ],
    'work_time' => [
      'before' => [
        'ru' => 'Мы работаем с',
        'uk' => 'Ми працюємо з',
      ],
      'to' => [
        'ru' => 'до',
        'uk' => 'до',
      ],
      'after' => [
        'ru' => 'в&nbsp;будни.',
        'uk' => 'у&nbsp;будні.',
      ],
    ]
  ];

  /*** Modal translations ***/
  $languages['modal'] = [
    'callback' => [
      'button' => [
        'title' => [
          'ru' => 'Заказать звонок',
          'uk' => 'Замовити дзвінок',
        ]
      ],
      'title' => [
        'ru' => 'Возможно, у&nbsp;вас есть вопросы или&nbsp;нужна помощь',
        'uk' => 'Можливо, ви&nbsp;маєте запитання чи&nbsp;потребуєте допомоги',
      ],
      'text' => [
        'ru' => 'Оставьте номер телефона — и&nbsp;мы&nbsp;перезвоним вам.',
        'uk' => 'Залиште номер телефону — і&nbsp;ми&nbsp;передзвонимо вам.',
      ],
      'phone' => [
        'ru' => 'Телефон *',
        'uk' => 'Телефон *',
      ],
      'send' => [
        'ru' => 'Заказать звонок',
        'uk' => 'Замовити дзвінок',
      ],
    ],
    'request' => [
      'title' => [
        'ru' => 'Заявка на бухгалтерское обслуживание',
        'uk' => 'Заявка на бухгалтерське обслуговування',
      ],
      'name' => [
        'ru' => 'Имя',
        'uk' => "Ім'я",
      ],
      'phone' => [
        'ru' => 'Телефон *',
        'uk' => 'Телефон *',
      ],
      'message' => [
        'ru' => 'Сообщение',
        'uk' => 'Повідомлення',
      ],
      'send' => [
        'ru' => 'Отправить',
        'uk' => 'Відправити',
      ]
    ]
  ];

  /*** Form translations ***/
  $languages['form'] = [
    'sending' => [
      'ru' => 'Запрос отправляется.',
      'uk' => 'Запит відправляється.',
    ],
    'success' => [
      'ru' => 'Мы свяжемся с&nbsp;вами в&nbsp;ближайшее время.',
      'uk' => 'Ми зв’яжемося з&nbsp;вами найближчим часом.',
    ],
    'error' => [
      'ru' => 'Не&nbsp;отправлено. Пожалуйста, попробуйте отправить запрос ещё&nbsp;раз.',
      'uk' => 'Не&nbsp;відправлено. Будь&nbsp;ласка, спробуйте надіслати запит ще&nbsp;раз.',
    ],
    'restore' => [
      'ru' => 'Ok',
      'uk' => 'Ok',
    ],
    'repeat' => [
      'ru' => 'try again',
      'uk' => 'try again',
    ],
  ];
?>