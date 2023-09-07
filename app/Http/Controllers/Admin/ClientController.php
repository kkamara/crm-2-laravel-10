<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
    public function view(int $id, Request $request)
    {
        $client = Client::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("view clients")) {
            Log::info("Unauthorized ClientController::view attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.clients.view", compact("client"));
    }
}
