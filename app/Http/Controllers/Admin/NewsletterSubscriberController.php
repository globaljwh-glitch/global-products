<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    /**
     * Subscriber List
     */
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::query();

        // Search
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $subscribers = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view(
            'admin.newsletter-subscribers.index',
            compact('subscribers')
        );
    }

    /**
     * Subscriber Details
     */
    public function show(NewsletterSubscriber $subscriber)
    {
        return view(
            'admin.newsletter-subscribers.show',
            compact('subscriber')
        );
    }

    /**
     * Delete Subscriber
     */
    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()
            ->route('admin.newsletter-subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }
}