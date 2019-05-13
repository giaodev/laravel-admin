<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddWidgetRequest;
use App\Http\Requests\EditWidgetRequest;
use App\Models\Widget;
class WidgetController extends Controller
{
public function getIndex()
    {
        $data['title'] = "Danh sách widget";
        $data['data'] = widget::orderby('created_at','desc')->paginate(15);
        return view('admin.widget.index', $data);
    }

    public function getAdd()
    {
        $data['title'] = "Thêm mới widget";
        return view('admin.widget.add', $data);
    }

    public function postAdd(AddWidgetRequest $request)
    {
        $widget = new widget();
        $widget->widget_title = $request->widget_title;
        if ($request->widget_content != "") {
            $widget_content = $request->widget_content;
            $widget->widget_content = $widget_content;
        }
        $widget->widget_type = $request->widget_type;
        $widget->widget_status = $request->widget_status;
        $widget->widget_order = $request->widget_order;
        $widget->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }

    public function getEdit($id)
    {
        $data['title'] = 'Cập nhật widget';
        $data['data'] = widget::find($id);
        $widget = $data['data'];
        return view('admin.widget.edit', $data);
    }

    public function postEdit(EditwidgetRequest $request, $id)
    {
        $widget = widget::find($id);
        $widget->widget_title = $request->widget_title;
        if ($request->widget_content != "") {
            $widget_content = $request->widget_content;
            $widget->widget_content = $widget_content;
        }
        $widget->widget_type = $request->widget_type;
        $widget->widget_status = $request->widget_status;
        $widget->widget_order = $request->widget_order;
        $widget->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }

    public function getDelete(Request $request, $id)
    {
        $widget = widget::find($id);
        if ($widget != "") {
            $widget->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
}
