<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       DatabaseManager
 */

namespace RazorMeister\Installer\Helpers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\BufferedOutput;

class SettingsManager
{
    /**
     * Check if .env file exists.
     *
     * @return bool
     */
    public function envFileExists()
    {
        return file_exists(base_path('.env')) ? true : false;
    }

    /**
     * Get data from .env file.
     *
     * @return array
     */
    public function getEnvInfo()
    {
        $result = [];
        $zones = config('installer.mainSettings');

        if ($this->envFileExists()) {
            if (session('file') && !session('setUpDbError')) {
                session()->forget('file');
            }
            if (session('file') && session('setUpDbError')) {
                session()->forget('setUpDbError');
            }

            foreach ($zones as $zoneKey => $zoneInfo) {
                foreach ($zoneInfo['elements'] as $elementKey => $elementInfo) {
                    $result[$elementInfo['envKey']] = getenv($elementInfo['envKey']);
                }
            }
        }

        return $result;
    }

    /**
     * Save data from form to .env file.
     *
     * @param array $data
     *
     * @return array
     */
    public function saveEnvInfo(array $data)
    {
        $toEnv = '';
        $zones = config('installer.mainSettings');

        foreach ($zones as $zoneKey => $zoneInfo) {
            foreach ($zoneInfo['elements'] as $elementKey => $elementInfo) {
                $toEnv .= $elementInfo['envKey'].'='.(strpos($data[$elementKey], ' ') !== false ? "'".$data[$elementKey]."'" : $data[$elementKey])."\n";
            }
        }

        try {
            file_put_contents(base_path('.env'), $toEnv);
        } catch (\Exception $e) {
            session(['file' => $toEnv]);

            return ['success' => false, 'error' => 'Cannot save .env file', 'createEnv' => true];
        }

        return ['success' => true];
    }

    /**
     * Run migrations and seeders.
     *
     * @return array
     */
    public function setUpDb()
    {
        $output = new BufferedOutput();

        try {
            DB::select('select * from migrations');
        } catch (\Exception $e) {
            if ($e->getCode() == 1045) { // Bad login or password
                session(['setUpDbError' => 1]);

                return ['success' => false, 'error' => $e->getMessage().trans('installer::lang.badPasses')];
            } elseif ($e->getCode() == 1049) { // Bad database
                session(['setUpDbError' => 1]);

                return ['success' => false, 'error' => $e->getMessage().trans('installer::lang.badDatabase')];
            }
        }

        try {
            Artisan::call('migrate', ['--force' => true], $output);
        } catch (\Exception $e) {
            Artisan::call('migrate:reset', ['--force' => true]);

            return ['success' => false, 'error' => $e->getMessage().trans('installer::lang.tryAgain')];
        }

        try {
            Artisan::call('db:seed', ['--force' => true], $output);
        } catch (\Exception $e) {
            Artisan::call('migrate:reset', ['--force' => true]);

            return ['success' => false, 'error' => $e->getMessage().trans('installer::lang.tryAgain')];
        }

        return ['success' => true, 'info' => $output->fetch()];
    }
}
