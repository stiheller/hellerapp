<div class="card">
    <div class="card-header">
        <h3>USUARIOS EN LINEA</h3>
    </div>
    <div class="card-body">
        <table id="centrex" class="table table-striped table-bordered table-hover table-responsive projects" style="width:100%">
            <thead>
                <th>FOTO</th>
                <th>USUARIO</th>
                <th>IP</th>
                <th>CUANDO</th>
            </thead>
            <tbody>
                @foreach ($enlinea as $item)
                    <tr>
                        <td>
                            @isset ($item->image)
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('/avatar/'. $item->image) }}">
                                </li>
                            @else
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('/avatar/user_default.png') }}">
                                </li>
                            @endif
                        </td>
                        <td>{{ $item->name }} </td>
                        <td class="text-right">{{ $item->ip_address }}</td>
                         <td class="text-right">{{ \Carbon\Carbon::parse($item->last_activity)->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}</td>
                        {{--  <td class="text-right">{{ \Carbon\Carbon::parse($item->last_activity)->format('d/m/Y H:i:s') }}</td> --}}
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
