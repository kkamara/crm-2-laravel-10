<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log as LaravelLog;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Log::paginate(10);
        return view('admin.logs.logs', compact('logs'));
    }

    /**
     * Search a listing of the resource.
     * @param \Illuminate\Http\Request $request
     */
    public function search(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('view logs')) {
            return abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized.');
        }
        
        $logs = Log::paginate(10);
        $query = $request->get('query');
        if (null !== $query) {
            $query = htmlspecialchars($query);
            $logs = Log::where('name', 'like', "%$query%")
                ->orWhere('created_at', 'like', "%$query%")
                ->orWhere('updated_at', 'like', "%$query%")
                ->paginate(10);
        }
        $request->flash();
        return view('admin/logs/logs', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view(int $id, Request $request)
    {
        $log = Log::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("view logs")) {
            LaravelLog::info("Unauthorized LogController::view attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.logs.view", compact("log"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(int $id, Request $request)
    {
        $log = Log::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("edit logs")) {
            LaravelLog::info("Unauthorized LogController::edit attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $log) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.logs.edit", compact("log"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update(int $id, Request $request)
    {
        $log = Log::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("edit logs")) {
            LaravelLog::info("Unauthorized LogController::update attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $log) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        $validator = Validator::make($request->all(), [
            "name" => "required|min:3|max:255"
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $log->updated_at = now();
        $log->save();
        return redirect()->route("adminLogs")
            ->with(["success" => "Log successfully updated."]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function delete(int $id, Request $request)
    {
        $log = Log::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("delete logs")) {
            LaravelLog::info("Unauthorized LogController::delete attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $log) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view("admin.logs.delete", compact("log"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function destroy(int $id, Request $request)
    {
        $log = Log::where("id", $id)->first();
        if (!auth()->user()->hasPermissionTo("delete logs")) {
            LaravelLog::info("Unauthorized LogController::destroy attempt");
            return abort(Response::HTTP_NOT_FOUND);
        }
        if (null === $log) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        if ($request->get("delete") === "yes") {
            $log->delete();
            return redirect()->route("adminLogs")
                ->with(["success" => "Log {$log->name} successfully deleted."]);
        }
        return redirect()->route("adminLogs");
    }
}
