<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pie Chart with Google Charts</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <!-- The chart container -->
  <div id="pieChartContainer" style="width: 800px; height: 400px;"></div>

  <script>
    // Load the Visualization API and the corechart package.
    google.charts.load('current', { 'packages': ['corechart'] });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawPieChart);

    // Function to draw the Pie Chart
    function drawPieChart() {
      // Prepare your data in the form of a DataTable
      const data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value'); // Numerical value for each category
      data.addRows([
        <?php
      
                    $sqlPA5 = "SELECT COUNT(TID) AS NumberOfProducts FROM `tickiting_report` WHERE `ticket_status` = 'pending'";
                    $resultPA5 = $conn->query($sqlPA5);

                    if ($resultPA5) {
                        // Fetch the row from the result set
                        $rowPA5 = $resultPA5->fetch_assoc();
                        $numberOfProductsPA5 = $rowPA5['NumberOfProducts'];

                        // Print the value of NumberOfProducts
                    
                        echo "['pending ticket', $numberOfProductsPA5],";
                    } else {
                            // Handle the case when the query fails
                        echo "Error executing the query: " . $dbConnection->error;
                    }

                    $sqlPA55 = "SELECT COUNT(TID) AS NumberOfProducts FROM `tickiting_report` WHERE `ticket_status` = 'solved'";
                    $resultPA55 = $conn->query($sqlPA55);

                    if ($resultPA55) {
                        // Fetch the row from the result set
                        $rowPA55 = $resultPA55->fetch_assoc();
                        $numberOfProductsPA55 = $rowPA55['NumberOfProducts'];

                        // Print the value of NumberOfProducts
                    
                        echo "['Solved ticket', $numberOfProductsPA55],";
                    } else {
                            // Handle the case when the query fails
                        echo "Error executing the query: " . $dbConnection->error;
                    }



        ?>
        // Add more rows for other categories with their respective values
      ]);

      // Set chart options
      const options = {
        title: 'Pie Chart Example',
        is3D: true, // Display the chart in 3D (optional)
      };

      // Instantiate and draw the chart
      const chart = new google.visualization.PieChart(document.getElementById('pieChartContainer'));
      chart.draw(data, options);
    }
  </script>
</body>
</html>
