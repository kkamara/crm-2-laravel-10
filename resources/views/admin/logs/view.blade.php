@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-header">
                    <h3>
                        Log
                        <div class="float-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                      {{ $log->name }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                  <div>
                    <p><strong>Log Name:</strong></p>
                    <p>{{ $log->name }}</p>
                  </div>
                  <br />
                  <div>
                    <p><strong>Created At:</strong></p>
                    <p>{{ $log->created_at }}</p>
                  </div>
                  <br />
                  <div>
                    <p><strong>Updated At:</strong></p>
                    <p>{{ $log->updated_at }}</p>
                  </div>
                  <br />
                  <div>
                    <p><strong>User created by:</strong></p>
                    <p>{{ $log->user->fullName }}</p>
                  </div>
                  <br />
                  <div>
                    <p><strong>User updated by:</strong></p>
                    <p>{{ $log->userUpdatedBy->fullName ?? "None" }}</p>
                  </div>
                  <br />
                </div>
                <div class="card-footer">
                  <div class="float-start">
                    <a 
                      href="javascript:;" 
                      class="btn btn-default btn-sm"
                      onClick="window.history.back();"
                    >
                      Back
                    </a>
                  </div>
                  <div class="float-end">
                    @can("edit logs")
                    <a href="{{ route("editLog", $log->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can("delete logs")
                    <a href="{{ route("deleteLog", $log->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    @endcan
                  </div>
                </div>
              </div>
            </div>
          </div>
@stop