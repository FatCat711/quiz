{{--wire:poll.1s--}}
<div>
    @if($show_question)
        <div>
            <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
                <p style="font-size: 50px" class="mb-4">60</p>
                <p style="font-size: 50px" class="mb-4">Вопрос № {{$question_id}}</p>
                <p style="font-size: 50px">{{$text}}</p>
                <hr>
                <div class="w-100">
                    <p style="font-size: 40px">Варианты ответов:</p>
                    @foreach($answers as $answer)
                        <p style="font-size: 40px">- {{$answer->answer}}</p>
                    @endforeach
                </div>
                <a id="next" wire:click="nextStage({{$game->chill_stage}})" type="button" class="btn btn-dark btn-lg">Далее</a>
            </div>
        </div>
    @else
        <div>
            <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
                <h1>
                    Стадия чила
                </h1>
                <a id="next_q" wire:click="nextStage({{$game->chill_stage}})" type="button" class="btn btn-dark btn-lg">Далее</a>
            </div>
        </div>
    @endif
</div>
