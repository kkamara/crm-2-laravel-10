@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-header">
                    <h3>
                        Clients
                        <div class="float-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('adminHome') }}">
                                            Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                </ol>
                            </nav>
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('clientsSearch') }}" method='GET'>
                    @csrf
                    <div class="form-group">
                      <label for="query">Search</label>
                      <input 
                        type="text"
                        class='form-control'
                        name='query'
                        value="{{ old('query') }}"
                        placeholder='Search your clients data...'
                      />
                    </div>
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
                      Client Name
                      <span>| Created At</span>
                      <span>| Updated At</span>
                    </div>
                    @forelse($clients as $client)
                    <button 
                      type="button" 
                      class="btn btn-default" 
                      data-bs-toggle="modal" 
                      data-bs-target="#clientsModal{{ $client->id }}"
                    >
                      {{ $client->name }}
                      <span>| {{ $client->created_at }}</span>
                      <span>| {{ $client->updated_at }}</span>
                    </button>
                    @can("view clients")
                    <button class="btn btn-primary btn-sm">View</button>
                    @endcan
                    @can("edit clients")
                    <button class="btn btn-warning btn-sm">Edit</button>
                    @endcan
                    @can("delete clients")
                    <button class="btn btn-danger btn-sm">Delete</button>
                    @endcan
                    <hr />
                    <br />
                    @empty
                      <p>There are no clients to show right now.</p>
                      <br />
                    @endforelse
                  </div>
                </div>
                @if($clients->count())
                <div class="card-footer">
                  @if(count($clients))
                    {{ $clients->links() }}
                  @endif
                </div>
                @endif
              </div>
            </div>
          </div>
          @if($clients->count())
            @foreach($clients as $client)
            <!-- Modal -->
            <div class="modal fade" id="clientsModal{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $client->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>User created: {{ $client->user->fullName }}</p>
                    <p>Created At: {{ $client->user->created_at }}</p>
                    <p>Updated At: {{ $client->user->updated_at }}</p>
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