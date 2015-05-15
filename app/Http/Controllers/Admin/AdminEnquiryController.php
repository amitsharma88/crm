<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Repositories\EnquiryRepositoryInterface;
use Repositories\UserRepositoryInterface;
use DB;
use Input;
use Auth;
use Session;
use Redirect;

class AdminEnquiryController extends Controller {

    protected $enquiryRepo;
    protected $userRepo;

    public function __construct(EnquiryRepositoryInterface $enquiryRepo,UserRepositoryInterface $userRepo) {
        $this->enquiryRepo = $enquiryRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        $users = $this->userRepo->getUsers();
        dd($users);
        $enquiries = $this->enquiryRepo->getEnquiries();
        return view('admin.enquiry.listing', compact('enquiries'));
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
