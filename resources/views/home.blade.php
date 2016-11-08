@extends('layouts.app')
@section('title')
home
@endsection
@section('content')
{!! Html::style( asset('css/sidebar.css')) !!}
<div class="container">
    <div class="row">
    <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/home')}}">Menu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::to('/home')}}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li ><a href="{{URL::to('/profile')}}">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li ><a href="#">Messages<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li ><a href="#">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li ><a href="#">Messages<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('comment_msg'))
                <div class="alert alert-success">
                    <h2>{!! Session::get('comment_msg') !!}</h2>
                </div>
            @endif
            @if($errors->first('comment'))
                <p class="errors">{!!$errors->first('comment')!!}</p>
            @endif
            @foreach($all_data as $data)
            @if($data->data_id =='')
            @endif
                    
            <div class="panel panel-primary">
                <div class="panel-heading">{{$data->name}} <small>{{$data->status_date }}</small></div>
                <div class="panel-body">
                @if($data->image != '') 
                    <img src= "{!! $data->image !!}"  height="500" width="500" >
                 @endif
                 @if($data->status_name != '')
                    <p>{!! $data->status_name !!}</p>
                 @endif
                 @if($data->video != '')
                 <video width="500" controls>
                          <source src= "{!! $data->vidoe !!}" type="video/mp4">
                    </video>
                 @endif
                </div>

                @foreach($likes as $like)
                @if($like->liked_by == $cur_user && $like->likes_data_id == $data->data_id)
                    <?php 
                    $liked = 'true';
                    ?>
                    @else
                    <?php
                    $liked = 'false';
                    ?>
                @endif
                @endforeach 
                @if($liked == 'true')
                    <a href="#" class="dislike-btn" data = "{!! $data->data_id !!}">dislike</a>
                @else
                    <a href="#" class="like-btn"  data = "{!! $data->data_id !!}" style="text-decoration: none;">Like</a>
                @endif
                <br>

                <hr>
                <div>
                <form class="form-inline" method="post" action="{{ url('/post_comment') }}">
                    <div class="form-group" style="margin-bottom: 1%;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="data_id" id='data_id' value="{!! $data->data_id !!}">
                        <input type="hidden" id="user" value="{!! $cur_user !!}">
                        <label for="comment">Comment:</label>
                        <input type="text" name="comment" placeholder="write a comment.." required class="form-control" id="comment">
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
                </div>
                @foreach($comments as $comment)
                    @if($data->data_id == $comment->data_id)
                        <label style="color: blue;">{!! $comment->name !!}</label>:<small>{!! $comment->comment !!}</small>
                        <br><hr>
                    @endif
                @endforeach
            </div>
             @endforeach
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $('.like-btn').click(function(){
        var user = document.getElementById('user').value;
        var data_id = $(this).attr('data');
    $.ajax({
    type:"GET",
    url:"post_vote_up",
    data:'like=1&user=' + user + '&data_id=' + data_id,
    success: function(){
    window.location.replace("/home");}
    });
});

    $('.dislike-btn').click(function(){
        var user = document.getElementById('user').value;
        var data_id = $(this).attr('data');
    $.ajax({
    type:"GET",
    url:"post_vote_delete",
    data:'like=1&user=' + user + '&data_id=' + data_id,
    success: function(){
    window.location.replace("/home");}
    });
});
</script>
<script type="text/javascript">
       function htmlbodyHeightUpdate(){
        var height3 = $( window ).height()
        var height1 = $('.nav').height()+50
        height2 = $('.main').height()
        if(height2 > height3){
            $('html').height(Math.max(height1,height3,height2)+10);
            $('body').height(Math.max(height1,height3,height2)+10);
        }
        else
        {
            $('html').height(Math.max(height1,height3,height2));
            $('body').height(Math.max(height1,height3,height2));
        }
        
    }
    $(document).ready(function () {
        htmlbodyHeightUpdate()
        $( window ).resize(function() {
            htmlbodyHeightUpdate()
        });
        $( window ).scroll(function() {
            height2 = $('.main').height()
            htmlbodyHeightUpdate()
        });
    });
</script>

@endsection
