@extends('test')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Кол-во очков</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr class="table-active">
                    <td>{{ $result['name'] }}</td>
                    <td>{{ $result['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
