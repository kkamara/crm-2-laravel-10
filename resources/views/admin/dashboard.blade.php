@extends('admin/layouts/main')

@section('content')
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-header">
                    <h3>
                        Dashboard
                        <div class="float-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    Show different graphs & statistics here based on permissions.
                  </div>
                </div>
              </div>
            </div>
          </div>
@stop