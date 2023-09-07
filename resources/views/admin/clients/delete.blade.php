@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <form 
                    action="{{ route("destroyClient", $client->id) }}"
                    method="POST"
                    class="card w-100"
                >
                    @csrf
                    @method("DELETE")
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
                                            Delete
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"><strong>Delete Client {{ $client->name }}:</strong></label>
                            <select 
                                class="form-control"
                                type="text" 
                                name="delete"
                            >
                                <option value="no" selected>No</option>
                                <option value="yes">Yes</option>
                            </select>
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