@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <form 
                    action="{{ route("storeLog") }}"
                    method="POST"
                    class="card w-100"
                >
                    @csrf
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
                                            New
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(isset($errors) && $errors->count())
                            @foreach($errors->all() as $error)
                            <div id="validation">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif
                    <div>
                        <label for="name"><strong>Log Name:</strong></label>
                        <input 
                            type="text" 
                            name="name"
                            value="{{ old('name') }}"
                        />
                    </div>
                    <br />
                    <div>
                        <label for="clients"><strong>Clients:</strong></label>
                        @if($clients->count())
                            <select name="client">
                                <option selected value="0">
                                    Choose a client
                                </option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">
                                    {{ $client->name }}
                                </option>
                                @endforeach
                            </select>
                        @else
                            <input 
                                type="text" 
                                name="client"
                                disabled="true"
                                value="There are no clients."
                            />
                        @endif
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
                        <input 
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