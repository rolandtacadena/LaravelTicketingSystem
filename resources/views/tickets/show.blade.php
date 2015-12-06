@extends('app')

@section('content')
    <!-- left nav -->
    @include('layouts._leftnav')

    <div class="general-right-column large-10 medium-9 columns">

        <!--filter navigation-->
        @include('layouts._filternav')

        <!-- include errors -->
        @include('errors.list')

        <h5 class="subheader"><a href="{{ $ticket->id }}">#{{ $ticket->id . " " . $ticket->title }}</a></h5>
        <div class="ticket-prop">
            <ul>
                <li>Ticket Description: <span>{{ $ticket->description }}</span></li>
                <li>Ticket Type: <span>{{ $ticket->type }}</span></li>
                <li>Ticket Priority: <span>{{ $ticket->priority }}</span></li>
                <li>Ticket Dev Assigned: <span>{{ $ticket->user->name }}</span></li>
                <li>Ticket Dev LOE: <span>{{ $ticket->dev_loe }}</span></li>
                <li>Ticket Status: <span>{{ $ticket->status }}</span></li>
                <li>Ticket BAcklog: <span>{{ $ticket->backlog->name }}</span></li>
            </ul>
        </div>
        <hr/>
        <div class="ticket-hist">
            <h5>Ticket History</h5>
            <div class="hist">
                <ul>
                    <li>Changed owner to <i>rtacadena</i></li>
                    <li>Set dev % complete to <i>100%</i></li>
                </ul>
                <hr/>
                <ul>
                    <li>Changed owner to <i>rtacadena</i></li>
                    <li>Set dev % complete to <i>100%</i></li>
                </ul>
                <hr/>
                <ul>
                    <li>Changed owner to <i>rtacadena</i></li>
                    <li>Set dev % complete to <i>100%</i></li>
                </ul>
                <hr/>
            </div>
        </div>
        <div class="update-ticket">
            <div class="ticket-form">
                {!! Form::model($ticket, ['method' => 'PUT', 'action' => ['TicketsController@update', $ticket->id]]) !!}
                @include('tickets.form', ['submiButtonText' => 'Update Article', 'formLabel' => 'Edit Article'])
                {!! Form::close() !!}
            </div>
        </div>
        @if(Auth::check())
            <div class="form-ticket-comment">
                {!! Form::model($comment = new \App\Comment, ['action' => ['CommentsController@store', $ticket->id]]) !!}
                    {!! Form::hidden('ticket_action', 'comment') !!}
                    <fieldset>
                        <legend>Add Comment</legend>
                        <div class="row">
                            <div class="large-12 columns">
                                {!! Form::label('comment', 'Add Comment to this ticket:') !!}
                                {!! Form::textarea('comment', null, ['placeholder' => 'Add comment', 'rows' => 2]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                {!! Form::submit('Add Comment', ['class' => 'right button tiny']) !!}
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        @else
            <p>In order to create comment for this ticket, you must be logged in. <a href="{{ url('auth/login') }}">Log in</a> or
                <a href="{{ url('auth/register') }}">Register</a></p>
        @endif
        <div class="comment-list">
            <h5 class="subheader">Ticket Comments ({{ count($comments_for_ticket) }})</h5>
            <ul>
                @foreach($comments_for_ticket as $comment)
                    <li><span>{{ $comment->comment }}</span> - <i><a href="{{ url('/tickets/user', $comment->user_id) }}">{{ $comment->user->name }}</a></i></li>
                @endforeach
            </ul>
        </div>
        <hr/>
    </div>
@endsection