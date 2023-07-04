<!DOCTYPE html>
<html>

<head>
  <title>Program Kelipatan Abdul Haris S.</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 p-12 flex flex-col bg-gray-50">
  <form method="POST" class="flex flex-col items-center gap-4">
    <label for="iterations" class="text-lg font-semibold">Masukan Bilangan :</label>
    <input class="ring-1 drop-shadow ring-orange-600 p-5 rounded-sm focus:outline focus:outline-orange-400 focus:shadow-md" type="number" id="iterations" name="iterations" required min="1">
    <input class="px-4 py-2 uppercase bg-orange-600 text-white font-medium rounded-md shadow-lg hover:bg-orange-900 cursor-pointer" type="submit" value="Submit">
  </form>
  <div id="output-program" class="mt-4 flex flex-col flex-wrap text-lg shadow-lg rounded bg-white p-5 ring-1 ring-orange-50">
    <?php
    class KelipatanProgram
    {
      private $iterations;
      private $countBageConcat;

      public function __construct($iterations)
      {
        $this->iterations = $iterations;
        $this->countBageConcat = 0;
      }


      public function run()
      {
        for ($i = 1; $i <= $this->iterations; $i++) {
          $output = $this->checkKelipatan($i);
          echo "<span class='font-semibold'>$i.
          <span class='font-normal'>$output</span></span>";

          if ($output === 'Bage Concat') {
            $this->countBageConcat++;

            if ($this->countBageConcat === 5) {
              echo "<div class='bg-red-700 p-1 mt-3 text-white text-center shadow-md'>Program Stop <span class='font-bold'>'Bage Concat'</span> x 5</div>";
              break;
            }
          }
        }
      }

      private function checkKelipatan($number)
      {
        if ($number % 3 === 0 && $number % 5 === 0) {
          return 'Bage Concat';
        }
        // Validasi Bage
        elseif ($number % 3 === 0) {
          if ($this->countBageConcat >= 2) {
            return 'Concat';
          } else {
            return 'Bage';
          }
        }
        // Validasi Concat
        elseif ($number % 5 === 0) {
          if ($this->countBageConcat >= 2) {
            return 'Bage';
          } else {
            return 'Concat';
          }
        } else {
          return '';
        }
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $iterations = isset($_POST['iterations']) ? intval($_POST['iterations']) : 0;

      $program = new KelipatanProgram($iterations);
      $program->run();
    }
    ?>
  </div>
</body>

</html>