<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    // Add a Newsletter Subscriber email HTML Form Submission in front/layout/footer.blade.php when clicking on the Submit button (using an AJAX Request/Call)    
    public function addSubscriber(Request $request)
    {

        $data = $request->all();
        // dd($data);

        $subscriberCount = NewsletterSubscriber::where('email', $data['subscriber_email'])->count(); //    $data['subscriber_email']    comes from the 'data' object inside the $.ajax() method

        if ($subscriberCount > 0) {
            return redirect()->back()->with('success_message', 'You are already over subscriber');
        } else {
            // INSERT the email in the `newsletter_subscribers` table
            $subscriber = new NewsletterSubscriber;

            $subscriber->email = $data['subscriber_email'];
            $subscriber->status = 1; // 1 by default

            $subscriber->save();


            return redirect()->back()->with('success_message', 'Subscribed successfully');
        }
    }
}
