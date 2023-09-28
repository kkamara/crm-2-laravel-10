@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-header">
                    <h3>
                        Logs
                        <div class="float-end">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                @if(request()->path() === "admin/logs")
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adminHome') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">logs</li>
                                @elseif(request()->path() === "admin/logs/search")
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adminHome') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                  <a href="{{ route('adminLogs') }}">
                                      Logs
                                  </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                                @endif
                              </ol>
                            </nav>
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                  @include("admin.layouts.partials.flashes")
                  <form action="{{ route('logsSearch') }}" method='GET'>
                    @csrf
                    <div class="form-group">
                      <label for="query">Search</label>
                      <input 
                        type="text"
                        class='form-control'
                        name='query'
                        value="{{ old('query') }}"
                        placeholder='Search your logs data...'
                      />
                    </div>
                    @can("create logs")
                    <div class="float-end form-group">
                      <br/>
                      <a 
                        href="{{ route("newLog") }}"
                        class="btn btn-secondary form-control"
                      >
                        New
                      </a>
                    </div>
                    @endcan
                    <br />
                    <input 
                      type="submit"
                      class='btn btn-success'
                      value='Search'
                    />
                  </form>
                  <br />
                  <div class="">
                    <div>
                      Log Name
                      <span>| Created At</span>
                      <span>| Updated At</span>
                    </div>
                    @forelse($logs as $log)
                    <button 
                      type="button" 
                      class="btn btn-default" 
                      data-bs-toggle="modal" 
                      data-bs-target="#logsModal{{ $log->id }}"
                    >
                      {{ $log->name }}
                      <span>| {{ $log->created_at }}</span>
                      <span>| {{ $log->updated_at }}</span>
                    </button>
                    @can("view logs")
                    <a href="{{ route("log", $log->id) }}" class="btn btn-primary btn-sm">View</a>
                    @endcan
                    @can("edit logs")
                    <a href="{{ route("editLog", $log->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can("delete logs")
                    <a href="{{ route("deleteLog", $log->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    @endcan
                    <hr />
                    <br />
                    @empty
                      <p>There are no logs to show right now.</p>
                      <br />
                    @endforelse
                  </div>
                </div>
                @if($logs->count())
                <div class="card-footer">
                  @if(count($logs))
                    {{ $logs->links() }}
                  @endif
                </div>
                @endif
              </div>
            </div>
          </div>
          @if($logs->count())
            @foreach($logs as $log)
            <!-- Modal -->
            <div class="modal fade" id="logsModal{{ $log->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $log->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>User created: {{ $log->user->fullName }}</p>
                    <p>Created At: {{ $log->user->created_at }}</p>
                    <p>Updated At: {{ $log->user->updated_at }}</p>
                    <p>User updated by: {{ $log->userUpdatedBy->fullName ?? "None" }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
@stop