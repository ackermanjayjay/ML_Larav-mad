<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="navbar bg-base-100">
        {{-- <a class="btn btn-ghost text-xl" href="{{route('/')}}">daisyUI</a> --}}
        <a class="btn btn-ghost text-xl" href="/">daisyUI</a>
    </div>

    <form action="{{ route('calculation.input') }}" method="GET">
        <div class="flex justify-center gap-5  flex-row">

            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="a" id="a" value="{{ old('a') }}" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="b"  value="{{ old('b') }}" id="b" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="c" id="c" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="d" id="d" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="e" id="e" />
            <input type="text" placeholder="Type here" class="input input-bordered input-primary w-full max-w-xs"
                name="f" id="f" />
            <button class="btn btn-success flex justify-center gap-5 mr" type="submit">Calculation</button>
        </div>
    </form>
    <div class="flex justify-center  flex-row  p-5 mr-20 item-center gap-5">
        @if (isset($hasil))
            @foreach ($input as $inputs)
                <li>{{ $inputs }}</li>
            @endforeach
            <p>Hasilnya: {{ $hasil }}</p>
        @else
            There is no record
        @endif
    </div>

</body>

</html>
