<!--left side navigation-->
<div id="ticket-hirarchy" class="large-2 medium-3 columns">
    <!-- for backlogs -->
    <ul id="actions" class="side-nav">
        <li class="title">ACTIONS</li>
        <li><a href="{{ url('/ticket/create') }}">Create A New Ticket</a></li>
    </ul>
    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>
    <!-- for backlogs -->
    <ul id="backlogs" class="side-nav">
        <li class="title">BACKLOGS</li>
        @foreach($backlogs as $backlog)
            <li><a href="{{ url('tickets/backlog', $backlog->id) }}">{{ $backlog->name }}<span class="label right">{{ $backlog->tickets()->count() }}</span></a></li>
        @endforeach
    </ul>
    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>
    <!-- for opened, closed, etc.. -->
    <ul id="ticket-special" class="side-nav">

        <li class="title">SPECIAL FILTERS</li>
        @if(Auth::check())
            <li><a href="{{ url('/tickets/user', Auth::user()->id) }}">My Tickets<span class="label right">{{ Auth::user()->tickets()->count() }}</span></a></li>
        @endif

        <!-- open, close tickets filter -->
        <li><a href="{{ url('/tickets/status', 'open') }}">Open Tickets<span class="label right">{{ $open_tickets_count }}</span></a></li>
        <li><a href="{{ url('/tickets/status', 'close') }}">Closed Tickets<span class="label right">{{ $close_tickets_count }}</span></a></li>

        <li class="divider"></li>

        <!-- bug, task tickets filter -->
        <li><a href="{{ url('/tickets/type', 'task') }}">Bug Tickets<span class="label right">{{ $bug_tickets_count }}</span></a></li>
        <li><a href="{{ url('/tickets/type', 'bug') }}">Task Tickets<span class="label right">{{ $task_tickets_count }}</span></a></li>

        <li class="divider"></li>

        <!-- high, low and medium priority tickets filter -->
        <li><a href="{{ url('/tickets/priority', 'high') }}">High Priority Tickets<span class="label right">{{ $high_prio_tickets_count }}</span></a></li>
        <li><a href="{{ url('/tickets/priority', 'low') }}">Low Priority Tickets<span class="label right">{{ $low_prio_tickets_count }}</span></a></li>
        <li><a href="{{ url('/tickets/priority', 'medium') }}">Medium Priority Tickets<span class="label right">{{ $medium_prio_tickets_count }}</span></a></li>

    </ul>
    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>
</div>