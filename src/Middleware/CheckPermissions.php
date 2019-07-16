<?php

namespace RazorMeister\Installer\Middleware;

use Closure;
use RazorMeister\Installer\Helpers\PermissionsChecker;

class CheckPermissions
{
    private $permissionsChecker;

    /**
     * CheckPermissions constructor.
     *
     * @param PermissionsChecker $permissionsChecker
     */
    public function __construct(PermissionsChecker $permissionsChecker)
    {
        $this->permissionsChecker = $permissionsChecker;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permsInfo = $this->permissionsChecker->checkPermission(config('installer.neededPermissions'));

        if ($permsInfo['allOk']) {
            return $next($request);
        } else {
            return redirect(route('installer.permissions'))->with('error', trans('installer::lang.checkPermissions'));
        }
    }
}
