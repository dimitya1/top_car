<?php

return [
    'topcar' => 'TopCar',
    'layout' => [
        'footer' => [
            'promo' => 'автомобільний веб-сайт TopCar',
        ],
        'header' => [
            'languages_list' => [
                'uk' => 'ук',
                'ru' => 'ру',
                'en' => 'en',
            ],
            'menu_list' => [
              'about_us' => 'Про нас',
              'reviews' => 'Відгуки',
              'contacts' => 'Контакти',
              'for_developers' => 'Для розробників',
              'profile' => 'Ососбистий кабінет',
            ],
        ],
    ],
    'authorization' => [
        'login' => 'Логін',
        'log_in' => 'Увійти',
        'logout' => 'Вийти',
        'email' => 'Email',
        'password' => 'Пароль',
        'registration' => 'Реєстрація',
        'register' => 'Зареєструватися',
        'remember_me' => 'Запам`ятати мене',
        'show_email' => 'Показувати email іншим користувачам на сайті',
        'show_phone_number' => 'Показувати пароль іншим користувачам на сайті',
        'successful_login' => 'Успішний вхід',
        'successful_registration' => 'Реєстрація пройшла успішно',
        'successful_logout' => 'Ви успішно вийшли з системи',
        'fields' => [
            'name' => "ім’я",
            'email' => 'email',
            'show_email' => 'показувати e-mail',
            'password' => 'пароль',
            'phone_number' => 'номер телефону',
            'show_phone_number' => 'показувати телефон',
            'remember_in_system' => 'запам’ятати в системі',
        ]
    ],
    'alerts' => [
        'warning' => 'Важливо',
        'info' => 'Увага',
        'danger' => 'Помилка',
        'success' => 'Успіх',
    ],
    'contacts' => [
        'city' => config('topcar.contacts.uk.city') . ',',
        'street' => ' ' . config('topcar.contacts.uk.street'),
        'tel' => config('topcar.contacts.uk.tel'),
        'email' => config('topcar.contacts.uk.email'),
        'facebook_text' => 'Наша сторінка в фейсбуці',
        'wanna_help' => 'Ми б хотіли Вам допомогти',
        'contact_form' => [
            'name' => "Ім'я",
            'message' => "Повідомлення",
            'help' => "як вам відповісти?",
            'phone_number' => "Номер телефона",
            'email' => "Чи email",
            'send_request' => "Надіслати запит",
        ],
    ],
    'about' => [
        'cares_about_clients' => '- сервіс, який “думає” про клієнтів',
        'benefits' => 'Для Вашої зручності, ми надали можливість створювати власні облікові записи, через які Ви
                    можете спілкуватись з іншими користувачами, додавати відгуки про автомобілі та фото. Для зручності
                    пошуку певного автомобіля ми створили фільтрацію пошуку',
        'best_ratings' => 'Наші користувачі мають можливість користуватися зручним інтерфейсом, переглядати відгуки.
                    Також Ви можете переглянути ТОП автомобілів, про які найкраще відзиваються клієнти даного
                    сервісу.',
        'without_registration' => 'Навіть, якщо Ви не бажаєте реєструватись - для вас доступні наступні функції:',
        'without_registration_list' => [
            'view_reviews' => 'перегляд відгуків;',
            'view_best_card' => 'перегляд ТОП автомобілів;',
            'creating_review' => 'написання відгуку.',
        ],
        'advertisement' => 'Для власників автомобільних салонів у нас є пропозиція міні-реклами. Тобто ви можете
                    запропонувати нам дякі моделі авто, які будуть публікуватися в списку відгуків вище інших та
                    будуть винесені у спеціальний слайдер на певних сторінках сайту.',
    ],
    'userpage' => [
        'congrats_personal_page' => 'Вітаємо у Вашій персональній сторінці!',
        'here_you_can' => 'Тут Ви можете:',
        'u_can_list' => [
            'see_own_reviews' => 'переглянути власні відгуки;',
            'create_own_review' => 'написати новий відгук;',
            'view_replies' => 'подивитися відповіді на ваші відгуки та кометарі;',
            'edit_personal_data' => 'редагувати власні дані;',
            'offer_devs_coop' => 'запропонувати розробникам співпрацю.',
            'offer_coop' => 'запропонувати співпрацю.',
        ],
        'change_photo' => 'Змінити фото',
        'send' => 'Надіслати',
        'change_email' => 'Змінити email',
        'change_phone' => 'Змінити телефон',
        'show_email' => 'показувати email',
        'show_phone' => 'показувати телефон',
        'save_changes' => 'Зберегти зміни',
    ],
    'review' => [
        'created' => 'Створений',
        'anonymous_review' => 'Відгук створено анонімно',
        'filter_own' => 'Відфільтрувати тільки власні відгуки',
        'fuel_type' => 'Тип палива: ',
        'engine' => 'Двигун: ',
        'power' => 'Потужність, к. с.: ',
        'consumption_city' => 'Витрата палива, місто: ',
        'consumption_highway' => 'Витрата палива, шосе: ',
        'fuel_types_list' => [
          'petrol'  => 'бензин',
          'diesel'  => 'дизель',
          'gas'  => 'газ',
          'electric'  => 'електричка',
          'hybrid'  => 'гибрид',
          'other'  => 'інше',
        ],
    ],
    'yes_no' => [
        'Так',
        'Ні',
    ],
    'admin' => [
        'administrator' => [
            'index' => 'Адміністрування адмінів',
          'name' => "Ім'я",
          'email' => "Email",
          'phone_number' => "Моюільний номер",
          'password' => "Пароль",
        ],
        'user' => [
            'index' => 'Користувачі',
        ],
        'car_model' => [
            'index' => 'Моделі авто',
        ],
        'review' => [
            'index' => 'Відгуки',
        ],
        'users' => [
            'index' => 'Користувачі',
        ],
    ]
];
