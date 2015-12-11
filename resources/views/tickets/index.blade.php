@extends('app')

@section('content')
    <div class="row">
        <!-- left nav -->
        @include('layouts._leftnav')



        <!--right side navigation-->
        <div id="ticket-table" class="large-10 medium-9 columns">
            <!--filter navigation-->
            @include('layouts._filternav')

            <!-- flash message for created ticket -->
            @include('partials.flash')

            <hr/>

            @if(count($tickets) > 0)
                <h4 class="subheader">{{ $header }}</h4>
                <table>
                    <thead>
                    <tr>
                        <th width="">Ticket #</th>
                        <th>Title</th>
                        <th width="">Description</th>
                        <th>Owner</th>
                        <th>Baclog</th>
                        <th width="">Type</th>
                        <th width="">Priority</th>
                        <th width="">Status</th>
                        <th width="">Dev LOE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td><a href="{{ url('/ticket', $ticket->id) }}">#{{ $ticket->id }}</a></td>
                            <td><a href="{{ url('/ticket', $ticket->id) }}">{{ $ticket->title }}</a></td>
                            <td>{{ $ticket->description }}</td>
                            <td><a href="{{ url('/tickets/user', $ticket->user_id) }}">{{ $ticket->user->name }}</a></td>
                            <td><a href="{{ url('/tickets/backlog', $ticket->backlog_id) }}">{{ $ticket->backlog->name }}</a></td>
                            <td><a href="{{ url('/tickets/type', $ticket->type) }}">{{ $ticket->type }}</a></td>
                            <td><a href="{{ url('/tickets/priority', $ticket->priority) }}">{{ $ticket->priority }}</a></td>
                            <td><a href="{{ url('/tickets/status', $ticket->status) }}">{{ $ticket->status }}</a></td>
                            <td>{{ $ticket->dev_loe }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! str_replace('/?', '?', $tickets->render()) !!}
            @else
                <h4 class="subheader">Sorry there were no tickets returned.</h4>
            @endif

        </div>
    </div>
@endsection
