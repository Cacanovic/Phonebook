<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContactsController extends Controller
{
    public function index(){
    	$contacts=Contact::paginate(12);
    	return view('imenik')->with('contacts',$contacts);
    }
    public function dodaj (Request $request){

    	$contact=new Contact;   

        if($request->hasFile('slika')){
            $slika=$request->file('slika');
            $ekstenzija=$slika->getClientOriginalExtension();
            //pomocu sledec pasusa sa foreach petljom vadio koji nam je sledeci autoincrement za kontakt
            $value=DB::select("show table status like 'contacts' ");
            foreach($value as $val){
                $slikaId=$val->Auto_increment;
                break;
            }
            $imeFajla=$request->ime."_".$slikaId.".".$ekstenzija;
        }else{
            $imeFajla='default.png';
        }
    
    	$contact->ime=$request->ime;
    	$contact->prezime=$request->prezime;
    	$contact->telefon=$request->telefon;
        $contact->email=$request->email;
    	$contact->slika=$imeFajla;
    	$contact->save();

        if($request->hasFile('slika')){
            if($contact){
                $path=$request->file('slika')->storeAs('public/slike',$imeFajla);
            }
        }
    	return $request->all();
    }

 

    public function obrisi(Request $request){
    	$contact=Contact::where('id',$request->id)->first();

        if($contact->slika!="default.png"){
               Storage::delete('/public/slike/'.$contact->slika);
         }

        $contact->delete();
        return $request->all();
    }


    public function izmjeni(Request $request){
    	$contact=Contact::find($request->id);
    	$contact->ime=$request->ime;
    	$contact->prezime=$request->prezime;
    	$contact->telefon=$request->telefon;
    	$contact->email=$request->email;

        if($request->hasFile('slika')){
            $slika=$request->file('slika');
            $ekstenzija=$slika->getClientOriginalExtension();
            if($request->slika1!="default.png"){
                Storage::delete('/public/slike/'.$request->slika);
            }
            $imeFajla=$request->ime."_".$request->id.".".$ekstenzija;
            $contact->slika=$imeFajla;
        }else{
            $imeFajla='default.png';
        }

        
    	$contact->save();

        if($request->hasFile('slika')){
            if($contact){
                 $path=$request->file('slika')->storeAs('public/slike',$imeFajla);
            }
        }
        return $request->all();
    }


    public function pretrazi(Request $request){
    	$search=$request->search;
        if ($search=="") {
           // $search="mi";
               // $contacts = Contact::take(1)->get();
                $contacts=Contact::paginate(12);
             /*  $contacts = Contact::where('ime', 'like', '%' . $search . '%')
                            ->orWhere('prezime', 'like', '%' . $search . '%')
                            ->orWhere('telefon', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->get();*/
                return view('rezultatPretrazivanja')->with('contacts',$contacts)->render();

        } else {
            
            $contacts = Contact::where('ime', 'like', '%' . $search . '%')
                            ->orWhere('prezime', 'like', '%' . $search . '%')
                            ->orWhere('telefon', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->paginate(12);

                return view('rezultatPretrazivanja')->with('contacts',$contacts)->render();

        }
    }








}