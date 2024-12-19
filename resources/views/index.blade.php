<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="navbar bg-base-100">
        <a class="btn btn-ghost text-xl" href="{{route('/')}}">daisyUI</a>
    </div>

    <form action="{{ route('calculation.input') }}" method="POST">
        <div class="flex justify-center gap-5  flex-row">
            @csrf

            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="number1" id="number1" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="number2" id="number2" />
            <button class="btn btn-success flex justify-center gap-5 mr" type="submit">Calculation</button>
        </div>
    </form>
    <div class="flex justify-center  flex-row  p-5 mr-20 item-center gap-5">
        @if (isset($hasil))
            <p>Hasilnya: {{ $hasil }}</p>
        @else
            There is no record
        @endif
    </div>

</body>

</html>
