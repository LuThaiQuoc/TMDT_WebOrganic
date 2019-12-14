<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(6);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('admin::transaction.index',$viewData);
    }

    public function viewOrder(Request $request,$id){
        if ($request->ajax())
        {
            $orders = Order::with('product')->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders)
        {
            foreach ($orders as $order)
            {
                // tru di so luong cua san pham
                // tang hien pay san pham
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $order->or_qty;

                $product->pro_pay ++;
                $product->save();
            }
            //update user
            \DB::table('users')->where('id',$transaction->tr_user_id)
                ->increment('total_pay');

            $transaction->str_status = Transaction::STATUS_DONE;
            $transaction->save();

            return redirect()->back()->with('success','Xử lý đơn hàng thành công');

        }
    }
    public function action($action,$id)
    {
        $messages ='';
        if($action) {
            $transaction = Transaction::find($id);
            if ($transaction->str_status == 0) {
                switch ($action) {
                    case 'delete':
                        $transaction->delete();
                        $messages = 'Xóa dữ liệu thành công';
                        break;
                }
            }
            else{
                return redirect()->back()->with('danger','Không thể xóa');
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
