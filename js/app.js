/**
 * Created by user on 2017. 06. 17..
 */
$(document).ready(function(){

    $('select').niceSelect()

    //Question not empty
    $('.sendBtn').click(function(){
        if( $('input.spend1').val() == '') {
            $('input.spend1').addClass('empty')
        }else{
            $('input.spend1').removeClass('empty')
        }
        if($('input.spend2').val() == ''){
            $('input.spend2').addClass('empty')
        }else{
            $('input.spend2').removeClass('empty')
        }
        if($('input.spend3').val() == ''){
            $('input.spend3').addClass('empty')
        }else{
            $('input.spend3').removeClass('empty')
        }
        if($('input.spend1').val() == '' || $('input.spend2').val() == '' || $('input.spend3').val() == ''){
            event.preventDefault()
        }
    })

    function shake(){
        var random = Math.floor(Math.random() * 1000)
        var $li = $(".response h3 i.shaked")
        $li.eq(random % $li.length).toggleClass("shake-chunk shake-slow shake-constant")
    }
    setInterval(shake,6000)

    //Mobile view: subtotal move bottom

    var windowWidth = $(window).outerWidth()
    var subtotal = $('.final-border-box')
    if(windowWidth < 991){
        $('.reThird').append(subtotal)
    }else{
        $('.coststype').append(subtotal)
    }

    $(window).on('resize', function(){
        windowWidth = $(window).outerWidth()
        subtotal = $('.final-border-box')
        if(windowWidth < 991){
            $('.reThird').append(subtotal)
        }else{
            $('.coststype').append(subtotal)
        }
    })

    //Left side box opened
    $('.left-box-btn').on('click', function(){
        $('.fix-hide').toggleClass('show')
    })

    //total cash szerk btn show
    $('.fix-hide .count span').on('mouseenter', function(){
        $('.totalCashMod').addClass('show')
    })
    $('.fix-hide .count span').on('mouseleave', function(){
        if($('.totalModForm.show')){
            $('.totalCashMod').addClass('show')
        }
    })
    
    //total cash szerk
    $('.fix-hide .count .totalCashMod').on('click', function(){
        $('.totalModForm').toggleClass('show')
    })

    //Table modification
    $('.row-modification i').on('click', function(){
        $('.tableModForm').toggleClass('show')
        $('.colorOff').toggleClass('colorOn')
    })

    //remodal all price
    var type = ['#food', '#fuel', '#apartment', '#luxx', '#other']
    var foodPrices = 0
    var fuelPrices = 0
    var apartmentPrices = 0
    var luxxPrices = 0
    var otherPrices = 0
    
    /*Ezt majd rövidíteni kell...*/
    var food = $('#food .filteredPrice').map(function() {
        return $(this);
    }).get();

    for(var i=0; i<food.length; i++){
        foodPrices += parseInt(food[i].attr('data-filterprice'))
    }

    $('.refoodfull').text(foodPrices + ' Ft')

    var fuel = $('#fuel .filteredPrice').map(function() {
        return $(this);
    }).get();

    for(var h=0; h<fuel.length; h++){
        fuelPrices += parseInt(fuel[h].attr('data-filterprice'))
    }

    $('.refuelfull').text(fuelPrices + ' Ft')

    var apartment = $('#apartment .filteredPrice').map(function() {
        return $(this);
    }).get();

    for(var k=0; k<apartment.length; k++){
        apartmentPrices += parseInt(apartment[k].attr('data-filterprice'))
    }

    $('.reapartmentfull').text(apartmentPrices + ' Ft')

    var luxx = $('#luxx .filteredPrice').map(function() {
        return $(this);
    }).get();

    for(var l=0; l<luxx.length; l++){
        luxxPrices += parseInt(luxx[l].attr('data-filterprice'))
    }

    $('.reluxxfull').text(luxxPrices + ' Ft')

    var other = $('#other .filteredPrice').map(function() {
        return $(this);
    }).get();

    for(var l=0; l<other.length; l++){
        otherPrices += parseInt(other[l].attr('data-filterprice'))
    }

    $('.reotherfull').text(otherPrices + ' Ft')
    /*Ezt majd rövidíteni kell... end*/

    $(function() {  
        $('body').niceScroll({
            cursorcolor:"rgba(0,0,0,0.6)",
            cursorwidth:"6px",
            background:"rgba(20,20,20,0.3)",
            cursorborder:"none",
            autohidemode: true
        })
    })
})
$(window).on('load', function(){
    $('body').css('overflow', 'auto');
    $('.page-loader').css('visibility', 'hidden');
})