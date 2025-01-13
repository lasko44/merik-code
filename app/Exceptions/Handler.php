<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Prepare exception for rendering.
     *
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): JsonResponse|Response
    {

        $response = parent::render($request, $e);

        if(in_array($response->status(),[500, 503, 403, 404])){
            return Inertia::render('Error', ['status' => $response->status(), 'user' => Auth::user(), 'error'])
                ->toResponse($request)
                ->setStatusCode($response->status());
        }
        return Redirect::back();
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
