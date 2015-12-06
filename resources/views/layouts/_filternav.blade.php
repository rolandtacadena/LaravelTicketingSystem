<dl class="filter-navigation sub-nav">
    <dt>Filter:</dt>
    <dd><a href="{{ url('/tickets') }}">All <span class="label right">{{ $all_tickets_count }}</span></a></dd>
    @if(Auth::check())
        <dd><a href="{{ url('tickets/user', Auth::user()->id) }}">My Tickets<span class="label right">{{ Auth::user()->tickets()->count() }}</span></a></dd>
    @endif
    <dd><a href="{{ url('tickets/status/open') }}">Open Tickets<span class="label right">{{ $open_tickets_count }}</span></a></dd>
    <dd><a href="{{ url('tickets/status/close') }}">Closed Tickets<span class="label right">{{ $close_tickets_count }}</span></a></dd>
</dl>