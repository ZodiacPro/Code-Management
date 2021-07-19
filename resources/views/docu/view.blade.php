
@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Document ('.$docu_info->docu_id_code.')',
    'activePage' => 'form_index',
    'activeNav' => '',
])

@include('docu.modal')
@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="card ">
      @include('alerts.success')
      @include('alerts.errors')
      <div class="row">
        <div class="col-md-12 text-center">
           <div id="pdf-viewer"></div>
        </div>
      </div>
      <div class="card-header">
        <div class="row">
          <div class="col-md-12 text-right">
            <a href="#" class="btn btn-primary add-docu" data-toggle="modal" data-target="#modal-request">Request</a>
            
        </div>
        </div>
      </div>
      <div class="card-body docu-div">
            <table class="table table-bordered revision-table">
              <thead>
                  <tr>
                      <th>Rev. No</th>
                      <th>Latest Change Description</th>
                      <th>Effectivity Date</th>
                      <th>Distributed To</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
      </div>
  </div>
  
@endsection