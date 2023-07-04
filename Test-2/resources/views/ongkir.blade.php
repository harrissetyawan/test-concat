<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
    darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
  </script>
  <title>Ongkir</title>
</head>

<body class="p-0 m-0 flex flex-row bg-gray-50 justify-center">
  <section class="my-52 flex flex-col gap-4 p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-lg font-medium font-sans text-center">JOGJA ke
      <span>{{$results['rajaongkir']['destination_details']['city_name']}}</span>
    </h1>

    <div class="flex flex-col justify-center">
      <h2 class="uppercase text-base font-semibold p-2 rounded-sm bg-orange-50 text-center shadow-md">{{
        $results['rajaongkir']['results'][0]['code']}}</h2>
      <ul class="flex flex-row justify-between mt-4">
        @foreach ($results['rajaongkir']['results'][0]['costs'] as $result)
        <li class="">
          <h3 class="">Layanan</h3>
          <h4 class="font-semibold text-center">{{$result['service']}}</h4>
          <p class="text-center font-medium p-1 rounded-sm bg-green-200 mt-2">{{ $result['cost'][0]['value']}}</p>
          <p class="text-center font-medium text-xs p-1 text-zinc-950">{{ $result['cost'][0]['etd']}}
            Hari Kerja
          </p>
        </li>
        @endforeach

      </ul>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>