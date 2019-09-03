<?php
//session isiraso server side cookie, kad padaryti logino sistema. Jeigu useris prisilogina, tai antra karta atejes
//i puslapi useris traktuojamas kaip prisilogines.
namespace Core;

class Session {

    private $model;
    private $user;

    public function __construct() {
        session_start();
        $this->model = new \App\Users\Model();

        // Execute login from cookie
        $this->loginFromCookie();
    }

    public function loginFromCookie() {
        //tikrinam ar sesija yra netuscia
        if ($_SESSION ?? false) {
            //kvieciame funkcija loginpaduodami is sesijos emaila ir passworda
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    public function login($email, $password) {
        //bandom uzloadingi useri pagal gautus email ir password auksciau
        //
        $users = $this->model->get([
            'email' => $email,
            'password' => $password
        ]);
        
        if ($users) {
            //get'as grazina grazina masyva(nors ir viena elementa). Visada bus pirmas elementas masyve, bel to rasoma [0];
            $this->user = $users[0];

            //irasoma i sesija userio email ir password. Sesijoje reikia save'inti ir passworda tam, kad kitam kompe pekeitus passworda,
            // pirmam kompe islogintu is sistemos. Jei netikrintumem passwordo, pirmam kompe useris liktu prisilogines, nes tikrintu tik pagal emaila
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            return true;
        } else {
            $this->user = null;
        }

        return false;
    }

    public function getUser() {
        return $this->user;
    }

    public function userLoggedIn() {
        return $this->user ? true : false;
    }

    public function logout() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            // Clear the superglobal
            $_SESSION = [];

            // Remove server-side cookie file
            // istrina faila is serverio SESSIJOS, bet $_SESSION nepasidaro tuscias, mes turim manually padaryt tuscia
            session_destroy();

            // Remove client-side cookie
            // slashas '/' veikia visame domeno puslapyje, nuejus i bet kuri url'a. Nurodo scope'a coockie.
            setcookie(session_name(), null, -1, "/");
        }
    }

}
