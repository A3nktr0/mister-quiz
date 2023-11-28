@extends('app')

@section('content')

<style>
    .results-wrapper{
        display: flex;
        justify-content: space-around;
        width: 70%;
        margin: 100px auto;
    }
    .result{
        color: #fff;
        font-size: 22px;
        text-align: center;
    }
</style>

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name">{{ auth()->user()->username }}</p>
        <p class="profile-email">{{ auth()->user()->email }}</p>
    </div>
    <br />
    <p class="title profile-xp">Rank:
        @if( auth()->user()->xp < 1500)
            Quiz Aprentice
        @elseif ( auth()->user()->xp >= 1500 && auth()->user()->xp < 5000)
            Average Quizer
        @elseif( auth()->user()->xp >= 5000 && auth()->user()->xp < 10000)
            Epic Quizer
        @elseif( auth()->user()->xp >= 10000)
            Quiz Master
        @endif
        {{ auth()->user()->xp }} XP
    </p>
</div>

    
    @php
    function calcPercent($value){
        $parts = explode("/", $value);
        if ($parts[1] != "0"){
            return round((($parts[0]*100)/$parts[1]), 2);
        };
        return 0;
    }
    $categories = ['art', 'geography', 'history', 'science', 'sports'];
    @endphp
    @foreach($categories as $cat)
    @php
        $percentage = calcPercent(auth()->user()->$cat);
        @endphp
        <div class="results-wrapper">
            <p class="result">{{ Str::ucfirst($cat) }}: {{ auth()->user()->$cat }} ({{ $percentage }}%)</p>
        </div>
    @endforeach

@endsection
