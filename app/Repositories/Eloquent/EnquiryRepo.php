<?php

namespace Repositories\Eloquent;

use Repositories\EnquiryRepositoryInterface;
use App\Models\Enquiry;

class EnquiryRepo implements EnquiryRepositoryInterface {

    public function getEnquiries() {
        return $this->get_data();
    }

    public function getEnquiryByAttribute($id) {
        return $this->get_data($id);
    }

    function get_data($id = '') {
        $query = Enquiry::orderBy('id', 'desc');
        if ($id) {
            $query->where('id', $id);
            $result = $query->first();
        } else {
            $result = $query->paginate(5);
             $result->setPath(SITE_URL . '/enquiry');
        }
        return $result;
    }

}

?>