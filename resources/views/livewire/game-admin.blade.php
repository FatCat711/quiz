{{-- wire:poll.1s --}}
<div>
    @if ($show_question)
        <div>
            <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
                <div class="timer">
                    <div class="timer__items">
                        <div style="display: none" class="timer__item timer__days">00</div>
                        <div style="display: none" class="timer__item timer__hours">00</div>
                        <div style="display: none" class="timer__item timer__minutes">00</div>
                        <div class="timer__item timer__seconds">00</div>
                    </div>
                </div>
                <p style="font-size: 50px" class="mb-4">Вопрос № {{ $question_id }}</p>
                <p style="font-size: 50px">{{ $text }}</p>
                <hr>
                <div class="w-100">
                    <p style="font-size: 40px">Варианты ответов:</p>
                    @foreach ($answers as $answer)
                        <p style="font-size: 40px">- {{ $answer->answer }}</p>
                    @endforeach
                </div>
                {{-- <a id="next" wire:click="nextStage({{ $game->chill_stage }})" type="button"
                    class="btn btn-dark btn-lg">Далее</a> --}}
            </div>
        </div>
    @else
        <div>
            <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
                <h1>
                    Стадия чила
                </h1>
                {{-- <a id="next_q" wire:click="nextStage({{$game->chill_stage}})" type="button" class="btn btn-dark btn-lg">Далее</a> --}}
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // конечная дата, например 1 июля 2021
            const deadline = new Date("{{ $timer }}");
            // id таймера
            let timerId = null;
            // склонение числительных
            function declensionNum(num, words) {
                return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ?
                    num % 10 :
                    5
                ]];
            }
            // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
            function countdownTimer() {
                const diff = deadline - new Date();
                if (diff <= 0) {
                    clearInterval(timerId);
                }
                const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
                const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
                const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
                const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
                $days.textContent = days < 10 ? '0' + days : days;
                $hours.textContent = hours < 10 ? '0' + hours : hours;
                $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
                $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
            }
            // получаем элементы, содержащие компоненты даты
            const $days = document.querySelector('.timer__days');
            const $hours = document.querySelector('.timer__hours');
            const $minutes = document.querySelector('.timer__minutes');
            const $seconds = document.querySelector('.timer__seconds');
            // вызываем функцию countdownTimer
            countdownTimer();
            // вызываем функцию countdownTimer каждую секунду
            timerId = setInterval(countdownTimer, 1000);
        });
    </script>
</div>
