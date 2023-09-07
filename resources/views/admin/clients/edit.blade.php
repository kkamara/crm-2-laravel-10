@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <form 
                    action="{{ route("updateClient", $client->id) }}"
                    method="POST"
                    class="card w-100"
                >
                    @csrf
                    <div class="card-header">
                        <h3>
                            Client
                            <div class="float-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('adminHome') }}">
                                                Home
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('adminClients') }}">
                                                Clients
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('client', $client->id) }}">
                                                {{ $client->name }}
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                        Edit
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                    <div>
                        <label for="name"><strong>Client Name:</strong></label>
                        <input 
                            type="text" 
                            disabled="true" 
                            name="name"
                            value="{{ $client->name }}"
                        />
                    </div>
                    <br />
                    <div>
                        <label for="created_at"><strong>Created At:</strong></label>
                        <input 
                            type="text" 
                            disabled="true" 
                            name="created_at"
                            value="{{ $client->created_at }}"
                        />
                    </div>
                    <br />
                    <div>
                        <label for="updated_at"><strong>Updated At:</strong></label>
                        <input 
                            type="text" 
                            disabled="true" 
                            name="created_at"
                            value="{{ $client->updated_at }}"
                        />
                    </div>
                    <br />
                    <div>
                        <label for="user_created"><strong>User created:</strong></label>
                        <input 
                            type="text" 
                            disabled="true" 
                            name="user_created"
                            value="{{ $client->user->fullName }}"
                        />
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
                        @can("edit clients")
                        <input 
                            href="javascript:;" 
                            class="btn btn-success btn-sm"
                            type="submit"
                            value="Submit"
                        />
                        @endcan
                    </div>
                    </div>
                </form>
            </div>
          </div>
@stop