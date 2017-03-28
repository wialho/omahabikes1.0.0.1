/*
 Wilson Holland
 script.js
 ILC5
 info2340ww
 Rosas
 8/14/16
*/

$(document).ready(function(){
	$('#holder').hide();
	$('#get-employees').fadeIn();
	$('#get-employees').click(function(){
		$(this).fadeOut();
		$('#loader').fadeIn(function(){
			 $.ajax({
				url:"https://www.mccinfo.net/epsample/employees"
			 }).done(onAjaxComplete)
		});

	});

	function onAjaxComplete(data){
		var employees = $.parseJSON(data);
		var s= "";
		for (var i = 0; i < employees.length; i++) {
					s += "<h3>" + employees[i].first_name + " " + employees[i].last_name +"</h3>";
					s += "<div id='" + employees[i].id + "'>";
					s += "<p>First Name: "+ employees[i].first_name + "</p>";
					s += "<p>Last Name: "+ employees[i].last_name + "</p>";
					s += "<p>Image:</p>";
					s += "<img src='" + employees[i].image_filename + "' alt='Image' />";
					s += "<br><br><button id='" +employees[i].id + "'" + " class='get-info'>Get Info</button>";
					s += "</div>";

					/*if(i != employees.length -1){

						s += "<hr/>"
					}*/
					$('#holder').html(s);
					$('#loader').fadeOut(function(){
						$('#holder').accordion({
							heightStyle: "content"

						});
						$('#holder').fadeIn();	

					});

					$('.get-info').click(function(evt){
						evt.stopImmediatePropagation();
						$.ajax({
						url: "https://www.mccinfo.net/epsample/employees/" + this.id
			 			}).done(showEmployeeInfo)

					});
				};		

	}

	function showEmployeeInfo(data){
		var employee = $.parseJSON(data); 
		var name = employee.first_name + " " + employee.last_name;
		$('#dialog').attr('title', name);
		var s= "";
			s += "<p>Image: </p>"
			s += "<img src='" + employee.image_filename + "' alt='Image'/>";
			s += "<p>Hire Date: " + employee.hire_date + " </p>"
			s += "<p>Salary: " + accounting.formatMoney(employee.annual_salary) + "</p>"
			s += "<p>Department: " + employee.department.name + " </p>";

		$('#dialog').html(s);
		$('#dialog').dialog();
	}

});