<?php

namespace RazorMeister\Installer\Middleware;

use Closure;
use RazorMeister\Installer\Helpers\InfoFileChecker;

class CheckIfInstalled
{
    private $infoFileChecker;

    /**
     * CheckIfInstalled constructor.
     *
     * @param InfoFileChecker $infoFileChecker
     */
    public function __construct(InfoFileChecker $infoFileChecker)
    {
        $this->infoFileChecker = $infoFileChecker;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure                  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->infoFileChecker->isInstalled()) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
