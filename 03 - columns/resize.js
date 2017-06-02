$(function(){
    $("#column1").hover(
        function(){
           $(this).animate({width: '58%'});
           $(column2).animate({width: '20.5%'});
           $(column3).animate({width: '20.5%'});
        },
        function(){
            $(this).animate({width: '33%'});
            $(column2).animate({width: '33%'});
            $(column3).animate({width: '33%'});
        }
    );                             
});
$(function(){
    $("#column2").hover(
        function(){
           $(this).animate({width: '58%'});
           $(column1).animate({width: '20.5%'});
           $(column3).animate({width: '20.5%'});
        },
        function(){
            $(this).animate({width: '33%'});
            $(column1).animate({width: '33%'});
            $(column3).animate({width: '33%'});
        }
    );                             
});
$(function(){
    $("#column3").hover(
        function(){
           $(this).animate({width: '58%'});
           $(column2).animate({width: '20.5%'});
           $(column1).animate({width: '20.5%'});
        },
        function(){
            $(this).animate({width: '33%'});
            $(column2).animate({width: '33%'});
            $(column1).animate({width: '33%'});
        }
    );                             
});