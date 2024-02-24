<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth')
        ->except([
            'show',
            'index',
        ]);
    }

    public function index(): View {
        $contacts = Contact::latest()->paginate(5);

        return view('contacts.index',compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**

     * Show the form for creating a new resource.

     */

    public function create(): View{
        return view('contacts.create');
    }



    /**

     * Store a newly created resource in storage.

     */

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|min:9|max:9|unique:contact',
            'email' => 'required|email|unique:contact',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success','Contact created successfully.');
    }



    /**

     * Display the specified resource.

     */

    public function show(Contact $contact): View{
        return view('contacts.show',compact('contact'));
    }
    /**

     * Show the form for editing the specified resource.

     */
    public function edit(Contact $contact): View{
        return view('contacts.edit',compact('contact'));
    }
    /**

     * Update the specified resource in storage.

     */

    public function update(Request $request, Contact $contact): RedirectResponse{
        $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|min:9|max:9|',
            'email' => 'required|email|',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success','Contact updated successfully');
    }
    /**

     * Remove the specified resource from storage.
     */

    public function destroy(Contact $contact): RedirectResponse{
        //alternative logic
        // $contact->active = false; //If you want active status in table - this route will change to put in route
        // $contact->save();

        //using laravel softs
        $contact->delete();

        return redirect()->route('contacts.index')->with('success','Contact deleted successfully');
    }
}
