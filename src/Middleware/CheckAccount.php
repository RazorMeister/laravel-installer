<?php

namespace RazorMeister\Installer\Middleware;

use Closure;
use RazorMeister\Installer\Helpers\AccountManager;

class CheckAccount
{
    private $accountManager;

    /**
     * CheckAccount constructor
     *
     * @param AccountManager $accountManager
     */
    public function __construct(AccountManager $accountManager)
    {
        $this->accountManager = $accountManager;
    }

    /**
     * Handle an incoming request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->accountManager->isUserInDb())
            return $next($request);
        else
            return redirect(route('installer.account'))->with('error', 'Najpier załóż konto!');
    }
}
