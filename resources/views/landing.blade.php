<!DOCTYPE html>
<html lang="{{ $lang }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translations['welcome'] }}</title>
    <style>
        * {
            font-family: Helvetica;
        }

        .language {
            text-decoration: none;
            color: #ececec;
            padding: 3px 6px;
            margin-left: 3px;
            margin-right: 3px;
            border-radius: 8px;
        }

        .language.red {
            background-color: red;
        }

        .language.green {
            background-color: green;
        }

        .language.blue {
            background-color: blue;
        }

        .active {
            background-color: #ececec;
            color: black;
            font-weight: bold
        }

        .container {
            display: flex;
            justify-content: flex-end;
        }

        @if (Cookie::has('color') && in_array(Cookie::get('color'), ['red', 'green', 'blue']))
            h1 {
                color: {{ Cookie::get('color') }};
            }
        @endif
    </style>
</head>

<body>
    <div @class(['container'])>
        @foreach ($languages as $key)
            <a @class(['language', 'active' => $key == $lang]) href="{{ route('landing', ['lang' => $key]) }}">{{ strtoupper($key) }}</a>
        @endforeach
        <a class="language red" href="{{ url('/set-color', 'red') }}">Red</a>
        <a class="language green" href="{{ url('/set-color', 'green') }}">Green</a>
        <a class="language blue" href="{{ url('/set-color', 'blue') }}">Blue</a>
        <a class="language active" href="{{ url('story') }}">Story</a>
    </div>
    <hr>

    @if (Cookie::has('color'))
        <h1>{{ strtoupper(Cookie::get('color')) }}</h1>
    @endif

    @foreach ($translations as $item)
        @if ($loop->first)
            @continue
        @endif
        <h1>{{ $item }}</h1>
    @endforeach
</body>

</html>
