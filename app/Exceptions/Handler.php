<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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

        if ($exception instanceof SystemException) {
            return response()->json(['errors' => $exception->getMessage()], $exception->getStatusCode());
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['errors' => 'Method Not Allowed'], $exception->getStatusCode());
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['errors' => 'Not Found'], $exception->getStatusCode());
        }

        if ($exception instanceof ValidationException) {
            foreach ((array)$exception->errors() as $error) {
                return response()->json(['errors' => array_get($error, 0, '')], $exception->status);
            }
        }
        if ($exception instanceof HttpException) {
            return response()->json(['errors' => $exception->getMessage()], $exception->getStatusCode());
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json(['errors' => 'Unauthorized'], $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }
}
