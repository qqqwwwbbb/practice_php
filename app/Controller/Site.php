<?php

namespace Controller;

use Model\Subscriber;
use Model\Subunit;
use Model\Type_subunit;
use Model\Room;
use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


class Site
{
    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        $sububits = Subunit::all();
        $rooms = Room::all();
        $subscribers = Subscriber::all();
        return (new View())->render('site.hello', ['subscribers'=>$subscribers, 'subunits'=>$sububits, 'rooms'=>$rooms]);
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
        return new View('site.users', ['message' => 'list of users:']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'avatar' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
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
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] != 4)
            {
                $filename = basename($_FILES['avatar']['name']);
                echo $filename;
                $rootPath=Settings::getRootPath();
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $rootPath.'/public/uploads/'.$filename);

            }
            User::create($request->all() + [
                    'id_institute' => Auth::user()->institute->id,
                    'avatar_url'=>$filename,
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
