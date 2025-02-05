<?php
namespace Jiny\Widgets\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminWidget extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table']['name'] = "site_widgets";

        $this->actions['view']['list'] = "jiny-widgets::admin.widget.list";
        $this->actions['view']['form'] = "jiny-widgets::admin.widget.form";

        $this->actions['title'] = "위젯관리";
        $this->actions['subtitle'] = "사용 가능한 위젯을 관리합니다.";

        // // 업로드후 해당경로로 파일 이동
        // $this->setUploadAfterMoveTo("/images/flag");
    }


}
