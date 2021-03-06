@extends('Shared.Layouts.MasterWithoutMenus')

@section('title')
    Select Organiser
@stop

@section('head')
    <style>
        .modal-header {
            background-color: transparent !important;
            color: #666 !important;
            text-shadow: none !important;;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="logo">
                        {!!HTML::image('assets/images/tixy.png')!!}
                    </div>

                    <h5>Continue to:</h5>
                    <br />
                    
                    @if($user->email == 'ayodele@enterfive.com' || $user->email == 'kemdi@enterfive.com' || $user->email == 'dele@enterfive.com')

                        <div class="list-group">
                            @foreach($organisers as $organiser)
                                <a href="{{route('showOrganiserDashboard', ['organiser_id'=>$organiser->id] )}}"
                                class="list-group-item">
                                    {{$organiser->name}}
                                </a>
                            @endforeach
                        </div>
                        

                        <div style="margin-top:-15px; padding: 10px; text-align: center;">
                            OR
                        </div>
                        <a style="color: white;" href="{{route('showCreateOrganiser')}}" class="btn btn-block btn-success">Create New Organiser</a>
                    
                    @else
                        <div class="list-group">
                            @foreach($organisers as $organiser)
                                @if($user->email != 'ayodele@enterfive.com' || $user->email != 'kemdi@enterfive.com' || $user->email != 'dele@enterfive.com')
                                    @if($user->email == $organiser->email)
                                        <a href="{{route('showOrganiserDashboard', ['organiser_id'=>$organiser->id] )}}"
                                        class="list-group-item">
                                            {{$organiser->name}}
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <a style="color: white;" href="{{route('logout')}}" class="btn btn-block btn-success">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
@stop

