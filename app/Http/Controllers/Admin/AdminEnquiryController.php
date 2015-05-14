<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Models\Enquiry;
use DB;
use Input;
use Auth;
use Session;
use Redirect;

class AdminEnquiryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $enquiries = $this->get_data();
        return view('admin.enquiry.listing', compact('enquiries'));
    }

    /**
      /function name get_data()
     * will fetch all the records with pagiantion and $id is optional,
     * If $ide is valid and not null than it will return single value of correspomndig id
     * Author : Amit
     * Date :  13-5-15
     */
    function get_data($id = '') {
        $query = Enquiry::orderBy('enquiries.created_at');
        if ($id) {
            $query->where('id', $id);
            $result = $query->first();
        } else {
            $result = $query->paginate(5);
            $result->setPath(SITE_URL . '/enquiry');
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, $id = '') {
        $enquiries = array();
        if ($id) {
            $enquiries = $this->get_data($id);
        }
        return view('admin.enquiry.manage_enquiry_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
