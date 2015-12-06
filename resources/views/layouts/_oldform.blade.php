{{--<form>--}}
{{--<fieldset>--}}
{{--<legend>Create A New {{ ucwords($action) }}</legend>--}}
{{--<div class="row">--}}
{{--<div class="large-12 columns">--}}
{{--<label>Ticket Title--}}
{{--<input type="text" placeholder="large-12.columns" />--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="large-6 columns">--}}
{{--<label>Ticket Description--}}
{{--<textarea placeholder="small-12.columns"></textarea>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="large-6 columns">--}}
{{--<label>Ticket Type:--}}
{{--<select>--}}
{{--@foreach($ticket_types as $type)--}}
{{--<option {{ $action == $type ? 'selected' : ''}} value="{{ $type }}">{{ $type }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="large-3 columns">--}}
{{--<label>Ticket Priority:--}}
{{--<select>--}}
{{--@foreach($ticket_priorities as $priority)--}}
{{--<option {{ $priority == 'low' ? 'selected' : '' }} value="{{ $priority }}">{{ ucwords($priority) }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="large-3 columns">--}}
{{--<label>Dev Assigned:--}}
{{--<select>--}}
{{--@foreach($users as $user)--}}
{{--<option value="{{ $user->id }}">{{ ucwords($user->name) }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="large-3 columns">--}}
{{--<label>Dev LOE--}}
{{--<input type="text" placeholder="large-12.columns" />--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="large-3 columns">--}}
{{--<label>Baclog:--}}
{{--<select>--}}
{{--@foreach($backlogs as $backlog)--}}
{{--<option value="{{ $backlog->id }}">{{ ucwords($backlog->name) }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--<hr/>--}}
{{--<div class="row">--}}
{{--<div class="large-12 columns">--}}
{{--<input class=" right button tiny" type="submit" name="ticket-action-submit" value="Create Ticket">--}}
{{--</div>--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--</form>--}}