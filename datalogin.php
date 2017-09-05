<?php
    
    //MySQL Database Connect
    global $con;
    $con = mysqli_connect("localhost","root","","calculator");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($_POST){

        //Total money
        if(isset($_POST['total'])){
            $sqlOr = "SELECT total_money FROM gate_money";
            
            $result = mysqli_query($con ,$sqlOr);
            $value = mysqli_fetch_object($result);
            
            $sql="UPDATE gate_money SET total_money = $_POST[total] + $value->total_money";
            if (!mysqli_query($con,$sql))
            {
                die('Error: Total money mysql error... :( ' . mysql_error());
            }
            
            $sqlOr = "SELECT next_money FROM gate_money";
            
            $result = mysqli_query($con ,$sqlOr);
            $value = mysqli_fetch_object($result);
            
            $sql="UPDATE gate_money SET next_money = $_POST[total] + $value->next_money";
            if (!mysqli_query($con,$sql))
            {
                die('Error: Total money mysql error... :( ' . mysql_error());
            }
            header("Location: index.php?msg=totalsucess");
        }

        //Total money szerk
        if(isset($_POST['totalmod'])){
            $sqlOr = "SELECT next_money FROM gate_money";
            
            $result = mysqli_query($con ,$sqlOr);
            $value = mysqli_fetch_object($result);
            
            $sql="UPDATE gate_money SET next_money = $_POST[totalmod]";
            if (!mysqli_query($con,$sql))
            {
                die('Error: Total money mod mysql error... :( ' . mysql_error());
            }
            header("Location: index.php?msg=totalmodsucess");
        }

        //Spending cost
        if(isset($_POST['spend1']) && isset($_POST['spend2']) && isset($_POST['spend3'])){
        $sql="INSERT INTO cost (costs_type, to_spend_where, to_spend_what, to_spend_price)
            VALUES
            ('$_POST[coststype]','$_POST[spend1]','$_POST[spend2]','$_POST[spend3]')";
            if (!mysqli_query($con,$sql))
            {
                die('Error: Spending costs error... :(' . mysql_error());
            }
            subtraction($con);
            header("Location: index.php?msg=spendsucess");
        }
    }

    function subtraction($con){
        $allCosts = mysqli_query($con,"SELECT SUM(to_spend_price) FROM cost");
        $costsValue = mysqli_fetch_array($allCosts);
        $intCostsV = (int)$costsValue['SUM(to_spend_price)'];

        $sqlOr = "SELECT total_money FROM gate_money";
        $result = mysqli_query($con ,$sqlOr);
        $value = mysqli_fetch_object($result);
        $intV = (int)$value->total_money;

        $subtraction = $intV - $intCostsV;

        $sql="UPDATE gate_money SET next_money = $subtraction";
        if (!mysqli_query($con,$sql))
        {
            die('Error: Total money mysql error... :( ' . mysql_error());
        }
    }

    function dataResults($select, $from, $con){
        $results = mysqli_query($con,"SELECT $select FROM $from");
        return $results;
    }

    function delDatabase($from, $con){
        mysqli_query( $con,"DELETE FROM $from" );
    }
?>