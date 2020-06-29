<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.' . '404', [], 404);
            }

            if ($exception->getStatusCode() == 400) {
                return response()->view('errors.' . '400', [], 400);
            }

            if ($exception->getStatusCode() == 401) {
                return response()->view('errors.' . '401', [], 401);
            }

            if ($exception->getStatusCode() == 403) {
                return response()->view('errors.' . '403', [], 403);
            }

            if ($exception->getStatusCode() == 500) {
                return response()->view('errors.' . '500', [], 500);
            }

            if ($exception->getStatusCode() == 503) {
                return response()->view('errors.' . '503', [], 503);
            }
        }
        return parent::render($request, $exception);
    }
}
