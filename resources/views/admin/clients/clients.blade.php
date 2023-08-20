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
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <p>Cillum reprehenderit non ea reprehenderit duis et do elit. Sunt fugiat eu fugiat id Lorem duis esse enim reprehenderit irure. Quis sint sint incididunt magna.</p>
                    <br />
                    <p>Officia est irure cillum ex cupidatat velit ullamco elit reprehenderit et quis consequat consectetur. In proident pariatur magna sint elit anim mollit in velit. Sint irure aliquip ad sunt ad adipisicing non occaecat dolore.</p>
                    <br />
                    <p>Magna nisi minim deserunt ullamco est. Nostrud ullamco mollit ad labore adipisicing consectetur cupidatat. Nisi enim consectetur veniam adipisicing dolor ullamco ullamco irure nulla tempor ex. Commodo do culpa culpa elit reprehenderit tempor Lorem reprehenderit officia officia veniam sit Lorem ex. Ipsum commodo laboris sunt tempor cillum commodo voluptate. Ullamco id pariatur tempor Lorem aliquip. Dolor ad consectetur voluptate ea velit consequat laboris do excepteur quis Lorem.</p>
                    <br />
                    <p>Dolore proident excepteur cupidatat quis aliqua minim reprehenderit esse officia ea proident. Dolor amet mollit cupidatat aliquip minim officia incididunt eu proident elit ut eiusmod aute. Nisi veniam eiusmod officia aliqua fugiat elit voluptate adipisicing est ea in reprehenderit laboris. Non exercitation eu consequat in ex reprehenderit est et eu id.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
@stop