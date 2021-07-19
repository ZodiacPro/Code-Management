

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
      <div class="modal-content">
          
          <div class="modal-header">
              <h4 class="modal-title" id="userCrudModal">
                {{__("Add New Documents")}}
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
              <form action="{{ route('document.add') }}" id="DocuData" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="document-code">{{__("Document Code")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <input class="form-control" type="text" name="docu_id_code" placeholder="EFTI-...."/>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="document-title">{{__("Document Title")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <input class="form-control" type="text" name="document_title" placeholder="Title....."/>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="date_effectivity">{{__("Effectivity Date")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <div class="well">
                        <div id="datetimepicker1" class="input-append date">
                          <input name="effectivity_date" type="date" min="{{date("Y-m-d")}}" class="timepicker form-control" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right">
                      <label for="document-file">{{__("Attach Document")}}</label>
                    </div>
                    <div class="col-sm-7" >
                      <input type="file" name="document_file" id="documentfile" onkeyup="uppercase()" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"/>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right">
                      <label for="document-file">{{__("Admin Push")}}</label>
                    </div>
                    <div class="col-sm-7" >
                      <input type="checkbox" name="admin_push" id="admin_push" />
                      <p class="font-italic font-weight-light">(Check here to SKIP Initial Request)</p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 text-center">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Note</h5>
                        <p class="card-text">Upload MSWord File Only</p>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 text-center" >
                      <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                    </div>
                  </div>
                  
                  

                  

              </form>
          </div>

      </div>
  </div>
</div> 


{{-- request modal --}}

@if(isset($docu_info))
<div class="modal fade" id="modal-request">
  <div class="modal-dialog">
      <div class="modal-content">
          
          <div class="modal-header">
              <h4 class="modal-title" id="userCrudModal">
                {{__("Request")}}
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
              <form action="{{ route('document.request') }}" id="DocuData" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="document-code">{{__("Document Code")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <input class="form-control" type="text" name="docucode" id="docucode" value="{{$docu_info->docu_id_code}}" readonly />
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="document-title">{{__("Document Title")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <input class="form-control" type="text" name="document_title" value="{{$docu_info->docu_title}}" placeholder="Title....." readonly/>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="document-title">{{__("Revise Description")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <input class="form-control" type="text" name="revise_description" value="" placeholder="Description....." />
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right" >
                      <label for="date_effectivity">{{__("Effectivity Date")}}</label>
                    </div>
                    <div class="col-sm-7">
                      <div class="well">
                        <div id="datetimepicker1" class="input-append date">
                          <input name="effectivity_date" type="date" min="{{date("Y-m-d")}}" class="timepicker form-control" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4 text-right">
                      <label for="document-file">{{__("Attach Document")}}</label>
                    </div>
                    <div class="col-sm-7" >
                      <input type="file" name="document_file" id="documentfile" onkeyup="uppercase()" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"/>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 text-center">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Note</h5>
                        <p class="card-text">Upload MSWord File Only</p>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 text-center" >
                      <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                    </div>
                  </div>
                  
                  

                  

              </form>
          </div>

      </div>
  </div>
</div> 
@endif