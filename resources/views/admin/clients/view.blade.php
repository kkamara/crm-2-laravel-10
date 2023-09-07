@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                      {{ $client->name }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                  <div class="">
                    <div>
                      <p><strong>Client Name:</strong></p>
                      <p>{{ $client->name }}</p>
                    </div>
                    <br />
                    <div>
                      <p><strong>Created At:</strong></p>
                      <p>{{ $client->created_at }}</p>
                    </div>
                    <br />
                    <div>
                      <p><strong>Updated At:</strong></p>
                      <p>{{ $client->updated_at }}</p>
                    </div>
                    <br />
                    <div>
                      <p><strong>User created by:</strong></p>
                      <p>{{ $client->user->fullName }}</p>
                    </div>
                    <br />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@stop