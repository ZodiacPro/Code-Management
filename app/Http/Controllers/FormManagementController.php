<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocuFilesModel;
use App\Models\DocuRequestModel;
use DataTables;
use PDF;
use Illuminate\Support\Facades\Auth;

class FormManagementController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = DocuFilesModel::where('token_status', 1)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('document.viewdoc',$row->docu_id_code).'" class="edit btn btn-success btn-sm">View</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('last_revision', function($row){
                    $doculogs = DocuFilesModel::find($row->docu_id_code)
                              ->doculogs()
                              ->orderBy('date_effectivity', 'desc')
                              ->first();
                    return $doculogs->date_effectivity;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('docu.index');
    }
    ///////
    //add Docu -------------------------------------------------------------------------------------------
    public function addDocu(Request $request){
        //admin push token
        if($request->admin_push){
            $stats = 1;
        }
        else{
            $stats = 0;
        }
        
        $validated = $request->validate([
            'docu_id_code' => 'required|unique:docufiles|',
            'document_title' => 'required',
            'document_file' => 'required',
        ]);   
 
        if($request->file('document_file')->extension() == 'docx' || $request->file('document_file')->extension() == 'doc'){
           //move files to directory
            $name = '('.time().')'.$request->docu_id_code.'.'.$request->file('document_file')->extension();
            $path = 'assets/documents';
            $image = $request->file('document_file');
            $image->move(public_path($path), $name);
            //insert query Docufiles
            DocuFilesModel::create([
                'docu_id_code' => $request->docu_id_code,
                'filename'     => $name,
                'docu_title'   => $request->document_title,
                'date_uploaded'=> date("Y-m-d"),
                'token_status' => $stats,
            ]);
            //Inserting In Request
            DocuRequestModel::create([
                'request_date'          =>  date("Y-m-d"),
                'date_effectivity'   =>  $request->effectivity_date,
                'request_description'   => 'Initial Issue',
                'user_id'               => Auth::user()->id,
                'docu_id_code'          => $request->docu_id_code,
                'status'                => $stats,
                'filename'              =>$name,


            ]);
            return back()->withStatus(__('Document successfully added.'));

        }
        else{
            return back()->withErrors(['Invalid Document Type', 'Please Refer to Uploading Note']);
        }

    }
    /////////
    //view doc-------------------------------------------------------------------------------------
    public function viewdoc(Request $request, $id){

        $docu_info = DocuFilesModel::where('docu_id_code', $id)->first();
        return view('docu.view',compact('docu_info'));
        
    }

    //Embbed PDF on blade-----------------------------------------------------------------------------
    public function show_pdf(Request $request, $id){
        //Load PDF
        $file = DocuFilesModel::find($id);
        $path = 'assets/documents/';

        //convert docx to PDF 
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
            
            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($path.$file->filename)); 
            $sections = $Content->getSections();
            $section = $sections[0];
            $header = $section->getHeaders();
            $headert = $section->createHeader();
    
            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file->filename);
            $PDFWriter->save(public_path($path.$withoutExt.'-converted.pdf')); 
        //
    
        
        
        return response()->file(public_path($path.$withoutExt.'-converted.pdf'));
    }

    ///
    ///view doc ajax--------------------------------------------------------------------------------

    public function viewdocajax(Request $request, $id){
        
        if ($request->ajax()) {
            
            $data = DocuRequestModel::where('docu_id_code',$id)
                                    ->where('status', 1)
                                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('distribute', function($row){
                    return 'name';
                })
                ->make(true);
        }
    }
    ///
    ////add new request -----------------------------------------------------------------------------
    public function new_request(Request $request){
          
 
        if($request->file('document_file')->extension() == 'docx' || $request->file('document_file')->extension() == 'doc'){
           //move files to directory
            $name = '('.time().')'.$request->docucode.'.'.$request->file('document_file')->extension();
            $path = 'assets/documents';
            $image = $request->file('document_file');
            $image->move(public_path($path), $name);
            //Inserting In Request
            DocuRequestModel::create([
                'request_date'          =>  date("Y-m-d"),
                'date_effectivity'   =>  $request->effectivity_date,
                'request_description'   => $request->revise_description,
                'user_id'               => Auth::user()->id,
                'docu_id_code'          => $request->docucode,
                'status'                => '0',
                'filename'              => $name,


            ]);
            return back()->withStatus(__('Request successfully added.'));

        }
        else{
            return back()->withErrors(['Invalid Document Type', 'Please Refer to Uploading Note']);
        }
    }

    ///
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
