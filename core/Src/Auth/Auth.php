<?php

namespace Src\Auth;

use Src\Session;
use function Session\session;
use Illuminate\Support\Str;

class Auth
{
    //Свойство для хранения любого класса, реализующего интерфейс IdentityInterface
    private static IdentityInterface $user;

    //Инициализация класса пользователя
    public static function init(IdentityInterface $user): void
    {
        self::$user = $user;
        if (self::user()) {
            self::login(self::user());
        }
    }

    //Вход пользователя по модели
    public static function login(IdentityInterface $user): void
    {
        self::$user = $user;
        session()->set('id', self::$user->getId());
    }

    //Аутентификация пользователя и вход по учетным данным
    public static function attempt(array $credentials): bool
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::login($user);
            return true;
        }
        return false;
    }

    //Возврат текущего аутентифицированного пользователя
    public static function user()
    {
        $id = session()->get('id') ?? 0;
        return self::$user->findIdentity($id);
    }

    //Проверка является ли текущий пользователь аутентифицированным
    public static function check(): bool
    {
        if (self::user()) {
            return true;
        }
        return false;
    }

    //Выход текущего пользователя
    public static function logout(): bool
    {
        session()->clear('id');
        return true;
    }

    //Генерация нового токена для CSRF
    public static function generateCSRF(): string
    {
        $token = md5(time());
        session()->set('csrf_token', $token);
        return $token;
    }

    //Методы Api

    public static function loginApi(IdentityInterface $user): void
    {
        self::$user = $user;
        self::$user->api_token = Str::random(20);
        self::$user->save();
    }

    public static function logoutApi(): bool
    {
        if (!empty(self::userApi())) {
            self::$user = self::userApi();
            self::$user->api_token = NULL;
            self::$user->save();
            return true;
        }
        return false;
    }

    public static function attemptApi(array $credentials): bool
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::loginApi($user);
            return true;
        }
        return false;
    }

    public static function userApi()
    {
        $token = self::token();
        return self::$user->findIdentityApi($token) ?? null;
    }

    public static function token()
    {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $token = explode(' ', $headers['Authorization'])[1];
        }
        return $token ?? '';
    }

    public static function roleApi()
    {
        return self::userApi()['role_id'] ?? '';
    }

    public function getAuthorizationHeader():string {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
           if (isset($requestHeaders['Authorization'])) {
               $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    public function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

}

