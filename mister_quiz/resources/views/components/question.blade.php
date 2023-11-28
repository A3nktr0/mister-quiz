@props(['question'=>$question])

<style>
    .container{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 90%;
        margin: 0 auto;
        font-size: 22px;
    }
    .quiz-data{
        color: #ffff00
    }

</style>

<div class="mb4">
    <p class="center title">{{ $question->question }}</p>
    <div class="container">
        <p>Category: <span class="quiz-data">{{ $question->category }}</span></p>
        <p>XP Gain: <span class="quiz-data">{{ $question->xp }}</span></p>
    </div>

    <div class="checkboxes-wrapper" class="center">
        @foreach ($question->answers as $answer)
            <div class="checkbox">
            <label for="{{$answer->id}}">
                <input id="{{$answer->id}}" type="radio" name="{{$question->id}}" value="{{ $answer->answer }}" required />
                <span>{{ $answer->answer }}</span>
            </label>
            </div>
        @endforeach
    </div>

    <div class="center line"></div>
</div>

