$(document).ready(function () {

    $('#step1').css('display', 'block');

    var materials = [], catalogs = [], brightness = 1, location_status, jobs = [], shape = "shape1", dimensions = [], dimensions_count = 1, latitude, longitude, m25_lat = 51.715805, m25_long = -0.274137;


    $(document).delegate('#ajaxcatalogs ul.pagination a', 'click', function (e) {
        e.preventDefault();
        //to get what page, when you click paging
        var page = $(this).attr('href').split('page=')[1];
        //console.log(page);
        GetCatalogs(page);
    });

    if (document.getElementById("ajaxcatalogs") !== null) {
        GetCatalogs(1);
    }


    function GetCatalogs(page) {
        $.ajax({
            url: APP_URL + '/quotepage/catalogs',
            method: 'GET',
            data: { 'page': page, 'materials': JSON.stringify(materials), 'brightness': brightness }
        }).then((response) => {
            $('#ajaxcatalogs').html(response);
        }, function (error) {
            console.error(error)
        })

    }


    $('.shape_btn').click(function () {
        $('.shape_btn').removeClass('button_selected');
        $(this).addClass('button_selected');
    });

    $(document).delegate('.fav_btn', 'click', function () {
        $.ajax({
            url: APP_URL + '/addcatalog',
            method: 'POST',
            data: { id: $(this).attr('tag'), '_token': $('#CSRF').val() }
        }).then((data) => {
            if (data.status == 'success') $(this).addClass('added');
        }, function (response) {
            if (response['status'] == 401) {
                ShowFormMessage("Please login to save categories to favourites.");
            }
            if (response.responseJSON.status == 'error') {
                ShowFormMessage(response.responseJSON.message);
            }
        })
    });

    $(document).delegate('ul.brightnesslist li', 'click', function () {
        $('ul.brightnesslist li').removeClass('active');
        $(this).addClass('active');
        brightness = $(this).attr('tag');
        GetCatalogs(1);
    })

    /*
        $(document).delegate('ul.matrials_list li', 'click', function () {
            $('ul.matrials_list li').removeClass('active');
            $(this).addClass('active');
            if ($(this).attr('tag') !== "all") {
                materials = [$(this).attr('tag')];
            } else {
                materials = [];
            }
            GetCatalogs(1);
        })
    
        $('.matrial_btn').click(function () {
            var materialID = $(this).attr('tag');
            var i = materials.indexOf(materialID);
            if (i > -1) {
                materials.splice(i, 1);
                if ($(this).hasClass('button_selected')) {
                    $(this).removeClass('button_selected');
                }
            } else {
                if (materials.length >= 10) { return } else {
                    $(this).addClass('button_selected');
                    materials.push(materialID);
                }
            }
        });
        */

    $('.jobs_btn').click(function () {

        var JobName = $(this).attr('tag');
        var i = jobs.indexOf(JobName);
        if (i > -1) {
            jobs.splice(i, 1);
            if ($(this).hasClass('button_selected')) {
                $(this).removeClass('button_selected');
            }
        } else {
            if (jobs.length >= 10) { return; } else {
                jobs.push(JobName);
                $(this).addClass('button_selected');
            }
        }
    });

    $('#nodimcheck').click(function () {
        if ($(this).is(':checked')) {
            $('#dinputs').hide();
        }
        else {
            $('#dinputs').show();
        }
    });


    $("#dinputs").delegate(".range_width", "change", function () {
        $('#label_width_' + $(this).attr('tag')).html('Width: ' + $(this).val());
    });
    $("#dinputs").delegate(".range_height", "change", function () {
        $('#label_height_' + $(this).attr('tag')).html('Height: ' + $(this).val());
    });

    /*
        $('.category_btn').click(function(){
               var catalongID = $(this).attr('tag');
               var i = catalogs.indexOf(catalongID);
               if(i > -1){
                     catalogs.splice(i, 1);
                     if($(this).hasClass('button_selected')){
                       $(this).removeClass('button_selected');
                      }
               }else{
                     if(catalogs.length >= 10){ return alert('You can select up to 10 categories only') }else{
                        $(this).addClass('button_selected');
                        catalogs.push(catalongID);
                     }
               }
         });
    

    $(document).delegate('.addtocard', 'click', function () {
        var catalongID = $(this).attr('tag');
        var i = catalogs.indexOf(catalongID);
        if (i > -1) {
            catalogs.splice(i, 1);
            $("#add_btn_" + catalongID).css('display', 'inline-block')
            $("#done_btn_" + catalongID).css('display', 'none')
        } else {
            if (catalogs.length >= 10) { return alert('You can select up to 10 categories only') } else {
                // $(this).addClass('button_selected');
                $("#add_btn_" + catalongID).css('display', 'none')
                $("#done_btn_" + catalongID).css('display', 'inline-block')
                catalogs.push(catalongID);
            }
        }
    });

    */


    $(document).delegate('.addtocard', 'click', function () {
        var catalongID = $(this).attr('tag');
        $.ajax({
            url: APP_URL + '/addtocart',
            method: 'POST',
            data: { 'ID': catalongID, '_token': $('meta[name="csrf-token"]').attr('content') }
        }).then((response) => {
            if (response == 'saved') {
                $("#add_btn_" + catalongID).css('display', 'none');
                $("#done_btn_" + catalongID).css('display', 'inline-block');
            } else if (response == 'max') {
                return alert('You can select up to 10 categories only');
            }
        }, function (error) {
            console.error(error)
        })
    });


    $(document).delegate('.addtocardbtn_done', 'click', function () {
        var catalongID = $(this).attr('tag');
        $.ajax({
            url: APP_URL + '/removefromcart',
            method: 'POST',
            data: { 'ID': catalongID, '_token': $('meta[name="csrf-token"]').attr('content') }
        }).then((response) => {
            if (response == 'done') {
                $("#add_btn_" + catalongID).css('display', 'inline-block');
                $("#done_btn_" + catalongID).css('display', 'none');
            }
        }, function (error) {
            console.error(error)
        })
    });


    $(document).delegate('ul.matrials_list li', 'click', function () {
        var materialID = $(this).attr('tag');
        $.ajax({
            url: APP_URL + '/addmaterial',
            method: 'POST',
            data: { 'ID': materialID, 'multiple': 'false', '_token': $('meta[name="csrf-token"]').attr('content') }
        }).then((response) => {
            if (response == 'done') {
                $('ul.matrials_list li').removeClass('active');
                $(this).addClass('active');
                GetCatalogs(1);
            }
        }, function (error) {
            console.error(error)
        });
    })

    $('.matrial_btn').click(function () {

        var materialID = $(this).attr('tag');
        if ($(this).hasClass('button_selected')) {
            $.ajax({
                url: APP_URL + '/removematerial',
                method: 'POST',
                data: { 'ID': materialID, 'multiple': 'true', '_token': $('meta[name="csrf-token"]').attr('content') }
            }).then((response) => {
                if (response == 'done') {
                    $(this).removeClass('button_selected');
                    GetCatalogs(1);
                }
            }, function (error) {
                console.error(error)
            });

        } else {
            $.ajax({
                url: APP_URL + '/addmaterial',
                method: 'POST',
                data: { 'ID': materialID, 'multiple': 'true', '_token': $('meta[name="csrf-token"]').attr('content') }
            }).then((response) => {
                if (response == 'done') {
                    $(this).addClass('button_selected');
                    GetCatalogs(1);
                }
            }, function (error) {
                console.error(error)
            });
        }

    });

    function ShowFormMessage(message) {
        $('#form_msg').css('display', 'inline-block');
        $("#form_msg").text(message);
        $("html").scrollTop(0);
    }

    window.GoToStep = function (StepNumber) {
        if (StepNumber == 2) {
            if ($('#step1 .button_selected').length == 0) { return ShowFormMessage("Please select at least One Material.") } else { GetCatalogs(1); }
        }
        $('.step_panel, #form_msg').css('display', 'none');
        $('#step' + StepNumber + '.step_panel').css('display', 'block');
    }



    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getPosition);
    }

    function getPosition(position) {
        //console.log(position);
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
        var calc_distance = distance(latitude, longitude, m25_lat, m25_long);
        //console.log(calc_distance);
        if (calc_distance > 10) {
            location_status = false;
            $('#location').html("<p style='color:red'>We are not currently serving your area, but submit your requirements and we will get back to you shortly.</p>");
        } else {
            location_status = true;
            $('#location').html("<img src='" + APP_URL + "/img/frontend/form/checkbox.png' width='40' height='40'>");
        }

    }


    window.select_shape = function (shapename, number) {
        var title = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        dimensions = []; // clear all dimensions
        shape = shapename;
        dimensions_count = number;
        $('#dinputs').html(''); //clear all inputs
        for (i = 0; i < dimensions_count; i++) { // add new inputs
            $('#dinputs').append('<div class="row"><div class="col"><h3 class="text-center">' + title[i] + '</h3><input id="title_' + i + '" value="' + title[i] + '" type="hidden"></div><div class="col-5"><label id="label_width_' + i + '">Width: 0</label><input type="range" value="0" tag="' + i + '" class="custom-range range_width" min="1" max="5000" id="range_width_' + i + '"></div><div class="col-5"><label id="label_height_' + i + '">Height: 0</label><input type="range" value="0" tag="' + i + '" class="custom-range range_height" min="1" max="5000" id="range_height_' + i + '"></div></div>')

        }
    }



    window.showResults = function (isitsociallogin = false) {

        if ($('#email').val() == '' || $('#password').val() == '') {
            return ShowFormMessage("Al fields are required, Please enter your email and password to register!");
        }


        var no_measurements = false;
        if ($('#nodincheck').is(':checked')) {
            no_measurements = true;
        } else {
            for (i = 0; i <= dimensions_count - 1; i++) {
                dimensions.push({
                    'title': $('#title_' + i).val(),
                    'width': $('#range_width_' + i).val(),
                    'height': $('#range_height_' + i).val()
                });
            }
        }



        Pdata = {
            '_token': $('#CSRF').val(),
            //'materials': materials,
            //'catalogs': catalogs,
            'location': location_status,
            'shape': shape,
            'no_measurements': no_measurements,
            'dimensions': dimensions,
            'jobs': jobs,
            'email': $('#email').val(),
            'password': $('#password').val(),
            'custom': $('#custom').val(),
            //  'sociallogin': isitsociallogin,
        }

        if (isitsociallogin) {
            Pdata['sociallogin'] = isitsociallogin;
        }


        $.ajax({
            url: APP_URL + '/pricing/quote/create',
            method: 'POST',
            data: Pdata
        }).then(function (data) {
            if (data.message == 'redirect-google') {
                return window.location = APP_URL + '/login/google';
            } else if (data.message == 'redirect-facebook') {
                return window.location = APP_URL + '/login/facebook';
            }
            if (data.status == 'success') { $('#quoteForm').hide() }
            return ShowFormMessage(data.message)
        }, function (response) {
            if (response.responseJSON.status == 'error') {
                return ShowFormMessage(response.responseJSON.message);
            }
        })
    }




    function distance(lat1, lon1, lat2, lon2) {
        var radlat1 = Math.PI * lat1 / 180
        var radlat2 = Math.PI * lat2 / 180
        var theta = lon1 - lon2
        var radtheta = Math.PI * theta / 180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist)
        dist = dist * 180 / Math.PI
        dist = dist * 60 * 1.1515
        dist = dist * 1.609344;
        return dist
    }


})


