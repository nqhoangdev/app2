@extends('master')


@section('title', 'Ticket detail')

@section('content')

<!--Ticket detail-->

<div class="container col-md-8 col-md-offset-2">
    <div class="well">

        <div class="content">

            <h2 class="header">{!! $ticket->title !!}</h2>
            <p> {!! $ticket->content !!} </p>
            <p> <strong>Status</strong>: {!! $ticket->status ? 'Pending' : 'Answered' !!}</p>
            <a href="{!! action('TicketsController@edit', ['slug' => $ticket->slug]) !!}" class="btn btn-info col-xs-offset-0.5">Edit</a>
            <form method="post" action="{!! action('TicketsController@destroy', $ticket->slug) !!}" class="pull-left">

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </div>
                </div>
            </form>
        </div>     
        
        
    </div>           
</div>

<!--Comments-->

<div class="container col-md-8 col-md-offset-2">
   <legend>Comments</legend>
    <div class="well">
        <ul>

            @foreach($comments as $comment)
            <div class="card card-inverse card-primary text-xs-center">
                <div class="card-block">
                    {!! $comment->content !!}
                </div>
            </div>
            @endforeach

        </ul>
    </div>
</div>


<!--Rely form-->

<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <form class="form-horizontal" method="post" action="/comment">

            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="ticket_id" value="{!! $ticket->id !!}">

            <fieldset>
                <legend>Reply</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@stop