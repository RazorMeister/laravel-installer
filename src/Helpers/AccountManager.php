<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       AccountManager
 */

namespace RazorMeister\Installer\Helpers;

use App\User;

class AccountManager
{
    /**
     * Create new user.
     *
     * @param array $data
     *
     * @return User
     */
    public function createAccount(array $data)
    {
        $user = new User();
        $cfg = config('installer.account');

        foreach ($cfg['fields'] as $key => $info) {
            if ($key == 'password') {
                $data[$key] = bcrypt($data[$key]);
            }
            $user->$key = $data[$key];
        }

        foreach ($cfg['defaults'] as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        foreach ($cfg['attach'] as $name => $id) {
            $user->$name()->attach($id);
        }

        return $user;
    }

    /**
     * Get first user model.
     *
     * @return mixed
     */
    public function getFirstUser()
    {
        return User::get()->first();
    }

    /**
     * Check if user is in database.
     *
     * @return bool
     */
    public function isUserInDb()
    {
        return (count(User::all()) > 0) ? true : false;
    }
}
