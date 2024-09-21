<?php

use App\Helpers\ApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                if ($e instanceof AuthenticationException) {
                    return ApiResponse::error("Unauthorized", JsonResponse::HTTP_UNAUTHORIZED);
                } elseif ($e instanceof AuthorizationException) {
                    return ApiResponse::error("Forbidden", JsonResponse::HTTP_FORBIDDEN);
                } elseif ($e instanceof ValidationException) {
                    return ApiResponse::validationError($e->errors());
                } elseif ($e instanceof MethodNotAllowedHttpException || $e instanceof MethodNotAllowedException) {
                    return ApiResponse::error($e->getMessage(), JsonResponse::HTTP_METHOD_NOT_ALLOWED);
                } elseif ($e instanceof TokenExpiredException) {
                    return ApiResponse::error("JWT token is expired", JsonResponse::HTTP_UNAUTHORIZED);
                } elseif ($e instanceof TokenInvalidException) {
                    return ApiResponse::error("JWT token is invalid", JsonResponse::HTTP_UNAUTHORIZED);
                } elseif ($e instanceof JWTException) {
                    return ApiResponse::error($e->getMessage(), JsonResponse::HTTP_UNAUTHORIZED);
                } elseif ($e instanceof TooManyRequestsHttpException) {
                    return ApiResponse::error("Too many requests, please wait.", JsonResponse::HTTP_TOO_MANY_REQUESTS);
                } elseif ($e instanceof InternalErrorException) {
                    return ApiResponse::error($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
                } else {
                    return ApiResponse::error($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
            return null;
        });
    })->create();
