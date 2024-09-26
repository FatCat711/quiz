@extends('test')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <h2 style="margin-top:4rem" class="position-absolute start-50 translate-middle pt-4">Регистрация</h2>
            <form style="margin-top: 7rem" class="pt-4" action="{{ route('register', $game) }}" method="post">
                @csrf
                <input name="name" placeholder="Ваше Имя"
                       class="form-control-plaintext border rounded py-1 px-3" id="fullname" rows="3">
                <div class="position-absolute start-50 translate-middle mt-4">
                    <button type="submit" class="btn btn-dark mt-4"> Сохранить </button>
                </div>
            </form>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>
@endsection
