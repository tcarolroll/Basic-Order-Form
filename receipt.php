<!DOCTYPE html>
<html lang="en">
<head> 
      <title>Receipt</title>
      <!-- CSS Styling -->
      <style> 
            body { 
                font-family: 'Roboto', sans-serif;
            }

            th {
                width:100px;
            }

            td {
                height: 40px;
            }

            caption {
                font-weight: bold;
                font-size: 16pt;
                margin-bottom: 15px;
            }

            h3{
                margin-bottom: 0px;
            }

       
      </style>
  </head>

  <body>
  <?php

    // Get form data values
    $name = $_POST["user"];

    $payment = $_POST["paymentmethod"];

    // If there is items ordered

    if( (isset($_POST["appleqty"])) && (isset($_POST["orangeqty"])) && (isset($_POST["bananaqty"])))
    {
    $appleqty = $_POST["appleqty"];
    $orangeqty = $_POST["orangeqty"];
    $bananaqty = $_POST["bananaqty"];

    $applecost = $appleqty * 0.69;
    $orangecost = $orangeqty * 0.59;
    $bananacost = $bananaqty * 0.39;

    $totalcost = number_format((($appleqty * 0.69) + ($orangeqty * 0.59) + ($bananaqty * 0.39)), 2 );
    $totalitems = $appleqty + $orangeqty + $bananaqty;

    addQuantities($appleqty, $orangeqty, $bananaqty);

}
else
    exit;

    // Add the new quantities to the existing total quantity in the file
    function addQuantities($appleqty, $orangeqty, $bananaqty)
    {
        $temp = ReadFromFile();
        $temp["apples"] += $appleqty;
        $temp["oranges"] += $orangeqty;
        $temp["bananas"] += $bananaqty;
        WriteToFile($temp);
    }

    // Function to read quantities ordered before from the file and returns them in an array
    function ReadFromFile()
    {
        $file = fopen("order.txt", "r+") or exit("Unable to open order.txt file!");
        $totalrecords = array("apples" => 0, "oranges" => 0, "bananas" => 0);
        foreach ($totalrecords as $fruit => $quantity)
        {
            $line = fgets($file);
            $quantity = explode(":", $line);
            // Assign corresponding value of quantity to the fruit
            $total_records[$fruit] = (int)$quantity[1];
        }
        fclose($file);
        return $total_records;
    }

    // Function to write the updated quantities of fruits to file
    function WriteToFile($totalrecords)
    {
        $file = fopen("order.txt", "w+");
        // Write total of each fruit into file
        foreach ($total_records as $fruit => $quantity)
            fwrite($file, "Total number of " .$fruit. " : " .$quantity. "\r\n");
        fclose($file);
    }
    ?>
  <h3> Customer : <?php echo $name; ?></h3>
    <
    <!-- Return the results to the browser in a table-->
    <table border="border">
    <caption> Order Information </caption>
      <!--Table headings-->
      <tr>
        <th> Item </th>
        <th> Quantity</th>
        <th> Price </th>
        <th> Total Cost </th>
      </tr>
      <tr align = "center">
        <td> Apple </td>
        <td> <?php echo $appleqty; ?> </td>
        <td> $0.69 </td>
        <td> <?php echo $applecost; ?>
        </td>
      </tr>
      <tr align = "center">
        <td> Orange </td>
        <td> <?php echo $orangeqty; ?> </td>
        <td> $0.59 </td>
        <td> <?php echo $orangecost; ?>
        </td>
        </tr>
      <tr align = "center">
        <td> Banana </td>
        <td> <?php echo $bananaqty; ?> </td>
        <td> $0.39 </td>
        <td> <?php echo $bananacost; ?>
        </td>
      </tr>
    </table>
    <p /> <p />

    
    <h4> You ordered <?php echo $totalitems; ?> items. </h4> 
      
    <br />
    
    <h4>Your total bill is: <?php echo $totalcost; ?> </h4> 
     
    <br />

    <h4>Your chosen method of payment is: <?php echo $payment; ?> </h4> 
    
    <br />

    <p> Thank you for shopping with us! </p>
    
    
     
  </body>
</html>