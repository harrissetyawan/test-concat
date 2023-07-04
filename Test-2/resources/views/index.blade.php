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
  <title>Program Cek Ongkir</title>
</head>

<body class="p-0 m-0 flex flex-row bg-gray-50 justify-center">
  <section class="my-52 flex flex-col gap-4 p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-lg font-medium font-sans text-center">CEK ONGKIR DARI JOGJA</h1>
    <form method="POST" action="/cekongkir" class="flex flex-col gap-3 items-center">
      @csrf
      <div class="flex flex-col">
        <label for="origin" class="mb-1">Dari :</label>
        <input name="origin" id="origin" type="text" class="px-5 py-1 rounded outline outline-[0.71px]" value=""
          placeholder="DIY Yogyakarta" disabled>
      </div>
      <div class="flex flex-col">
        <label for="destination" class="mb-1">Tujuan :</label>
        <select data-te-select-init data-te-select-filter="true" class="px-5 py-1 rounded outline outline-[0.71px]"
          id="destination" name="destination">
          @foreach ($results['rajaongkir']['results'] as $result)
          <option value="{{ $result['city_id'] }}">{{ $result['city_name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col">

        <label for="weight" class="mb-1">Berat Paket :</label>
        <input name="weight" id="weight" type="number"
          class="px-5 py-1 ring-1 rounded-md focus:ring-1 focus:outline-sky-300 ring-sky-200 shadow-sm placeholder:text-sm"
          value="" placeholder="1000 Gram">
      </div>
      <div class="flex flex-col">
        <select name="courier" id="courier"
          class="px-5 py-1 ring-1 w-full rounded-md focus:ring-1 focus:outline-sky-300 ring-sky-200 shadow-sm">
          <option value="jne">JNE</option>
          <option value="tiki">TIKI</option>
          <option value="pos">POS</option>
        </select>
      </div>
      <button type="submit"
        class="px-4 w-1/2 mt-4 p-2 bg-sky-800 text-white rounded-md uppercase drop-shadow-sm font-medium hover:bg-sky-600">Cek</button>
    </form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>