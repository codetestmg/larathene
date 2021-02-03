@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="mt-5"></div>
    <div class="row justify-content-center">

        @if(isset($themesList)&&count($themesList))

        @foreach($themesList as $key=>$value)
        <div class="col-md-4">
            <div class="theme-block">
                <img src="{{themes($key.':preview.png')}}" class="img-fluid " style="width: 100%;height: 250px">
                <div class="theme-detail" style="background: #ffffff;color: #000000;padding: 10px;font-weight: 300;box-shadow: inset 0 1px 1px rgb(0 0 0 / 50%);overflow: auto">
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="theme_name" value="{{$value->get('name')}}">
                   <span class="float-left"> <h6>{{$value->get('title')}}</h6></span>
                    <span class="theme-action float-right">
                        @if(isset($installedThemeList[$value->get('name')])&&$installedThemeList[$value->get('name')]==0)

                        <input type="hidden" name="type" value="activate">
                        <button type="submit" class="btn btn-success">Activate</button>
                            @elseif(isset($installedThemeList[$value->get('name')])&&$installedThemeList[$value->get('name')]==1)
                        <button class="btn btn-warning">Activated</button>
                    @else
                            <input type="hidden" name="type" value="install">
                            <button type="submit"  class="btn btn-info">Install</button>

                            @endif



                    </span>
                    </form>
                </div>
            </div>
        </div>
            @endforeach
            @endif
    </div>
</div>
@endsection
