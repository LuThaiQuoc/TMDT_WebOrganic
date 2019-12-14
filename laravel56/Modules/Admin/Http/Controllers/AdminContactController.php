<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::whereRaw(1);

        $contacts = $contacts->orderBy('id','DESC')->paginate(10);

        $viewData = [
            'contacts' => $contacts
        ];
        return view('admin::contact.index',$viewData);
    }

    public function action($action,$id)
    {
        $messages = '';
        if ($action) {
            $contact = Contact::find($id);
            switch ($action)
            {
                case 'delete':
                    $contact->delete();
                    $messages = 'Xóa dữ liệu thành công';
                    break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }


}
