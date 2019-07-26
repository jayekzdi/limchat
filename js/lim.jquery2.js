$(document).ready(function(){
    
    var load=true,id,target="dashboard";
    
    function LoadManageAccount(){
        $.ajax({
            url:"manage_account.php",
            success:function(data){
                $("#dashboard-fluid").html(data);
                $("#alert_success").hide();
            }
        });
    }
        function LoadManageDepartment(){
            $.ajax({
                url:"manage_departments.php",
                success:function(data){
                    $("#dashboard-fluid").html(data);
                    
                }
            });
        }
            function LoadDashboard(){
                $.ajax({
                    url:"dashboard.php",
                    success:function(data){
                        $("#dashboard-fluid").html(data);
                        loadPageAnnouncement();
                    }
                });
    }
    function LoadAnnouncements(){
        $.ajax({
            url:"announcements.php",
            success:function(data){
                $("#dashboard-fluid").html(data);
            }
        });
        
}
function LoadEvent(){
    $.ajax({
        url:"event.php",
        success:function(data){
            $("#dashboard-fluid").html(data);
        }
    });
}
function loadPageAnnouncement(page){
    $.ajax({
        url:"announcement.php",
        method:"POST",
        data:{page:page},
        success:function(data){

            $("#page-announce").html(data);
            
        }
    });
}
function loadLowAnnouncement(page){
    $.ajax({
        url:"announcement_low.php",
        method:"POST",
        data:{page:page},
        success:function(data){

            $("#page-announce").html(data);
            
        }
    });
}
function loadNormalAnnouncement(page){
    $.ajax({
        url:"announcement_normal.php",
        method:"POST",
        data:{page:page},
        success:function(data){

            $("#page-announce").html(data);
            
        }
    });
}
function loadUrgentAnnouncement(page){
    $.ajax({
        url:"announcement_urgent.php",
        method:"POST",
        data:{page:page},
        success:function(data){

            $("#page-announce").html(data);
            
        }
    });
}

$(document).on('click', '.pagination_link', function(){  
    var page = $(this).attr("id");
    if($('.ann-filter').data("target")=="all"){  
    loadPageAnnouncement(page);  
    }
});
$(document).on('click', '.pagination_link_low', function(){  
    var page = $(this).attr("id");
    loadLowAnnouncement(page);  
});
$(document).on('click', '.pagination_link_normal', function(){  
    var page = $(this).attr("id");
    loadNormalAnnouncement(page);  

});
$(document).on('click', '.pagination_link_urgent', function(){  
    var page = $(this).attr("id");
    loadUrgentAnnouncement(page);  
});

        $("#dashboard-fluid").load("dashboard.php");
        loadPageAnnouncement();
    $("#sidebar").css("width","24vw");
    $(".btn-caption").show();
    $("#dash-menu").on("click",function(){
        if(load){
        $(".btn-caption").fadeOut(50);
        $("#sidebar").animate({width:"4.5vw"},100,function(){
           
        });
        $("#dashboard-fluid").animate({
            position: "relative",
             left:"5vw",
             width:"95%"
         },100);
        load=false;
        }
        else{
            $("#sidebar").animate({width:"24vw"},100, function(){
                $(".btn-caption").fadeIn(200);
                
            });
            $("#dashboard-fluid").animate({
                position: "relative",
                 left:"25vw",
                 width:"75%"
             },100);
            
            load=true;
        }
});
    $(".inbox-group").on('click',function(){
       target=$(this).data("target");
       if(target=="manage_account"){
        setTimeout(function(){
        LoadManageAccount();
    }
            ,1000);
       }
       if(target=="manage_departments"){
            LoadManageDepartment();
    }
    if(target=="dashboard"){
        setTimeout(function(){
            LoadDashboard();
            
            }
            ,1000);
    }
    if(target=="announcements"){
        setTimeout(function(){
            LoadAnnouncements();}
            ,1000);
    }

    if(target=="event"){
        setTimeout(function(){
            LoadEvent();}
            ,1000);
    }
    if(target=="activity_log"){
        setTimeout(function(){
            $.ajax({
                url:"activity_log.php",
                success:function(data){
                    $("#dashboard-fluid").html(data);
                }
            });
        }
            ,1000);
    }
    });
    $('#birthday').datepicker();
    LoadDashboard();
    $(document).on("click",".edit-trigger",function(){
       id=$(this).attr("id");
       $.ajax({
           url:"modals/edit_account.php",
           type:"POST",
           data:{id:id},
           success:function(data){
               $("#load_employee_info").html(data);
               $(document).on("click","#update_account",function(){
                var fullname=$("#fullname_edit").val();
                var username= $("#username_edit").val();
                var password= $("#password_edit").val();
                var password_validation=$("#pass2_edit").val();
                var gender=  $("#gender_edit").val();
                var birthday=$("#birthday_edit").val();
                var department= $("#department_edit").val();
                var address= $("#address_edit").val();
             
                  if(password!=password_validation){
                      $("#alert-error-update").removeAttr("hidden");
                      $("#alert-error-update").html("<p>Password does not match</p>");
                      password='';
                      password_validation='';
                  }
                else{
                  if(fullname==='' || username===''){
                      $("#alert-error-update").removeAttr("hidden");
                      $("#alert-error-update").html("<p>Please complete all the fields</p>");
                  }
                  else if(password==='' || password_validation===''){
                    $("#alert-error-update").removeAttr("hidden");
                    $("#alert-error-update").html("<p>Please complete all the fields</p>");
                }
                else if(gender==='' || birthday===''){
                    $("#alert-error-update").removeAttr("hidden");
                    $("#alert-error-update").html("<p>Please complete all the fields</p>");
                }
                else if(address==='' || department===''){
                    $("#alert-error-update").removeAttr("hidden");
                    $("#alert-error-update").html("<p>Please complete all the fields</p>");
                }
                  else{
                      $("#alert-error-update").attr("hidden","hidden");
                      $.ajax({
                          url:"edit_account.php",
                          type:"POST",
                          data:{fullname:fullname,
                                username:username,
                                password:password,
                                gender:gender,
                                birthday:birthday,
                                department:department,
                                address:address,
                                id:id
                          },
                          success:function(data){
                            $("#user-edit").modal("hide");
                            $("#table-for-data").html(data);
                           $("#alert_success").show();
                           setTimeout(function(){
                            LoadManageAccount();}
                            ,1000);
                             
                          }
                      });
                      } // input value empty
                } //password validation
        
              });        
              
           }
       });
    });
    $(document).on("click",".remove-trigger",function(){
        id=$(this).attr("id");
        $.ajax({
            url:"modals/remove_account_modal.php",
            type:"POST",
            data:{id:id},
            success:function(data){
                $("#user-delete").modal("show");
                $(document).on("click","#remove_account",function(){
                    var rem_id=id;
                    $.ajax({
                        url:"remove_account.php",
                        type:"POST",
                        data:{id:rem_id},
                        success:function(data){
                            $("#table-for-data").html(data);
                            setTimeout(function(){
                                LoadManageAccount();}
                                ,1000);
                        }//success2
                });//ajax2
             });//yes button
          }//success1
        }); //ajax1
    });
        
     $(document).on("click","#save_account",function(){
      var firstname=$("#first_create").val();
      var lastname=$("#last_create").val();
      var gender=  $("#gender_create").val();
      var birthday=$("#birthday_create").val();
      var department= $("#department_create").val();
      var address= $("#address_create").val();
      var sec_quest= $("#sec_quest_create").val();
      var sec_ans= $("#sec_ans_create").val();

        if($("input").val()==='' || $("select").val()===''){
            $("#alert-error").removeAttr("hidden");
            $("#alert-error").html("<p>Please complete all the fields</p>");
        }
        else{
            $("#alert-error").attr("hidden","hidden");
            $.ajax({
                url:"create_account.php",
                type:"POST",
                data:{firstname:firstname,
                      lastname:lastname,
                      gender:gender,
                      birthday:birthday,
                      department:department,
                      address:address,
                      sec_quest:sec_quest,
                      sec_ans:sec_ans,
                },
                success:function(data){
                    $("#user-create").modal("hide");
                     $("#table-for-data").html(data);
                    $("#alert_success").show();
                    setTimeout(function(){
            LoadManageAccount();}
            ,1000);
                }
            });
            } // input value empty
    });
    
    $(document).on("click","#save_announcement",function(){
        var title_create=$("#title_create").val();
        var announcement_create=$("#announcenent_create").val();
        var pinned_post=$("#announcement_priority").val();
        $.ajax({
            url:"create_announcement.php",
            type:"POST",
            data:{
                title_create:title_create,
                announcement_create:announcement_create,
                pinned_post:pinned_post
            },
            success:function(data){
                $("#user-announcement").modal("hide");
               $("#dashboard-fluid").html(data);
               setTimeout(function(){
                    LoadAnnouncements();
               },
               3000)
            }
        });   
    });
    $(document).on("click",".view-ann",function(){
        var id=$(this).attr("id");
        $.ajax({
                url:"modals/view_announcement.php",
                type:"POST",
                data:{id:id},
                success:function(data){
                    $("#view-announcement").modal("show");
                    $("#view_post").html(data);
                }
        });
    });
    $(document).on("click",".remove-ann",function(){
        id=$(this).attr("id");
        $(document).on("click","#remove_post",function(){
            $.ajax({
                url:"remove_announcement.php",
                type:"POST",
                data:{id:id},
                success:function(data){
                    $("#ann_remove").modal("hide");
                    $("#dashboard-fluid").html(data);
                    setTimeout(function(){
                         LoadAnnouncements();
                    },
                    3000)
                }
        });
          
        });
    });

    $(document).on("click","#add_event",function(){
        var event_start=$("#event_start").val(),
            event_end=$("#event_end").val(),
            event_name=$("#event_name").val(),
            time_start=$("#time_start").val(),
            time_end=$("#time_end").val();
            $.ajax({
                url:"add_events.php",
                type:"POST",
                data:{event_name:event_name,
                      event_start:event_start,
                      event_end:event_end,
                      time_start:time_start,
                      time_end:time_end  
                },
                success:function(data){
                    $("#dashboard-fluid").html(data);
                    setTimeout(function(){
                         LoadEvent();
                    },
                    3000)
                }
        });
    });
    $(document).on('click',".ann-filter",function(){
        var load =$(this).data("target");
        if(load=="all"){
            loadPageAnnouncement();
        }
        if(load=="low"){
            loadLowAnnouncement();
        }
        if(load=="normal"){
            loadNormalAnnouncement();
        }
        if(load=="urgent"){
            loadUrgentAnnouncement();
        }
    });
    // setInterval(function(){
    //     urgent_interval();
    // },1000);
    
    $(document).on("click",".link",function(){
        var id=$(this).attr("id");
        $.ajax({
            url:"modals/view_announcement.php",
            type:"POST",
            data:{id:id},
            success:function(data){
                $("#view-announcement").modal("show");
                $("#view_post").html(data);
            }
    });
    });
});//document.ready
