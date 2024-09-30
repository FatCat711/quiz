@extends('test')

@section('content')
    <h1>Админская панель</h1>
    @livewire('admin-panel', ['game' => $game])
    <div class="d-flex justify-content-center">
    <form class="w-50 border border-black px-2 py-2 rounded" action="{{ route('admin.panel.store', $game->id) }}" method="POST">
        @csrf
        <div>
            <label for="question" class="form-label">Вопрос</label>
            <input name="question" type="text" class="form-control" id="question" aria-describedby="emailHelp"
                   placeholder="Текст вопроса">
        </div>
{{--answers--}}
{{--        question1--}}
        <div>
            <label for="question" class="form-label mt-4">Ответ 1</label>
            <input name="answer1" type="text" class="form-control" id="question"
                   placeholder="Текст ответа 1">
        </div>
        <div class="form-check">
            <input name="right[]" class="form-check-input" type="checkbox" value="1" id="answer1">
            <label class="form-check-label" for="answer1">
                Правильный
            </label>
        </div>
{{--        end question1--}}
        {{--        question2--}}
        <div>
            <label for="question" class="form-label mt-4">Ответ 2</label>
            <input name="answer2" type="text" class="form-control" id="question"
                   placeholder="Текст ответа 2">
        </div>
        <div class="form-check">
            <input name="right[]" class="form-check-input" type="checkbox" value="2" id="answer2">
            <label class="form-check-label" for="answer2">
                Правильный
            </label>
        </div>
        {{--        end question2--}}
        {{--        question3--}}
        <div>
            <label for="question" class="form-label mt-4">Ответ 3</label>
            <input name="answer3" type="text" class="form-control" id="question"
                   placeholder="Текст ответа 3">
        </div>
        <div class="form-check">
            <input name="right[]" class="form-check-input" type="checkbox" value="3" id="answer3">
            <label class="form-check-label" for="answer3">
                Правильный
            </label>
        </div>
        {{--        end question3--}}
        {{--        question4--}}
        <div>
            <label for="question" class="form-label mt-4">Ответ 4</label>
            <input name="answer4" type="text" class="form-control" id="question"
                   placeholder="Текст ответа 4">
        </div>
        <div class="form-check">
            <input name="right[]" class="form-check-input" type="checkbox" value="4" id="answer4">
            <label class="form-check-label" for="answer4">
                Правильный
            </label>
        </div>
        {{--        end question4--}}
{{--        end answers--}}
        <button type="submit" class="btn btn-success mt-4 w-25 fs-5">Создать</button>
    </form>
    </div>

@endsection

