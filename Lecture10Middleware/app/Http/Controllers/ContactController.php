<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

    public function index()
    {
        return view("contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendContact(ContactRequest $request)
    {
        $this->contactRepo->createNew($request);
        return redirect("/shop");

    }

    public function delete(ContactModel $contact)
    {
        $contact->delete();

        return redirect()->back();
    }

    public function singleContact(ContactModel $contact)
    {
        return view("products/editContact", compact("contact", ));
    }

    public function update(Request $request, ContactModel $contact)
    {
        $this->contactRepo->update($request, $contact);

        return redirect()->route("contact.all");
    }
}
