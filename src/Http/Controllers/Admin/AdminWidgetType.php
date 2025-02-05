<?php
namespace Jiny\Widgets\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminWidgetType extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table']['name'] = "site_widget_type";

        $this->actions['view']['list'] = "jiny-widgets::admin.widget_type.list";
        $this->actions['view']['form'] = "jiny-widgets::admin.widget_type.form";

        $this->actions['title'] = "위젯타입";
        $this->actions['subtitle'] = "사용 가능한 위젯타입을 관리합니다.";

        // // 업로드후 해당경로로 파일 이동
        // $this->setUploadAfterMoveTo("/images/flag");
    }


}
