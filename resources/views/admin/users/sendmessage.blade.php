@extends('adminlte::page')

@section('title', 'Mensajes')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')

    <h1>Enviar Mesaje a Usuario</h1>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.users.savemessage') }}" method="POST">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">Ecribir Mensaje</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="form-group">
                        <label for="">Seleccione Destinatario</label>
                        <select name="para" id="para" class="form-control">
                            <option value=""> ... </option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('para'))
                            <span class="text-danger">{{ $errors->first('para') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Asunto:</label>
                        <input class="form-control"  name="asunto" id="asunto" placeholder="Asunto del Mensaje:">
                        @if ($errors->has('asunto'))
                            <span class="text-danger">{{ $errors->first('asunto') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Mensaje:</label>
                        <textarea name="compose" id="compose" class="form-control" style="height: 150px;"></textarea>
                        @if ($errors->has('compose'))
                            <span class="text-danger">{{ $errors->first('compose') }}</span>
                        @endif
                    </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                        <a href="{{ route('admin.users.sendmessage') }}" class="btn btn-warning"><i class="fas fa-sync"></i> Recargar</a>
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">Notificaciones sin Leer</div>
                      <div class="card-body">

                        @if (auth()->user())
                            @forelse ($notificaciones as $notification)
                                <div class="alert alert-info alert-dismissible">

                                    <p>
                                        @isset ($notification->data['photo'])
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="direct-chat-img" src="{{ asset('/avatar/'. $notification->data['photo']) }}">
                                            </li>
                                        @else
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="direct-chat-img" src="{{ asset('/avatar/user_default.png') }}">
                                            </li>
                                        @endif
                                        Asunto: {{ $notification->data['asunto'] }}
                                    </p>
                                    <p>Mensaje: {{ $notification->data['mensaje'] }}</p>
                                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                                    @isset($notification->data['read_at'])

                                    @else
                                        <button type="submit" class="mark-as-read btn btn-sm btn-dark" data-id="{{ $notification->id }}">Marcar como Leida</button>
                                    @endisset

                                </div>
                                @if ($loop->last)
                                    <a href="#" id="mark-all">Marcar todas como Leidas</a>
                                @endif
                            @empty
                               No hay notificaciones que mostrar
                            @endforelse

                        @endif

                      </div>
                    </div>
                  </div>
                </div>
                {{-- notificaciones leidas --}}
                <div class="row justify-content-center">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">Notificaciones Leidas</div>
                        <div class="card-body">

                          @if (auth()->user())
                              @forelse ($notificacionesLeidas as $item)
                                  <div class="alert alert-success alert-dismissible">

                                      <p>
                                          @isset ($item->data['photo'])
                                              <li class="list-inline-item">
                                                  <img alt="Avatar" class="direct-chat-img" src="{{ asset('/avatar/'. $item->data['photo']) }}">
                                              </li>
                                          @else
                                              <li class="list-inline-item">
                                                  <img alt="Avatar" class="direct-chat-img" src="{{ asset('/avatar/user_default.png') }}">
                                              </li>
                                          @endif
                                          Asunto: {{ $item->data['asunto'] }}
                                      </p>
                                      <p>Mensaje: {{ $item->data['mensaje'] }}</p>
                                      <p>{{ $item->created_at->diffForHumans() }}</p>
                                      <p>{{ $item->read_at->diffForHumans() }}</p>
                                  </div>

                              @empty
                                 No hay notificaciones que mostrar
                              @endforelse

                          @endif

                        </div>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    </div>
@stop



@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        function sendMarkRequest(id = null){
          return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
              id
            }
          });
        }

        $(function(){
          $('.mark-as-read').click(function(){
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
              $(this).parents('div.alert').remove();
            });
          });

          $('#mark-all').click(function(){
            let request = sendMarkRequest();

            request.done(() => {
              $('div.alert').remove();
            })
          });
        });
    </script>

@stop
