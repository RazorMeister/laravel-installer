<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       installer translation
 */

return [
    /*
     *
     * Views/layout/main.blade.php
     *
     */
    'main' => [
        'title' => 'Laravel Instalator',
        'headerDesc' => 'Poniżej możesz zainstalować swoją aplikacje.',
        'start' => 'Start',
        'packages' => 'Pakiety',
        'permissions' => 'Permisje',
        'settings' => 'Ustawienia',
        'account' => 'Konto',
        'finish' => 'Koniec',
        'error' => 'Error',
        'success' => 'Sukces',
        'next' => 'Dalej',
        'refresh' => 'Odśwież',
        'save' => 'Zapisz',
        'createAccount' => 'Utwórz konto',
        'finish' => 'Zakończ',
        'copy' => 'Skopiuj',
    ],

    /*
     *
     * Views/start.blade.php
     *
     */
    'start' => [
        'header' => 'Start',
        'desc' => 'Witaj w kreatorze instalacji Laravel!',
        'info' => 'Kliknij poniższy przycisk, aby przystąpić do instalacji!'
    ],

    /*
    *
    * Views/packages.blade.php
    *
    */
    'packages' => [
        'header' => 'Pakiety',
        'desc' => 'Poniżej możesz zobaczyć status potrzebnych pakietów.',
        'phpVer' => 'Wersja PHP',
        'currentVer' => 'Obecna wersja',
        'minVer' => 'Minimalna wersja',
        'packetName' => 'Nazwa pakietu',
        'status' => 'Status',
    ],

    /*
    *
    * Views/permissions.blade.php
    *
    */
    'permissions' => [
        'header' => 'Permisje',
        'desc' => 'Poniżej możesz zobaczyć czy są nadane odpowiednie permisje.',
        'folder' => 'Katalog',
        'currentPerms' => 'Obecna prawa',
        'minPerms' => 'Wymagane prawa',
    ],

    /*
    *
    * Views/mainSettings.blade.php
    *
    */
    'mainSettings' => [
        'header' => 'Główne Ustawienia',
        'desc' => 'Poniżej skonfiguruj swoją aplikacje.',
        'createEnvManually' => 'Ręczne tworzenie pliku .env',
        'errorSavingEnv' => 'Niestety wystąpił błąd podczas tworzenia pliku .env. Utwórz go sam (.env) i wklej poniższą zawartość.',
    ],

    /*
    *
    * Views/account.blade.php
    *
    */
    'account' => [
        'header' => 'Konto',
        'desc' => 'Poniżej możesz ustawić dane logowania do panelu.',
    ],

    /*
    *
    * Views/finish.blade.php
    *
    */
    'finish' => [
        'header' => 'Koniec!',
        'desc' => 'Instalacja aplikacji dobiegła końca.',
        'thanks' => 'Dziękujemy za skorzystanie z Laravel Installatora by RazorMeister.',
        'time' => 'Czas Twojej instalacji wyniósł: ',
    ],

    /*
    *
    * Controllers/InstallerController.php
    *
    */
    'controller' => [
        'settingsSaved' => 'Ustawienia zostały zapisane',
        'alreadyInDb' => 'Użytkownik w bazie już istnieje',
        'accountCreated' => 'Konto zostało utworzone pomyślnie',
        'errorAccount' => 'Błąd przy tworzeniu konta',
        'setUpDb' => 'Baza danych została skonfigurowana'
    ],

    /*
    *
    * Middleware/CheckPackages.php
    *
    */
    'checkPackages' => 'Najpierw sprawdź pakiety',

    /*
    *
    * Middleware/CheckPermissions.php
    *
    */
    'checkPermissions' => 'Najpierw sprawdź permisje',

    /*
    *
    * Middleware/CheckSettings.php
    *
    */
    'checkSettings' => 'Najpierw skonfiguruj aplikację',

    /*
    *
    * Middleware/CheckAccount.php
    *
    */
    'checkAccount' => 'Najpier załóż konto!',
];
