use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề
    public function index()
    {
        $issues = Issue::with('computer')->get(); // Eager loading bảng `computers`
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form tạo vấn đề mới
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới vào CSDL
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề mới đã được thêm thành công.');
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Thông tin vấn đề đã được cập nhật.');
    }

    // Xóa vấn đề
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công.');
    }
}
