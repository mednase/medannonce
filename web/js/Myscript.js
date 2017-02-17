/**
 * Created by Mednaceur on 19/02/2016.
 */
$(document).ready(function () {

    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });

    var region = [{name: 'Gabès'}, {name: 'Tataouine'}, {name: 'mednine'}, {name: 'Kébili'},
        {name: 'Tozeur'}, {name: 'Gafsa'}, {name: 'Sfax'}, {name: 'Sidi Bouzid'}, {name: 'Kasserine'},
        {name: 'Kairouan'}, {name: 'Siliana'}, {name: 'Le Kef'}, {name: 'Mahdia'}
        , {name: 'Monastir'}, {name: 'Sousse'}, {name: 'Zaghouan'}, {name: 'Nabeul'}, {name: 'Ben Arous'}
        , {name: 'Jendouba'}, {name: 'Béja'}, {name: 'Bizerte'}, {name: 'Ariana'}, {name: 'Tunis'}
        , {name: 'Manouba'}];
    var txt = " <option value='' selected>Toutes la tunisie</option>";
    for (x in region) {
        txt +="<option value='"+region[x].name+"'>"+region[x].name + "</option>";
    }
    $(".country").html(txt);
    $(".toolip").hide();
    $(".map").append('<div class="overlay">').append('<div class="toolip"></div>');
    $("map area").mouseover(function () {
        var index = $(this).index();
        var left = -index * 300 - 300;
        $(".toolip").html(region[index].name).stop().fadeTo(500, 2);
        $('.overlay').css("background-position", left + "px 0px");

    });
    $(document).mousemove(function (e) {
        $('.toolip').css("top", e.pageY- window.pageYOffset ).css("left", e.pageX +20);

    });
    $('img').mouseout(function () {
        $('.overlay').css("background-position", "300px 0px");
        $('.toolip').fadeTo(500, 0);

    });

        function switchtab(p,a){
            if($(window).width()<775 && p.hasClass("f")){
                p.addClass("hidden");
                a.removeClass("hidden");}
        }
        function hidetab(){
            if($(window).width()<775){
                $("#tabname").find("li").each(function(i,e){
                    if(!$(e).hasClass("active")){
                        $(e).addClass("hidden");
                    }
                });
            }else{
                $("#tabname").each(function(i,e){
                    $("li").removeClass("hidden");
                });
            }
        };
        hidetab();
        $("#term").hide();
        $("#precedent").hide();
        var i=0;


        $("#suivant").click(function () {
            if(true) {

                var $new, $selected = $(".active");
                i = $selected.index();
                if (i < 4) {
                    $new = $selected.next();
                    $selected.removeClass("active");
                    $new.addClass("active");
                    $("#precedent").show();
                }
                if (i == 2) {
                    $("#term").show();
                    $(this).hide();
                }
                if (($selected.hasClass("f") && $new.hasClass("f")))
                    switchtab($selected, $new);
            }
            });


        $("#precedent").click(function () {
            var $new, $selected = $(".active");
            i=$selected.index();
            if( i> 0){
                $new=$selected.prev();
                $selected.removeClass("active");
                $new.addClass("active");
            }
            if(i==1){
                $(this).hide();
            }
            $("#suivant").show();
            $("#term").hide();
            if(($selected.hasClass("f") && $new.hasClass("f")))
                switchtab($selected,$new);
        });

        $(window).resize(function(e){
            hidetab();
            $(".tab-pane").each(function(){
                $(this).removeClass("hidden");
            });
        });
    function valider1etape(){

        $(".wizard-card form").validate({
            rules: {
                username: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true
                }

                /*  other possible input validations
                 ,username: {
                 required: true,
                 minlength: 2
                 },
                 password: {
                 required: true,
                 minlength: 5
                 },
                 confirm_password: {
                 required: true,
                 minlength: 5,
                 equalTo: "#password"
                 },

                 topic: {
                 required: "#newsletter:checked",
                 minlength: 2
                 },
                 agree: "required"
                 */

            },
            messages: {
                username: "Ce champ est obligatoire ",
                email: "Please enter a valid email address",

                /*   other posible validation messages
                 username: {
                 required: "Please enter a username",
                 minlength: "Your username must consist of at least 2 characters"
                 },
                 password: {
                 required: "Please provide a password",
                 minlength: "Your password must be at least 5 characters long"
                 },
                 confirm_password: {
                 required: "Please provide a password",
                 minlength: "Your password must be at least 5 characters long",
                 equalTo: "Please enter the same password as above"
                 },
                 email: "Please enter a valid email address",
                 agree: "Please accept our policy",
                 topic: "Please select at least 2 topics"
                 */

            }
        });

        if(!$(".wizard-card form").valid()){
            //form is invalid
            return false;
        }

        return true;
    }

    function valider2etape(){

        //code here for second step
        $(".wizard-card form").validate({
            rules: {

            },
            messages: {

            }
        });

        if(!$(".wizard-card form").valid()){
            console.log('invalid');
            return false;
        }
        return true;

    }

    function valider3etape(){
        //code here for third step


    }


    $(".itemAnnonce").click(function () {
        window.document.location = $(this).data("href");
    });

    $("#wizard-picture").change(function(){
        alert("changer");
        readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }

        alert("2");
    }
});
