<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('visitor_id')) {
            $visitorId = Str::uuid();

            $request->session()->put('visitor_id', $visitorId);
        } else {
            $visitorId = $request->session()->get('visitor_id');
        }

        $visitorExists = DB::table('visitor_tracking')
            ->where('visitor_id', $visitorId)
            ->exists();
        if ($visitorExists) {
            return $next($request);
        }
        $campaign = $request->route('campaign');

        if (is_array($campaign) || is_object($campaign)) {
            $campaignId = $campaign['id'] ?? $campaign->id ?? null;
        } else {
            $campaignId = $campaign;
        }
        $userAgent = $request->header('User-Agent');
        $browser = $this->getBrowserFromUserAgent($userAgent);
        $os = $this->getOSFromUserAgent($userAgent);
        $device = $this->getDeviceFromUserAgent($userAgent);

        DB::table('visitor_tracking')->insert([
            'visitor_id' => $visitorId,
            'cc_id' => 0,
            'campaing_id' => $campaignId,
            'ref_name' => $request->header('Referer') ?? null,
            'ip' => $request->ip(),
            'page_link' => $request->url(),
            'ref_link' => $request->header('Referer') ?? null,
            'query_string' => $request->getQueryString() ?? null,
            'user_agent' => $userAgent,
            'browser' => $browser,
            'os' => $os,
            'device' => $device,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }

    /**
     * Get the browser name from the User-Agent string.
     *
     * @param string $userAgent
     * @return string|null
     */
    private function getBrowserFromUserAgent($userAgent)
    {
        if (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
            return 'Internet Explorer';
        }

        return 'Unknown';
    }

    /**
     * Get the operating system from the User-Agent string.
     *
     * @param string $userAgent
     * @return string|null
     */
    private function getOSFromUserAgent($userAgent)
    {
        if (strpos($userAgent, 'Windows NT') !== false) {
            return 'Windows';
        } elseif (strpos($userAgent, 'Mac OS X') !== false) {
            return 'MacOS';
        } elseif (strpos($userAgent, 'Linux') !== false) {
            return 'Linux';
        }

        return 'Unknown';
    }

    /**
     * Get the device type from the User-Agent string.
     *
     * @param string $userAgent
     * @return string|null
     */
    private function getDeviceFromUserAgent($userAgent)
    {

        if (strpos($userAgent, 'Mobile') !== false) {
            return 'Mobile';
        } elseif (strpos($userAgent, 'Tablet') !== false) {
            return 'Tablet';
        }

        return 'Desktop';
    }
}
