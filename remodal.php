<?php
    $results = dataResults('*', 'cost', $con);
    $costsTypeAll = [];
    foreach($results as $result){
        array_push($costsTypeAll,$result['costs_type']);
    }
    $costsType = array_unique($costsTypeAll);
    $costsTypeFilter = [];
    foreach($costsType as $costs){
        if(!empty($costs)){
            array_push($costsTypeFilter,$costs);
        }
    }

    $costsTypeSize = sizeof($costsTypeFilter);
?>
<div class="remodal" data-remodal-id="modal">
    <?php
        
        for($i=0; $i<$costsTypeSize; $i++){
            switch ($costsTypeFilter[$i]) {
                case "Étel":
                    $food = 'Étel';
                    break;
                case "Üzemanyag":
                    $fuel = "Üzemanyag";
                    break;
                case "Albérlet/Rezsi":
                    $apartment = "Albérlet/Rezsi";
                    break;
                case "Luxus":
                    $luxx = "Luxus";
                    break;
                case "Egyéb/Nem várt":
                    $other = "Egyéb/Nem várt";
                    break;
                default:
                    echo "Még nem történt költekezés!";
            }
            ?>
    <?php
        }
    ?>
    <div class="container">
        <ul class="nav nav-tabs">
            <?php 
                if(!empty($food)){
                ?>
                    <li class="nav-item"><a class="nav-link <?php echo (!empty($food)) ? 'active' : '' ;?>" data-toggle="tab" href="#food"><?php echo $food; ?></a></li>
                <?php
                }
            ?>
            <?php 
                if(!empty($fuel)){
                ?>
                    <li class="nav-item"><a class="nav-link <?php echo (empty($food) && !empty($fuel)) ? 'active' : '' ;?>" data-toggle="tab" href="#fuel"><?php echo $fuel; ?></a></li>
                <?php
                }
            ?>
            <?php 
                if(!empty($apartment)){
                ?>
                    <li class="nav-item"><a class="nav-link <?php echo (empty($food) && empty($fuel) && !empty($apartment)) ? 'active' : '' ;?>" data-toggle="tab" href="#apartment"><?php echo $apartment; ?></a></li>
                <?php
                }
            ?>
            <?php 
                if(!empty($luxx)){
                ?>
                    <li class="nav-item"><a class="nav-link <?php echo (empty($food) && empty($fuel) && empty($apartment) && !empty($luxx)) ? 'active' : '' ;?>" data-toggle="tab" href="#luxx"><?php echo $luxx; ?></a></li>
                <?php
                }
            ?>
            <?php 
                if(!empty($other)){
                ?>
                    <li class="nav-item"><a class="nav-link <?php echo (empty($food) && empty($fuel) && empty($apartment) && empty($luxx) && !empty($other)) ? 'active' : '' ;?>" data-toggle="tab" href="#other"><?php echo $other; ?></a></li>
                <?php
                }
            ?>
        </ul>
        <div class="tab-content">
            <div id="food" class="tab-pane <?php echo (!empty($food)) ? 'active' : '' ;?>" role="tabpanel">
                <div class="container">
                    <?php
                        $allMonth = ['january','february','march','april','may','june','july','august','september','october','november','december'];
                        setlocale(LC_ALL, 'hu_HU.ISO8859-2');
                        $actMonth = date('F');
                    ?>
                    <script>
                        /*$(document).ready(function(){
                           
                            $('#month').change(function(){
                                //Selected value
                                var inputValue = $(this).val();
                                alert("value in js "+inputValue);

                                //Ajax for calling php function
                                $.post('monthFilter.php', { value: inputValue }, function(data){
                                    alert('ajax completed. Response:  '+data);
                                    //do after submission operation in DOM
                                });
                            });
                        });*/
                    </script>
                    <div class="row month-select justify-content-end">
                        <form method="post">
                            <select name="month" id="month">
                                <?php
                                    foreach($allMonth as $month){
                                    ?>
                                        <option <?php echo ($month === strtolower($actMonth)) ? 'selected' : ''; ?>><?php echo $month; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </form>
                    </div>
                    <div class="row lists table-title">
                        <div class="col-sm-3">
                            <p>Dátum</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Üzlet</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Termék</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Ár</p>
                        </div>
                    </div>
                    <?php
                        $results = monthFilter('*', 'cost', $actMonth, $con);
                        while($row = mysqli_fetch_array($results)){
                            if($row['costs_type'] === $food){
                            ?>
                                <div class="row lists">
                                    <div class="col-sm-3">
                                        <?php
                                            $buyDate = $row['buy_date'];
                                            list($date, $time) = explode(" ", $buyDate);
                                        ?>
                                        <p><?= $date;?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_where'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_what'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= number_format($row['to_spend_price']) . ' Ft';?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    ?>
                    <p class="typeAll">Ételre összesen: <span class="foodfull"></span></p>
                </div>
            </div>
            <div id="fuel" class="tab-pane <?php echo (empty($food) && !empty($fuel)) ? 'active' : '' ;?>" role="tabpanel">
                <div class="container">
                    <div class="row lists table-title">
                        <div class="col-sm-3">
                            <p>Dátum</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Üzlet</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Termék</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Ár</p>
                        </div>
                    </div>
                    <?php
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                            if($row['costs_type'] === $fuel){
                            ?>
                                <div class="row lists">
                                    <div class="col-sm-3">
                                        <?php
                                            $buyDate = $row['buy_date'];
                                            list($date, $time) = explode(" ", $buyDate);
                                        ?>
                                        <p><?= $date;?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_where'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_what'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= number_format($row['to_spend_price']) . ' Ft';?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    ?>
                    <p class="typeAll">Üzemanyagra összesen: <span class="fuelfull"></span></p>
                </div>
            </div>
            <div id="apartment" class="tab-pane <?php echo (empty($food) && empty($fuel) && !empty($apartment)) ? 'active' : '' ;?>" role="tabpanel">
                <div class="container">
                    <div class="row lists table-title">
                        <div class="col-sm-3">
                            <p>Dátum</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Üzlet</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Termék</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Ár</p>
                        </div>
                    </div>
                    <?php
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                            if($row['costs_type'] === $apartment){
                            ?>
                                <div class="row lists">
                                    <div class="col-sm-3">
                                        <?php
                                            $buyDate = $row['buy_date'];
                                            list($date, $time) = explode(" ", $buyDate);
                                        ?>
                                        <p><?= $date;?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_where'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_what'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= number_format($row['to_spend_price']) . ' Ft';?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    ?>
                    <p class="typeAll">Albérletre összesen: <span class="apartmentfull"></span></p>
                </div>
            </div>
            <div id="luxx" class="tab-pane <?php echo (empty($food) && empty($fuel) && empty($apartment) && !empty($luxx)) ? 'active' : '' ;?>" role="tabpanel">
                <div class="container">
                    <div class="row lists table-title">
                        <div class="col-sm-3">
                            <p>Dátum</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Üzlet</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Termék</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Ár</p>
                        </div>
                    </div>
                    <?php
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                            if($row['costs_type'] === $luxx){
                            ?>
                                <div class="row lists">
                                    <div class="col-sm-3">
                                        <?php
                                            $buyDate = $row['buy_date'];
                                            list($date, $time) = explode(" ", $buyDate);
                                        ?>
                                        <p><?= $date;?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_where'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_what'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= number_format($row['to_spend_price']) . ' Ft';?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    ?>
                    <p class="typeAll">Luxusra összesen: <span class="luxfull"></span></p>
                </div>
            </div>
            <div id="other" class="tab-pane <?php echo (empty($food) && empty($fuel) && empty($apartment) && empty($luxx) && !empty($other)) ? 'active' : '' ;?>" role="tabpanel">
                <div class="container">
                    <div class="row lists table-title">
                        <div class="col-sm-3">
                            <p>Dátum</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Üzlet</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Termék</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Ár</p>
                        </div>
                    </div>
                    <?php
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                            if($row['costs_type'] === $other){
                            ?>
                                <div class="row lists">
                                    <div class="col-sm-3">
                                        <?php
                                            $buyDate = $row['buy_date'];
                                            list($date, $time) = explode(" ", $buyDate);
                                        ?>
                                        <p><?= $date;?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_where'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= $row['to_spend_what'];?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p><?= number_format($row['to_spend_price']) . ' Ft';?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    ?>
                    <p class="typeAll">Egyéb/Nem várt, összesen: <span class="otherfull"></span></p>
                </div>
            </div>
        </div>
    </div>
    <button data-remodal-action="close" class="remodal-close"></button>
    
    <button data-remodal-action="confirm" class="remodal-confirm">Vissza</button>
</div>