<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script defer src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    @include('flatpickr::components.style')

</head>
<title>Calc & DTP</title>

<body>

    <div class="container mt-3">

        <div class="mt-4 p-2 bg-secondary sstext-white rounded">
            <h1 style="text-align: center;color: white;"><span class="text-warning">Calculators</span> & <span
                    class="text-info">date time
                    pickers</span></h1>

        </div>
    </div>
    <br><br>
    {{-- 1)Kada nije bitno koji je veći datum izračunaće bilo koji je manj ili veći --}}
    {{-- <form action="{{route('calc.calculateAge')}}" method="post">
        @csrf
        <div class="container">
            <div class="row border border-danger border-4 p-3">
                <div class="col-6">
                    <input type="datetime-local" class="form-control" id="pocetak" name="pocetak">
                </div>
                <div class="col-6">
                    <input type="datetime-local" class="form-control" id="kraj" name="kraj">
                    <br><br>
                </div>
                <input type="text" name="rezultat" class="form-control text-center mb-4"
                    placeholder="Rezultat između datuma" value="{{session('rezultat')}}">
                <button class="btn btn-info container">Calculate Age</button>
            </div>
        </div>
    </form> --}}
    {{-- End 1) --}}

    {{-- 2)Kada je bitno da prvi datum mora biti manji a drugi veći --}}

    <form action="{{route('calc.calculateAge')}}" method="post">
        @csrf
        <div class="container">
            <div class="row border border-danger border-4 p-3">
                <div class="col-6">
                    <input type="datetime-local" class="form-control" id="pocetak" name="pocetak">
                    @error('pocetak')
                    <p class="alert alert-danger mt-2 h-25 text-center p-2">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="datetime-local" class="form-control" id="kraj" name="kraj">
                    @error('kraj')
                    <p class="alert alert-danger mt-2 h-25 text-center p-2">
                        {{$message}}
                    </p>
                    @enderror
                    <br><br>
                </div>
                <input type="text" name="rezultat" class="form-control text-center mb-4"
                    placeholder="Rezultat između datuma" value="{{session('rezultat')}}">
                <button class="btn btn-info container">Calculate Age</button>
            </div>
        </div>
    </form>
    {{-- End 2) --}}

    <br>
    <h1 class="text-center"> Računanje kamate</h1>
    <br>
    <form action="{{route('calc.kamata')}}" method="post">
        @csrf
        <div class="container">
            <div class="row border border-danger border-4 p-3">
                <div class="col-3">
                    <input type="datetime-local" class="form-control" id="dospijece" name="dospijece">
                    @error('dospijece')
                    <p class="alert alert-danger mt-2 h-25 text-center p-2">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="col-3">
                    <input type="datetime-local" class="form-control" id="kasnjenje" name="kasnjenje">
                    @error('kasnjenje')
                    <p class="alert alert-danger mt-2 h-25 text-center p-2">
                        {{$message}}
                    </p>
                    @enderror
                    <br><br>
                </div>


                <div class="col-2">

                    <input type="number" class="form-control" value="100" step="10" name="vrijednost"><br>
                    @error('vrijednost')
                    <p class="alert alert-danger mt-2 h-25 text-center p-2">
                        {{$message}}
                    </p>
                    @enderror
                </div>

            <div class="col-1">

                <input type="number" class="form-control" name="kamata" step="0.01" value="0.03"><br>
                @error('kamata')
                <p class="alert alert-danger mt-2 h-25 text-center p-2">
                    {{$message}}
                </p>
                @enderror
            </div>
     <input type="text" name="rezultatKamate" class="form-control text-center mb-4"
                placeholder="Rezultat između datuma" value="{{session('rezultatKamate')}}">
            <button class="btn btn-info container">Izračunaj</button>


            </div>


        </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#pocetak', {

            altInput: true,
            altFormat: "d.m.Y",
            dateFormat: "Y-m-d",
            'defaultDate': 'today'
        });

        flatpickr('#kraj', {

            altInput: true,
            altFormat: "d.m.Y",
            dateFormat: "Y-m-d",
            'defaultDate': 'today'
        });

        flatpickr('#dospijece', {

altInput: true,
altFormat: "d.m.Y",
dateFormat: "Y-m-d",
'defaultDate': 'today'
});

flatpickr('#kasnjenje', {

altInput: true,
altFormat: "d.m.Y",
dateFormat: "Y-m-d",
'defaultDate': 'today'
});

    </script>




</body>

</html>
