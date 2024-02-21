<?php

namespace Modules\Website\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsitesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Websites';

        // module name
        $this->module_name = 'websites';

        // directory path of the module
        $this->module_path = 'website::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Website\Models\Website";
    }
    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('name', 'LIKE', "%{$term}%")->limit(10)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->name,
            ];
        }

        return response()->json($$module_name);
    }
    public function switch($id)
    {
        $query_data = $this->module_model::where('id', $id)->first();

        session(['current_website_id' => $id]);
        session(['current_website' => $query_data['name']]);

        flash()->success(__('Website changed'))->important();
        return redirect()->back();
    }

}
