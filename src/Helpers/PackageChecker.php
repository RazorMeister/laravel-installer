<?php
/**
 * @author     Tymoteusz `RazorMeister` Bartnik
 * @file       PackageChecker
 */

namespace RazorMeister\Installer\Helpers;

class PackageChecker
{
    /**
     * Check PHP version.
     *
     * @param $minVersion
     *
     * @return array
     */
    public function checkPhpVersion($minVersion)
    {
        return ['current' => PHP_VERSION, 'min' => $minVersion, 'isOk' => version_compare(PHP_VERSION, $minVersion, '>=')];
    }

    /**
     * Check required packages.
     *
     * @param array $packages
     *
     * @return array
     */
    public function checkPackages(array $packages)
    {
        $result = [];
        $allOk = true;

        if (!empty($packages['php'])) {
            foreach ($packages['php'] as $package) {
                if (extension_loaded($package)) {
                    $result['php-'.$package] = true;
                } else {
                    $result['php-'.$package] = false;
                    $allOk = false;
                }
            }
        }

        if (!empty($packages['apache']) && function_exists('apache_get_modules')) {
            foreach ($packages['apache'] as $package) {
                if (in_array($package, apache_get_modules())) {
                    $result['apache-'.$package] = true;
                } else {
                    $result['apache-'.$package] = false;
                    $allOk = false;
                }
            }
        }

        return ['packages' => $result, 'allOk' => $allOk];
    }
}
