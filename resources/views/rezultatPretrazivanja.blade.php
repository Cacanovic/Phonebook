	 @if(count($contacts)>0)
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
      
     @else
     		<h1>Ni jedan kontakt nije pronadjen</h1>
	@endif
