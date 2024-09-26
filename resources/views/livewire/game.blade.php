{{-- <div wire:poll.1s> --}}
<div>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        @if ($show_question)
            <div class="question-text mb-2">
                60
            </div>
            <div class="question-text">
                {{ $text }}
            </div>

        <form>
            <div class="row text-center">
                @foreach($answers as $answer)
                    <div class="form-check">
                        <input wire:model="checkbox_answers" class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios{{$answer->id}}" value="{{$answer->answer}}">
                        <label class="form-check-label" for="optionsRadios{{$answer->id}}">
                            {{$answer->answer}}
                        </label>
                    </div>
                @endforeach
                <a wire:click="sendAnswer()" class="btn btn-outline-success mt-4 mx-auto"> Ответить </a>
            </div>
        </form>
        @else
            <h1>Стадия отдыха</h1>
        @endif

    </div>
</div>
