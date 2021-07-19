<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocuFilesModel;
use App\Models\DocuRequestModel;
use App\Models\User;
use DataTables;
use PDF;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //
    public function index(Request $request){

        if ($request->ajax()) {
            $data = DocuRequestModel::where('status', 0)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('request.view',$row->docu_request_id).'" class="edit btn btn-success btn-sm">View</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('docu_title', function($row){
                    $doculogs = DocuFilesModel::where('docu_id_code',$row->docu_id_code)
                                              ->first();
                    return $doculogs->docu_title;
                })
                ->addColumn('name', function($row){
                    $name = User::where('id',$row->user_id)->first();
                    return $name->name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('request.index');

    }

    public function viewdoc(Request $request, $id){

        $request_info = DocuRequestModel::where('docu_request_id', $id)->first();
        $name = User::where('id',$request_info->user_id)->first();
        return view('request.view',compact('request_info','name'));
        
    }

    public function show_pdf(Request $request, $id){
        //Load PDF
        $file = DocuRequestModel::find($id);
        $path = 'assets/documents/';

        //convert docx to PDF 
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
            
            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($path.$file->filename)); 
    
            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file->filename);
            $PDFWriter->save(public_path($path.$withoutExt.'-converted.pdf')); 
        //
    
        
        
        return response()->file(public_path($path.$withoutExt.'-converted.pdf'));
    }

    public function approve(Request $request, $id){
        $newfilename = DocuRequestModel::where('docu_request_id', $id)->first();
        $data = [
            'approve_by' => Auth::user()->id,
            'status'    => 1,
        ];
        $data2 = [
            'filename' => $newfilename->filename,
            'token_status'     => 1,
        ];
        DocuRequestModel::where('docu_request_id', $id)
                        ->update($data);
        DocuFilesModel::where('docu_id_code',$newfilename->docu_id_code)
                        ->update($data2);

        return redirect(route('request.index'))->withStatus(__('Request Approve!'));
        

    }
    public function delete(Request $request, $id){

        DocuRequestModel::where('docu_request_id', $id)
                        ->delete();

        return redirect(route('request.index'))->withStatus(__('Request Deleted!'));
        

    }
}
