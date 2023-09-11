<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function __construct(protected Client $client) {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = $this->client->orderBy("id", "desc")->paginate(10);
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
        
        $clients = $this->client->orderBy("id", "desc");
        $query = $request->get('query');
        if (null !== $query) {
            $query = htmlspecialchars($query);
            $clients = $this->client->where('name', 'like', "%$query%")
                ->orWhere('created_at', 'like', "%$query%")
                ->orWhere('updated_at', 'like', "%$query%")
                ->orderBy("id", "desc");
        }
        $clients = $clients->paginate(10);
        $request->flash();
        return view('admin/clients/clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function view(int $id, Request $request)
    {
        $client = $this->client->where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("view clients")) {
            Log::info("Unauthorized ClientController::view attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.clients.view", compact("client"));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function edit(int $id, Request $request)
    {
        $client = $this->client->where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("edit clients")) {
            Log::info("Unauthorized ClientController::edit attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $client) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.clients.edit", compact("client"));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function update(int $id, Request $request)
    {
        $client = $this->client->where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("edit clients")) {
            Log::info("Unauthorized ClientController::update attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $client) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        $client->updated_at = now();
        $client->save();
        return redirect()->route("adminClients")
            ->with(["success" => "Client successfully updated."]);
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function delete(int $id, Request $request)
    {
        $client = $this->client->where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("delete clients")) {
            Log::info("Unauthorized ClientController::delete attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $client) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.clients.delete", compact("client"));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function destroy(int $id, Request $request)
    {
        $client = $this->client->where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("delete clients")) {
            Log::info("Unauthorized ClientController::destroy attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $client) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        if ($request->get("delete") === "yes") {
            $client->delete();
            return redirect()->route("adminClients")
                ->with(["success" => "Client {$client->name} successfully deleted."]);
        }
        return redirect()->route("adminClients");
    }
}
