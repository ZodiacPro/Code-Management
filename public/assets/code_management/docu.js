$(document).ready(function(){
    

$(function () {
    //Docu Index Datatable
    var table = $('.docu-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/document",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'docu_id_code', name: 'docu_id_code'},
            {data: 'docu_title', name: 'docu_title'},
            {data: 'date_uploaded', name: 'date_uploaded'},
            {data: 'last_revision', name: 'last_revision'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true,
                width: 20,
            },
        ]
    });
    
  })

//////////////////////
$(function () {
    var code = $('#docucode').val();
    //Docu Index Datatable
    var table = $('.revision-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/document/viewdocajax/'+code,
        columns: [
            {  
                'data': 'DT_RowIndex',
                'name': 'DT_RowIndex',  
                'render': function (DT_RowIndex) {  
                    return  DT_RowIndex - 1;  
                }
            },          
            {data: 'request_description', name: 'request_description'},
            {data: 'date_effectivity', name: 'date_effectivity'},
            {data: 'distribute', name: 'distribute'},
        ]
    });
    
  })



$(function(){
    var code = $('#docucode').val();
    var options = {
        height: "700px",
        width: "700px",
        pdfOpenParams: { view: 'FitV', page: '1' }
    };
    PDFObject.embed("/show-pdf/"+code, "#pdf-viewer", options)

})

//--------------------
$(function () {
    //request Index Datatable
    var table = $('.request-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/request",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'docu_id_code', name: 'docu_id_code'},
            {data: 'docu_title', name: 'docu_title'},
            {data: 'request_date', name: 'request_date'},
            {data: 'date_effectivity', name: 'date_effectivity'},
            {data: 'request_description', name: 'request_description'},
            {data: 'name', name: 'name'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true,
                width: 20,
            },
        ]
    });
    
  })
  $(function(){
    var code = $('#name').val();
    var options = {
        height: "700px",
        width: "700px",
        pdfOpenParams: { view: 'FitV', page: '1' }
    };
    PDFObject.embed("/request/show-pdf/"+code, "#pdf-viewer-request", options)

})









});
