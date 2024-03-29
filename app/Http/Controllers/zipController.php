<?php

namespace App\Http\Controllers;

use App\Models\Registros;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Illuminate\Support\Str;

class zipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zips = Registros::all();
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
            return response()->json(['error' => 'Error en la carga del archivo'], 400);
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {
            $file = $save->getFile();

            // Nombre del archivo ZIP original
            $zipFileName = $file->getClientOriginalName();

            // Generar un nombre único para la carpeta de destino
            $folderName = Str::random(10) . '_' . time(); // Ejemplo: cadenaAleatoria_timestamp
            $extractPath = public_path('/registros/' . $folderName);

            if (!file_exists($extractPath)) {
                mkdir($extractPath, 0777, true);
            }

            // Descomprimir el archivo ZIP
            $zip = Zip::open($file->getPathName());
            $zip->extract($extractPath);

            $files = array_diff(scandir($extractPath), array('.', '..'));

            // Preparar los datos para la base de datos
            $filesWithPaths = array_map(function ($file) use ($folderName) {
                return '/registros/' . $folderName . '/' . $file;
            }, $files);

            $filesJson = json_encode($filesWithPaths);

            // Crear el registro en la base de datos
            $registro = Registros::create([
                'archivos' => $filesJson,
            ]);

            return redirect()->route('registros.show', $registro->id);
        } else {
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
