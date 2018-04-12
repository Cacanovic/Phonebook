<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}"/>
	<meta charset="utf-8">
	<title>Imenik</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Imenik</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="dodajKontakt" data-toggle="modal" data-target="#modalKontakt">Dodaj Kontakt <i class="fa fa-plus-square" aria-hidden="true"></i> </a></li>
        <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <a class="btn btn-default" id="pretrazuj" >Pretrazi</a>
      </form>
      </ul>
      
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/">Home </a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="kontakti">

	<div class="container-fluid clearfix " id="KONTAKTI">
	@foreach($contacts as $contact)
			<div class="col-md-3 kontakt" data-toggle="modal" data-target="#modalKontakt" style="border:2px solid black; border-radius: 10px;">
				<div class="col-md-4">
					 <img  src="storage/slike/{{$contact->slika}}" class="img-rounded"  width="100" height="100">
					 <input type="hidden" id="slika1" value="{{$contact->slika}}">
				</div>
				<div class="col-md-8">
					 <p id="ime1">{{$contact->ime}}</p>
					 <p id="prezime1">{{$contact->prezime}}</p>
					 <p id="telefon1">{{$contact->telefon}}</p>
					 <p id="email1">{{$contact->email}}</p>
					 <input type="hidden" id="kontaktId" value="{{$contact->id}}">
				</div>				
				
			</div>
		@endforeach
	
	</div>
		<div class="container-fluid" >
			<div class="col-md-7 col-md-offset-5">
				{{$contacts->links()}}
			</div>
		</div>
</div>
<div id="konj"></div>






<div class="modal fade" id="modalKontakt" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="title">Dodavanje Novog Kontakta</h4>
	      </div>
	      <div class="modal-body">
	        <p><input type="text" placeholder="Unesite Ime" id="ime" class="form-control" required></p>
	        <p><input type="text" placeholder="Unesite Prezime" id="prezime" class="form-control" ></p>
	        <p><input type="text" placeholder="Unesite Telefon" id="telefon" class="form-control" ></p>
	        <p><input type="text" placeholder="Unesite Email" id="email" class="form-control"></p>
	        <p id="label-slika" style="display: none;">Promjeni sliku:</p>
	        <p><input type="file" onchange="readURL(this);" placeholder="Dodaj Sliku" id="slika" name="slika" class="form-control"></p>
	         <img id="pregled" src="#" alt="your image" style="display: none;" />
	        <p><input type="hidden" id="id"></p>
	        <p><input type="hidden" id="slika2"></p>
	        <p><input type="hidden" id="token" value="{{ csrf_token() }}"></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id="sacuvaj" data-dismiss="modal" style="display: none;">Sacuvaj Promjene</button>
	        <button type="button" class="btn btn-danger" id="obrisi" data-dismiss="modal" style="display: none;">Obrisi Kontakt</button>
	        <button type="button" class="btn btn-primary" id="dodaj" data-dismiss="modal">Dodaj Kontakt</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){
		$(document).on('click','.kontakt', function(event){
			$('#title').text("Izmjeni Kontakta");
			var ime=$.trim($(this).find('#ime1').text());
			var prezime=$.trim($(this).find('#prezime1').text());
			var telefon=$.trim($(this).find('#telefon1').text());
			var email=$.trim($(this).find('#email1').text());
			//ovdje dio za preuzimmanje slike
			var id=$(this).find('#kontaktId').val();
			var slika=$(this).find('#slika1').val();
			$('#ime').val(ime);
			$('#prezime').val(prezime);
			$('#telefon').val(telefon);
			$('#email').val(email);
			$('#slika2').val(slika);
			$('#label-slika').show();
			$('#obrisi').show();
			$('#sacuvaj').show();
			$('#dodaj').hide();
			$('#id').val(id);
			$('#pregled').show();
			$('#pregled').attr('src',"storage/slike/"+slika).width(100).height(100);


		});

		$(document).on('click','#dodajKontakt',function(event){
			$('#title').text("Dodavanje Novog Kontakta");
			$('#ime').val("");
			$('#prezime').val("");
			$('#telefon').val("");
			$('#email').val("");
			$('#obrisi').hide();
			$('#sacuvaj').hide();
			$('#dodaj').show();
		});

 		 $('#modalKontakt').on('hidden.bs.modal', function () {
 		   $("#pregled").hide();
 		   $('#slika').val('');
 		   $('#label-slika').hide();
 		 });

		function readURL(input) {

		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#pregled').attr('src', e.target.result)
		            .width(100)
                    .height(100);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		};

		$("#slika").change(function(){
		    readURL(this);
		    $("#pregled").show();
		});

		$('#dodaj').click(function(event){
			var slika = $('#slika').prop('files')[0];
			var ime=$('#ime').val();
			var prezime=$('#prezime').val();
			var telefon=$('#telefon').val();
			var email=$('#email').val();
			var form_data = new FormData();
			form_data.append('slika', slika);
			form_data.append('ime', ime);
			form_data.append('prezime', prezime);
			form_data.append('telefon', telefon);
			form_data.append('email', email);
			$.ajaxSetup({
			    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
			});	
			$.ajax({
			    url: "{{url('imenik')}}", // point to server-side PHP script
			    data: form_data,
			    type: 'POST',
			    contentType: false,       // The content type used when sending data to the server.
			    cache: false,             // To unable request pages to be cached
			    processData: false,
			    success: function (data) {
			    	window.location.reload();
				},
			});
		});


			$('#obrisi').click(function(event){
				var id=$('#id').val();
				var form_data= new FormData();
				form_data.append('id',id);

				$.ajaxSetup({
			   	 headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
				});

				$.ajax({
				    url: "{{url('obrisi')}}", // point to server-side PHP script
				    data: form_data,
				    type: 'POST',
				    contentType: false,       // The content type used when sending data to the server.
				    cache: false,             // To unable request pages to be cached
				    processData: false,
				    success: function (data) {
				    	location.reload();
					   	console.log(data);
					},
				});
			});


			$('#sacuvaj').click(function(event){
				var ime=$('#ime').val();
				var prezime=$('#prezime').val();
				var telefon=$('#telefon').val();
				var email=$('#email').val();
				var id=$('#id').val();
				var slika1=$('#slika2').val();
				var slika = $('#slika').prop('files')[0];
				var form_data= new FormData();
				form_data.append('slika', slika);
				form_data.append('id',id);
				form_data.append('ime',ime);
				form_data.append('prezime',prezime);
				form_data.append('telefon',telefon);
				form_data.append('email',email);
				form_data.append('slika1',slika1);
				$.ajaxSetup({
			   	 headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
				});

				$.ajax({
					url: "{{url('izmjeni')}}",
					data: form_data,
					type: 'POST',
					contentType: false,
					cache: false,
					processData: false,
					success: function(data){
						location.reload();
					},
				});


			});

		$('#pretrazuj').click(function(event){
			var search=$('#search').val();
			var token =$('#token').val();
			var form_data= new FormData();
				form_data.append('search',search);

				$.ajaxSetup({
			   	 headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
				});

				$.ajax({
				    url: "{{url('pretrazi')}}", // point to server-side PHP script
				    data: form_data,
				    type: 'POST',
				    contentType: false,       // The content type used when sending data to the server.
				    cache: false,             // To unable request pages to be cached
				    processData: false,
				    success: function (data) {
					   	console.log(data);
					   	$('#KONTAKTI').html(data);
					},
				});

			
		});

		


	});

</script>





</body>
</html>