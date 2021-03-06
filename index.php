
<?php
    include 'header.php';
?>
    <div class="page-loader">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>
    <div class="remodal-bg">
        <header>
        </header>
        <div class="total-cash">
            <div class="left-box-btn">
                <i class="fa fa-money" aria-hidden="true"></i>
                <?php
                    $results = dataResultsPrice('next_money', 'gate_money', $con);
                    while($row = mysqli_fetch_array($results)){
                        ?>
                        <span class="next-money <?php echo ($row['next_money'] <= 10000) ? 'red ' : ''; ?><?php echo ($row['next_money'] <= 50000 && $row['next_money'] > 10000) ? 'orange' : ''; ?>"><?php echo  number_format($row['next_money']); ?> Ft</span>
                        <?php
                    }
                ?>
            </div>
            <div class="fix-hide">
                <form method="post">
                    <input type="number" name="total" class="totals">
                    <input type="submit" class="totalSendBtn" value="+ Tárcához">
                </form>
                <div class="count">
                    <?php
                        $results = dataResultsPrice('next_money', 'gate_money', $con);
                        while($row = mysqli_fetch_array($results)){
                            ?>
                            <span><i class="fa fa-money" aria-hidden="true"></i><?php echo number_format($row['next_money']); ?> Ft <i title="Tárca szerkesztése" class="fa fa-wrench totalCashMod" aria-hidden="true"></i></span>
                            <?php
                        }
                    ?>
                </div>
                <form method="post" class="totalModForm">
                    <input type="number" name="totalmod" class="totals">
                    <input type="submit" class="totalSendBtn" value="Tárca felülírás">
                </form>
            </div>
            <div class="side-menu">
                <span id="user-name"><i class="fa fa-user" aria-hidden="true"></i><?php echo $login_session; ?></span>
                <div class="sub-menu">
                    <a href="chart-page.php"><span><i class="fa fa-area-chart" aria-hidden="true"></i>Statisztika</span></a>
                </div>
                <h3><a href="logout.php"> Kijelentkezés <i class="fa fa-sign-out" aria-hidden="true"></i></a></h3>
            </div>
        </div>
        <div class="container-fluid questionBox">
            <form method="post">
                <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 questionFields">
                            <h3><i class="fa fa-line-chart" aria-hidden="true"></i>Kiadás Típusa</h3>
                            <select name="coststype" id="costs-type">
                                <option>Étel</option>
                                <option>Üzemanyag</option>
                                <option>Albérlet/Rezsi</option>
                                <option>Luxus</option>
                                <option>Egyéb/Nem várt</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 questionFields">
                            <h3><i class="fa fa-university" aria-hidden="true"></i>Hol?</h3>
                            <input type="text" name="spend1" class="spend1">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 questionFields what">
                            <h3><i class="fa fa-shopping-basket" aria-hidden="true"></i>Mire?</h3>
                            <input type="text" name="spend2" class="spend2">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 questionFields">
                            <h3><i class="fa fa-usd" aria-hidden="true"></i>Mennyit?</h3>
                            <input type="number" name="spend3" class="spend3">
                        </div>
                </div>
                <input type="submit" class="sendBtn">
            </form>
        </div>
        <div class="container-fluid response">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 coststype table-container">
                    <h3><i class="fa fa-line-chart shaked" aria-hidden="true"></i>Kiadás típusa</h3>
                    <div class="release-type">
                        <?php
                        $results = dataResults('*', 'cost', $con);
                        $index = 0;
                        $counter = 0;
                        $coType = array();
                        while($row = mysqli_fetch_array($results)){
                            $coType[$index] = $row['costs_type'];
                            $index++;
                            ?>

                            <p class="data-price <?php echo ($counter % 2 == 0) ? 'colorOn' : 'colorOff'; ?>" data-price="<?php echo $row['to_spend_price']; ?>"><?php  echo $row['costs_type']; ?></p>
                            <form method="post" action="<?php tableModification('modtype','costs_type', $con); ?>" class="modtype tableModForm">
                                <select name="modtype" id="costs-type">
                                    <option>Étel</option>
                                    <option>Üzemanyag</option>
                                    <option>Albérlet/Rezsi</option>
                                    <option>Luxus</option>
                                    <option>Egyéb/Nem várt</option>
                                </select>
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <input type="submit" class="tableModBtn" value="Mentés">
                            </form>
                            <?php $counter++;?>
                        <?php } 
                            $food = array();
                            $fuel = array();
                            $apartment = array();
                            $luxx = array();
                            $other = array();

                            $foodIndex = 0;
                            $fuelIndex = 0;
                            $apartmentIndex = 0;
                            $luxxIndex = 0;
                            $otherIndex = 0;

                            foreach($coType as $type){
                                if($type == 'Étel'){
                                    $food[$foodIndex] = $type;
                                    $foodIndex++;
                                }elseif($type == 'Üzemanyag'){
                                    $fuel[$fuelIndex] = $type;
                                    $fuelIndex++;
                                }elseif($type == 'Albérlet/Rezsi'){
                                    $apartment[$apartmentIndex] = $type;
                                    $apartmentIndex++;
                                }elseif($type == 'Luxus'){
                                    $luxx[$luxxIndex] = $type;
                                    $luxxIndex++;
                                }else{
                                    $other[$otherIndex] = $type;
                                    $otherIndex++;
                                }
                            }
                        //if(!empty($food) || !empty($fuel) || !empty($apartment) || !empty($luxx) || !empty($other)){
                        ?>
                        <div class="final-border-box">
                        <?php
                        //}
                        if(!empty($food)) {
                            ?>
                            
                                <p class="final-border">
                                    <?php
                                        echo count($food) . 'x Ételre: ';
                                    ?>
                                        <span class="foodfull"></span>
                                </p>
                            <?php
                        }
                        if(!empty($fuel)) {
                            ?>
                            <p class="final-border">
                                <?php
                                echo count($fuel) . 'x Üzemanyagra: ';
                                ?>
                                <span class="fuelfull"></span>
                            </p>
                            <?php
                        }
                        if(!empty($apartment)){
                        ?>
                        <p class="final-border">
                            <?php
                            echo count($apartment) . 'x Albérletre/Rezsire: ';
                            ?>
                            <span class="apartmentfull"></span>
                        </p>
                        <?php
                        }
                            if(!empty($luxx)){
                        ?>
                            <p class="final-border">
                                <?php
                                echo count($luxx) . 'x Luxusra: ';
                                ?>
                                <span class="luxfull"></span>
                            </p>
                        <?php
                            }
                        if(!empty($other)) {
                            ?>
                            <p class="final-border">
                                <?php
                                echo count($other) . 'x Egyéb/Nem várt: ';
                                ?>
                                <span class="otherfull"></span>
                            </p>
                            <?php
                        }
                        //if(!empty($food) || !empty($fuel) || !empty($apartment) || !empty($luxx) || !empty($other)){
                        ?>
                            <a data-remodal-target="modal">
                                <input type="button" value="Részletek" class="detailsBtn">
                            </a>
                        </div>
                        <?php //} ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 reFirst table-container">
                    <h3><i class="fa fa-university shaked" aria-hidden="true"></i>Hol</h3>
                    <div>
                    <?php
                        $counter = 0;
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                    ?>
                        <p class="<?php echo ($counter % 2 == 0) ? 'colorOn' : 'colorOff'; ?>"><?php  echo $row['to_spend_where']; ?></p>
                        <form method="post" action="<?php tableModification('modwhere','to_spend_where', $con); ?>" class="tableModForm">
                            <input type="text" name="modwhere" class="tablemodInput">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" class="tableModBtn" value="Mentés">
                        </form>
                        <?php $counter++;?>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 reSecond table-container">
                    <h3><i class="fa fa-shopping-basket shaked" aria-hidden="true"></i>Mire</h3>
                    <div>
                    <?php
                        $counter = 0;
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                    ?>
                        <p class="<?php echo ($counter % 2 == 0) ? 'colorOn' : 'colorOff'; ?>"><?php  echo $row['to_spend_what']; ?></p>
                        <form method="post" action="<?php tableModification('modwhat','to_spend_what', $con); ?>" class="tableModForm">
                            <input type="text" name="modwhat" class="tablemodInput">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" class="tableModBtn" value="Mentés">
                        </form>
                        <?php $counter++;?>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 reThird table-container">
                    <h3><i class="fa fa-usd shaked" aria-hidden="true"></i>Mennyit <span class="row-modification"><i title="Táblázat szerkesztése" class="fa fa-pencil-square-o" aria-hidden="true"></i></span></h3>
                    <div>
                    <?php
                        $subtotal = 0;
                        $counter = 0;
                        $results = dataResults('*', 'cost', $con);
                        while($row = mysqli_fetch_array($results)){
                    ?>
                        <p class="<?php echo ($counter % 2 == 0) ? 'colorOn' : 'colorOff'; ?>">
                            <?php  echo number_format($row['to_spend_price']) . ' Ft'; ?>
                        </p>
                        <form method="post" action="<?php tableModification('modSpendPrice','to_spend_price', $con); ?>" class="tableModForm">
                            <input type="number" name="modSpendPrice" class="tablemodInput">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" class="tableModBtn" value="Mentés">
                        </form>
                    <?php
                        $subtotal += $row['to_spend_price'];
                        $counter++;
                        }
                    ?>
                    <p><?php  echo 'Összesen: ' . number_format($subtotal) . ' Ft'; ?></p>
                    <?php
                        $subtotalPercent = $subtotal/100;
                    ?>
                    <script>
                        //Cake diagramm
                        $(document).ready(function(){
                            var allSpended = '<?php echo $subtotal; ?>'
                            if(allSpended != 0){
                                var release_type = $('.data-price').map(function() {
                                    return $(this);
                                }).get();

                                var foodPrices = 0
                                var fuelPrices = 0
                                var housePrices = 0
                                var luxPrices = 0
                                var somePrices = 0


                                for(var i=0; i<release_type.length; i++){
                                    if(release_type[i].text() == 'Étel'){
                                        foodPrices += parseInt(release_type[i].attr('data-price'))
                                    }
                                    if(release_type[i].text() == 'Üzemanyag'){
                                        fuelPrices += parseInt(release_type[i].attr('data-price'))
                                    }
                                    if(release_type[i].text() == 'Albérlet/Rezsi'){
                                        housePrices += parseInt(release_type[i].attr('data-price'))
                                    }
                                    if(release_type[i].text() == 'Luxus'){
                                        luxPrices += parseInt(release_type[i].attr('data-price'))
                                    }
                                    if(release_type[i].text() == 'Egyéb/Nem várt'){
                                        somePrices += parseInt(release_type[i].attr('data-price'))
                                    }
                                }
                                $('.foodfull').text(foodPrices + ' Ft')
                                $('.fuelfull').text(fuelPrices + ' Ft')
                                $('.apartmentfull').text(housePrices + ' Ft')
                                $('.luxfull').text(luxPrices + ' Ft')
                                $('.otherfull').text(somePrices + ' Ft')
                                var morePriceArray = []
                                var foodPercent = foodPrices/allSpended*100
                                var fuelPercent = fuelPrices/allSpended*100
                                var housePercent = housePrices/allSpended*100
                                var luxPercent = luxPrices/allSpended*100
                                var somePercent = somePrices/allSpended*100

                                morePriceArray.push(foodPercent,fuelPercent,housePercent,luxPercent,somePercent)
                                var morePrice = Math.max.apply( Math, morePrice )

                                var chart = new CanvasJS.Chart("chartContainer",
                                    {
                                        title:{
                                            text: "Havi kiadások eddigi alakulása"
                                        },
                                        backgroundColor: "transparent",
                                        exportFileName: "Pie Chart",
                                        exportEnabled: true,
                                        animationEnabled: true,
                                        legend:{
                                            verticalAlign: "bottom",
                                            horizontalAlign: "center"
                                        },
                                        data: [
                                            {
                                                type: "pie",
                                                showInLegend: false,
                                                toolTipContent: "{name}: <strong>{y}%</strong>",
                                                indexLabel: "{name} {y}%",
                                                dataPoints: [
                                                    {  y: foodPercent.toFixed(2), name: "Étel", exploded: true},
                                                    {  y: fuelPercent.toFixed(2), name: "Üzemanyag"},
                                                    {  y: housePercent.toFixed(2), name: "Albérlet/Rezsi"},
                                                    {  y: luxPercent.toFixed(2), name: "Luxus"},
                                                    {  y: somePercent.toFixed(2),  name: "Egyéb/Nem várt"}
                                                ]
                                            }
                                        ]
                                    });
                                chart.render();
                            }
                        })
                    </script>
                    </div>
                </div>
            </div>
        </div>
        <div id="chartContainer" style="height: 500px; width: 100%;"></div>
        <!--Popup Remodal-->
        <?php
            include 'remodal.php';
        ?>
        <?php
            mysqli_close($con);
        ?>
    </div>
    <?php
        include 'footer.php';
    ?>
