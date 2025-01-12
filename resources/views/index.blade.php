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
        <a class="btn btn-ghost text-xl" href="/">Larav MaD</a>
    </div>


    <div class="lg:card card-side bg-base-100 mx-5 mt-5 gap-5 sm:flex-col md:flex-row  transition-all duration-300">
        <div class="card-body order-1 md:order-2">
            <h2 class="card-title text-center">
                Predict Now
            </h2>
            <p class="text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident quis blanditiis totam libero voluptas
                id
                quam aspernatur a, iusto, voluptatem ex, incidunt animi explicabo quae et! Dolores similique doloribus
                pariatur.
            </p>

        </div>
        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl form-control">
            <form action="{{ route('calculation.input') }}" method="GET" class="card-body">
                @csrf
                <span class="badge">weight\kg</span>
                <input type="text"class="input input-bordered input-primary w-full max-w-xs " name="weight"
                    id="weight" value="{{ old('weight') }}" />

                <span class="badge">duration/Hours</span>
                <input type="text" class="input input-bordered input-primary w-full max-w-xs " name="duration"
                    value="{{ old('duration') }}" id="duration" />

                {{-- Workout type --}}
                <select name="selection" id='type' class="select select-info w-full max-w-xs">
                    <option disabled selected>Workout type</option>
                    <option value="0">Cardio</option>
                    <option value="1">HIIT</option>
                    <option value="2">Strength</option>
                    <option value="3">Yoga</option>
                </select>

                <span class="badge">water intake\L</span>
                <input type="text" class="input input-bordered input-primary w-full max-w-xs " name="water_intake"
                    id="water_intake" />
                <span class="badge">workout frequency/(days\week)</span>
                <input type="text" class="input input-bordered input-primary w-full max-w-xs "
                    name="workout_frequency" id="workout_frequency" />
                <button class=" place-content-center btn btn-success justify-content mx-5 mt-5"
                    type="submit">Calculation</button>
            </form>
        </div>
        <div class="card-actions mt-5 px-5 justify-center order-2 md:order-1">
            @if (isset($hasil))
                <h2 class="card-title">Predict Result</h2>
                @foreach ($input as $inputs)
                    <p>{{ $inputs }}</p>
                @endforeach
                <p>Hasilnya: {{ $hasil }}</p>
            @else
                <p>There is no record</p>
            @endif
        </div>
       
    </div>




</body>

</html>
