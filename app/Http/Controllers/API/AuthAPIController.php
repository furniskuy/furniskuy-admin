<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;

class AuthAPIController extends AppBaseController
{
    /**
     * @OA\Post(
     *     path="/auth/signup",
     *     tags={"Auth"},
     *     summary="Signup",
     *     description="Signup",
     *     operationId="signup",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Pass user credentials",
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string", example="Jonh Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="jonhdoe@mail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example="true"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *                 @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9"),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function signup(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->plainTextToken;

        return $this->sendResponse(['user' => $user, 'access_token' => $accessToken], 'User registered successfully.');
    }

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     tags={"Auth"},
     *     summary="Login",
     *     description="Login",
     *     operationId="login",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Pass user credentials",
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="jonhdoe@mail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example="true"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *                 @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9"),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!auth()->attempt($loginData)) {
            return $this->sendError('Invalid Credentials');
        }

        $user = User::where('email', $request['email'])->first();

        if (!$user) {
            return $this->sendError('User not found');
        }

        $accessToken = $user->createToken('authToken')->plainTextToken;

        return $this->sendResponse(['user' => $user, 'access_token' => $accessToken], 'User login successfully.');
    }

    /**
     * @OA\Get(
     *     path="/auth/user",
     *     tags={"Auth"},
     *     summary="Get user",
     *     description="Get user",
     *     operationId="user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example="true"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function user(Request $request)
    {
        return $this->sendResponse($request->user(), 'User retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/auth/logout",
     *     tags={"Auth"},
     *     summary="Logout",
     *     description="Logout",
     *     operationId="logout",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example="true"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->sendResponse([], 'User logged out successfully.');
    }

    // create Pembeli for user and if it already exist update it
    public function profile(Request $request)
    {
        $user = $request->user();
        $input = $request->all();
        unset($input['email']);

        if (!!$user->profile) {
            $user->profile()->update($input);
        } else {
            $user->profile()->create($input);
        }

        $user->refresh();

        return $this->sendResponse($user, 'Profile updated successfully.');
    }
}
