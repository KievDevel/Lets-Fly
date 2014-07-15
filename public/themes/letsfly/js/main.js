$(function (){
    $('#popup').on( "click", function (event){
        var t=event.target||event.srcElement;
        if(t.className != "popup") return;
        hidePopup();
    });

    setTime();
    
    $('.timer').on('click',function (e){
        e.preventDefault();
    })

    
});

/*form validation*/
var app = angular.module('plane',[]);

    app.controller('formController',function ($scope){
        $scope.user = {};
        $scope.invalidNumber="error";
        $scope.isPhoneInvalid = function(){
            return isNaN($.trim($scope.user.phone));
        }
        $scope.you = function(){
            /* start jQuery */
            /* end jQuery */
        }
    });
/*timer setting*/
function setTime() {
    var date = new Date($("#date").text());
    var currentDate = new Date();
    var time = (date.getTime()-currentDate.getTime())/1000;
    if(time<85536000 && time > 0){
        $('.timer').each(function (index,elemet){
            $(elemet).FlipClock(time, {
                clockFace: 'DailyCounter',
                countdown: true
            });
        });
    }
    
}
/*showing and hiding popups*/
function showPopup (purple) {
        if(purple) {
            $('#popupButton').text('Заказать полет').addClass('purple');
        } else {
            $('#popupButton').text('Заказать звонок').removeClass('purple');
        }
        $('#popup').show();
    }

function hidePopup () {
    $('#popup').hide();
}

$(document).ready(function(){
    var forms=[
        $("form")
    ];
    //form validation
    for (var i in forms){

        forms[i].on('submit',function(){

            var form = $(this),
                url = form.attr("action"),
                type = form.attr("method"),
                data = {};

            form.find('[name]').each(function(){
                var field = $(this),
                    name = field.attr('name'),
                    value = field.val();
                data[name] = value;
            });
            if (data.name=="" || data.tel == "" ) return;
            console.log(data);

            $.ajax({
                dataType: "json",
                url:url,
                type:type,
                data:data,
                success: function(response){
                    result(response.success,form);
                }
            });

            return false;

        });
        function result(response,form){
            console.log("sooka"+ response);
            var text = "Заявка успешно отправлена";
            if (response != "ok")
                text = "Ой! Что-то пошло не так. Заявка не была отправлена :(";
            console.log(text);
            alert (text);
            form.find("span.success").remove();
            form.prepend( "<span class='success'>"+text+"</span>" );
        }

        forms[i].validate({
            rules:{
                name:{
                    required: true
                },
                tel:{
                    required: true,
                    digits: true
                }
            },
            messages:{
                name:{
                    required: "Это поле обязательно для заполнения"
                },

                tel:{
                    required: "Это поле обязательно для заполнения",
                    digits: "Введите корректный номер телефона (только цыфры)"
                }
            }

        });
    }

});