
@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Document Revision Request',
    'activePage' => 'request_index',
    'activeNav' => '',
])
@extends('docu.modal')


@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="card">
      @include('alerts.success')
      @include('alerts.errors')
      <div class="card-header">
        <div class="row">
          <div class="col-md-12 text-right">
              <br><br><br>
          </div>
        </div>
      </div>
      <div class="card-body docu-div">
            <table class="table table-bordered request-table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Title</th>
                      <th>Request Date</th>
                      <th>Date Effectivity</th>
                      <th>Request Description</th>
                      <th>Requested By</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
      </div>
  </div>
  
@endsection