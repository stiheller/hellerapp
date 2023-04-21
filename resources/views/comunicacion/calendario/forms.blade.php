<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'Nobre Evento') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del evento']) !!}

                @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      <!-- row end -->
      <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('start_date', 'Fecha Inicial') !!}
                    {!! Form::date('start_date', $dia, ['class' => 'form-control']) !!}
                    @error('start_date')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('start_time', 'Hora Inicial') !!}
                    {!! Form::time('start_time', $hora, ['class' => 'form-control']) !!}
                    @error('start_time')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('end_date', 'Fecha Final') !!}
                    {!! Form::date('end_date', $dia, ['class' => 'form-control']) !!}
                    @error('end_date')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('end_time', 'Hora Final') !!}
                    {!! Form::time('end_time', $hora, ['class' => 'form-control']) !!}
                    @error('end_time')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>


      </div>
      <!-- row end -->
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('agendaObservacion', 'Observacion Evento') !!}
                {!! Form::text('agendaObservacion', 'S/D', ['class' => 'form-control']) !!}

                @error('agendaObservacion')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      <!-- row end -->
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('urlAgendaTeleconf', 'Pagina Web') !!}
                {!! Form::text('urlAgendaTeleconf', 'S/D', ['class' => 'form-control']) !!}

                @error('urlAgendaTeleconf')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      <!-- row end -->
      <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('idSalonTeleconferencia', 'Espacio Institucional') !!}
                {!! Form::select('idSalonTeleconferencia', $salones, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('idEstadoAgendaTeleconf', 'Estado Agenda') !!}
                {!! Form::select('idEstadoAgendaTeleconf', $estados, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('contacto', 'Contacto - Referente Reunion') !!}
                {!! Form::text('contacto', 'S/D', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                {!! Form::label('cantPer', 'Cant Part') !!}
                {!! Form::number('cantPer', '0', ['class' => 'form-control text-right', 'step' => 'any']) !!}
                @error('cantPer')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>

        </div>
        <div class="col-md-2">
             <div class="form-group">
                    <p class="font-weight-bold">Video Conferencia</p>

                <label class="mr-2">
                    {!! Form::radio('videoConferencia', 'S', true) !!}
                    SI
                </label>

                <label>
                    {!! Form::radio('videoConferencia', 'N') !!}
                    NO
                </label>

                @error('videoConferencia')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>



      </div>
       <!-- row end -->
       <div class="row">
            <div class="col-md-2"><label for="">Repetir Lunes</label></div>
            <div class="col-md-2"><label for="">Repetir Martes</label></div>
            <div class="col-md-2"><label for="">Repetir Miercoles</label></div>
            <div class="col-md-2"><label for="">Repetir Jueves</label></div>
            <div class="col-md-2"><label for="">Repetir Viernes</label></div>
       </div>

       <!-- end row -->
       <div class="row">
            <div class="col-md-2"><input type="checkbox" name="lunes"  value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success"></div>
            <div class="col-md-2"><input type="checkbox" name="martes"  value="2"  data-bootstrap-switch data-off-color="danger" data-on-color="success"></div>
            <div class="col-md-2"><input type="checkbox" name="miercoles"  value="3"  data-bootstrap-switch data-off-color="danger" data-on-color="success"></div>
            <div class="col-md-2"><input type="checkbox" name="jueves"  value="4"  data-bootstrap-switch data-off-color="danger" data-on-color="success"></div>
            <div class="col-md-2"><input type="checkbox" name="viernes"  value="5"  data-bootstrap-switch data-off-color="danger" data-on-color="success"></div>
       </div>
    </div>


  </div>
