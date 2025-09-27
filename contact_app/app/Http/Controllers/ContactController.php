<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use ContactService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ContactController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService =$contactService;
    }
    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return Inertia::render('Dashboard', [
            'contacts'=>$contacts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dashboard', [
             'showModal'=> true,
             'modalType'=> 'create',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validate();
        $this->contactService->createContact($validated);

        return Redirect::route('dashboard')->with('success', 'contact created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return Inertia::render('SingleContact', [
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);
        return Inertia::render('Dashboard',[
            'showModal'=>true,
            'modalType'=> 'edit',
            'contact'=>$contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);
        $validated= $request->validated();
        $this->contactService->updateContact($contact, $validated);
        return Redirect::route('dashboard')->with('success', 'contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $this->contactService->deleteteContact($contact); 
        return Redirect::route('dashboard')->with('success', 'contact deleted successfully');
    
    }
}
