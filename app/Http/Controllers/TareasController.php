<?php

namespace App\Http\Controllers;

use App\Exports\TareasExport;
use App\Mail\NuevaTareaMail;
use App\Models\Tarea;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $tareas = Tarea::where('user_id',$user_id)->paginate(5);
;
        return view('tarea.index',['tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;
        $tarea = Tarea::create($dados);
        $destinatario = auth()->user()->email;

        Mail::to($destinatario)->send(new NuevaTareaMail($tarea));

        return redirect()->route('tarea.show',['tarea'=>$tarea->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tarea.show',['tarea'=>$tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $user_id = auth()->user()->id;
        if($tarea->user_id==$user_id){

            return view('tarea.edit',['tarea'=>$tarea]);

        }else{
            return view('acceso-negado');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {

        $user_id = auth()->user()->id;
        if($tarea->user_id==$user_id){

            $tarea->update($request->all());
            return redirect()->route('tarea.show',['tarea'=>$tarea]);

        }else{
            return view('acceso-negado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $user_id = auth()->user()->id;
        if($tarea->user_id==$user_id){

            $tarea->delete();
            return redirect()->route('tarea.index');

        }else{
            return view('acceso-negado');
        }
    }

    public function exportacion($extension)
    {
        $nombre_archivo = 'tareas.'.$extension;
        return Excel::download(new TareasExport,$nombre_archivo);
    }

    public function exportacionPdf()
    {
        $tareas = auth()->user()->tareas()->get();
        $pdf = Pdf::loadView('tarea.pdf', ['tareas'=>$tareas]);

        $pdf->setPaper('a4','landscape');
        return $pdf->stream('tareas.pdf');
        //return $pdf->download('tareas.pdf');  //para descargar
    }
}
