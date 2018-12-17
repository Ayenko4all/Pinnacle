function validate() {


	var full_name = document.proForm.full_name.value;
	var email = document.proForm.email.value;
	var your_location = document.proForm.your_location.value;
	var phone_number = document.proForm.phone_number.value;
	var gender = document.proForm.gender.value;
	
	if (full_name == null || full_name == "") {

			error.innerHTML = "Please provide your name";
			return false;
		}

	if (email == null || email == "") {

		error.innerHTML = "Plesae provide your email";
		return false;
	}

	if (your_location == null || your_location == "") {

			error.innerHTML = " Plesae provide your locantion";
			return false;
		}

	if (phone_number == null || phone_number == "") {

		error.innerHTML = "Plesae provide your phone number";
		return false;
	}else{
		return true;
	}

	if (gender == null || gender == "") {

		error.innerHTML = "Plesae provide your gender";
		return false;
	}

	if (isNaN(phone_number)) {

		document.getElementById("phoneloc")
		error.innerHTML = "Phone number must be Numeric value only";
		return false;
	}else{
		return true;
	}



}


$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    });

    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});

// ajaax filter search

$(document).ready(function(){

	filter_data();


	function filter_data()
	{
		$('.filter_data').html('<div id="loading" style=""></div>');
		var action = 'fetch_data';
		var minimum_price = $('#hidden_minimum_price').val();
		var maximum_price = $('#hidden_maximum_price').val();
		var title = get_filter('title');
		var type = get_filter('type');
		var state = get_filter('state');
		var cities = get_filter('cities');
		$.ajax({
			url: "fetch_data.php",
			method:"POST",
			data:{action:action, 
				  minimum_price:minimum_price, 
				  maximum_price:maximum_price, 
				  title:title,
				  type:type, 
				  state:state, 
				  cities:cities},
			success:function(data)
			{
				$('.filter_data').html(data);
			}

		});
	}

	function get_filter(class_name)
	{
		var filter = [];
		$('.'+class_name+':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	$('.common_selector').click(function(){
		filter_data();
	});


	$(function(){
		$('#slider').slider({

			range:true,
			min:150000,
			max:1000000000,
			value:[150000, 1000000000],
			step:1000,
			stop:function(event, ui)
			{
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_data();
			}

		});
	});

});



 function state_change() 
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","ajax.php?state="+document.getElementById("statedd").value,false);
    xmlhttp.send(null);
    // alert(innerHTML=xmlhttp.responseText);
    document.getElementById("location").innerHTML=xmlhttp.responseText;
  }