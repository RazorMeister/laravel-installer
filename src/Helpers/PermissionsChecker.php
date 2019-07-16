<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       PermissionsChecker
 */

namespace RazorMeister\Installer\Helpers;

class PermissionsChecker
{
    /**
     * Check if files and folders have needed permissions.
     *
     * @param array $perms
     *
     * @return array
     */
    public function checkPermission(array $perms)
    {
        $result = [];
        $allOk = true;

        foreach ($perms as $folder => $neededPerms) {
            $currentPerm = substr(decoct(fileperms(base_path($folder))), -3);
            $isOk = $currentPerm >= $neededPerms ? 1 : 0;
            if (!$isOk) {
                $allOk = false;
            }
            $result[$folder] = ['needed' => $neededPerms, 'current' => $currentPerm, 'isOk' => $isOk];
        }

        return ['perms' => $result, 'allOk' => $allOk];
    }
}
