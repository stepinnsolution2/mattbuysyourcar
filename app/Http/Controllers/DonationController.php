namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('admin.donation.all', compact('donations'));
    }

    

    public function destroy($id)
    {
        $donation = Donation::find($id);

        if ($donation) {
            $donation->delete();
            return redirect()->back()->with('delete', 'Donation deleted successfully.');
        }

        return redirect()->back()->with('error', 'Donation does not exist.');
    }
}
