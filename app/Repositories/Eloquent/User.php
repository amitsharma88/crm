<?php

namespace Repositories\Eloquent;

use Repositories\UserRepositoryInterface;

class User implements UserRepositoryInterface {

    protected $user;

    public function __construct() {
        $this->user = $user;
    }

    public function getUsers() {
        return $this->get_data();
    }

    public function getUserById($id) {
        return $this->get_data($id);
    }

    function get_data($id = '') {
        $query = User::orderBy('id', 'desc');
        if ($id) {
            $query->where('id', $id);
            $result = $query->first();
        } else {
            $result = $query->paginate(5);
        }

        return $result;
    }

}

?>