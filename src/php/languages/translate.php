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
    'email' => 'foundation@klimenko.com',
    'protocol' => isset($_SERVER['HTTPS']) ? "https://" : "http://",
    'domain' => $_SERVER['HTTP_HOST']
  ];

  /*** Microdata translations ***/
  $languages['microdata'] = [
    'logo' => [
      'ru' => $config['protocol'].$config['domain'].'/images/common/logo_ru.png',
      'uk' => $config['protocol'].$config['domain'].'/images/common/logo_uk.png',
      'en' => $config['protocol'].$config['domain'].'/images/common/logo_en.png',
    ],
    'google' => [
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg',
        'en' => $config['protocol'].$config['domain'].'/images/common/socials_en.jpg'
      ],
    ],
    'facebook' => [
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg',
        'en' => $config['protocol'].$config['domain'].'/images/common/socials_en.jpg'
      ],
      'type' => 'image/jpeg',
      'width' => 1200,
      'height' => 630
    ],
    'twitter' => [
      'creator' => '',
      'image' => [
        'ru' => $config['protocol'].$config['domain'].'/images/common/socials_ru.png',
        'uk' => $config['protocol'].$config['domain'].'/images/common/socials_uk.jpg',
        'en' => $config['protocol'].$config['domain'].'/images/common/socials_en.jpg'
      ],
    ]
  ];

  /*** Site translations ***/
  $languages['site'] = [
    'title' => [
      'ru' => 'Klymenko charity family foundation',
      'uk' => 'Klymenko charity family foundation',
      'en' => 'Klymenko charity family foundation',
    ],
    'description' => [
      'ru' => '',
      'uk' => '',
      'en' => '',
    ],
    'keywords' => [
      'ru' => '',
      'uk' => '',
      'en' => '',
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
    ],
    'en' => [
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
      'en' => 'Menu',
    ],
    'close_title' => [
      'ru' => 'Закрыть меню',
      'uk' => 'Закрити меню',
      'en' => 'Close menu',
    ],
    'items' => [
      'kids' => [
        'ru' => 'Помощь детям',
        'uk' => 'Допомога дітям',
        'en' => 'Helping children',
      ],
      'temples' => [
        'ru' => 'Пожертвования храмам',
        'uk' => 'Пожертва храмам',
        'en' => 'Donations to temples',
      ],
      'founders' => [
        'ru' => 'Основатели',
        'uk' => 'Засновники',
        'en' => 'Founders ',
      ]
    ],
  ];

  /*** Header translations ***/
  $languages['header'] = [
    'title' => [
      'ru' => 'Благотворительный фонд Klymenko charity family foundation',
      'uk' => 'Благодійний фонд Klymenko charity family foundation',
      'en' => 'Klymenko charity family foundation',
    ],
    'text' => [
      'ru' => 'Жить, чтобы побеждать, творить и&nbsp;созидать с&nbsp;именем Господа нашего Иисуса Христа, приумножая добро на&nbsp;Земле!',
      'uk' => "Жити, щоб&nbsp;перемагати і&nbsp;творити з&nbsp;ім'ям Господа нашого Ісуса Христа, примножуючи добро на&nbsp;Землі!",
      'en' => "Live to&nbsp;win and to&nbsp;create in&nbsp;the&nbsp;name of&nbsp;our&nbsp;Lord Jesus Christ, multiplying the&nbsp;good on&nbsp;Earth!",
    ],
  ];

  /*** Objects translations ***/
  $languages['kids'] = [
    'title' => [
      'ru' => 'Помощь детям',
      'uk' => 'Допомога дітям',
      'en' => 'Helping children',
    ],
    'text' => [
      'ru' => 'В&nbsp;начале&nbsp;2000-х мы&nbsp;посетили детское отделение туберкулезной больницы. И&nbsp;ужаснулись. Ребята лечились там&nbsp;годами, спали на&nbsp;сбившихся в&nbsp;комки подушках и&nbsp;матрасах. В&nbsp;палатах было темно и&nbsp;сыро…',
      'uk' => 'На&nbsp;початку&nbsp;2000-х ми&nbsp;відвідали дитяче відділення туберкульозної лікарні. Це&nbsp;було сумне видовище. Діти лікувалися там&nbsp;роками, спали на&nbsp;старих подушках і&nbsp;матрацах. В&nbsp;палатах було темно й&nbsp;сиро…',
      'en' => "In the early 2000s, we visited the children's tuberculosis hospital. We were horrified. The children were treated there for years, slept on old and inconvenient pillows and mattresses. It was dark and damp",
    ],
    'story' => [
      'ru' => 'Наша история',
      'uk' => 'Наша історія',
      'en' => 'Оur history',
    ],
    'important' => [
      'ru' => 'Больше&nbsp;100',
      'uk' => 'Більше&nbsp;100',
      'en' => 'More than&nbsp;100',
    ],
    'description' => [
      'ru' => 'детей получили необходимую им&nbsp;медицинскую помощь с&nbsp;2000 по&nbsp;2017&nbsp;годы',
      'uk' => 'дітей отримали необхідну їм медичну допомогу з&nbsp;2000 по&nbsp;2017&nbsp;роки',
      'en' => 'children received the&nbsp;medical care they&nbsp;needed from&nbsp;2000 to&nbsp;2017',
    ],
  ];

  /*** Objects translations ***/
  $languages['temples'] = [
    'title' => [
      'ru' => 'Пожертвования храмам',
      'uk' => 'Пожертва храмам',
      'en' => 'Donations to churches',
    ],
    'text' => [
      'ru' => [
        'Наша помощь храмам и&nbsp;церквям началась с&nbsp;помощи священнику, которому не&nbsp;хватало средств, чтобы достроить храм. Потом мы&nbsp;помогли возвести колокольню, открыли трапезную и&nbsp;воскресную школу.',
         'В&nbsp;разное время мы&nbsp;помогли и&nbsp;продолжаем оказывать помощь всем епархиям Православной церкви в&nbsp;Украине.',
         'Из&nbsp;благотворительного фонда в&nbsp;Донецкой области мы&nbsp;выросли до&nbsp;всеукраинского, а&nbsp;затем и&nbsp;до&nbsp;международного, с&nbsp;представительствами в&nbsp;России и&nbsp;Европе.',
         'Мы&nbsp;благодарны каждому ребенку, семье, каждому храму за&nbsp;то, что&nbsp;приняли нашу помощь. И&nbsp;мы&nbsp;обязательно продолжим благотворительную деятельность с&nbsp;чувством созидания будущего и&nbsp;верой в&nbsp;Господа нашего Иисуса Христа.'
      ],
      'uk' => [
        'Наша допомога храмам і&nbsp;церквам розпочалася з&nbsp;допомоги священику, якому не&nbsp;вистачало коштів, щоб&nbsp;добудувати храм. Потім ми&nbsp;допомогли звести дзвіницю, відкрили трапезну і&nbsp;недільну школу.',
         'У&nbsp;різний&nbsp;час ми&nbsp;допомогли і&nbsp;продовжуємо надавати допомогу всім&nbsp;єпархіям Православної церкви в&nbsp;Україні.',
         'З&nbsp;благодійного фонду в&nbsp;Донецькій області ми&nbsp;виросли до&nbsp;всеукраїнського, а&nbsp;потім до&nbsp;міжнародного, з&nbsp;представництвами в&nbsp;Росії та&nbsp;Європі.',
         "Ми&nbsp;вдячні кожній дитині, родині, кожному храму за&nbsp;те, що&nbsp;прийняли нашу допомогу. І&nbsp;ми&nbsp;обов'язково продовжимо нашу благодійну діяльність з&nbsp;почуттям творення майбутнього і&nbsp;вірою в&nbsp;Господа нашого Ісуса Христа."
      ],
      'en' => ['Our&nbsp;help to&nbsp;temples and&nbsp;churches began with the&nbsp;helping a&nbsp;priest, who did&nbsp;not&nbsp;have enough money to&nbsp;complete the&nbsp;construction of&nbsp;the&nbsp;temple. Then we&nbsp;helped build the&nbsp;bell tower, opened the&nbsp;refectory and a&nbsp;Sunday&nbsp;school.',
        'At&nbsp;various times we&nbsp;have helped and&nbsp;continue to&nbsp;provide assistance to&nbsp;all the&nbsp;dioceses of&nbsp;the&nbsp;Orthodox Church in&nbsp;Ukraine.',
        'From the&nbsp;charity fund in&nbsp;the&nbsp;Donetsk region, we&nbsp;grew&nbsp;up to&nbsp;all-Ukrainian, and&nbsp;then to&nbsp;the&nbsp;international one, with representations in&nbsp;Russia and&nbsp;Europe.',
        'We&nbsp;are grateful to&nbsp;every child, family, every temple for&nbsp;accepting our&nbsp;help. And we&nbsp;will definitely continue charitable work with a&nbsp;sense of&nbsp;building the&nbsp;future and&nbsp;believing in&nbsp;our&nbsp;Lord Jesus Christ.'
      ],
    ],
    'year' => [
      'ru' => 'год',
      'uk' => 'рік',
      'en' => 'year',
    ],
    'years' => [
      '2011' => [
        'ru' => 'Наш благотворительный фонд становится всеукраинским',
        'uk' => 'Наш благодійний фонд стає всеукраїнським',
        'en' => 'Our charitable foundation is&nbsp;becoming all-Ukrainian',
      ],
      '2016' => [
        'ru' => 'Klymenko charity family foundation работает с&nbsp;международными проектами',
        'uk' => 'Klymenko charity family foundation працює з&nbsp;міжнародними проектами',
        'en' => 'Klymenko charity family foundation works with international projects',
      ]
    ]
  ];

  /*** Objects translations ***/
  $languages['objects'] = [
    'title' => [
      'ru' => 'Храмы, которым мы&nbsp;помогаем',
      'uk' => 'Храми, яким ми&nbsp;допомагаємо',
      'en' => 'Temples we help',
    ],
    'items' => [
      '1' => [
        'title' => [
          'ru' => 'Свято-Успенская<br> Святогорская Лавра',
          'uk' => 'Свято-Успенська<br> Святогірська Лавра',
          'en' => 'Holy Assumption<br> Svyatogorsk Lavra',
        ],
        'text' => [
          'ru' => 'Святогорская Лавра — значимый духовный центр для&nbsp;православной паствы восточной Украины. На&nbsp;сегодня отреставрирован Успенский собор, монастырская колокольня с&nbsp;Покровским храмом, древнейший храм обители со&nbsp;скитом в&nbsp;честь преподобных Антония и&nbsp;Феодосия Печерских. Восстановлен храм в&nbsp;честь преподобного Алексия, человека Божьего и&nbsp;Храм святителя Николая на&nbsp;верхушке меловой скалы.',
          'uk' => 'Святогірська Лавра — значний духовний центр для&nbsp;православної пастви східної України. На&nbsp;сьогодні відреставровано Успенський собор, монастирську дзвіницю з&nbsp;Покровським храмом, найдавніший храм обителі зі&nbsp;скитом на&nbsp;честь преподобних Антонія і&nbsp;Феодосія Печерських. Відновлено храм на&nbsp;честь преподобного Олексія, чоловіка Божого і&nbsp;Храм святителя Миколая на&nbsp;верхівці крейдяної скелі.',
          'en' => 'Svyatogorsk Lavra is&nbsp;a&nbsp;significant spiritual center for&nbsp;the&nbsp;Orthodox flock of&nbsp;eastern Ukraine. Today the&nbsp;Uspensky Cathedral, the&nbsp;monastery bell tower with&nbsp;the&nbsp;Pokrovsky Cathedral, the&nbsp;ancient temple of&nbsp;the&nbsp;monastery with a&nbsp;monastery in&nbsp;honor of&nbsp;the&nbsp;Monks Anthony and&nbsp;Theodosius of&nbsp;the&nbsp;Caves have been restored. The&nbsp;church was&nbsp;rebuilt in&nbsp;honor of&nbsp;the&nbsp;Monk Alexiy, the&nbsp;man of&nbsp;God and&nbsp;the&nbsp;Church of&nbsp;St.&nbsp;Nicholas on&nbsp;the&nbsp;top of&nbsp;the&nbsp;chalk cliff.',
        ],
      ],
      '2' => [
        'title' => [
          'ru' => 'Свято-Успенская<br> Киево-Печерская Лавра',
          'uk' => 'Свято-Успенська<br> Києво-Печерська Лавра',
          'en' => 'The&nbsp;Holy Dormition<br> Kiev-PecherskLavra',
        ],
        'text' => [
          'ru' => 'Киево-Печерская Лавра — древнейший монастырь в&nbsp;Украине. В&nbsp;её&nbsp;стенах работает возрождённая в&nbsp;1989&nbsp;году Киевская духовная семинария, а&nbsp;с&nbsp;1992&nbsp;года Киевская духовная академия. Братия монастыря регулярно совершает богослужения в&nbsp;Трапезном храме Преподобных Антония и&nbsp;Феодосия Печерских в&nbsp;главном храме обители — Успенском соборе.',
          'uk' => 'Києво-Печерська Лавра — найдавніший монастир в&nbsp;України. В&nbsp;її&nbsp;стінах працює відроджена в&nbsp;1989&nbsp;році Київська духовна семінарія, а&nbsp;з&nbsp;1992&nbsp;року —  Київська духовна академія. Братія монастиря регулярно здійснює богослужіння в&nbsp;Трапезному храмі Преподобних Антонія і&nbsp;Феодосія Печерських в&nbsp;головному храмі обителі — Успенському соборі.',
          'en' => "The Kiev-Pechersk Lavra is&nbsp;the&nbsp;oldest monastery in&nbsp;Ukraine. The&nbsp;Kiev Theological Seminary (since&nbsp;1992 — the&nbsp;Kiev Theological Academy) resides within its&nbsp;walls. It&nbsp;has been revived in&nbsp;1989. The monastery brethren regularly perform divine services in&nbsp;the&nbsp;Refectory Church of&nbsp;the&nbsp;Monks Anthony and&nbsp;Theodosius of&nbsp;the&nbsp;Caves in&nbsp;the&nbsp;main temple of&nbsp;the&nbsp;monastery — the&nbsp;Uspensky Cathedral.",
        ],
      ],
      '3' => [
        'title' => [
          'ru' => 'Кафедральный собор Богоявления Господнего',
          'uk' => 'Кафедральний собор Богоявлення Господнього',
          'en' => 'The&nbsp;Cathedral of&nbsp;the&nbsp;Epiphany of&nbsp;the&nbsp;Lord',
        ],
        'text' => [
          'ru' => 'Православный кафедральный собор в&nbsp;Горловке. Первый камень был&nbsp;заложен 4&nbsp;июля 2007&nbsp;года. Собор освящён Блаженнейшим Владимиром, Митрополитом Киевским и&nbsp;всея Украины 18&nbsp;сентября 2013&nbsp;года.',
          'uk' => 'Православний кафедральний собор в&nbsp;Горлівці. Перший камінь був&nbsp;закладений 4&nbsp;липня 2007&nbsp;року. Собор освячений Блаженнішим Володимиром, Митрополитом Київським і&nbsp;всієї України 18&nbsp;вересня 2013&nbsp;року.',
          'en' => 'Orthodox cathedral in&nbsp;Gorlovka. The&nbsp;first stone was&nbsp;laid on&nbsp;July&nbsp;4, 2007. The&nbsp;Cathedral was&nbsp;consecrated by&nbsp;His Beatitude Vladimir, Metropolitan of&nbsp;Kiev and&nbsp;All Ukraine on&nbsp;September&nbsp;18, 2013.',
        ],
      ],
      '4' => [
        'title' => [
          'ru' => 'Больше&nbsp;10 других соборов и&nbsp;храмов в&nbsp;Украине и&nbsp;за&nbsp;рубежом',
          'uk' => 'Більше&nbsp;10 інших соборів і&nbsp;храмів в&nbsp;Україні та&nbsp;за&nbsp;кордоном',
          'en' => 'More&nbsp;than&nbsp;10 other cathedrals and&nbsp;temples in&nbsp;Ukraine and&nbsp;abroad',
        ],
        'text' => [
          'ru' => 'Свято-Николаевский храм Киевской Епархии, Свято-Успенский Собор и&nbsp;Свято-Николаевский храм Днепропетровской епархии. Свято-Георгиевская община и&nbsp;Свято-Троицкий собор Донецкой епархии. Свято-Сергиевский женский монастырь Горловской епархии и&nbsp;другие.',
          'uk' => 'Свято-Миколаївський храм Київської Єпархії, Свято-Успенський Собор і&nbsp;Свято-Миколаївський храм Дніпропетровської єпархії. Свято-Георгіївська громада і&nbsp;Свято-Троїцький собор Донецької єпархії. Свято-Сергієвський жіночий монастир Горлівської єпархії та&nbsp;інші.',
          'en' => "St.&nbsp;Nicholas Church of&nbsp;the&nbsp;Kiev Diocese, Holy Assumption Cathedral and St.&nbsp;Nicholas Church of&nbsp;the&nbsp;Dnepropetrovsk Diocese. St.&nbsp;George's community and&nbsp;Holy Trinity Cathedral of&nbsp;the&nbsp;Donetsk diocese. St.&nbsp;Sergius Convent of&nbsp;the&nbsp;Gorlovskaya Eparchy and&nbsp;others.",
        ],
      ],
    ]
  ];

  /*** Founders translations ***/
  $languages['founders'] = [
    'title' => [
      'ru' => 'Основатели фонда',
      'uk' => 'Засновники фонду',
      'en' => 'Founders of&nbsp;the&nbsp;fund',
    ],
    'text' => [
      'ru' => 'Этот сайт создан, чтобы вы&nbsp;могли найти&nbsp;нас, если вам&nbsp;понадобится помощь.<br>Мы&nbsp;не&nbsp;будем публиковать отчётов о&nbsp;проделанной работе и&nbsp;фотографии благодарных подопечных. Мы – православные христиане и&nbsp;помним евангельские слова «когда творишь милостыню, не&nbsp;труби перед собою… пусть левая рука твоя не&nbsp;знает, что&nbsp;делает правая, чтобы милостыня твоя была втайне; и&nbsp;Отец твой, видящий тайное, воздаст тебе явно» (Мф. 6:2–4).<br>Мы&nbsp;убеждены, что по-настоящему&nbsp;мир можно изменить только добром и&nbsp;любовью, которые стали стилем жизни. И&nbsp;мы&nbsp;стараемся сделать мир&nbsp;лучше.',
      'uk' => "Цей сайт створений, щоб&nbsp;ви&nbsp;змогли знайти нас, якщо&nbsp;вам знадобиться допомога.<br>Ми&nbsp;не&nbsp;будемо публікувати звітів про&nbsp;виконану роботу і&nbsp;фото вдячних підопічних. Ми — православні християни і&nbsp;пам'ятаємо біблейські слова: «коли твориш милостиню, не&nbsp;сурми перед собою ... нехай ліва рука твоя не&nbsp;знає, що&nbsp;робить права, щоб&nbsp;таємна була твоя милостиня; і&nbsp;Отець твій, що&nbsp;бачить таємне, віддасть тобі явно» (Мф. 6: 2–4).<br>Ми&nbsp;переконані, що&nbsp;по-справжньому світ можна змінити тільки добром і&nbsp;любов'ю, які&nbsp;стали стилем життя. І&nbsp;ми&nbsp;намагаємося зробити світ&nbsp;кращим.",
      'en' => 'This&nbsp;site is&nbsp;created so&nbsp;that you&nbsp;can find&nbsp;us if&nbsp;you need&nbsp;help. We&nbsp;will not&nbsp;publish reports on&nbsp;the&nbsp;work done and&nbsp;photos of&nbsp;grateful&nbsp;wards. We&nbsp;are&nbsp;Orthodox Christians and&nbsp;remember the&nbsp;gospel words: "whenever you&nbsp;give alms, do&nbsp;not blow a&nbsp;trumpet before&nbsp;you... do&nbsp;not let&nbsp;your left hand know what your right hand is&nbsp;doing so&nbsp;that your alms may&nbsp;be&nbsp;in&nbsp;secret. And&nbsp;your Father, who&nbsp;sees in&nbsp;secret, will reward&nbsp;you" (Matthew 6:2–4). We&nbsp;are&nbsp;convinced that the&nbsp;real world can&nbsp;only be&nbsp;changed by&nbsp;kindness and&nbsp;love, which have become a&nbsp;way of&nbsp;life. We&nbsp;try to&nbsp;make the&nbsp;world better.',
    ],
    'name' => [
      'ru' => 'Клименко<br> Антон Викторович',
      'uk' => 'Клименко<br> Антон Вікторович',
      'en' => 'Anton<br> Klimenko',
    ],
    'description' => [
      'ru' => 'Бизнесмен, политик,<br> венчурный инвестор,<br> филантроп',
      'uk' => 'Бізнесмен, політик,<br> венчурний інвестор,<br> філантроп',
      'en' => 'Businessman, politician,<br> venture investor<br> and philanthropist',
    ],
  ];

  /*** Modal translations ***/
  $languages['modal'] = [
    'text' => [
      'ru' => [
        'В&nbsp;начале&nbsp;2000-х мы&nbsp;посетили детское отделение туберкулезной больницы. И&nbsp;ужаснулись. Ребята лечились там&nbsp;годами, спали на&nbsp;сбившихся в&nbsp;комки подушках и&nbsp;матрасах. В&nbsp;палатах было темно и&nbsp;сыро. Не&nbsp;задумываясь мы&nbsp;организовали небольшой ремонт, купили новое постельные бельё и&nbsp;лампочки. Но&nbsp;детей это&nbsp;мало&nbsp;порадовало…',
         'Тогда работница больницы дала нам&nbsp;совет: «Одеяла и&nbsp;подушки – это&nbsp;хорошо, но&nbsp;детям нужен праздник!». Мы&nbsp;прислушались к&nbsp;её&nbsp;словам. Стали регулярно организовывать день именинника, со&nbsp;сладостями, воздушными шарами, конкурсами и&nbsp;подарками. Фотографии с&nbsp;этих замечательных дней рождений мы&nbsp;храним до&nbsp;сих&nbsp;пор. Так&nbsp;и&nbsp;началась наша благотворительная деятельность.',
         'Мы&nbsp;помогаем совсем маленьким детям до&nbsp;трёх&nbsp;лет — отказникам, часто тяжело больным. Ребятам постарше содействуем в&nbsp;преодолении серьезных недугов. Сегодня счёт таких детей идет уже&nbsp;на&nbsp;сотни.',
         'Наш&nbsp;фонд оказывает благотворительную помощь всем нуждающимся независимо от&nbsp;национальности, гражданства и&nbsp;социального положения.'
      ],
      'uk' => [
        'На&nbsp;початку&nbsp;2000-х ми&nbsp;відвідали дитяче відділення туберкульозної лікарні. Це&nbsp;було сумне видовище. Діти лікувалися там&nbsp;роками, спали на&nbsp;старих подушках і&nbsp;матрацах. В&nbsp;палатах було темно й&nbsp;сиро. Не&nbsp;замислюючись ми&nbsp;зробили невеликий ремонт, купили нову постільну білизну й&nbsp;лампочки. Але&nbsp;дітей це&nbsp;мало&nbsp;порадувало…',
         'Тоді працівниця лікарні дала нам&nbsp;пораду: «Ковдри і&nbsp;подушки — це&nbsp;добре, але&nbsp;ж&nbsp;дітям потрібне свято!». Ми&nbsp;прислухалися до&nbsp;її&nbsp;слів. Стали організовувати день іменинника з&nbsp;солодощами, повітряними кульками, конкурсами і&nbsp;подарунками. Фотографії з&nbsp;тих чудових днів народжень зберігаємо й&nbsp;досі. Так&nbsp;і&nbsp;почалася наша благодійна діяльність.',
         'Ми&nbsp;допомагаємо малечі до&nbsp;трьох років, від&nbsp;яких відмовилися батьки, часто важко хворим. Дорослішим дітям допомагаємо в&nbsp;подоланні серйозних хвороб. Сьогодні рахунок таких дітей йде&nbsp;вже на&nbsp;сотні.',
         'Сьогодні наш&nbsp;фонд надає благодійну допомогу всім нужденним незалежно від&nbsp;національності, громадянства та&nbsp;соціального становища.'
      ],
      'en' => [
        "In&nbsp;the&nbsp;early 2000s, we&nbsp;visited the&nbsp;children's tuberculosis hospital. We&nbsp;were horrified. The&nbsp;children were&nbsp;treated there for&nbsp;years, slept on&nbsp;old and&nbsp;inconvenient pillows and&nbsp;mattresses. It&nbsp;was dark and&nbsp;damp in&nbsp;hospital wards. Without hesitation we&nbsp;performed small repairs, bought some new&nbsp;bed linen and&nbsp;light&nbsp;bulbs. But&nbsp;this brought little joy to&nbsp;the&nbsp;children...",
        'Then the&nbsp;nurse of&nbsp;the&nbsp;hospital gave us&nbsp;an&nbsp;advice: "Blankets and&nbsp;pillows are&nbsp;good, but&nbsp;children need a&nbsp;holiday!". We&nbsp;listened to&nbsp;her&nbsp;words and&nbsp;came&nbsp;up with&nbsp;organizing birthday parties on&nbsp;a&nbsp;regular&nbsp;basis, with candies, balloons, сompetitions and&nbsp;gifts. We&nbsp;still keep pictures of&nbsp;these wonderful birthdays. This is&nbsp;how&nbsp;our charity work started.',
        'We&nbsp;help orphan children of&nbsp;up&nbsp;to three years&nbsp;old, often seriously&nbsp;ill. The older children are&nbsp;assisted in&nbsp;overcoming serious ailments. Today there are&nbsp;hundreds of&nbsp;such&nbsp;children.',
        'Our&nbsp;foundation renders charitable assistance to&nbsp;all&nbsp;those who&nbsp;need&nbsp;it, irrespective of&nbsp;nationality, citizenship and&nbsp;social&nbsp;status.'
      ],
    ],
  ];

?>