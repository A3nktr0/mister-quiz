@extends('app')

@section('content')

<form action="{{ route('quiz', $quiz) }}" method="post">
    @csrf

    @if ($quiz)
    @foreach ($quiz as $question)
    <x-question :question="$question" />
    @endforeach
    @endif

    <button type="submit" class="center green-btn">Submit</button>
</form>


@endsection