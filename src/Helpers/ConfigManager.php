<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       ConfigManager
 */

namespace RazorMeister\Installer\Helpers;

class ConfigManager
{
    /**
     * Get validation rules for account page from config
     *
     * @return array
     */
    public function getAccountRules()
    {
        $rules = [];

        foreach (config('installer.account.fields') as $key => $info)
            $rules[$key] = $info['rules'];

        return $rules;
    }

    /**
     * Get validation rules for mainSettings page from config
     *
     * @return array
     */
    public function getMainSettingsRules()
    {
        $rules = [];

        foreach (config('installer.mainSettings') as $zoneKey => $zoneInfo)
            foreach ($zoneInfo['elements'] as $key => $info)
                $rules[$key] = $info['rules'];

        return $rules;
    }
}