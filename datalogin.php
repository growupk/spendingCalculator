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