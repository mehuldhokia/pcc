<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    public function created(Contact $contact) {
        // // Check if active column is changed from inactive to active
        // if($contact->getOriginal('notify') == false && $contact->notify == true) {
        //     echo 'contact notification sent.';
        // } else {
        //     echo 'contact notify changed to inactive (false)';
        // }
    }

    public function updated(Contact $contact) {
       //
    }

    public function deleted(Contact $contact) {
        //
    }

    public function deleting(Contact $contact) {
        // dd(auth()->id());
        // dd($contact);
    }

    public function restored(Contact $contact) {
        //
    }

    public function forceDeleted(Contact $contact) {
        //
    }
}
