<?php

namespace Repositories;

interface EnquiryRepositoryInterface {
    
    public function getEnquiries();
    
    public function getEnquiryByAttribute($id);
}

?>