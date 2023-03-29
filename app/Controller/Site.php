<?php

namespace Controller;

use Model\Subscriber;
use Model\Subunit;
use Model\Type_subunit;
use Model\Room;
use Model\Type_room;
use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Site
{
    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(Request $request): string
    {
        $subunits = Subunit::all();
        $rooms = Room::all();
        $subscribers = Subscriber::all();
        return (new View())->render('site.hello', ['subscribers'=>$subscribers, 'subunits'=>$subunits, 'rooms'=>$rooms]);
    }

    public function search()
    {
        $subunits = Subunit::query();

        if (isset($request['search'])) {
            $subunits = $subunits->where('title', 'like', '%'.$request['search'].'%');
        }
        return (new View())->render('site.search', ['subunits'=>$subunits]);
    }

    public function subscriber_add(Request $request): string
    {
        $subunits = Subunit::all();
        $rooms = Room::all();
        if ($request->method === 'POST' && Subscriber::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.subscriber_add', ['subunits'=>$subunits, 'rooms'=>$rooms]);

    }

    public function subscriber(Request $request): string
    {
        $subscribers = Subscriber::where('id', $request->id ?? 0)->get();
        $subunits = Subunit::all();
        $type_subunits = Type_subunit::all();
        $rooms = Room::all();
        $type_rooms = Type_room::all();
        return (new View())->render('site.subscriber', ['subscribers'=>$subscribers, 'subunits'=>$subunits, 'type_subunits'=>$type_subunits, 'rooms'=>$rooms, 'type_rooms'=>$type_rooms]);

    }


    public function users(): string
    {
        return new View('site.users', ['message' => 'Your profile : ']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required','language'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'avatar' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'language'=>'Имя должно содержать только кириллицу'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
                return false;
            }
            //загрузка аватара
            $request = app('request');
            if ($request->hasfile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();

                //Implement check here to create directory if not exist already

                Image::make($avatar)->resize(300, 300)->save(public_path('public/avatars/' . $filename));
            }

            return User::create([
                'avatar' => !empty($filename) ? $filename : 'default_avatar.png',
            ]);
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}
