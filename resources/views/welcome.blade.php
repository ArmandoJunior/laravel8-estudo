<h2>Eventos</h2>
<hr>
<ul>
    @forelse($events as $event)
        <li>{{ $event->title }}</li>
    @empty
        <li>Nenhum evento encontrado neste sistema!</li>
    @endforelse
</ul>

