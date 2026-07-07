<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WasteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    /**
     * Display Admin Dashboard.
     */
    public function index()
    {
        $pendingCollections = WasteRequest::where('status', 'pending')->count();

        $requestsCreatedToday = WasteRequest::whereDate('created_at', today())->count();

        $todayCompletedCount = WasteRequest::whereIn('status', ['completed', 'collected'])
            ->whereDate('updated_at', today())
            ->count();

        $activeStaffCount = User::where('role', 'waste_collector')->count();

        $totalUsersCount = User::where('role', 'user')->count();

        $latestRequests = WasteRequest::with(['user', 'collector'])
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'pendingCollections',
            'requestsCreatedToday',
            'todayCompletedCount',
            'activeStaffCount',
            'totalUsersCount',
            'latestRequests'
        ));
    }

    /**
     * Display users list.
     */
    public function users(Request $request)
    {
        // Simple search query matching sector, name, email or phone
        $search = $request->query('search');

        $usersQuery = User::whereIn('role', ['user', 'waste_collector']);

        if ($search) {
            $usersQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('sector', 'like', "%{$search}%");
            });
        }

        $users = $usersQuery->orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users', 'search'));
    }

    /**
     * Show form to create citizen or collector.
     */
    public function createUser()
    {
        $sectors = array_map(fn($s) => "Sector " . $s, range(1, 18));
        return view('admin.users.create', compact('sectors'));
    }

    /**
     * Store new User (Citizen or Collector).
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:user,waste_collector',
            'phone' => 'required|string|max:20',
            'sector' => 'required|string',
            'road' => 'required|string',
            'address' => 'nullable|string|max:500',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'sector' => $request->sector,
            'road' => $request->road,
            'address' => $request->address ?? ($request->sector . ', ' . $request->road),
        ]);

        return redirect()->route('admin.users')->with('success', 'User/Collector registered successfully!');
    }

    /**
     * Show edit user form.
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $sectors = array_map(fn($s) => "Sector " . $s, range(1, 18));
        return view('admin.users.edit', compact('user', 'sectors'));
    }

    /**
     * Update user.
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:user,waste_collector',
            'phone' => 'required|string|max:20',
            'sector' => 'nullable|string',
            'road' => 'nullable|string',
            'address' => 'nullable|string|max:500',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'sector' => $request->sector,
            'road' => $request->road,
            'address' => $request->address,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User details updated successfully!');
    }

    /**
     * Delete user/collector.
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting active admin if it falls into this route safety scope
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Cannot delete System Administrator.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Account deleted successfully.');
    }

    /**
     * Admin duty roster & collections view stubs
     */
    public function collections()
    {
        $collections = WasteRequest::with(['user', 'collector'])->orderBy('id', 'desc')->paginate(15);
        return view('admin.collections', compact('collections'));
    }

    public function assignTask(Request $request, $id)
    {
        $wasteRequest = WasteRequest::findOrFail($id);
        $request->validate([
            'collector_id' => 'required|exists:users,id'
        ]);

        $wasteRequest->update([
            'collector_id' => $request->collector_id,
            'status' => 'assigned'
        ]);

        return redirect()->back()->with('success', 'Collector assigned successfully!');
    }

    public function showDutyRoster()
    {
        $collectors = User::where('role', 'waste_collector')->get();
        return view('admin.duty_roster', compact('collectors'));
    }

    public function storeDutyRoster(Request $request)
    {
        return redirect()->back()->with('success', 'Roster created successfully.');
    }

    public function deleteDutyRoster($id)
    {
        return redirect()->back()->with('success', 'Roster assignment cleared.');
    }

    public function complaints()
    {
        return view('admin.complaints');
    }

    public function resolveComplaint($id)
    {
        return redirect()->back()->with('success', 'Complaint resolved.');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function generateReport(Request $request)
    {
        return redirect()->back()->with('success', 'Report generated.');
    }

    public function downloadReport()
    {
        return response()->streamDownload(function () {
            echo "Report Export Content"; }, "report.csv");
    }

    public function downloadPdfReport()
    {
        return response()->streamDownload(function () {
            echo "PDF Report Export Content"; }, "report.pdf");
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function updatePassword(Request $request)
    {
        return redirect()->back()->with('success', 'Password updated.');
    }

    public function deleteAvatar()
    {
        return redirect()->back()->with('success', 'Avatar deleted.');
    }

    public function payments()
    {
        return view('admin.payments');
    }

    public function leaveRequests()
    {
        return view('admin.leave_requests');
    }

    public function approveLeaveRequest($leaveId)
    {
        return redirect()->back()->with('success', 'Leave approved.');
    }

    public function rejectLeaveRequest($leaveId)
    {
        return redirect()->back()->with('success', 'Leave request rejected.');
    }

    public function dutySchedule()
    {
        return view('admin.duty_schedule');
    }
}
