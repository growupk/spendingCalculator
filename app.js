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
        var $li = $(".response i")
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
})