{{-- <div wire:poll.10s> --}}
<div>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        @if ($show_question)
            <div class="question-text mb-2">
                60
            </div>
            <div class="question-text">
                {{ $text }}
            </div>

            <div class="row text-center">
                <div class="col-6">
                    <div class="square yellow mx-auto">
                        <h1 class="text-center">A</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="square blue mx-auto">
                        <h1 class="text-center">B</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="square red mt-5 mx-auto">
                        <h1 class="text-center">C</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="square green mt-5 mx-auto">
                        <h1 class="text-center">D</h1>
                    </div>
                </div>
            </div>
        @else
            <h1>Стадия ожидания</h1>
        @endif

    </div>
</div>
