<?php

namespace App\Services\Utilities\PDF;

use PDF;

class AppPDF
{
    /**
     * Generate a PDF document;
     *
     * @param  string $view
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public static function generate($view, array $data)
    {
        $pdf = PDF::loadView($view, $data)->stream();

        return $pdf;
    }
}