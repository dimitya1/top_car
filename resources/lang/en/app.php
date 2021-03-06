<?php

return [
    'topcar'        => 'TopCar',
    'layout'        => [
        'footer' => [
            'promo' => 'all about cars website TopCar',
        ],
        'header' => [
            'languages_list' => [
                'uk' => 'ук',
                'ru' => 'ру',
                'en' => 'en',
            ],
            'menu_list'      => [
                'about_us'       => 'About us',
                'reviews'        => 'Reviews',
                'contacts'       => 'Contacts/Cooperation',
                'for_developers' => 'For developers',
                'profile'        => 'Personal account',
                'admin'          => [
                    'users'         => 'Users',
                    'reviews'       => 'Reviews',
                    'admins'        => 'Administrators',
                    'feedback'      => 'Feedback',
                    'activity_logs' => 'DB logs',
                ],
            ],
        ],
    ],
    'home'          => [
        'best_reviews_service' => ' - best car reviews service',
        'reviews_service'      => 'TopCar - car reviews service',
        'we_offer'             => 'We offer our customers:',
        'portfolio'            => 'portfolio of different cars',
        'hundreds_of_reviews'  => 'hundreds of reviews of different models',
        'ability_to_filter'    => 'ability to filter by specific car',
        'view_recommended'     => 'view recommended brands and models',
        'create_account'       => 'create own personal account',
        'integrate_api'        => 'use integration with our service',
    ],
    'authorization' => [
        'login'                   => 'login',
        'log_in'                  => 'Log in',
        'logout'                  => 'Logout',
        'email'                   => 'Email',
        'password'                => 'Password',
        'registration'            => 'Registration',
        'register'                => 'Register',
        'remember_me'             => 'Remember me',
        'show_email'              => 'Show email to other users on website',
        'show_phone_number'       => 'Show phone number to other users on website',
        'successful_login'        => 'Successful login',
        'successful_registration' => 'Successful registration',
        'successful_logout'       => 'Successful logout',
        'fields'                  => [
            'name'               => "name",
            'email'              => 'email',
            'show_email'         => 'show email',
            'password'           => 'password',
            'phone_number'       => 'phone number',
            'show_phone_number'  => 'show phone number',
            'remember_in_system' => 'remember me in system',
        ],
    ],
    'alerts'        => [
        'warning' => 'Warning',
        'info'    => 'Info',
        'danger'  => 'Mistake',
        'success' => 'Success',
    ],
    'actions'       => [
        'edit'   => 'Edit',
        'delete' => 'Delete',
        'create' => 'Create',
        'clear'  => 'Clear',
    ],
    'contacts'      => [
        'city'          => config('topcar.contacts.uk.city').',',
        'street'        => ' '.config('topcar.contacts.uk.street'),
        'tel'           => config('topcar.contacts.uk.tel'),
        'email'         => config('topcar.contacts.uk.email'),
        'facebook_text' => 'Our page on Facebook',
        'wanna_help'    => 'We would like to help you',
        'contact_form'  => [
            'name'         => "Name",
            'message'      => "Message",
            'help'         => "How can we help you?",
            'phone_number' => "Phone number",
            'email'        => "Or email",
            'send_request' => "Send",
        ],
    ],
    'about'         => [
        'cares_about_clients'       => '- service, which “thinks” about clients',
        'benefits'                  => 'Для Вашої зручності, ми надали можливість створювати власні облікові записи, через які Ви
                    можете спілкуватись з іншими користувачами, додавати відгуки про автомобілі та фото. Для зручності
                    пошуку певного автомобіля ми створили фільтрацію пошуку',
        'best_ratings'              => 'Наші користувачі мають можливість користуватися зручним інтерфейсом, переглядати відгуки.
                    Також Ви можете переглянути ТОП автомобілів, про які найкраще відзиваються клієнти даного
                    сервісу.',
        'without_registration'      => 'Навіть, якщо Ви не бажаєте реєструватись - для вас доступні наступні функції:',
        'without_registration_list' => [
            'view_reviews'    => 'view reviews;',
            'view_best_card'  => 'View best cars;',
            'creating_review' => 'creating review',
        ],
        'advertisement'             => 'Для власників автомобільних салонів у нас є пропозиція міні-реклами. Тобто ви можете
                    запропонувати нам дякі моделі авто, які будуть публікуватися в списку відгуків вище інших та
                    будуть винесені у спеціальний слайдер на певних сторінках сайту.',
        'for_developers' => "Для розробників ми підготували інтегрцію, що дозволяє отримувати відгуки,
                    фільтрувати їх та створювати нові. Для отримання доступу попередньо зв'яжіться з нами.",
    ],
    'userpage'      => [
        'congrats_personal_page' => 'Welcome to your personal page!',
        'here_you_can'           => 'Here you can:',
        'u_can_list'             => [
            'see_own_reviews'    => 'see own reviews;',
            'create_own_review'  => 'create own review;',
            'view_replies'       => 'view reactions;',
            'edit_personal_data' => 'edit personal data;',
            'offer_devs_coop'    => 'offer developers cooperation.',
            'offer_coop'         => 'offer cooperation.',
        ],
        'change_photo'           => 'Change photo',
        'send'                   => 'Send',
        'change_email'           => 'Change email',
        'change_phone'           => 'Change phone',
        'show_email'             => 'show email',
        'show_phone'             => 'show phone',
        'save_changes'           => 'Save changes',
    ],
    'review'        => [
        'created'             => 'Created',
        'anonymous_review'    => 'Review created anonymously',
        'filter_own'          => 'Filter only own reviews',
        'fuel_type'           => 'Fuel type: ',
        'engine'              => 'Engine: ',
        'power'               => 'Power, Hp: ',
        'consumption_city'    => 'Fuel consumption, city: ',
        'consumption_highway' => 'Fuel consumption, highway: ',
        'fuel_types_list'     => [
            'petrol'   => 'petrol',
            'diesel'   => 'diesel',
            'gas'      => 'gas',
            'electric' => 'electric',
            'hybrid'   => 'hybrid',
            'other'    => 'other',
        ],
    ],
    'contact_us'    => [
        'creator_name'         => "Name",
        'creator_email'        => 'Email',
        'creator_phone_number' => 'Phone number',
        'message'              => 'Message',
    ],
    'car_model'     => [
        'name' => 'Car model',
    ],
    'car_brand'     => [
        'name' => 'Car brand',
    ],
    'admin'         => [
        'user'          => [
            'title'               => 'User',
            'index'               => 'Users',
            'name'                => "Name",
            'email'               => 'Email',
            'phone_number'        => 'Phone number',
            'show_email'          => 'Show email',
            'show_phone_number'   => 'Show phone number',
            'new_password'        => 'Create new password if you need',
            'can_access_api'      => 'Has access to API',
            'avatar'              => 'Avatar',
            'new_avatar'          => 'Create new avatar if you need',
            'select_file'         => 'Click to choose a file',
            'save'                => 'Store on the website',
            'created'             => 'Created',
            'updated'             => 'Updated',
            'edit'                => 'Edit user',
            'delete'              => 'Delete user',
            'clear_authorisation' => 'Clear authorisation data',
        ],
        'administrator'          => [
            'title'               => 'Administration',
            'index'               => 'Administrations',
            'password'            => "Password",
            'name'                => "Name",
            'email'               => 'Email',
            'phone_number'        => 'Phone number',
            'new_password'        => 'Create new password if you need',
            'can_access_api'      => 'Has access to API',
            'avatar'              => 'Avatar',
            'new_avatar'          => 'Create new avatar if you need',
            'select_file'         => 'Click to select a file',
            'save'                => 'Store on the website',
            'created'             => 'Created',
            'updated'             => 'Updated',
            'edit'                => 'Edit user',
            'delete'              => 'Delete user',
        ],
        'car_model'     => [
            'index' => 'Car models',
        ],
        'review'        => [
            'index' => 'Reviews',
        ],
        'users'         => [
            'index' => 'Users',
        ],
        'feedback'      => [
            'created_by'                    => 'Who created',
            'handled_by'                    => 'Who handled',
            'message'                       => 'Message',
            'creator_name'                  => "Author's name",
            'creator_email'                 => "Author's email",
            'creator_phone_number'          => "Author's phone number",
            'is_handled'                    => 'Is handled',
            'created_without_authorisation' => 'Created by unauthorised user',
            'not_handled_yet'               => 'Not handled yet',
            'administrator'                 => 'Administrator',
        ],
        'activity_log'  => [
            'view_changes'     => 'View changes',
            'section'          => 'Section',
            'action'           => 'Action',
            'causer'           => 'Who is causer',
            'properties'       => 'Properties',
            'subject'          => 'What was changed',
            'date'             => 'Date',
            'created_non_auth' => 'Created by non-authorised user',
        ],
    ],
    'yes_no'        => [
        'No',
        'Yes',
    ],
    'created_at'    => 'created',
];
