<?php

namespace Controller;

use Model\Post;
use Src\Request;
use Src\View;

class Api
{
    public function index(): void
    {
        $posts = Post::all()->toArray();

        (new View())->toJSON($posts);
    }

    public function echo(Request $request): void
    {
         (new View())->toJSON($request->all());
    }
    public function login(Request $request): void
    {
        if (Auth::attemptApi($request->all())) {
            $api_token = User::where('username', $request->username)->first()['api_token'];
            (new View())->toJSON([$request->all(), 'your api_token' => $api_token]);
        }
        (new View())->toJSON([$request->all(), 'error' => 'invalid password or login']);
    }

    public function logout(Request $request): void
    {
        if (Auth::logoutApi()) {
            (new View())->toJSON(['message' => 'Success!']);
        }
        (new View())->toJSON(['message' => 'Non AUTH']);
    }
}
