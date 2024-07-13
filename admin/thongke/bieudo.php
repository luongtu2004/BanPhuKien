<div id="piechart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      <?php
      $totalItems = count($listthongke);
      $currentIndex = 1;
      foreach ($listthongke as $thongke) {
        extract($thongke);
        if ($i == $tongdm) $dauphay = ",";
        echo "['" . $name_danhmuc . "', " . (int)$countsp . "],";
        if ($currentIndex < $totalItems) {
          echo ",";
        }
        $currentIndex++;
      }
      ?>
    ]);

    var options = {
      'title': 'My Average Day',
      'width': 1100,
      'height': 800
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>