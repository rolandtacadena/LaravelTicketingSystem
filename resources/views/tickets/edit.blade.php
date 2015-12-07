@extends('app')

@section('content')
    <!-- left nav -->
    @include('layouts._leftnav')

    <div id="ticket-table" class="large-10 medium-9 columns">

        <!--filter navigation-->
        @include('layouts._filternav')

        <!-- include errors -->
        @include('errors.list')

        <div class="ticket-form">
            {!! Form::model($ticket, ['method' => 'PUT', 'action' => ['TicketsController@update', $ticket->id]]) !!}
                @include('tickets.form', ['submiButtonText' => 'Update Ticket', 'formLabel' => 'Edit Ticket'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection