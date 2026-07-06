<?php

namespace App\Http\Controllers\WasteCollector;

use App\Http\Controllers\Controller;
use App\Models\WasteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WasteCollectorDashboardController extends Controller
{
    /**
     * Display the Waste Collector Dashboard.
     */
    public function index()
    {
        $collector = Auth::user();
        $collectorId = $collector->id;
        $sector = $collector->sector; // e.g. "Sector 3"

        // Statistics
        $stats = [
            'completed' => WasteRequest::where('collector_id', $collectorId)->where('status', 'completed')->count(),
            'assigned' => WasteRequest::where('collector_id', $collectorId)->where('status', 'assigned')->count(),
            'sector_pending' => WasteRequest::where('sector', $sector)->where('status', 'pending')->count(),
        ];

        // Active Tasks Assigned to this Collector
        $activeTasks = WasteRequest::where('collector_id', $collectorId)
            ->where('status', 'assigned')
            ->with('user')
            ->orderBy('id', 'desc')
            ->get();

        // Available community requests in this collector's sector
        $availableRequests = WasteRequest::where('sector', $sector)
            ->where('status', 'pending')
            ->with('user')
            ->orderBy('id', 'desc')
            ->get();

        return view('collector.dashboard', compact('stats', 'activeTasks', 'availableRequests', 'collector'));
    }

    /**
     * Accept/Self-assign a pending request in their sector.
     */
    public function acceptRequest($id)
    {
        $collector = Auth::user();

        $request = WasteRequest::where('status', 'pending')
            ->where('sector', $collector->sector)
            ->findOrFail($id);

        $request->update([
            'collector_id' => $collector->id,
            'status' => 'assigned'
        ]);

        return redirect()->route('waste_collector.dashboard')->with('success', 'You have successfully self-assigned this collection task.');
    }

    /**
     * Mark an assigned task as completed.
     */
    public function completeRequest($id)
    {
        $request = WasteRequest::where('collector_id', Auth::id())
            ->where('status', 'assigned')
            ->findOrFail($id);

        $request->update(['status' => 'completed']);

        return redirect()->route('waste_collector.dashboard')->with('success', 'Task marked as completed! Good job.');
    }

    /**
     * Show history of collector dispatches.
     */
    public function history()
    {
        $completedRequests = WasteRequest::where('collector_id', Auth::id())
            ->where('status', 'completed')
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('collector.history', compact('completedRequests'));
    }

    /**
     * Stubs for optional actions
     */
    public function dutySchedule()
    {
        return view('collector.duty_schedule');
    }

    public function paymentCollection()
    {
        return view('collector.payment_collection');
    }

    public function leaveRequests()
    {
        return view('collector.leave_requests');
    }

    public function storeLeaveRequest(Request $request)
    {
        return redirect()->back()->with('success', 'Leave request submitted to administration.');
    }
}
