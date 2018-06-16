<?php

namespace App\Http\Services;

use Uploadcare\Api;

class UploadCare
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(
            config('services.uploadcare.key'),
            config('services.uploadcare.secret')
        );
    }

    public function api()
    {
        return $this->api;
    }
}
