namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề
    public function index()
    {
        $issues = Issue::with('computer')->get();
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form thêm vấn đề mới
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    // Lưu dữ liệu mới vào bảng issues
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm.');
    }

    // Hiển thị form cập nhật thông tin vấn đề
    public function edit(Issue $issue)
    {
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Lưu cập nhật vào bảng issues
    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật.');
    }

    // Xóa bản vấn đề
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa.');
    }
}
