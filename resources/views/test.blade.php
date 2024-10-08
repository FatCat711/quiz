<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        tr {
            font-size: 25px;
        }

        .square {
            width: 150px;
            height: 150px;
        }

        .square h1 {
            padding-top: 50px
        }

        .yellow {
            background-color: #fbbf24;
        }

        /* Желтый */
        .blue {
            background-color: #3b82f6;
        }

        /* Синий */
        .red {
            background-color: #ef4444;
        }

        /* Красный */
        .green {
            background-color: #22c55e;
        }

        .question-text {
            color: black;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 4rem;
        }

        .form-check-label:hover {
            cursor: pointer;
        }

        .timer__items {
            display: flex;
            font-size: 48px;
        }

        .timer__item {
            position: relative;
            min-width: 60px;
            margin-left: 10px;
            margin-right: 10px;
            padding-bottom: 15px;
            text-align: center;
        }

        .timer__item::before {
            content: attr(data-title);
            display: block;
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            font-size: 14px;
        }

        .timer__item:not(:last-child)::after {
            content: ':';
            position: absolute;
            right: -15px;
        }
    </style>

</head>

<body>
    <div class="container py-4">
        @if (auth()->user())
            user_id={{ auth()->user()->id }}
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
