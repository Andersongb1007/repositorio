<?php

namespace App\Http\Controllers;

use App\Models\Zips;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class zipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zips = Zips::all();
        return view('zip.index', compact('zips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recibir el archivo en partes
        $receiver = new FileReceiver("archivos", $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            // Manejar error de carga
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {
            // El archivo ha sido cargado completamente y está listo para ser procesado
            $file = $save->getFile();

            $zipFileName = $file->getClientOriginalName();
            $destinationPath = public_path('/uploads');
            $zipFilePath = $destinationPath . '/' . $zipFileName;

            // Mover el archivo al destino final
            $file->move($destinationPath, $zipFileName);

            // Descomprimir el archivo ZIP
            $zip = Zip::open($zipFilePath);
            $extractPath = public_path('/unzip');
            $zip->extract($extractPath);

            // Obtener la lista de archivos descomprimidos
            $files = array_diff(scandir($extractPath), array('.', '..'));

            // Puedes hacer algo con los archivos aquí

            // Devolver respuesta
            return response()->json([
                'status' => 'success',
                'files' => $files
            ]);
        } else {
            // Manejar la carga en partes
            /** @var AbstractHandler $handler */
            $handler = $save->handler();

            return response()->json([
                "done" => $handler->getPercentageDone(),
                "status" => "partial"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
