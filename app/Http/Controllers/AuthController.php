<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    } */

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     path="/auth/login",
     *     @OA\Response(response="200", description="Respond with access token,expiration date"),
     *     @OA\Response(response="401", description="Unathorized")
     *     @OA\Response(response="403", description="Forbidden")
     * ),
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     path="/auth/logout",
     *     @OA\Response(response="200", description="Log the user out"),
     *     @OA\Response(response="403", description="Unathorized")
     * ),
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     path="/auth/refresh",
     *     @OA\Response(response="200", description="Respond with refreshed token"),
     *     @OA\Response(response="403", description="Unathorized")
     * ),
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * User register
     *
     * @param Symfony\Component\HttpFoundation\Request
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     *
     * @OA\Post(
     *     path="/auth/register",
     *     @OA\Response(response="200", description="Creates a new user via given credentials"),
     *     @OA\Response(response="500", description="Returns when there is an error creating the user in database(e.g when user with unique email already exists)"),
     * ),
     */
    public function register(Request $request)
    {
        return new JsonResponse(User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'name' => $request->input('name'),
        ]));
    }
}

