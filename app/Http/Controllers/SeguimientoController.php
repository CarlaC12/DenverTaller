<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PAccion;
use App\Models\Seguimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SeguimientoController extends Controller
{
    
    public function index()
    {
        return view('seguimiento.index');
    }

    
    public function create()
    {
        return  view('seguimiento.create');
    }


    public function crear($id)
    {
        $pAccion=PAccion::find($id);
        return  view('seguimiento.create',compact('pAccion'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'descripcionMG' => 'required',
            // 'descripcionMF' => 'required',
            // 'descripcionAL' => 'required',
            // 'descripcionPS' => 'required',
         
            'pAccionId' => 'required',     
        ]);
      

        $seguimiento=new Seguimiento();
        $seguimiento->descripcionMG = $request->input('descripcionMG');
        $seguimiento->descripcionMF = $request->input('descripcionMF');
        $seguimiento->descripcionAL = $request->input('descripcionAL');
        $seguimiento->descripcionPS = $request->input('descripcionPS');
       
        $seguimiento->pAccionId = $request->input('pAccionId');

       
       
            // La variable $files contiene al menos un archivo válido.
            // Puedes proceder con el código para manejar los archivos
         
                $folder = "archivos";
                $path = Storage::disk('s3')->put($folder, $file, 'public'); 
                $seguimiento->audio = basename($path);
                dd( $path);
            
        
      

        // $seguimiento->save();
       
          
          return redirect()->route('evaluaciones.index');
    }

  
    public function show($id)
    {
        $seguimiento=DB::table('seguimientos')->where('pAccionId',$id)->get()->first();
        return view('seguimiento.show',compact('seguimiento'));
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descripcionMG' => 'required',
            'descripcionMF' => 'required',
            'descripcionAL' => 'required',
            'descripcionPS' => 'required',
         
            'pAccionId' => 'required',     
        ]);
        // $seguimiento=DB::table('seguimientos')->where('pAccionId',$id)->get()->first();
        $seguimiento=Seguimiento::findOrfail($id);
        $seguimiento->descripcionMG = $request->input('descripcionMG');
        $seguimiento->descripcionMF = $request->input('descripcionMF');
        $seguimiento->descripcionAL = $request->input('descripcionAL');
        $seguimiento->descripcionPS = $request->input('descripcionPS');
       
        $seguimiento->pAccionId = $request->input('pAccionId');
        $seguimiento->update();

        return redirect()->route('evaluaciones.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
