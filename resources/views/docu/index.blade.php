
@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Document Code Management',
    'activePage' => 'form_index',
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
            <a href="#" class="btn btn-primary add-docu" data-toggle="modal" data-target="#modal-id">Add</a>
          </div>
        </div>
      </div>
      <div class="card-body docu-div">
            <table class="table table-bordered docu-table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Title</th>
                      <th>Date Uploaded</th>
                      <th>Last Revision</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>

          <button onclick="test()">test</button>
      </div>
  </div>

<script>
  const docxPdf = require("docx-pdf")
  function test(){
    alert('test');
    
    docxConverter('./C:/Users/Acer/Desktop/test/test.docx','./C:/Users/Acer/Desktop/test/output.pdf',function(err,result){
      if(err){
        console.log(err);
      }
      console.log('result'+result);
    });
  }

</script>
  
@endsection