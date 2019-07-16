<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       InfoFileChecker
 */

namespace RazorMeister\Installer\Helpers;

class InfoFileChecker
{
    /**
     * Check if installer info file exists.
     *
     * @return bool
     */
    public function isInstalled()
    {
        return file_exists(storage_path('installerInfo')) ? true : false;
    }

    /**
     * Save installer info file to storage directory.
     *
     * @return bool|int
     */
    public function saveFile()
    {
        return file_put_contents(storage_path('installerInfo'), 'Installed: '.date('d-m-Y H:i:s'));
    }
}
