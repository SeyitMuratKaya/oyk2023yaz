<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Story</title>
    <style>
        body {
            @if (Cookie::has('color'))
                background-color: {{ Cookie::get('color') }};
            @endif
            font-family: Arial,
            Helvetica,
            sans-serif;
        }

        .text-field.is-invalid {
            border: 2px solid red;
        }

        .text-field {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .submit-button {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }

        .card {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .story {
            display: flex;
            flex-direction: row;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 0 auto;
            margin-top: 20px;
            word-wrap: break-word;
        }

        .delete-button {
            border: 0px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .error {
            color: red;
            font-size: small
        }

        label {
            margin-bottom: 5px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
    <form method="POST" action="{{ route('story.handle') }}">
        @if ($story)
            <div class="story">
                @include('story.result')
                @method('DELETE')
                <button class="delete-button" type="submit">❌</button>
            </div>
        @endif
        @include('story.form')
    </form>
</body>

</html>
