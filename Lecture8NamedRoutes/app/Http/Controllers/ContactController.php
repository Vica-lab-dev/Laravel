<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendContact(Request $request)
    {
        $request->validate
        ([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5|max:255"
        ]);

        //echo "Email: ".$request->get("email")." Title: ".$request->get("subject")." Description: ".$request->get("description");

        ContactModel::create
        ([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")
        ]);

        return redirect("/shop");

    }

    public function delete($contact)
    {
        $singleContact = ContactModel::where("id", $contact)->first();

        if($singleContact === null)
        {
            die("Product not found");
        }

        $singleContact->delete();

        return redirect()->back();
    }

    public function singleContact($id)
    {
        $contact = ContactModel::where("id", $id)->first();

        if($contact === null)
        {
            die("Contact not found");
        }

        return view("products/editContact", compact("contact", ));
    }

    public function update(Request $request, $id)
    {
        $contact = ContactModel::where("id", $id)->first();

        if($contact === null)
        {
            die("Contact not found");
        }

        $contact -> email = $request->get("email");
        $contact -> subject = $request->get("subject");
        $contact -> message = $request->get("message");

        $contact->save();

        return redirect()->route("allContacts");
    }
}
