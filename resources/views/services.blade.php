@extends('layouts.app')
@section('title')
services
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
            <div class="panel panel-primary">
                <div class="panel-heading">Status</div>
                <div class="panel-body">
                   <div class="about-section">
                       <div class="text-content">
                         <div class="span7 offset1">
                            @if(Session::has('success2'))
                              <div class="alert alert-success">
                              <h2>{!! Session::get('success2') !!}</h2>
                              </div>
                            @endif
                            <div class="secure">Upload status! whats in your mind?</div>
                            {!! Form::open(array('url'=>'/status','method'=>'POST')) !!}
                             <div class="control-group">
                              <div class="controls">
                              {!! Form::textarea('status') !!}
                          <p class="errors">{!!$errors->first('status')!!}</p>
                        @if(Session::has('error2'))
                        <div class="alert alert-danger">
                        <p class="errors">{!! Session::get('error2') !!}</p>
                        </div>
                        @endif
                            </div>
                            </div>
                            <div id="success"> </div>
                          {!! Form::submit('Post', array('class'=>'send-btn btn-success')) !!}
                          {!! Form::close() !!}
                          </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Images</div>
                <div class="panel-body">
                   <div class="about-section">
                       <div class="text-content">
                         <div class="span7 offset1">
                            @if(Session::has('success'))
                              <div class="alert alert-success">
                              <h2>{!! Session::get('success') !!}</h2>
                              </div>
                            @endif
                            <div class="secure">Upload Image</div>
                            {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                             <div class="control-group">
                              <div class="controls">
                              {!! Form::file('image') !!}
                          <p class="errors">{!!$errors->first('image')!!}</p>
                        @if(Session::has('error'))
                        <p class="errors">{!! Session::get('error') !!}</p>
                        @endif
                            </div>
                            </div>
                            <div id="success"> </div>
                          {!! Form::submit('Upload', array('class'=>'send-btn btn-success')) !!}
                          {!! Form::close() !!}
                          </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Vidoes</div>
                <div class="panel-body">
                   <div class="about-section">
                       <div class="text-content">
                         <div class="span7 offset1">
                            @if(Session::has('success1'))
                              <div class="alert alert-success">
                              <h2>{!! Session::get('success1') !!}</h2>
                              </div>
                            @endif
                            <div class="secure">Upload video</div>
                            {!! Form::open(array('url'=>'video/upload','method'=>'POST', 'files'=>true)) !!}
                             <div class="control-group">
                              <div class="controls">
                              {!! Form::file('video') !!}
                          <p class="errors">{!!$errors->first('video')!!}</p>
                        @if(Session::has('error1'))
                        <div class="alert alert-danger">
                        <p class="errors">{!! Session::get('error1') !!}</p>
                        </div>
                        @endif
                            </div>
                            </div>
                            <div id="success"> </div>
                          {!! Form::submit('Upload', array('class'=>'send-btn btn-success')) !!}
                          {!! Form::close() !!}
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
