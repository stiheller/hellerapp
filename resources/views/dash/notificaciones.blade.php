@section('content_top_nav_right')

    @if (count(auth()->user()->unreadNotifications))
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell fa-2x"></i>
            <span class="badge badge-danger  text-white navbar-badge font-weight-bold" style="font-size: 0.75rem">{{ count(auth()->user()->unreadNotifications) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ count(auth()->user()->unreadNotifications) }} Sin Leer</span>
                <div class="dropdown-divider"></div>
                @forelse (auth()->user()->unreadNotifications as $notification)

                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope"></i> {{ $notification->data['enviadoPor'] }}
                        <span class="ml-3 float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                    </a>
                @empty
                    <a href="#" class="dropdown-item dropdown-footer"><i class="fas fa-check-double"></i> Sin Notificaciones por Leer</a>
                @endforelse
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.users.sendmessage') }}" class="dropdown-item dropdown-footer">Ver Todas la Notificaciones</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.user.markAllAsRead') }}" class="dropdown-item dropdown-footer">Marcar Todas como Leidas</a>
            </div>
        </li>
    @endif
@endsection
