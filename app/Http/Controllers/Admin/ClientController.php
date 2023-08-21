<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('admin/clients/clients', compact('clients'));
    }

    /**
     * Search a listing of the resource.
     * @param \Illuminate\Http\Request $request
     */
    public function search(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('view clients')) {
            return abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized.');
        }
        
        $clients = Client::paginate(10);
        $query = $request->get('query');
        if (null !== $query) {
            $query = htmlspecialchars($query);
            $clients = Client::where('name', 'like', "%$query%")
                ->orWhere('created_at', 'like', "%$query%")
                ->orWhere('updated_at', 'like', "%$query%")
                ->paginate(10);
        }
        $request->flash();
        return view('admin/clients/search', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
