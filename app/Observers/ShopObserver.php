<?php

namespace App\Observers;

use Illuminate\Support\Facades\Mail;

use App\Mail\ShopActivated;
use App\Models\Shop;

class ShopObserver
{
    public function created(Shop $shop) {
        //
    }

    public function updated(Shop $shop) {
        // Check if active column is changed from inactive to active
        if($shop->getOriginal('status') == false && $shop->status == true) {

            // Send mail to customer
            Mail::to($shop->owner)->send(new ShopActivated($shop));

            // Change role from customer to seller
            // $shop->owner->setRole('seller');
        } else {
            echo 'shop status changed to inactive';
        }
    }

    public function deleted(Shop $shop) {
        //
    }

    public function deleting(Shop $shop) {
        // dd(auth()->id());
        // dd($shop);
    }

    public function restored(Shop $shop) {
        //
    }

    public function forceDeleted(Shop $shop) {
        //
    }
}
