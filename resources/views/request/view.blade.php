
@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Request ('.$request_info->docu_id_code.')',
    'activePage' => 'request_index',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="card ">
      @include('alerts.success')
      @include('alerts.errors')
      <div class="row">
        <div class="col-md-12 text-center">
           <div id="pdf-viewer-request"></div>
        </div>
      </div>
      <div class="card-header">
        <div class="row">
          <div class="col-md-12 text-right">
            <a href="{{route('request.approve',$request_info->docu_request_id)}}" class="btn btn-success add-docu">Approve</a>
            <a href="{{route('request.delete',$request_info->docu_request_id)}}" class="btn btn-danger add-docu">Delete</a>
        </div>
        </div>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-md-3">
                <h6 style="margin-top:5px">Document Code</h6>
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control text-center" value="{{$request_info->docu_id_code}}" readonly/>
                <input type="text" id="name" class="form-control" value="{{$request_info->docu_request_id}}" hidden/>
              </div>
          </div>
          <br>
        <div class="row">
            <div class="col-md-3 ">
              <h6 style="margin-top:5px">Request Date</h6>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control text-center" value="{{$request_info->request_date}}" readonly/>
            </div>
            <div class="col-md-3 ">
                <h6 style="margin-top:5px">Effectivity Date</h6>
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control text-center" value="{{$request_info->date_effectivity}}" readonly/>
              </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 ">
              <h6 style="margin-top:5px">Request Description</h6>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control text-center" value="{{$request_info->request_description}}" readonly/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
              <h6 style="margin-top:5px">Requested By</h6>
            </div>
            <div class="col-md-3">
              <input type="text"  class="form-control text-center" value="{{$name->name}}" readonly/>
            </div>
        </div>
      </div>
  </div>
  
@endsection