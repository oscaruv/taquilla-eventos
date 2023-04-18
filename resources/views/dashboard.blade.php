<!DOCTYPE html>
<html>

	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	</head>

	<body>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn" class="btn btn-primary">Add employer</button>
    <a href="{{ route('logout.view') }}" class="btn btn-primary" style="float: right">Logout</a>

    <!-- The Modal Agregar-->
    <div id="myModal" class="modal">

      <!-- Modal content/ Agregar -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Administrator manager</h2>

        <div class="form-group">
          <label>Add EmployeeID</label>
          <input type="text" class="addidgue form-control" id="" placeholder="Employee ID">
        </div>

        <div class="form-group">
          <label>Add First name</label>
          <input type="text" class="first form-control" id="" placeholder="First name">
        </div>

        <div class="form-group">
          <label>Add Second name</label>
          <input type="text" class="second form-control" id="" placeholder="Second name">
        </div>

        <div class="form-group">
          <label>Add Last name</label>
          <input type="text" class="last form-control" id="" placeholder="Last name">
        </div>

        <div class="form-group">
          <label>Add Cellphone</label>
          <input type="text" class="cellphone form-control" id="" placeholder="Cellphone">
        </div>

        <div class="form-group">
          <label>Add Type</label>
          {{-- <input type="text" class="type form-control" id="" placeholder="Type"> --}}
          <select class="type form-select" aria-label="Disabled select example">
            <option selected>Open this select menu</option>
            <option value="1">Early</option>
            <option value="2">Any</option>
            <option value="3">Free</option>
          </select>
        </div>

        <div class="form-group">
          <a class="btn btn-primary addGuest" style="float: right; margin: 2px" href="#" role="button">Submit</a>
          <a class="btn btn-primary" style="float: left; margin: 2px" type="submit">Cancel</a>
        </div>
      </div>

    </div>

    <!-- Filtros-->

    <div class="filters">
      <div class="row">
        <div class="col-2">
          <label for="">ID Guest</label>
          <input type="text" class=" form-control" id="searchIdentification" placeholder="Employee ID">
        </div>

        <div class="col-2">
          <label for="">First name</label>
          <input type="text" class=" form-control" id="searchFirstname" placeholder="First name">
        </div>

        <div class="col-2">
          <label for="">Second name</label>
          <input type="text" class=" form-control" id="searchSecondname" placeholder="Second name">
        </div>

        <div class="col-2">
          <label for="">Last name</label>
          <input type="text" class=" form-control" id="searchLastname" placeholder="Last name">
        </div>

        <div class="col-2">
          <label for="">CellPhone</label>
          <input type="text" class=" form-control" id="searchCellphone" placeholder="Cellphone">
        </div>

        <div class="col-2">
          <label for="">Type</label>
          <!-- {{-- <input type="text" class="addem form-control" id="searchEmployerId" placeholder="Employee ID"> --}} -->
          <select class="form-select" aria-label="Disabled select example" id="searchType">
            <option value='' selected>Open this select menu</option>
            <option value="1">Early</option>
            <option value="2">Any</option>
            <option value="3">Free</option>
          </select>
        </div>
      </div>
    </div>

		<div class="container">
			<table>
				<thead>
					<tr>
						<th>Cédula de ciudadania</th>
						<th>Primer nombre</th>
						<th>Segundo nombre</th>
						<th>Apellido</th>
						<th>Teléfono</th>
						<th>Tipo entrada</th>
						<th>Ingreso</th>
						<th>Actions</th>

					</tr>
				</thead>
				<tbody class="tableGuest"></tbody>
			</table>
		</div>

		<script>
        $(document).ready(function(){
          findGuest();
          function findGuest()
          {
            var parameters = {
              'identification': $('#searchIdentification').val(),
              'firstname': $('#searchFirstname').val(),
              'secondname': $('#searchSecondname').val(),
              'lastname': $('#searchLastname').val(),
              'cellphone': $('#searchCellphone').val(),
              'type': $('#searchType').val(),
            }
              
              $.ajax({
                  type: "GET",
                  url: "{{route('guest.find')}}",
                  data: parameters,
                  dataType: "json",
                  success: function(response){
                      $('.tableGuest').html("");
                      if(response.status == 404){
                          $('.tableGuest').append('<tr>\
                                  <td colspan="2">There are no employer users</td>\
                                  </tr>'
                              );
                      }else{
                          $.each(response.guests, function(key, item){
                              $('.tableGuest').append('<tr>\
                                  <td>'+item.identification+'</td>\
                                  <td>'+item.firstname+'</td>\
                                  <td>'+item.secondname+'</td>\
                                  <td>'+item.lastname+'</td>\
                                  <td>'+item.cellphone+'</td>\
                                  <td>'+item.type+'</td>\
                                  <td>'+item.totalAccess+'</td>\
                                  <td><button type="button" value="'+item.identification+'" class="edit btn btn-primary">Edit</button> <button type="button" value="'+item.identification+'" class="delete btn btn-danger" id="deleteButton">Delete</button> <button type="button" value="'+item.identification+'" class="access btn btn-success" id="accessButton">Access</button> <button type="button" value="'+item.identification+'" class="recordButton btn btn-info">Record</button></td>\
                                  </tr>'
                              );
  
                          });
                          
                      }
                  }
  
              });
          }



        
        $(document).on('click', '.addGuest',function(e){
  
        e.preventDefault();

        var parameters = {
            'identification': $('addidgue').val(),
            'firstname': $('.first').val(),
            'secondname': $('.second').val(),
            'lastname': $('.last').val(),
            'cellphone': $('.cellphone').val(),
            'type': $('.type').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('guest.store') }}",
            data: parameters,
            dataType: "json",
            success: function (response) {
                if(response.status == 400){
                    var message = '';
                    $.each(response.errors,function(key,value){
                    message += value + '\n';
                    });
                    alert(message);
                }
                else{
                    $('#success').html("");
                    $('#success').addClass('alert alert-success');
                    $('#success').text(response.message);
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                    $('#myModal').find('input').val("");
                    findGuest();
                }
            }
        });
        })










		});
		</script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
		<script src="js\scripts.js"></script>
		<script src="js\jquery-3.6.1.min.js"></script>
	</body>
</html>
