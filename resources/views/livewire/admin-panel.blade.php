<div>
    <button wire:click="chill" class="btn btn-lg btn-primary" type="button">Стадия чила</button>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Вопрос</th>
                <th scope="col">Проектор</th>
                <th scope="col">Пользователи</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr class="table-active">
                    <th scope="row">{{ $question->id }}</th>
                    <td>{{ $question->question }}</td>
                    <td><button wire:click="show_proector({{ $question->id }})" type="button"
                            class="btn btn-info">Показать</button></td>
                    <td><button wire:click="show_user({{ $question->id }})" type="button"
                            class="btn btn-info">Показать</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
