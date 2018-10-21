<?php

namespace App\Traits\Auth;

use Illuminate\Support\Facades\Session;

trait HasUrl
{
    /**
     * Store url addresses into sessions.
     *
     * @param  string $previousUrl
     * @param  string $currentUrl
     * @return void
     */
    protected function storeSessionUrl($previousUrl, $currentUrl)
    {
        $previous = $this->getUrl($previousUrl);
        $current = $this->getUrl($currentUrl);

        Session::put('previous', $previous);
        Session::put('current', $current);
    }

    /**
     * Stored sessions url addresses are equal.
     *
     * @param string $session1
     * @param string $session2
     * @param string $default
     * @return  boolean
     */
    protected function SessionUrlsAreEqual($session1, $session2, $default = '/')
    {
        return $this->getSessionUrl($session1, $default) == $this->getSessionUrl($session2, $default);
    }

    /**
     * Get the url address;
     *
     * @param  string $url
     * @return string
     */
    protected function getUrl($url)
    {
        return str_replace(url('/'), '', $url);
    }

    /**
     * Get the url from the session.
     *
     * @param  string $name
     * @param  string $default
     * @return string
     */
    protected function getSessionUrl($name, $default = '/')
    {
        return Session::get($name, $default);
    }
}