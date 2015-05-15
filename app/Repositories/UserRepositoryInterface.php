<?php

namespace Repositories;

interface UserRepositoryInterface {
    
    public function getUsers();
    
    public function getUserByAttribute($id,$email);
}

?>