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

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Predict now</h1>
                <p class="py-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis qui facilis, cumque tenetur eveniet
                    incidunt adipisci quibusdam! Sunt, deserunt libero in alias nihil delectus similique quaerat
                    aliquid. Harum, dolore dolor.
                </p>
            </div>

            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl form-control">
                <form action="{{ route('calculation.input') }}" method="GET" class="card-body">
                    @csrf
                        <span class="badge">weight\kg</span>
                        <input type="text"class="input input-bordered input-primary w-full max-w-xs " name="weight"
                            id="weight" value="{{ old('weight') }}" />

                        <span class="badge">duration/Hours</span>
                        <input type="text" class="input input-bordered input-primary w-full max-w-xs "
                            name="duration" value="{{ old('duration') }}" id="duration" />

                        {{-- Workout type --}}
                        <select name="selection" id='type' class="select select-info w-full max-w-xs">
                            <option disabled selected>Workout type</option>
                            <option value="0">Cardio</option>
                            <option value="1">HIIT</option>
                            <option value="2">Strength</option>
                            <option value="3">Yoga</option>
                        </select>

                        <span class="badge">water intake\L</span>
                        <input type="text" class="input input-bordered input-primary w-full max-w-xs "
                            name="water_intake" id="water_intake" />
                        <span class="badge">workout frequency/(days\week)</span>
                        <input type="text" class="input input-bordered input-primary w-full max-w-xs "
                            name="workout_frequency" id="workout_frequency" />
                            <button class=" place-content-center btn btn-success justify-content mx-5 mt-5"
                            type="submit">Calculation</button>
                        </form>
            </div>
            <div class="card bg-base-100 w-96 shadow-xl">
                <div class="card-body">
                    @if (isset($hasil))
                    <h2 class="card-title">Predict Result</h2>
                      @foreach ($input as $inputs)
                          <p>{{ $inputs }}</p>
                      @endforeach
                      <p>Hasilnya: {{ $hasil }}</p>
                  @else
                      There is no record
                  @endif
                  <div class="card-actions justify-end">
                  </div>
                </div>
              </div>


</body>
</html>
