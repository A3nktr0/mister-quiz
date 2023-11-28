@extends('app')

@section('content')


<style>
    div div table thead tr th{
        width: 20%;
    }
    div div table tbody tr td{
        width: 20%;
        text-align: center;
        font-size: 22px;
    }

    .profile-email{
        font-size: 24px;
    }
</style>

@php
function getTotalAnswers($user){
    $cat = ['art', 'geography', 'history', 'science', 'sports'];
    $totalAnswers = [0,0];
    foreach ($cat as $c){
        $list = explode("/", $user->$c);
        $totalAnswers[0] +=  intval($list[0]);
        $totalAnswers[1] += intval($list[1]);
    }
    return join("/", $totalAnswers);
}
@endphp

@php
    $count=0
@endphp

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div style="margin-top:200px">
    <div class="profile-header" style="margin: 0;">
        
        <table style="width: 80%; border-collapse: separate; border-spacing: 20px; margin: auto;">    
        <caption class="title">Top 10</caption>
        <thead>
            <tr>
                <th class="title profile-email">Place</th>
                <th class="title profile-email">Username</th>
                <th class="title profile-email">Xp Amount</th>
                <th class="title profile-email">Total correct answers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($top as $t)
            @php
                $count++
            @endphp
            <tr> 
                <td>{{ $count }}</td>
                <td>{{ $t->username }}</td>
                <td>{{ $t->xp }}</td>
                <td> {{ getTotalAnswers($t) }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection