<?php

namespace Repositories\Eloquent;

use Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepo implements UserRepositoryInterface {

    public function getUsers() {
        return $this->get_data();
    }

    public function getUserByAttribute($id, $email) {
        return $this->get_data($id, $email);
    }

    function get_data($id = '', $email = '') {
        $query = User::orderBy('id', 'desc');
        if ($id) {
            $query->where('id', $id);
            $result = $query->first();
        } else if ($email) {
            $query->where('email', $email);
            $result = $query->first();
        } else {
            $result = $query->paginate(5);
        }
        return $result;
    }

}

?>