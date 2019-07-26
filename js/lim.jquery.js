$(document).ready(function(){
	var chatname1,code,txt,loadcontent="active",groupchat_trigger,chat_trigger,groupname_edit,interval;
	var audio=new Audio("../sound/apple_pay.mp3");
	function loadData(){
		$.ajax({
			url:'chatlog.php',
			type:'POST',
			data:{chatname:chatname1},
			success:function(data){
				$('.chatlogs').html(data);
				
			// $('.chatlogs').animate({
			// 	"scrollTop":9999999999999999999999999
			// },500);
		}
	  });
					$.ajax({
						url:'groupchatlog.php',
						type:'POST',
						data:{chatname:chatname1},
						success:function(data){
							$('.groupchatlogs').html(data);
						// $('.groupchatlogs').animate({
						// 	"scrollTop":9999999999999999999999999
						// },500);
					}
				  }); 
	}
	function load_sound_notif(){
		$.ajax({
			url:'chatlogsounds.php',
			type:'POST',
			data:{chatname:chatname1},
			success:function(data){
				$('.chatlogs').html(data);
				
			// $('.chatlogs').animate({
			// 	"scrollTop":9999999999999999999999999
			// },500);
		}
	  });
					$.ajax({
						url:'groupchatlogsounds.php',
						type:'POST',
						data:{chatname:chatname1},
						success:function(data){
							$('.groupchatlogs').html(data);
						// $('.groupchatlogs').animate({
						// 	"scrollTop":9999999999999999999999999
						// },500);
					}
				  }); 
	}
	function display_home(){
		$.ajax({
			url:'display_home.php',
			success:function(data){
				$("#chatbox-fluid").html(data);
				loadPageAnnouncement();
			}
		});
	}
	function urgent_interval(){
		$.ajax({
			url:'urgent_interval.php'
		});
	}
	function emoji_click(){
		
		 var emojiTrigger=$('.emoji');
			emojiTrigger.on('click',function(){
				code=$(this).data('target');
				$("#content").focus();
				txt=$.trim(code);
				$("#content").val($("#content").val()+txt+" ");
				$('#send').removeAttr('disabled');
				$("#group_content").focus();
				$("#group_content").val($("#group_content").val()+txt+" ");
			});
	}
	function loadActive(loadcontent){
		$('#tab-container').removeAttr("hidden");
			$.ajax({
				url:'action.php',
				type:"POST",
				data:{loadcontent:loadcontent},
				success:function(data){
					$('#tab-container').html(data);
					$(document).on("keyup","#search_all",function(){
						var search=$(this).val();
						$.ajax({
							url:"search_contact.php",
							method:"POST",
							data:{search:search},
							success:function(data){
								clearInterval(interval);
								$('#tab-container').html(data);
							}
					});
				});
						
				}
			});
	}
			 
	function loadGroup(loadcontent){
		//$('#group-container').removeAttr("hidden");
		$.ajax({
			url:'action.php',
			type:"POST",
			data:{loadcontent:loadcontent},
			success:function(data){
				$('#tab-container').html(data);
				var groupchat_trigger=$('.inbox-group');
				groupchat_trigger.off('click').on('click' ,function(){
					var chatbox=$('#chatbox-fluid');
					var chatname=$(this).data("target");
					chatname1=chatname;
					$.ajax({
						url:'group_chat.php',
						type:'POST',
						data:{username:chatname},
						success:function(data){
							chatbox.html(data);
							$.ajax({
								url:'groupchatlog.php',
								type:'POST',
								data:{chatname:chatname1},
								success:function(data){
									$('.groupchatlogs').html(data);
								$('.groupchatlogs').animate({
									"scrollTop":9999999999999999999999999
								},500);
								setInterval(function(){
									load_sound_notif();
								},1000);
							}
						  }); 
					}
				  });
					
				});
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
	loadPageAnnouncement();
	display_home();
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

	$(document).on("click","#edit-account",function(){
		$.ajax({
			url:"edit_account.php",
			method:"POST",
			success:function(data){

				$("#chatbox-fluid").html(data);
				
			}
		});
	});
	$(document).on("click","#change-pass",function(){
		$.ajax({
			url:"change_password.php",
			method:"POST",
			success:function(data){

				$("#chatbox-fluid").html(data);
				
			}
		});
	});
	$(document).on("change","#img-edit",function(){
		var user_image=document.getElementById("img-edit").files;
		if(user_image){
			var reader= new FileReader();
			reader.onload=(e)=>{
				$("#img-user").attr('src',e.target.result);
			}
			reader.readAsDataURL(user_image[0]);

		}
	});


	$(document).on("click","#update_user",function(){
		var image=$("#img-edit").prop("files")[0];
		var image_name=$("#img-edit").val().replace(/C:\\fakepath\\/i, '');
		var fullname=$("#first_edit").val();
		var lastname=$("#last_edit").val();
		var username= $("#username_edit").val();
		var gender=  $("#gender_edit").val();
		var birthday=$("#birthday_edit").val();
		var department= $("#department_edit").val();
		var address= $("#address_edit").val();
		var form_data=new FormData();
		form_data.append('files',image);
		  if(fullname==='' || username===''){
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
				  url:"update_user.php",
				  type:"POST",
				  data:{file_name:image_name,
						fullname:fullname,
						lastname:lastname,
						username:username,
						gender:gender,
						birthday:birthday,
						department:department,
						address:address,
				  },
				  success:function(data){
				
						$.ajax({
							url: 'user_upload.php', // point to server-side controller method
							dataType: 'text', // what to expect back from the server
							cache: false,
							contentType: false,
							processData: false,
							data: form_data,
							type: 'post',
							success: function (response) {
							 console.log(response); // display success response from the server
							},
							error: function (response) {
							 console.log(response); // display error response from the server
							}
						});
						$("#chatbox-fluid").html(data);
						setTimeout(function(){
							$.ajax({
								url:'display_home.php',
								success:function(data){
									$("#chatbox-fluid").html(data);
									loadPageAnnouncement();
								}
							});
						},3000);
				  }
			  });
			
			
			  } // input value empty
	}); 

	$(document).on("click","#update_password",function(){
			var old_pass=$("#current_password").val();
			var pass_validation=$("#password_valid").val();
			var new_pass=$("#password_edit").val();
			var new_pass2=$("#pass2_edit").val();
			if(old_pass==='' || new_pass==='' || new_pass2===''){
				$("#alert-error-update").removeAttr("hidden");
				$("#alert-error-update").html("<p>Please Complete all the fields</p>");
				setTimeout(function(){
					$("#alert-error-update").attr("hidden","hidden");
				  },2000);
			} else{
			$.ajax({
				url:"enc.php",
				method:"POST",
				data:{old_pass:old_pass},
				success:function(data){
					if(data!=pass_validation){
						$("#alert-error-update").removeAttr("hidden");
						$("#alert-error-update").html("<p>Current Password Does'nt Match</p>");
						setTimeout(function(){
							$("#alert-error-update").attr("hidden","hidden");
						  },2000);
					}
					  else{
						  	if(new_pass!==new_pass2){
								$("#alert-error-update").removeAttr("hidden");
								$("#alert-error-update").html("<p>New Password Does'nt Match</p>");
								setTimeout(function(){
									$("#alert-error-update").attr("hidden","hidden");
								  },2000);
							  }else{
						  $("#alert-error-update").attr("hidden","hidden");
						  $.ajax({
							  url:"update_pass.php",
							  type:"POST",
							  data:{password:new_pass},
							  success:function(data){
							
									$("#chatbox-fluid").html(data);
									setTimeout(function(){
										$.ajax({
											url:'display_home.php',
											success:function(data){
												$("#chatbox-fluid").html(data);
												loadPageAnnouncement();
											}
										});
									},3000);
							  }
						  });//ajax for updating password
						}//else for  new password is match
					  }
				}
		 
			}); //ajax for encryption
		} // if not empty fields
	});
	  
	  
	//This is for the chat-buttons
	var tab=$("a.chat-tab");
		tab.off('click').on('click',function(){
		 var $this=$(this),target=$this.data('target');
		loadcontent=target;
			chat_trigger=$(".inbox");
			
			if(loadcontent=="active"){
			interval=	setInterval(()=>{
					loadActive(loadcontent);
				},1000);
				
				//clearInterval(loadActive());
			}
			else if(loadcontent=="groupchat"){
				interval=setInterval(()=>{
					loadGroup(loadcontent);
				},1000);
				$(document).on("keyup","#search_all",function(){
					var search=$(this).val();
					$.ajax({
						url:"search_groupchat.php",
						method:"POST",
						data:{search:search},
						success:function(data){
							//clearInterval(interval);
							$('#tab-container').html(data);
						}
				});
			});
				//clearInterval(loadGroup());
			}
		});
		$(document).on('click','.inbox' ,function(){
						var chatbox=$('#chatbox-fluid');
						var chatname=$(this).data("target");
						chatname1=chatname;
						$.ajax({
							url:'chat.php',
							type:'POST',
							data:{username:chatname},
							success:function(data){
								chatbox.html(data);
								$.ajax({
									url:'chatlog.php',
									type:'POST',
									data:{chatname:chatname1},
									success:function(data){
										$('.chatlogs').html(data);	
									$('.chatlogs').animate({
										"scrollTop":9999999999999999999999999
									},500);
									setInterval(function(){
										load_sound_notif();
									},1000);
									interval=setInterval(function(){
										setTimeout(function(){
											loadActive(loadcontent);
											//audio.play();
										},1000);
									},3000);
								}
							  });
						}
					  });
								});
$('#tab-container').removeAttr("hidden");
loadActive(loadcontent);

function send_msg(){
	content=$("#content").val();
	if(content!=''){
	$.ajax({
		url:"insert_message.php",
		type:"post",
		data:{content:content
		, reciever:chatname1},
		success: function(data){
			console.log(data);
			$("#content").val('');
			$('.chatlogs').html(data);
			load_sound_notif();
			$('.chatlogs').animate({
				"scrollTop":9999999999999999999999999
			},500);
			interval=setInterval(function(){
				setTimeout(function(){
					loadActive(loadcontent);
					//audio.play();
				},1000);
			},3000);
			}
		 });
	  }
	  else if(content=='' && $("#load-files").children.length>0){
		for(var a=0;a<file_name.length;a++){
			$.ajax({
				url:'insert_message.php',
				type:'post',
				data:{content:file_name[a],
				reciever:chatname1},
				success:function(data){
					load_sound_notif();
					$("#load-files").attr('hidden',true);
					$("#get-files").val("");
					$('.chatlogs').animate({
						"scrollTop":9999999999999999999999999
					},500);
					
					interval=setInterval(function(){
						setTimeout(function(){
							loadActive(loadcontent);
						
							//audio.play();
						},1000);
					},3000);
				}
			});
		}
		
	  }
	  else if(content!='' && $("#load-files").children.length>0){
		for(var a=0;a<file_name.length;a++){
			$.ajax({
				url:'insert_message.php',
				type:'post',
				data:{content:file_name[a],
				reciever:chatname1},
				success:function(data){
					load_sound_notif();
					$("#load-files").attr('hidden',true);
					$("#get-files").val("");
					$('.chatlogs').animate({
						"scrollTop":9999999999999999999999999
					},500);
					interval=setInterval(function(){
						setTimeout(function(){
							loadActive(loadcontent);
							
							//audio.play();
						},1000);
					},3000);
				}
			});
		}
	  }
	else{

	}
	$("#emojicont").prop("hidden",true);
}
 /* this function is for the sending message */

 $(document).on('click',"#send",function(){
	if($("#content").val()!='' && $("#load-files").children.length>0){
				
		for(var a=0;a<file_name.length;a++){
			$.ajax({
				url:'insert_message.php',
				type:'post',
				data:{content:file_name[a],
				reciever:chatname1},
				success:function(data){
					load_sound_notif();
					$("#load-files").attr('hidden',true);
				}
			});
		}
		send_msg();
		
		file_name=[];
	  }
else{
	send_msg();
	}
	});	
	
	$(document).on("keyup","#content",function(e){
		if($('#content:empty').val()){
			$('#send').removeAttr('disabled');
		}
		else{
			$('#send').attr("disabled","disabled");		
		}
		
	});
	$(document).on("keydown","#content",function(e){
		if(e.which===13){
			if($(this).val()!='' && $("#load-files").children.length>0){
				
				for(var a=0;a<file_name.length;a++){
					$.ajax({
						url:'insert_message.php',
						type:'post',
						data:{content:file_name[a],
						reciever:chatname1},
						success:function(data){
							load_sound_notif();
							$("#load-files").attr('hidden',true);
							
							clearInterval(interval);
						}
					});
				}
				send_msg();
				file_name=[];
			  }
		else{
			send_msg();
			}
			return false;
		}
	});
	/* Loading Data */
	
		//clearInterval(interval);
		
	chat_trigger=$(".inbox .inbox-user strong");
	chat_trigger.on('click' ,function(){
		var chatbox=$('#chatbox-fluid');
		chatbox.load('chat.php');
	});
	
	var file_name=[];
	$(document).on('change','#get-files',function(e){
		$("#load-files").removeAttr('hidden');
		$('#send').removeAttr("disabled");
		var file=document.getElementById("get-files");
		var load_file=document.getElementById("load-files");
		// var filename,fileextn;
		var data=new FormData();
		var fileslength=document.getElementById('get-files').files.length;
		var file=document.getElementById('get-files').files;
		for(var i=0;i<fileslength;i++){
			data.append("files[]",file[i]);
		}
		$.ajax({
			url: 'upload.php', // point to server-side PHP script 
			dataType: 'text', // what to expect back from the PHP script
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			type: 'post',
			success: function (response) {
				//console.log(response); // display success response from the PHP script
		for(var i=0;i<fileslength;i++){
			// load_file.innerHTML+='<div class="col-sm-3"><p class="file-name">'
			// +file[i].name+'</p>'+
			// '</div>';
			file_name.push(file[i].name);
			$('#content').focus();
		}
		load_file.innerHTML='<div class="row">';
		for(var i=0;i<file_name.length;i++){
			filename=file_name[i];
			fileextn=filename.replace(/^.*\./, '');
			switch(fileextn){
				case 'jpg':
				case 'png':
				case 'jpeg':
				case 'gif':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><img src="../uploads/'+file_name[i]+'" class="minified-img"></div>';
				break;
				case 'doc':
				case 'docx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-word file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				case 'ppt':
				case 'pptx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-powerpoint file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				case 'xls':
				case 'xlsx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-excel file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				default:
				case 'doc':
				case 'docx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
			}
		}
		load_file.innerHTML+='</div>';
			},
			error: function (response) {
				//console.log(response); // display error response from the PHP script
			}
		});
		
	});
	$(document).on("click",".del-file",function(){
		var load_file=document.getElementById("load-files");
		file_name.splice(file_name.indexOf($(this).data("target")),1);
		load_file.innerHTML='<div class="row">';
		for(var i=0;i<file_name.length;i++){
			filename=file_name[i];
			fileextn=filename.replace(/^.*\./, '');
			switch(fileextn){
				case 'jpg':
				case 'png':
				case 'jpeg':
				case 'gif':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><img src="../uploads/'+file_name[i]+'" class="minified-img"></div>';
				break;
				case 'doc':
				case 'docx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-word file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				case 'ppt':
				case 'pptx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-powerpoint file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				case 'xls':
				case 'xlsx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file-excel file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
				default:
				case 'doc':
				case 'docx':
				load_file.innerHTML+='<div class="col-sm-3"><a href="#" class="del-file" data-target="'+file_name[i]+'"><i class="fas fa-times pull-right"></i></a><p class="file-name"><i class="fas fa-file file-icon"></i>'
			+file_name[i]+'</p>'+
			'</div>';
				break;
			}
		}
		load_file.innerHTML+='</div>';
	});
	/* Emoji Area */
	$(document).on("click","#emoji-btn",function(){
		if($("#emojicont").attr('hidden')){
			$("#emojicont").removeAttr("hidden");
		$("#emojicont").load('emoticons.php',function(){
		emoji_click();
		});
	}
	else{
		$("#emojicont").attr("hidden","hidden");
	 }
	});

	/*GroupChat*/

	function group_send_msg(){
		content=$("#group_content").val();
		if(content!=''){
		$.ajax({
			url:"insert_group_message.php",
			type:"post",
			data:{content:content
			, reciever:chatname1},
			success: function(data){
				$("#group_content").val('');
				load_sound_notif();
				$('.groupchatlogs').animate({
							"scrollTop":9999999999999999999999999
						},500);
				}
			 });
		  }
		  else if(content=='' && $("#load-files").children.length>0){
			for(var a=0;a<file_name.length;a++){
				$.ajax({
					url:'insert_group_message.php',
					type:'post',
					data:{content:file_name[a],
					reciever:chatname1},
					success:function(data){
						load_sound_notif();
						$('.groupchatlogs').animate({
							"scrollTop":9999999999999999999999999
						},500);
						$("#load-files").attr('hidden',true);
					}
				});
			}
			file_name=[];
		  }
		  else if(content!='' && $("#load-files").children.length>0){
			for(var a=0;a<file_name.length;a++){
				$.ajax({
					url:'insert_group_message.php',
					type:'post',
					data:{content:file_name[a],
					reciever:chatname1},
					success:function(data){
						load_sound_notif();
						$('.groupchatlogs').animate({
							"scrollTop":9999999999999999999999999
						},500);
						$("#load-files").attr('hidden',true);
					}
				});
			}
			file_name=[];
		  }
		else{
	
		}
	}
	 /* this function is for the sending message */
	
	 $(document).on('click',"#groupchat_send",function(){
		if($(this).val()!='' && $("#load-files").children.length>0){
					
			for(var a=0;a<file_name.length;a++){
				$.ajax({
					url:'insert_group_message.php',
					type:'post',
					data:{content:file_name[a],
					reciever:chatname1},
					success:function(data){
						load_sound_notif();
						$("#load-files").attr('hidden',true);
					}
				});
			}
			file_name=[];
			group_send_msg();
		  }
	else{
		group_send_msg();
		}
		return false;
	});
		
		$(document).on("keyup","#group_content",function(e){
			if($('#group_content').val()!=''){
				$('#groupchat_send').removeAttr('disabled');
			}
			else{
				$('#groupchat_send').attr("disabled","disabled");			
			}
			
		});
		$(document).on("keydown","#group_content",function(e){
			if(e.which===13){
				e.preventDefault();
				if($(this).val()!='' && $("#load-files").children.length>0){
					
					for(var a=0;a<file_name.length;a++){
						$.ajax({
							url:'insert_group_message.php',
							type:'post',
							data:{content:file_name[a],
							reciever:chatname1},
							success:function(data){
								load_sound_notif();
								$("#load-files").attr('hidden',true);
							}
						});
					}
					file_name=[];
					group_send_msg();
				  }
			else{
				group_send_msg();
				}
				return false;
			}
		});
	$(document).on("click","#create_gc",function(){
		$.ajax({
			url:'create_groupchat_modal.php',
			success:function(data){
				$('#chatbox-fluid').html(data);
				
			}
		});
	});
	var id,group_members=[],group_member;
	$(document).on("click","#list_users .users",function(){
		var	id=$(this).data("target");
				$('<a href="#" data-target="'+id+'" class="users"><p>'+id+'</p></a>').appendTo($("#list_add"));
			$(this).remove();
			// $('#list_users .checkbox').remove();
			  });
			  var i=0;

			  $(document).on("click","#list_add .users",function(){
				var id1=$(this).data("target");
				$('<a href="#" data-target="'+id1+'" class="users"><p>'+id1+'</p></a>').appendTo($("#search-users"));
				$(this).remove();
				  });
		$(document).on("click","#save_group",function(){
			var group_name=$("#group_create").val();
			var group_number=$('#list_add .users').length;				
				group_member=[];
				$.each($('#list_add .users'),function(){
					group_member.push($(this).data("target"));
				});
				$.ajax({
					url:"create_groupchat.php",
					type:"post",
					data:{
						group_name:group_name,
						group_member:group_member
					},
					success:function(data){
						$("#chatbox-fluid").html(data);
						setTimeout(function(){
							$.ajax({
								url:'display_home.php',
									success:function(data){
									$("#chatbox-fluid").html(data);
									loadPageAnnouncement();	
									clearInterval(load_sound_notif);	
									chatname1="";		
									}	
								  });
						},3000);
						groupchat_trigger=$('.inbox-group');
				groupchat_trigger.on('click' ,function(){
					var chatbox=$('#chatbox-fluid');
					var chatname=$(this).data("target");
					chatname1=chatname;
					$.ajax({
						url:'group_chat.php',
						type:'POST',
						data:{username:chatname},
						success:function(data){
							chatbox.html(data);
							loadData();
					}
				  });
					
				});
					}

				});
				
		});

		$(document).on("click","#update_groupname",function(){
			groupname_edit=$("#groupname_edit").val(),
			group_id=$("#group_id").val();
			$.ajax({
				url:"update_group.php",
				type:"post",
				data:{groupname_edit:groupname_edit,
					  group_id:group_id
					},
				success:function(data){
					$.ajax({
						url:'group_chat.php',
						type:'POST',
						data:{username:groupname_edit},
						success:function(data){
							chatname1=groupname_edit;
							$("#chatbox-fluid").html(data);
							
					}
				  });
				 loadData();
				}
			});
			
		});

		$(document).on("click",".close-btn",function(){
			$.ajax({
				url:'display_home.php',
						success:function(data){
							$("#chatbox-fluid").html(data);
							loadPageAnnouncement();	
							clearInterval(load_sound_notif);	
							chatname1="";		
					}	
				  });
				  
			});
		$(document).on("keyup","#search_user",function(e){
			
			var search=$(this).val();
			console.log($("#list_add").children().length);
			if($("#list_add").children().length==2){
			$.ajax({
				url:"search_user.php",
				method:"POST",
				data:{search:search},
				success:function(data){
					$("#search-users").html(data);
				}
			});
		}else{
			var filter=[];
			$.each($('#list_add .users'),function(){
				filter.push($(this).data("target"));
			});

			$.ajax({
				url:"search_user_filtered.php",
				method:"POST",
				data:{search:search,
					filtered:filter},
				success:function(data){
					$("#search-users").html(data);
				}
			});
	}
		});
		
		$(window).on('unload',function(){
			$.ajax({
				url:'logout.php',
				success:function(){
				}
			});
		});

		$(document).on("keyup","#search_group_user",function(){
			var search=$(this).val();
			var filtered=[];
			console.log($("#search_added").children().length);
			if($("#search_added").children().length==0){
			$.ajax({
				url:"search_group_add.php",
				method:"POST",
				data:{search:search,
						chatname:chatname1},
				success:function(data){
					$("#search_add").html(data);
					$("#search_add .users").on('click',function(){
						var id=$(this).data("target");
						$('<a href="#" data-target="'+id+'" class="users"><p>'+id+'</p><i class="fas fa-times remove-user"></i></a>').appendTo($("#search_added"));
						$("#search_add").empty();
					});
					$(document).on('click',"#search_added .users",function(){
						$(this).remove();
					});
				}
			});
		}
		else{
			$.each($("#search_added .users"),function(){
				
				filtered.push($(this).data("target"));
							});
					$.ajax({
					url:"search_group_filtered.php",
					method:"POST",
					data:{search:search,
							chatname:chatname1,
						filtered:filtered},
					success:function(data){
						$("#search_add").html(data);
						$("#search_add .users").on('click',function(){
							var id=$(this).data("target");
							$('<a href="#" data-target="'+id+'" class="users"><p>'+id+'</p><i class="fas fa-times remove-user"></i></a>').appendTo($("#search_added"));
							$("#search_add").empty();
						});
						$(document).on('click',"#search_added .users",function(){
							$(this).remove();
						});
					}
				});

		}
		});
			var newmembers;
		$(document).on('click','#add_user',function(){
			$.each($('#search_added .users'),function(){
				newmembers= $(this).data("target");
				$.ajax({
					url:'insert_member.php',
					method:'POST',
					data:{newmembers:newmembers},
					success:function(data){
						$("#add_members").modal("hide");
						$.ajax({
							url:'group_chat.php',
							type:'POST',
							data:{username:chatname},
							success:function(data){
								chatbox.html(data);
								$.ajax({
									url:'groupchatlog.php',
									type:'POST',
									data:{chatname:chatname1},
									success:function(data){
										$('.groupchatlogs').html(data);
									$('.groupchatlogs').animate({
										"scrollTop":9999999999999999999999999
									},500);
									setInterval(function(){
										load_sound_notif();
									},1000);
								}
							  }); 
						}
					  });
						
					}
				});
			});
		});

		/* Leave Group */
		$(document).on('click','#leave',function(){
			$.ajax({
				url:"leave_group.php",
				success:function(data){
					console.log(data);
					$("#leave_group").modal("hide");
					display_home();
				}
			})
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
		setInterval(function(){
			urgent_interval();
		},1000);
		
		$(document).on("click",".link",function(){
			var id=$(this).attr("id");
			$.ajax({
                url:"view_announcement.php",
                type:"POST",
                data:{id:id},
                success:function(data){
                    $("#view-announcement").modal("show");
                    $("#view_post").html(data);
                }
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
									$("#chatbox-fluid").html(data);
									setTimeout(function(){
											 display_home();
									},
									3000)
							}
			});
  });
	$(document).on("click","#post-event",function(){
		$.ajax({
			url:"event.php",
			success:function(data){
					$("#chatbox-fluid").html(data);
			}
		});
	});
	$(document).on("click","#post-announcement",function(){
		$.ajax({
			url:"announcement_modal.php",
			success:function(data){
				$("#chatbox-fluid").html(data)
					$("#user-announcement").modal("show");
			}
		});
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
					 $("#chatbox-fluid").html(data);
					 setTimeout(function(){
								display_home();
					 },
					 3000)
				}
		});   
});
});
