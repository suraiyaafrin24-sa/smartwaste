<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WasteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Display the User Dashboard.
     */
    public function index()
    {
        $userId = Auth::id();

        // Calculate Stats
        $stats = [
            'total' => WasteRequest::where('user_id', $userId)->count(),
            'pending' => WasteRequest::where('user_id', $userId)->where('status', 'pending')->count(),
            'completed' => WasteRequest::where('user_id', $userId)->where('status', 'completed')->count(),
            'cancelled' => WasteRequest::where('user_id', $userId)->where('status', 'cancelled')->count(),
        ];

        // Fetch recent requests
        $recentRequests = WasteRequest::where('user_id', $userId)
            ->with('collector')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('user.dashboard', compact('stats', 'recentRequests'));
    }

    /**
     * Show the form to create a new waste collection request.
     */
    public function createRequest()
    {
        // Define standard waste types
        $wasteTypes = [
            'Organic / Food Waste',
            'Recyclable (Plastic, Paper, Glass, Metal)',
            'Hazardous / Chemical',
            'E-Waste (Electronics)',
            'Bulk Waste / Large Furniture',
        ];

        // Dhaka Uttara sectors
        $sectors = array_map(fn($s) => "Sector " . $s, range(1, 18));

        return view('user.requests.create', compact('wasteTypes', 'sectors'));
    }

    /**
     * Store a newly created waste collection request in the database.
     */
    public function storeRequest(Request $request)
    {
        $request->validate([
            'waste_type' => 'required|string',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'scheduled_time' => 'required|string',
            'sector' => 'required|string',
            'address' => 'required|string|max:500',
            'weight' => 'nullable|numeric|min:0.1',
            'notes' => 'nullable|string|max:1000',
        ]);

        WasteRequest::create([
            'user_id' => Auth::id(),
            'waste_type' => $request->waste_type,
            'scheduled_date' => $request->scheduled_date,
            'scheduled_time' => $request->scheduled_time,
            'sector' => $request->sector,
            'address' => $request->address,
            'weight' => $request->weight,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Your waste collection request has been submitted successfully!');
    }

    /**
     * Display a full history of the user's waste collection requests.
     */
    public function history()
    {
        $requests = WasteRequest::where('user_id', Auth::id())
            ->with('collector')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('user.history', compact('requests'));
    }

    /**
     * Cancel a pending waste collection request.
     */
    public function cancelRequest($id)
    {
        $wasteRequest = WasteRequest::where('user_id', Auth::id())->findOrFail($id);

        if ($wasteRequest->status === 'pending') {
            $wasteRequest->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Waste collection request was cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Only pending requests can be cancelled.');
    }

    /**
     * Optional / Subscriptions features stubs for routing completeness
     */
    public function subscription()
    {
        return view('user.subscription');
    }

    public function mySubscription()
    {
        return view('user.my_subscription');
    }

    public function subscriptionReceipt()
    {
        return redirect()->back()->with('info', 'Subscription receipt functionality is coming soon.');
    }

    public function getCollector(Request $request)
    {
        // Simple API returning active collectors in sector
        $collectors = User::where('role', 'waste_collector')->get(['id', 'name', 'phone']);
        return response()->json($collectors);
    }

    public function dutySchedule()
    {
        return view('user.duty_schedule');
    }

    public function receipt($id)
    {
        $wasteRequest = WasteRequest::where('user_id', Auth::id())->with('collector')->findOrFail($id);
        return view('user.receipt', compact('wasteRequest'));
    }
}
