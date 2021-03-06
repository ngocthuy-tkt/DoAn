<?php

namespace App\Exceptions;

use Exception;
use http\Exception\BadMethodCallException;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @param  \Exception $exception
     * @return void
     * @throws Exception
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
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException)
        {
            // bị lỗi ở admin
            if ($request->is('admin/*')) {
                return response()->view('backend.layout.404');
            }
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            // bị lỗi ở admin
            if ($request->is('admin/*')) {
                return response()->view('backend.layout.404');
            }
        }
        // báo lỗi không tồn tại phương thức
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            // bị lỗi ở admin
            if ($request->is('admin/*')) {
                return response()->view('backend.layout.404');
            }
        }
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'],401);
        }
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
            case 'admin': $login = 'admin.login';
                break;
            default: $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }
}
