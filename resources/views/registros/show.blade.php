@extends('layouts.app', ['activePage' => 'registro.show', 'titlePage' => __('Mostrar registro')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($videos && count($videos) > 0)
                    @foreach ($videos as $video)
                        <div class="col-md-4 col-12">
                            <div class="video-container">
                                {{-- Usar la etiqueta <video> para mostrar una vista previa del vídeo --}}
                                <a href="{{ asset($video) }}" target="_blank">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset($video) }}" type="video/mp4">
                                        Tu navegador no soporta vídeos HTML5.
                                    </video>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No hay videos para mostrar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
