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
                                    <li class="breadcrumb-item">Clients</li>
                                    <li class="breadcrumb-item active" aria-current="page">Search</li>
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
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    @forelse($clients as $client)
                    <a href='javascript:;'>{{ $client->name }}</a>
                    <br />
                    @empty
                      <p>There are no clients to show right now.</p>
                      <br />
                    @endforelse
                  </div>
                </div>
                <div class="card-footer">
                  @if(count($clients))
                    {{ $clients->links() }}
                  @endif
                </div>
              </div>
            </div>
          </div>
@stop