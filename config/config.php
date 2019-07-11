<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       config.php
 */

return [
    /*
     |--------------------------------------------------------------------------
     | Packages settings
     |--------------------------------------------------------------------------
     |
     |  MinPhpVersion => 'Minimal Needed Php Version'.
     |  RequiredPackages: here you can type packages witch your
     |  app is requiring.
     |
     */
    'minPhpVersion' => '7.0.0',
    'requiredPackages' => [
        'php' => [
            'openssl',
            'pdo',
            'mbstring',
            'JSON',
            'curl'
        ],
        'apache' => [
            'rewrite',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Permissions settings
     |--------------------------------------------------------------------------
     |
     |  Set needed permissions to folders and files.
     |
     */
    'neededPermissions' => [
        'storage/framework/' => 777,
        'storage/logs/' => 775,
        'bootstrap/cache/' => 775
    ],

    /*
     |--------------------------------------------------------------------------
     | Main settings
     |--------------------------------------------------------------------------
     |
     |  These settings are saved to .env files.
     |  Down below you can specify what settings you want to save.
     |
     */
    'mainSettings' => [
        'app' => [                                          // Zone id
            'description' => 'Ustawienia aplikacji',        // Zone description
            'elements' => [
                'app-name' => [                             // Input name ane id attribute
                    'description' => 'Nazwa aplikacji',     // Input label
                    'envKey' => 'APP_NAME',                 // Key in .env file
                    'rules' => 'required|string|max:30',    // Laravel validation rules
                    'inputType' => 'text',                  // Input type text | number | email | select
                    'placeholder' => 'Laravel APP',         // Placeholder in input
                ],
                'app-url' => [
                    'description' => 'Domena aplikacji',
                    'envKey' => 'APP_URL',
                    'rules' => 'required|url|max:30',
                    'inputType' => 'text',
                    'placeholder' => 'http://laravelApp.com',
                ],
                'app-debug' => [
                    'description' => 'Wypisywanie błędów',
                    'envKey' => 'APP_DEBUG',
                    'rules' => 'required|boolean',
                    'inputType' => 'select',
                    'placeholder' => 'false',
                    'options' => [      // Set options to select input
                        'select' => [
                            // Value => Label
                            '0' => 'Nie',
                            '1' => 'Tak',
                        ],
                    ],
                ],
            ],
        ],
        'database' => [
            'description' => 'Ustawienia bazy danych',
            'elements' => [
                'db-connection' => [
                    'description' => 'Typ połączenia',
                    'envKey' => 'DB_CONNECTION',
                    'rules' => 'required|string|in:mysql,sqlite,pgsql,sqlsrv',
                    'inputType' => 'select',
                    'placeholder' => 'mysql',
                    'options' => [
                        'select' => [
                            'mysql' => 'Mysql',
                            'sqlite' => 'SqlLite',
                            'pgsql' => 'Postgre Sql',
                            'sqlsrv' => 'Sql Server',
                        ],
                    ],
                ],
                'db-host' => [
                    'description' => 'Adres bazy danych',
                    'envKey' => 'DB_HOST',
                    'rules' => 'required|ip|max:30',
                    'inputType' => 'text',
                    'placeholder' => '127.0.0.1',
                ],
                'db-name' => [
                    'description' => 'Nazwa bazy danych',
                    'envKey' => 'DB_DATABASE',
                    'rules' => 'required|string|max:30',
                    'inputType' => 'text',
                    'placeholder' => 'Database',
                ],
                'db-login' => [
                    'description' => 'Login do bazy',
                    'envKey' => 'DB_USERNAME',
                    'rules' => 'required|string|max:30',
                    'inputType' => 'text',
                    'placeholder' => 'root',
                ],
                'db-password' => [
                    'description' => 'Hasło do bazy',
                    'envKey' => 'DB_PASSWORD',
                    'rules' => 'required|string|max:30',
                    'inputType' => 'text',
                    'placeholder' => 'password123',
                ],
                'db-port' => [
                    'description' => 'Port bazy danych',
                    'envKey' => 'DB_PORT',
                    'rules' => 'required|numeric',
                    'inputType' => 'number',
                    'placeholder' => '3306',
                ],
            ],
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Setting account
     |--------------------------------------------------------------------------
     |
     |  You can specify what fields you want to save.
     |  You can always specify default values to columns and attach new user to for example roles.
     |  Implicitly the new user is created in Users table.
     |
     */
    'account' => [
        'fields' => [
            'name' => [ // Column name in users table, it's also id and name attribute
                'description' => 'Imię',    // Label to input
                'placeholder' => 'John',    // Placeholder in input
                'inputType' => 'text',      // Input type: text | number | email | select
                'rules' => 'required|string|max:30' // Laravel validation rules
            ],
            'surname' => [
                'description' => 'Nazwisko',
                'placeholder' => 'Wick',
                'inputType' => 'text',
                'rules' => 'required|string|max:30'
            ],
            'email' => [
                'description' => 'Email',
                'placeholder' => 'John@wick.com',
                'inputType' => 'email',
                'rules' => 'required|email|max:30'
            ],
            'password' => [
                'description' => 'Hasło',
                'placeholder' => 'password123',
                'inputType' => 'text',
                'rules' => 'required|string|max:30'
            ],
        ],
        'defaults' => [
            // columnName => defaultValue
            'password_changed' => 1,
        ],
        'attach' => [
            // tableName => idToAttach
            'roles' => 1,
        ],
    ],
];
