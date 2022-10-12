<?php

namespace App\Http\Controllers\Dash_Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dash_Admin\Auth\AuthRequest;
use Exception;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if (! $token = auth('auth:api_admin')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);
        } catch (Exception $ex) {
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('auth:api_admin')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // logout admin
        auth('auth:api_admin')->logout();
        // response successfully
        return response()->success('Successfully logged out', Response::HTTP_OK);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('auth:api_admin')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('auth:api_admin')->factory()->getTTL() * 60
        ]);
    }

    /**
     * change_password
     *
     * @return void
     */
    public function change_password()
    {
        # code...
    }
}
