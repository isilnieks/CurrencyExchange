<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Currency converter</title>
</head>
<style>
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 400px;
    }
</style>
<body>
<div id="cover" class="container" >
    <div class="md:flex md:justify-center center">
        <form class="w-full max-w-md" method="POST" action="/">
            @csrf
            <div class="w-full flex items-center border-b border-teal-500 py-2">
                <select name="symbol"
                        class=" bg-transparent border-none w-4/12 text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                >
                    @foreach ($currencies as $currency)
                        <option
                            value="{{$currency->symbol}}">{{$currency->symbol}}</option>
                    @endforeach
                </select>
                <input
                    class=" bg-transparent border-bg-indigo-900 w-full text-gray-400 mr-5 py-1 px-2 leading-tight focus:outline-none"
                    type="number" name="amount" placeholder="Enter amount" aria-label="Full name">
                <button
                    class="w-full text-center py-3 rounded bg-indigo-900 text-white hover:bg-green-dark focus:outline-none my-1"
                    type="submit">
                    Convert
                </button>
            </div>
        </form>
        <br>
        <div>
        @if(!empty(session()->has('results')))
            <div class="md:flex md:justify-center mb-1 mt-5" id="results">
                <h3 class="text-black">Exchange: {{ session()->get('results')[0] }} {{ number_format(session()->get('results')[1] / 100000, 2)}}</h3>
            </div>
        @endif
        </div>
    </div>


    </div>
</div>

</body>
</html>
