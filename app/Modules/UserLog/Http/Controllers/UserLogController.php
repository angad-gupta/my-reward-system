<?php

namespace App\Modules\UserLog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\UserLog\Repositories\UserLogInterface;
class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $userlog;

    public function __construct( UserLogInterface $userlog)
    {
    
        $this->userlog = $userlog;
    }

    public function index()
    {  
        $superadmin_id = $this->userlog->findSuperadminId();
        $data = $this->userlog->findAll($superadmin_id->id);
        return view('userlog::index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('userlog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('userlog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('userlog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
