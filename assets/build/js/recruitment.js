

$(document).ready(function () {
    
    $('[data-toggle="tooltip"]').tooltip();   
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $("#checkUser").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        var captcha = $('.g-recaptcha-response').val();
        var email = $("#email_id").val();
        var phone = $("#phone").val();
        //var base_url = $("#base_url"); 
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test(email)) {
            $('.error').text("Please fill the valid email?");
            current_fs.show();
        } else if (email == '') {
            $('.error').text("Please fill the email?");
            current_fs.show();
        } else if (phone == '') {
            $('.error').text("Please fill the phone?");
            current_fs.show();
        } else {
            //alert($("#email_id").val()+' '+$("#phone").val().length+' '+base_url);
            if ($("#email_id").val().length >= 4) {
                $.ajax({
                    type: "POST",
                    url: "staff_recruitment/check_user_exist",
                    data: { "email_id": email, "phone_no": phone },
                    success: function (res) {                       
                        $('.error').text("");
                        if(!captcha){
                        if (res == 0 || res == '0') {
                            $('.personal_id').val(res);
                        } else {

                            var json_personal = JSON.parse(res);

                            $('.personal_id').val(json_personal['personal_id']);
                            $("#department option[value='" + json_personal['department'] + "']").attr('selected', true);
                            $('#first_name').val(json_personal['first_name']);
                            $('#last_name').val(json_personal['last_name']);
                            $('#dob').val(json_personal['dob']);
                            //console.log("#gender value["+json_personal['gender']+"']");
                            $("#gender option[value='" + json_personal['gender'] + "']").attr('selected', true);
                            $("#married_status option[value='" + json_personal['married_status'] + "']").attr('selected', true);
                            // $("input[value=" + json_personal['gender'] + "]").attr('checked', true);
                            // $("input[value=" + json_personal['married_status'] + "]").attr('checked', true);
                            $('#email_id').val(json_personal['#email_id']);
                            $('#father_name').val(json_personal['father_name']);
                            $('#father_occupation').val(json_personal['father_occupation']);
                            $("#nationality").val(json_personal['nationality']);
                            //console.log("#cummunity value['"+json_personal['cummunity']+"']");
                            $("select option[value='" + json_personal['community'] + "']").attr('selected', true);       
                            $('.community').change();     
                            
                            setTimeout(function(){                       
                                console.log(".caste option[value='"+ json_personal['caste'] +"']");
                                $(".caste option[value='"+ json_personal['caste'] +"']").attr('selected', true);  
                            }, 1000);

                            $('#religion').val(json_personal['religion']);
                            //$('#caste').val(json_personal['caste']);
                            /*$('.caste').append($('<option>', { 
                                value: json_personal['caste'],
                                text : json_personal['caste'] 
                            }).attr('selected', true));*/
                            $('#mother_tongue').val(json_personal['mother_tongue']);
                            $('#personal_email_id').val(json_personal['email_id']);
                            $('#personal_phone_no').val(json_personal['phone_no']);
                            $('#native_place').val(json_personal['native_place']);
                        }
                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({ opacity: 0 }, {
                            step: function (now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                            },
                            duration: 600
                        });
                    }
                    else{
                        alert("'captcha','You are a robot, Please try again?");
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();
                    }

                    }
                });

            } else {

                $("#email_verify").text(""); /*css({ "background-image" "none" })*/
                $('.error').text("");
            }
        }

    });

    $("#personalInfo").click(function (){
        //function insert_personal() {
         
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        var personal_form = $('.personalInfo').serialize();

        var dept = $("#department[name='department']").val();
        var f_name = $("#first_name").val();
        var l_name = $("#last_name").val();
        var dob = $("#dob").val();
        var gender = $("#gender[name='gender']").val();
        var father_name = $("#father_name").val();
        var married_status = $("#married_status[name='married_status']").val();
        var father_occ = $("#father_occupation").val();
        var nationality = $("#nationality").val();
        var religion = $("#religion").val();
        var community = $("#community[name='community']").val();
        var caste = $("#caste").val();
        var mother_tongue = $("#mother_tongue").val();
        var email_id = $("#personal_email_id").val();
        var phone_no = $("#personal_phone_no").val();
        var native_place = $("#native_place").val();

        if (dept == '' || dept == undefined) {
            $('.per_error').text("Please select the department?");
            current_fs.show();
        } else if (f_name == '' || f_name == undefined) {
            $('.per_error').text("Please fill the first name?");
            current_fs.show();
        } else if (l_name == '' || l_name == undefined) {
            $('.per_error').text("Please fill the last name?");
            current_fs.show();
        } else if (dob == '' || dob == undefined) {
            $('.per_error').text("Please fill the date of birth?");
            current_fs.show();
        } else if (gender == '' || gender == undefined ) {
            $('.per_error').text("Please choose the gender?");
            current_fs.show();
        } else if (father_name == '' || father_name == undefined) {
            $('.per_error').text("Please fill the father name?");
            current_fs.show();
        } else if (married_status == '' || married_status == undefined) {
            $('.per_error').text("Please choose the married status?");
            current_fs.show();
        } else if (father_occ == '' || father_occ == undefined) {
            $('.per_error').text("Please fill the father occupation?");
            current_fs.show();
        } else if (nationality == '' || nationality == undefined) {
            $('.per_error').text("Please fill the nationality?");
            current_fs.show();
        } else if (mother_tongue == '' || mother_tongue == undefined ) {
            $('.per_error').text("Please fill the mother tonque?");
            current_fs.show();
        } else if (religion == '' || religion == undefined) {
            $('.per_error').text("Please fill the religion?");
            current_fs.show();
        } else if (community == '' || community == undefined ) {
            $('.per_error').text("Please fill the community?");
            current_fs.show();
        } else if (caste == '' || caste == undefined ) {
            $('.per_error').text("Please fill the caste?");
            current_fs.show();
        } else if (email_id == '' || email_id == undefined ) {
            $('.per_error').text("Please fill the email id?");
            current_fs.show();
        } else if (phone_no == '' || phone_no == undefined ) {
            $('.per_error').text("Please fill the phone no?");
            current_fs.show();
        } else if (native_place == '' || native_place == undefined ) {
            $('.per_error').text("Please fill the native place?");
            current_fs.show();
        } else {
        $.ajax({
            type: "GET",
            url: "staff_recruitment/personal_insert?" + personal_form,
            //data: form.serialize(), // <--- THIS IS THE CHANGE        
            success: function(data){

                    $('.per_error').text("");
                    var JsonData = JSON.parse(data);

                    if (JsonData['personal_id'] == 0 || JsonData['personal_id'] == '0') {
                        $('.personal_id').val(JsonData['personal_id']);
                    } else {
                        $('.personal_id').val(JsonData['personal_id']);

                        if(!($.isEmptyObject(JsonData['communication'][0]))){              
                            
                            $('#type_of_address_1').val(JsonData['communication'][0]['type_of_address']);                    
                            $('#phone_no_1').val(JsonData['communication'][0]['phone_no']);
                            $('#street_address_1').val(JsonData['communication'][0]['street_address']);                           
                            $("#state_1 option[value='" + JsonData['communication'][0]['state'] + "']").attr('selected', true);
                            //$("select option[value='" + JsonData['communication'][0]['city'] + "']").attr('selected', true);     
                            $('.state_1').change();
                            setTimeout(function(){                       
                                //console.log(".caste option[value='"+ json_personal['caste'] +"']");
                                $(".city_1 option[value='"+JsonData['communication'][0]['city']+"']").attr('selected', true);  
                            }, 1000);

                            // $('.city_1').append($('<option>', { 
                            //     value: JsonData["communication"][0]["city"],
                            //     text : JsonData["communication"][0]["city"] 
                            // }).attr('selected', true));
                            $('#pin_no_1').val(JsonData['communication'][0]['pin_no']);                           
                        }
    
                        if(!($.isEmptyObject(JsonData['communication'][1]))){
                            
                            $('#type_of_address_2').val(JsonData['communication'][1]['type_of_address']);  
                            $('#phone_no_2').val(JsonData['communication'][1]['phone_no']);
                            $('#street_address_2').val(JsonData['communication'][1]['street_address']);
                            //$("select option[value='" + JsonData['communication'][1]['city'] + "']").attr('selected', true);
                            $("#state_2 option[value='" + JsonData['communication'][1]['state'] + "']").attr('selected', true);
                            $('.state_2').change();
                            setTimeout(function(){                       
                                //console.log(".caste option[value='"+ json_personal['caste'] +"']");
                                $(".city_2 option[value='"+JsonData['communication'][1]['city']+"']").attr('selected', true);  
                            }, 1000);
                            // $('.city_2').append($('<option>', { 
                            //     value: JsonData["communication"][1]["city"],
                            //     text : JsonData["communication"][1]["city"] 
                            // }).attr('selected', true));
                            $('#pin_no_2').val(JsonData['communication'][1]['pin_no']);                 
                        }
                    }
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({ opacity: 0 }, {
                        step: function (now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({ 'opacity': opacity });
                        },
                        duration: 600
                    });           
                
            },
            error: function () { alert("Error posting feed."); }
        });

        }
    
      //return false;
    });

    $("#communicationInfo").click(function (){
        //function insert_personal() {    
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            var personal_id = $('.personal_id').val();            
            var phone = $('#phone_no_1').val();
            var street_add = $('#street_address_1').val();
            var city = $("#city_1[name='city[]']").val();
            var state = $("#state_1[name='state[]']").val();
            var country = $("#country_1[name='country[]']").val();
            var pin_no = $('#pin_no_1').val();
            
            var communication_form = $('.communicationInfo').serialize();

            if (phone == '' || phone == undefined ) {
                $('.com_error').text("Please fill the phone number?");
                current_fs.show();
            } else if (street_add == '' || street_add == undefined ) {
                $('.com_error').text("Please fill the street address?");
                current_fs.show();
            }else if (country == '' || country == undefined ) {
                $('.com_error').text("Please fill the country?");
                current_fs.show();
            } else if (state == '' || state == undefined ) {
                $('.com_error').text("Please fill the state?");
                current_fs.show();
            } else if (city == '' || city == undefined ) {
                $('.com_error').text("Please fill the city?");
                current_fs.show();
            } else if (pin_no == '' || pin_no == undefined ) {
                $('.com_error').text("Please fill the pin number?");
                current_fs.show();
            } else {
            $.ajax({
                type: "GET",
                url: "staff_recruitment/communication_insert?" + communication_form + '&personal_id='+personal_id,
                //data: form.serialize(), // <--- THIS IS THE CHANGE        
                success: function (data) {
                    $('.com_error').text("");
                    var JsonData = JSON.parse(data);
        
                    if (JsonData['personal_id'] == 0 || JsonData['personal_id'] == '0') {
                        console.log(data); 
                        alert("Personal Id: "+JsonData['personal_id']+" Json: "+JsonData);                       
                        $('.personal_id').val(JsonData['personal_id']);
                    } else {
                         //console.log(JsonData['education'].length);                        
                         $('.personal_id').val(JsonData['personal_id']);
                        if(!($.isEmptyObject(JsonData['education']))){

                            for(i=0; i<JsonData['education'].length; i++){
                                if(i == 0){
                                $('.degree').val(JsonData['education'][i]['degree']);
                                $('.subject').val(JsonData['education'][i]['specialization']);
                                $('.college').val(JsonData['education'][i]['college']);
                                $('.mos').val(JsonData['education'][i]['mos']);
                                $('.aff_university').val(JsonData['education'][i]['aff_university']);
                                $('.yoj').val(JsonData['education'][i]['yoj']);
                                $('.yop').val(JsonData['education'][i]['yop']);
                                $('.percentage').val(JsonData['education'][i]['percentage']);
                                }else{
                                    var SNo = i + 1;
                                    var row = $("<tr class='removeClassEdu_"+SNo+"'>");
                                    $("#edu_fields").append(row); //this will append tr element to table.
                                    row.append($('<td>' + SNo + '</td>'));
                                    row.append($("<td><input type='text' name='degree[]' class='form-control degree degree"+SNo+"' alt='"+SNo+"' id='degree' value='"+ JsonData['education'][i]['degree'] +"' placeholder='Enter Degree'></td>"));
                                    row.append($("<td><input type='text' name='subject[]' class='form-control subject subject"+SNo+"' id='subject' value='"+ JsonData['education'][i]['specialization'] +"' placeholder='Enter Specialization'></td>"));
                                    row.append($("<td><input type='text' name='college[]' class='form-control college college"+SNo+"' id='college' value='"+ JsonData['education'][i]['college'] +"' placeholder='Enter Subject'></td>"));
                                    row.append($("<td><input type='text' name='mos[]' class='form-control mos mos"+SNo+"' id='mos' value='"+ JsonData['education'][i]['mos'] +"' placeholder='Enter Mode of Study'></td>"));
                                    row.append($("<td><input type='text' name='aff_university[]' class='form-control aff_university aff_university"+SNo+"' id='aff_university' value='"+ JsonData['education'][i]['aff_university'] +"' placeholder='Enter University'></td>"));
                                    row.append($("<td><input type='date' name='yoj[]' class='form-control yoj yoj"+SNo+"' id='yoj' value='"+ JsonData['education'][i]['yoj'] +"' placeholder='YYYY-MM-DD'></td>"));
                                    row.append($("<td><input type='date' name='yop[]' class='form-control yop yop"+SNo+"' id='yop' value='"+ JsonData['education'][i]['yop'] +"' placeholder='YYYY-MM-DD'></td>"));
                                    row.append($("<td><input type='text' name='percentage[]' class='form-control percentage percentage"+SNo+"' id='percentage' value='"+ JsonData['education'][i]['percentage'] +"' placeholder='Enter Percentage'></td>"));
                                    row.append($("<td><button class='btn btn-sm btn-danger' type='button' onclick='remove_edu_fields("+SNo+");'> <span class='fa fa-trash' aria-hidden='true'></span> </button></td>"));
                                    row.append($('</tr>'));
                                }
                            } 
                            
                            eduId = parseInt(JsonData['education'].length);
                        }                       
                    }    
        
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({ opacity: 0 }, {
                        step: function (now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
        
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({ 'opacity': opacity });
                        },
                        duration: 600
                    });
                },
                error: function () { alert("Error posting feed."); }
            });
        }
            //return false;
        });

        $("#educationInfo").click(function (){
            //function insert_personal() {
        
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                var personal_id = $('.personal_id').val();                
                var education_form = $('.educationInfo').serialize();
               

                var degree_arr = [];
                $('.degree').each(function(){
                    degree_arr.push($(this).attr('alt'));
                }); 

                var edu_res = '';

                for(var i=0; i<degree_arr.length; i++){

                    //console.log(degree_arr[i]);

                    var degree = $('.degree'+degree_arr[i]).val();
                    var subject = $('.subject'+degree_arr[i]).val();  
                    var college = $('.college'+degree_arr[i]).val();  
                    var mos = $('.mos'+degree_arr[i]).val();  
                    var aff_university = $('.aff_university'+degree_arr[i]).val();
                    var yoj = $('.yoj'+degree_arr[i]).val(); 
                    var yop = $('.yop'+degree_arr[i]).val(); 
                    var percentage = $('.percentage'+degree_arr[i]).val();  

                    
                    if (degree == '' || degree == undefined ) {
                        $('.edu_error').text("Please fill the degree?");
                        current_fs.show();
                        edu_res = false;
                    }else if (subject == '' || subject == undefined ) {
                        $('.edu_error').text("Please fill the subject?");
                        current_fs.show();
                        edu_res = false;
                    }else if (college == '' || college == undefined ) {
                        $('.edu_error').text("Please fill the college?");
                        current_fs.show();
                        edu_res = false;
                    }else if (mos == '' || mos == undefined ) {
                        console.log('.mos'+degree_arr[i]);  
                        $('.edu_error').text("Please fill the mode of study?");
                        current_fs.show();
                        edu_res = false;
                    }else if (aff_university == '' || aff_university == undefined ) {
                        $('.edu_error').text("Please fill the affiliated university?");
                        current_fs.show();
                        edu_res = false;
                    }else if (yoj == '' || yoj == undefined ) {
                        $('.edu_error').text("Please fill the year of joining?");
                        current_fs.show();
                        edu_res = false;
                    }else if (yop == '' || yop == undefined ) {
                        $('.edu_error').text("Please fill the year of pass?");
                        current_fs.show();
                        edu_res = false;
                    }
                    else if (yoj > yop) {
                        $('.edu_error').text("Please Choose valid year of joining");
                        current_fs.show();
                        edu_res = false;
                    }else if (percentage == '' || percentage == undefined ) {
                        $('.edu_error').text("Please fill the percentage?");
                        current_fs.show();
                        edu_res = false;
                    } 
                    else{
                        edu_res = '';
                    }
                }


               
                if(edu_res !== false){
                    $.ajax({
                        type: "GET",
                        url: "staff_recruitment/education_insert?" + education_form + '&personal_id='+personal_id,
                        //data: form.serialize(), // <--- THIS IS THE CHANGE        
                        success: function (data) {  
                            //console.log(data);  
                            $('.edu_error').text("");
                            var JsonData = JSON.parse(data);
                
                            if (JsonData['personal_id'] == 0 || JsonData['personal_id'] == '0') {
                                $('.personal_id').val(JsonData['personal_id']);
                                console.log(JsonData['personal_id']);
                            } else {
                                console.log(JsonData['personal_id']);
                                $('.personal_id').val(JsonData['personal_id']);                 
                                if(!($.isEmptyObject(JsonData['experience']))){                                                    
        
                                    for(i=0; i<JsonData['experience'].length; i++){
                                        if(i == 0){
                                        $('.exp_college').val(JsonData['experience'][i]['exp_college']);
                                        $('.university').val(JsonData['experience'][i]['university']);
                                        $('.designation').val(JsonData['experience'][i]['designation']);
                                        $('.doj').val(JsonData['experience'][i]['doj']);
                                        $('.dol').val(JsonData['experience'][i]['dol']);
                                        $('.doe').val(JsonData['experience'][i]['doe']);
                                        }else{
                                            var SNo = i + 1;
                                            var row = $("<tr class='removeClassExp_"+SNo+"'>");
                                            $("#exp_fields").append(row); //this will append tr element to table.
                                            row.append($('<td>' + SNo + '</td>'));
                                            row.append($("<td><input type='text' name='exp_college[]' class='form-control exp_college exp_college"+SNo+"' alt='"+SNo+"' id='exp_college' value='"+ JsonData['experience'][i]['exp_college'] +"' placeholder='Enter Exp. College'></td>"));
                                            row.append($("<td><input type='text' name='university[]' class='form-control university university"+SNo+"' id='university' value='"+ JsonData['experience'][i]['university'] +"' placeholder='Enter University'></td>"));
                                            row.append($("<td><input type='text' name='designation[]' class='form-control designation designation"+SNo+"' id='designation' value='"+ JsonData['experience'][i]['designation'] +"' placeholder='Enter Designation'></td>"));
                                            row.append($("<td><input type='date' name='doj[]' class='form-control doj doj"+SNo+"' id='doj' value='"+ JsonData['experience'][i]['dol'] +"' placeholder='Date of Joining'></td>"));
                                            row.append($("<td><input type='date' name='dol[]' class='form-control dol dol"+SNo+"' id='dol' value='"+ JsonData['experience'][i]['dol'] +"' placeholder='Date of Leaving'></td>"));
                                            row.append($("<td><input type='number' name='doe[]' class='form-control doe doe"+SNo+"' id='doe' value='"+ JsonData['experience'][i]['doe'] +"' placeholder='Date of Experience'></td>"));                                        
                                            row.append($("<td><button class='btn btn-sm btn-danger' type='button' onclick='remove_exp_fields("+SNo+");'> <span class='fa fa-trash' aria-hidden='true'></span> </button></td>"));
                                            row.append($('</tr>'));
                                        }
                                    } 
              
                                    expId = parseInt(JsonData['experience'].length);
                                }                       
                            }    
                
                            //Add Class Active
                            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                            //show the next fieldset
                            next_fs.show();
                            //hide the current fieldset with style
                            current_fs.animate({ opacity: 0 }, {
                                step: function (now) {
                                    // for making fielset appear animation
                                    opacity = 1 - now;
                
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({ 'opacity': opacity });
                                },
                                duration: 600
                            });
                        },
                        error: function () { alert("Error posting feed."); }
                    });
                }

                 
            //return false;
        });
    
        $("#experienceInfo").click(function (){
            //function insert_personal() {
        
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                var personal_id = $('.personal_id').val();    
                var experienceInfo = $('.experienceInfo').serialize();             

                var exp_arr = [];
                $('.exp_college').each(function(){
                    exp_arr.push($(this).attr('alt'));
                }); 

                var exp_res = '';

                for(var i=0; i<exp_arr.length; i++){

                    //console.log(degree_arr[i]);
                    var exp_college = $('.exp_college'+exp_arr[i]).val();
                    var university = $('.university'+exp_arr[i]).val();
                    var designation = $('.designation'+exp_arr[i]).val();
                    var doj = $('.doj'+exp_arr[i]).val();
                    var dol = $('.dol'+exp_arr[i]).val();
                    var doe = $('.doe'+exp_arr[i]).val();                   
                   
                    if (exp_college == '' || exp_college == undefined ) {
                        $('.exp_error').text("Please fill the experience college name?");
                        current_fs.show();
                        exp_res = false;
                    } else if (university == '' || university == undefined ) {
                        $('.exp_error').text("Please fill the university?");
                        current_fs.show();
                        exp_res = false;
                    } else if (designation == '' || designation == undefined ) {
                        $('.exp_error').text("Please fill the designation?");
                        current_fs.show();
                        exp_res = false;
                    } else if (doj == '' || doj == undefined ) {
                        $('.exp_error').text("Please fill the date of joining?");
                        current_fs.show();
                        exp_res = false;
                    }else if (dol == '' || dol == undefined ) {
                        $('.exp_error').text("Please fill the date of leaving?");
                        current_fs.show();
                        exp_res = false;
                        
                    }else if (doj > dol) {
                        $('.exp_error').text("Please Choose valid year of joining");
                        current_fs.show();
                        exp_res = false;
                    } 
                    else if (doe == '' || doe == undefined ) {
                        $('.exp_error').text("Please fill the date of experience?");
                        current_fs.show();
                        exp_res = false;
                    } 
                    else{
                        exp_res = '';
                    }
                }

                if(exp_res !== false){
                    $.ajax({
                        type: "GET",
                        url: "staff_recruitment/experience_insert?" + experienceInfo + '&personal_id='+personal_id,
                        //data: form.serialize(), // <--- THIS IS THE CHANGE        
                        success: function (data) {
                            $('.exp_error').text("");
                            var JsonData = JSON.parse(data);                         
                
                            if (JsonData['personal_id'] == 0 || JsonData['personal_id'] == '0') {
                                $('.personal_id').val(JsonData['personal_id']);
                                //console.log(JsonData['personal_id']);
                            } else {                          
                                //console.log(JsonData['personal_id']);
                                $('.personal_id').val(JsonData['personal_id']);
                                if(!($.isEmptyObject(JsonData['achievement']))){
                                    for(i=0; i<JsonData['achievement'].length; i++){
                                        console.log(JsonData['achievement'][i]['eng_speak']);                                
                                        $(".set_net[value=" + JsonData['achievement'][i]['set_net'] + "]").attr('checked', true);
                                        $(".nat_journals option[value='" + JsonData['achievement'][i]['nat_journals'] + "']").attr('selected', true);
                                        $(".int_journals option[value='" + JsonData['achievement'][i]['int_journals'] + "']").attr('selected', true);
                                        $(".sem_journals option[value='" + JsonData['achievement'][i]['sem_journals'] + "']").attr('selected', true);
                                        $(".published_book option[value='" + JsonData['achievement'][i]['published_book'] + "']").attr('selected', true);
                                        $('.known_lan').val(JsonData['achievement'][i]['known_languages']);

                                        
                                        if(JsonData['achievement'][i]['eng_read'] != '' ){
                                            $(".eng_read[value=" + JsonData['achievement'][i]['eng_read'] + "]").attr('checked', true);                                                                                       
                                        } 

                                        if(JsonData['achievement'][i]['eng_speak'] != ''){
                                            $(".eng_speak[value="+JsonData['achievement'][i]['eng_speak'] + "]").attr('checked', true);
                                        } 

                                        if(JsonData['achievement'][i]['eng_write'] != ''){
                                            $(".eng_write[value=" + JsonData['achievement'][i]['eng_write'] + "]").attr('checked', true);
                                        }             
                                        
                                        $(".typing_tamil option[value='" + JsonData['achievement'][i]['typing_tamil'] + "']").attr('selected', true); 
                                        $(".typing_english option[value='" + JsonData['achievement'][i]['typing_english'] + "']").attr('selected', true);
                                        $(".comp_knowledge[value=" + JsonData['achievement'][i]['comp_knowledge'] + "]").attr('checked', true);
                                    }
                                }
                            }    
                
                            //Add Class Active
                            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                            //show the next fieldset
                            next_fs.show();
                            //hide the current fieldset with style
                            current_fs.animate({ opacity: 0 }, {
                                step: function (now) {
                                    // for making fielset appear animation
                                    opacity = 1 - now;
                
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({ 'opacity': opacity });
                                },
                                duration: 600
                            });
                        },
                        error: function () { alert("Error posting feed."); }
                    });
                }

                
            //return false;
        });

        $("#achievementInfo").click(function (){
            //function insert_personal() {
        
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                var personal_id = $('.personal_id').val();    
                var achievementInfo = $('.achievementInfo').serialize();

                var set_net = $(".set_net[name='set_net[]']:checked").val();                
                var nat_journals = $(".nat_journals[name='nat_journals[]']").val();
                var int_journals = $(".int_journals[name='int_journals[]']").val();
                var sem_journals = $(".sem_journals[name='sem_journals[]']").val();
                var published_book = $(".published_book[name='published_book[]']").val();
                var known_lan = $('.known_lan').val();
                var typing_tamil = $(".typing_tamil[name='typing_tamil[]']").val();
                var typing_english = $(".typing_english[name='typing_english[]']").val();

                if (set_net == '' || set_net == undefined) {
                    $('.achieve_error').text("Please check the SET/NET?");
                    current_fs.show();
                } else if (nat_journals == '' || nat_journals == undefined) {
                    $('.achieve_error').text("Please select the national journals?");
                    current_fs.show();
                } else if (int_journals == '' || int_journals == undefined) {
                    $('.achieve_error').text("Please select the international journals?");
                    current_fs.show();
                } else if (sem_journals == '' || sem_journals == undefined) {
                        $('.achieve_error').text("Please select the Seminner Presentation?");
                        current_fs.show();
                } else if (published_book == '' || published_book == undefined) {
                        $('.achieve_error').text("Please select number of books/chapter published?");
                        current_fs.show();
                } else if (known_lan == '' || known_lan == undefined) {
                        $('.achieve_error').text("Please fill the known languages?");
                        current_fs.show();
                } else if ($('.eng_read').prop('checked') == false) {
                    $('.achieve_error').text("Please check the english read knowledge?");
                    current_fs.show();
                } else if (typing_tamil == '' || typing_tamil == undefined) {
                    $('.achieve_error').text("Please select the typing speed in tamil?");
                    current_fs.show();
                } else if (typing_english == '' || typing_english == undefined) {
                    $('.achieve_error').text("Please select the typing speed in english?");
                    current_fs.show();
                } else if ($('.comp_knowledge').prop('checked') == false) {
                    $('.achieve_error').text("Please check the computer knowledge?");
                    current_fs.show();
                } else{
                $.ajax({
                    type: "GET",
                    url: "staff_recruitment/achievement_insert?" + achievementInfo + '&personal_id='+personal_id,
                    //data: form.serialize(), // <--- THIS IS THE CHANGE        
                    success: function (data){                      
                        $('.achieve_error').text("");
                        var JsonData = JSON.parse(data);                         
            
                        if (JsonData['personal_id'] == 0 || JsonData['personal_id'] == '0') {
                            $('.personal_id').val(JsonData['personal_id']);
                        } else {
                            $('.personal_id').val(JsonData['personal_id']);
                            if(!($.isEmptyObject(JsonData['joining']))){
                                for(i=0; i<JsonData['joining'].length; i++){                          
                                    $('#date_of_joining').val(JsonData['joining'][i]['date_of_joining']);
                                    $('#current_salary').val(JsonData['joining'][i]['current_salary']);             
                                    $('#expected_salary').val(JsonData['joining'][i]['expected_salary']); 
                                } 
                            }      
                        }    
            
                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({ opacity: 0 }, {
                            step: function (now) {
                                // for making fielset appear animation
                                opacity = 1 - now;
            
                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                            },
                            duration: 600
                        });
                    },
                    error: function () { alert("Error posting feed."); }
                });
            
            } //return false;
        });

        $("#joiningInfo").click(function (){
              //function insert_personal() {
        
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                var personal_id = $('.personal_id').val();
                var joiningInfo = $('.joiningInfo').serialize();

                var date_of_joining = $('.date_of_joining').val();
                var current_salary = $('.current_salary').val();
                var expected_salary = $('.expected_salary').val();
    

                if (date_of_joining == '' || date_of_joining== undefined) {
                    $('.joining_error').text("Please fill the date of joining?");
                    current_fs.show();
                } else if (current_salary == '' || current_salary== undefined) {
                    $('.joining_error').text("Please fill the current month of salary?");
                    current_fs.show();
                } else if (expected_salary == '' || expected_salary== undefined) {
                    $('.joining_error').text("Please fill the expected month of salary?");
                    current_fs.show();
                } else{
                $.ajax({
                    type: "GET",
                    url: "staff_recruitment/joining_insert?" + joiningInfo + '&personal_id='+personal_id,
                    //data: form.serialize(), // <--- THIS IS THE CHANGE        
                    success: function (data) {
                        $('.joining_error').text("");
                        console.log("Success..");
                        //var JsonData = JSON.parse(data);             
                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({ opacity: 0 }, {
                            step: function (now) {
                                // for making fielset appear animation
                                opacity = 1 - now;
            
                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                            },
                            duration: 600
                        });
                    },
                    error: function () { alert("Error posting feed."); }
                });
            
            }//return false;
        });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    function setAddress() {

        var city = $('#city_1').val();

        if ($('#phone_no_1').val() != '') {
            $('.success').html('Sucessfully copied..');
            if ($("#copy_address").is(":checked")) {
                $('#phone_no_2').val($('#phone_no_1').val());
                $('#street_address_2').val($('#street_address_1').val());
                $('#city_2').append($('<option>', { 
                    value: city,
                    text : city 
                }).attr('selected', true));
                $('#state_2').val($('#state_1').val());
                $('#pin_no_2').val($('#pin_no_1').val());
                $('#phone_no_2').addClass("focus");
                $('#street_address_2').addClass("focus");
                $('#city_2').addClass("focus");
                $('#state_2').addClass("focus");
                $('#pin_no_2').addClass("focus");
                $('.error').remove();
            } else {
                $('#phone_no_2').removeClass("focus")
                $('#street_address_2').removeClass("focus")
                $('#city_2').removeClass("focus")
                $('#state_2').removeClass("focus")
                $('#pin_no_2').removeClass("focus")
            }
        } else {
            $('.error').html('Please fill the address first..??');
            $("#copy_address").prop("checked", false);
        }
    }

    $('#copy_address').click(function () {
        setAddress();
    });

});

//     //Custom method to validate username
//     $.validator.addMethod("usernameRegex", function(value, element) {
//         return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
//     }, "Username must contain only letters, numbers");

//     $(".next").click(function(){
//         var form = $("#checkUse1");
//         form.validate({
//             errorElement: 'span',
//             errorClass: 'help-block',
//             highlight: function(element, errorClass, validClass) {
//                 $(element).closest('.form-group').addClass("has-error");
//             },
//             unhighlight: function(element, errorClass, validClass) {
//                 $(element).closest('.form-group').removeClass("has-error");
//             },
//             rules: {
//                 email: {
//                     required: true,
//                     minlength: 3,
//                 },

//             },
//             messages: {
//                 email: {
//                     required: "Email required",
//                 },
//             }
//         });
//         if (form.valid() === true){
//             if ($('#user1').is(":visible")){
//                 current_fs = $('#personal');
//                 next_fs = $('#communication');
//             }else if($('#communication').is(":visible")){
//                 current_fs = $('#education');
//                 next_fs = $('#education');
//             }

//             next_fs.show(); 
//             current_fs.css({ 'opacity': opacity });;
//         }
//     });

//     $('#previous').click(function(){
//         if($('#company_information').is(":visible")){
//             current_fs = $('#company_information');
//             next_fs = $('#account_information');
//         }else if ($('#personal_information').is(":visible")){
//             current_fs = $('#personal_information');
//             next_fs = $('#company_information');
//         }
//         next_fs.show(); 
//         current_fs.hide();
//     });
// });


// $(document).ready(function(){

//     // Custom method to validate username
//     $.validator.addMethod("usernameRegex", function(value, element) {
//         return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
//     }, "Username must contain only letters, numbers");
//     $(".next").click(function(){
//         var form = $("#checkUser");
//         form.validate({
//             errorElement: 'span',
//             errorClass: 'help-block',
//             highlight: function(element, errorClass, validClass) {
//                 $(element).closest('.form-group').addClass("has-error");
//             },
//             unhighlight: function(element, errorClass, validClass) {
//                 $(element).closest('.form-group').removeClass("has-error");
//             },
//             rules: {
//                 email: {
//                     required: true,
//                     minlength: 3,
//                 },

//             },
//             messages: {
//                 email: {
//                     required: "Email required",
//                 },
//             }
//         });
//         if (form.valid() === true){
//             if ($('#user').is(":visible")){
//                 current_fs = $('#communication1');
//                 next_fs = $('#company_information');
//             }else if($('#company_information').is(":visible")){
//                 current_fs = $('#company_information');
//                 next_fs = $('#personal_information');
//             }

//             next_fs.show(); 
//             current_fs.hide();
//         }
//     });

//     $('#previous').click(function(){
//         if($('#company_information').is(":visible")){
//             current_fs = $('#company_information');
//             next_fs = $('#account_information');
//         }else if ($('#personal_information').is(":visible")){
//             current_fs = $('#personal_information');
//             next_fs = $('#company_information');
//         }
//         next_fs.show(); 
//         current_fs.hide();
//     });





