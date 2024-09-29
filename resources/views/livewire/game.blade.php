{{-- <div wire:poll.1s> --}}
<div>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        @if ($show_question)
            <div class="question-text mb-2">
                <div class="timer">
                    <div class="timer__items">
                        <div style="display: none" class="timer__item timer__days">00</div>
                        <div style="display: none" class="timer__item timer__hours">00</div>
                        <div style="display: none" class="timer__item timer__minutes">00</div>
                        <div class="timer__item timer__seconds">00</div>
                    </div>
                </div>
            </div>
            <div class="question-text">
                {{ $text }}
            </div>

            <form>
                <div class="row text-center">
                    @foreach ($answers as $answer)
                        <div class="form-check">
                            <input wire:model="checkbox_answers" class="form-check-input" type="radio"
                                name="optionsRadios" id="optionsRadios{{ $answer->id }}"
                                value="{{ $answer->answer }}">
                            <label class="form-check-label" for="optionsRadios{{ $answer->id }}">
                                {{ $answer->answer }}
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
