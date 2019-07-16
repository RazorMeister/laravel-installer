<?php

namespace RazorMeister\Installer\Middleware;

use Closure;
use RazorMeister\Installer\Helpers\PackageChecker;

class CheckPackages
{
    private $packageChecker;

    /**
     * CheckPackages constructor.
     *
     * @param PackageChecker $packageChecker
     */
    public function __construct(PackageChecker $packageChecker)
    {
        $this->packageChecker = $packageChecker;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $phpVerInfo = $this->packageChecker->checkPhpVersion(config('installer.minPhpVersion'));
        $packagesInfo = $this->packageChecker->checkPackages(config('installer.requiredPackages'));

        if ($phpVerInfo['isOk'] && $packagesInfo['allOk']) {
            return $next($request);
        } else {
            return redirect(route('installer.packages'))->with('error', trans('installer::lang.checkPackages'));
        }
    }
}
