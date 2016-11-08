@extends('layouts.app')
@section('title')
contect us
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
            <section id="contact-section" data-effect="fadeIn" class="animated contact-section normal-background light  ">          
    
    <a class="ut-offset-anchor" id="section-contact"></a> 
        
                
            
                
                
                
        <div class="parallax-overlay parallax-overlay-pattern style_one">
        
                
        <div class="grid-container parallax-content">
            
                        
            <!-- parallax header -->
            <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                <header class="parallax-header pt-style-1">
                    
                                            <h2 class="parallax-title"><span>Where You can Find Us!</span></h2>
                                        
                                            <p class="lead">Get in touch with <span>us</span>!</p>
                                        
                </header>
            </div>
            <!-- close parallax header -->
            
            <div class="clear"></div>
            
                    
        </div>
        <div class="grid-container section-content">
            
            <!-- contact wrap -->
            <div class="grid-100 mobile-grid-100 tablet-grid-100 grid-parent">
                <div class="contact-wrap">
                
                                        
                    <!-- contact message -->
                    <div class="grid-45 suffix-5 mobile-grid-100 tablet-grid-50">
                        <div class="ut-left-footer-area clearfix">
                            
                            <h3><span style="color: #f1c40f;">OUR ADDRESS</span></h3>
<ul class="fa-ul">
<li><i class="fa-li fa fa-home"></i>10 vernet gardens Oldham OL9 7EU.</li>
<li><i class="fa-li fa fa-phone"></i>+44 161 8189099</li>
<li><i class="fa-li fa fa-envelope-o"></i>info@ultimateoutsourcing.co.uk</li>
</ul>
                            
                        </div>
                    </div><!-- close contact message -->
                    
                                        
                                        
                    <!-- contact form-holder -->
                    <div class="grid-50 mobile-grid-100 tablet-grid-50">
                        <div class="ut-right-footer-area clearfix">
                            
                            <h3><span style="color: #f1c40f;">DROP US A LINE</span></h3>
<p><div role="form" class="wpcf7" id="wpcf7-f32-o2" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="$" method="post" class="wpcf7-form">
<p>Your Name (required)<br />
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </p>
<p>Your Email (required)<br />
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </p>
<p>Your Message<br />
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></p>
                                
                        </div>
                    </div><!-- close contact-form-holder -->
                    
                                        
                    
                </div>
            </div><!-- close contact wrap -->
            
            
        </div><!-- close container -->
        
                
        </div><!-- parallax overlay -->
        
                
    </section>
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
