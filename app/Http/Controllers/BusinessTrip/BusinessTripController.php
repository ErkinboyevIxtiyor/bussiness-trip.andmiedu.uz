<?php

namespace App\Http\Controllers\BusinessTrip;

use App\Exports\BusinessTripExport;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\BusinessTrip\BusinessTrip;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Employee\Employee;
use App\Models\System\Position;
use App\Models\System\SystemLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\PHP\phpqrcode\qrlib;
use Maatwebsite\Excel\Facades\Excel;

class BusinessTripController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function business_trip(Request $request)
    {
        $search = $request['search'] ?? "" ;
        $system_logo = SystemLogo::all();
        $position = Position::all();
        if ($search != "") {
            $business_trip = BusinessTrip::where('employee_full_name', 'LIKE', "%$search%")->orWhere('trip_id', 'LIKE', "%$search%")->orWhere('employee_passport', 'LIKE', "%$search%")->get();
        } else {
            $business_trip = DB::table('business_trips')->orderBy('id','desc')->get();
        }
        $business_trip_total = BusinessTrip::all()->count();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('business-trip.business-trip-date.business-trip',$data,compact('system_logo','business_trip','search','business_trip_total'));
    }
    public function business_trip_add()
    {
        $system_logo = SystemLogo::all();
        $position = Position::all();
        $employee = DB::table('employees')->orderBy('id','desc')->get();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('business-trip.business-trip-date.business-trip-add',$data,compact('system_logo','employee','position'));
    }
    public function business_trip_add_save($id)
    {
        $employee_add = Employee::find($id);
        $system_logo = SystemLogo::all();
        $position = Position::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('business-trip.business-trip-date.business-trip-save',$data,compact('system_logo','employee_add','position'));
    }
    public function business_trip_save(Request $request)
    {
        $request->validate([
            'employee_id'=>'required',
            'employee_position'=>'required',
            'trip_adress'=>'required',
            'trip_day'=>'required',
            'trip_days'=>'required',
            'trip_begin_date'=>'required',
            'trip_end_date'=>'required',
            'employee_passport'=>'required',
            'employee_responsible_position'=>'required',
            'employee_responsible_name'=>'required',
            'shipping_adress' => 'required',
            'shipping_date'=>'required'
        ]);
        // $input = $request->all();
        // return dd($input);
        $trip_id = Helper::Business_trip_id(new BusinessTrip, 'trip_id',3, date('m').'/');
        $business_trip = new BusinessTrip;
        $business_trip->trip_id= $trip_id;
        $business_trip->employee_id= $request->employee_id;
        $business_trip->employee_full_name= $request->employee_full_name;
        $business_trip->employee_position= $request->employee_position;
        $business_trip->trip_adress= $request->trip_adress;
        $business_trip->trip_days= $request->trip_days;
        $business_trip->trip_day= $request->trip_day;
        $business_trip->trip_begin_date= $request->trip_begin_date;
        $business_trip->trip_end_date= $request->trip_end_date;
        $business_trip->employee_passport= $request->employee_passport;
        $business_trip->order_date= $request->order_date;
        $business_trip->order_number= $request->order_number;
        $business_trip->employee_responsible_position= $request->employee_responsible_position;
        $business_trip->employee_responsible_name= $request->employee_responsible_name;
        $business_trip->shipping_adress= $request->shipping_adress;
        $business_trip->shipping_date= $request->shipping_date;
        $save = $business_trip->save();

        if ($save) {
            return redirect('/bussiness-trip/date')->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function business_trip_qr_code(Request $request, $id)
    {
        $business_trip_pdf = BusinessTrip::find($id);
        // $qr_code_id = 'qr_code'.time();
        $qr_code_id = Helper::IDGenerator(new BusinessTrip, 'qr_code',6, 'qr_code_'.date('His'.'_'));
        QrCode::style('round');
        $qr_code = QrCode::format('png')->size(100)->generate(url('/bussiness-trip/qr-code/'.$business_trip_pdf->id),public_path('qr_code/'.$qr_code_id.'.png'));
        $business_trip_pdf->qr_code = $qr_code_id;
        $save = $business_trip_pdf->save();
           if ($save) {
               return back()->with('save','PDF muvaffaqiyatli yaratildi');
           }
    }
    public function business_trip_pdf(Request $request, $id)
    {
        $business_trip_pdf = BusinessTrip::find($id);
        $employee_date = Employee::all();

        
        QrCode::style('round');
        $qr_code = QrCode::size(100)->generate(url('Httststst'));

        // $qr_code =  QrCode::size(100)->generate('logo.png');

        $date_updated_at =date('d-m-Y', strtotime($business_trip_pdf->created_at));
        $date_order_date =date('d-m-Y', strtotime($business_trip_pdf->order_date));
        $date_trip_begin_date =date('d-m-Y', strtotime($business_trip_pdf->trip_begin_date));
        $date_trip_end_date =date('d-m-Y', strtotime($business_trip_pdf->trip_end_date));
        $ministry = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"O‘ZBEKISTON RESPUBLIKASI OLIY VA O‘RTA MAXSUS");
        $ministry2 = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"TA’LIM VAZIRLIGI");
        $andmi = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"ANDIJON MASHINASOZLIK INSTITUTI");
        $full_name2 = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',$business_trip_pdf->employee_full_name);

        $this->fpdf->AddPage('P',  'A4');
        $this->fpdf->SetFont('Times', 'B', 15);
        $this->fpdf->Image(public_path('qr_code_logo/pdf_logo2.png'),8,8,28);
        // $this->fpdf->MultiCell(0, 0, $business_trip_pdf->trip_id,0,'L');
        $this->fpdf->SetFont('Times', 'B', 13);
        $this->fpdf->MultiCell(0, 0, $ministry,0,'C');
        $this->fpdf->SetFont('Times', 'B', 13);
        $this->fpdf->Ln( 5 );
        $this->fpdf->MultiCell(0, 0, $ministry2,0,'C');
        $this->fpdf->Ln( 5 );
        $this->fpdf->SetFont('Times', 'B', 13);
        // $this->fpdf->MultiCell(0, 0, $ministry2,0,'C');
        $this->fpdf->MultiCell(0, 0, $andmi,0,'C');   
        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', '', 15);
        $this->fpdf->MultiCell(0, 0, 'XIZMAT SAFARI GUVOHNOMASI',0,'C');
        $this->fpdf->Image(public_path('qr_code/'.$business_trip_pdf->qr_code.'.png'),174,8,25);
        $this->fpdf->Ln( 8 );
        $this->fpdf->SetFont('Times', 'B', 15);
        $this->fpdf->MultiCell(0, 0, $date_updated_at,0,'R');
        $this->fpdf->Ln( 5 );
        $this->fpdf->MultiCell(0, 0, $business_trip_pdf->trip_id,0,'R');

        $this->fpdf->Ln( 0 );

        $this->fpdf->SetFont('Times','b', 'cp1250', 15);
        foreach ($employee_date as $employee) {
            if ($employee->id == $business_trip_pdf->employee_id) {
                $fullname = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',$employee->second_name." ".$employee->first_name. " " .$employee->third_name."ga");
            }
        }
        $this->fpdf->MultiCell(0, 0, 'Berildi: '.$fullname,0,'C');

        $this->fpdf->Ln( 10 );

        $this->fpdf->SetFont('Times', 'b', 15);
        $employee_position = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',$business_trip_pdf->employee_position);
        $this->fpdf->MultiCell(0, 0, $employee_position,0,'C');

        $this->fpdf->Ln( 10 );
        $this->fpdf->MultiCell(0, 0, 'Andijon mashinasozlik institutidan',0,'C');

        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', 'b', 15);
        $trip_adress = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',$business_trip_pdf->trip_adress);
        $this->fpdf->MultiCell(0, 0, $trip_adress.'ga xizmat safariga yuborilgan' ,0,'C');

        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', '', 15);
        $right_day = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',' « ');
        $left_day = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',' » ');
        $this->fpdf->MultiCell(0, 0, 'Xizmat safari muddati: '.$right_day .$business_trip_pdf->trip_days.$left_day.$business_trip_pdf->trip_day ,0,'L');

        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', 'b', 15);
        $this->fpdf->MultiCell(0, 0, $date_trip_begin_date.' dan',0,'L');
        $this->fpdf->MultiCell(0, 0, $date_trip_end_date.' gacha' ,0,'R');

        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', '', 15);
        if ($business_trip_pdf->order_number != "") {
        $order_number = iconv('UTF-8','cp1258//TRANSLIT//IGNORE',$business_trip_pdf->order_number);
        $this->fpdf->MultiCell(0, 0, 'Asos: '. $date_order_date. ' dagi ' .$order_number. ' - sonli buyruq '  ,0,'L');
        }else {
        $order_number = iconv('UTF-8','cp1258//TRANSLIT//IGNORE',$business_trip_pdf->order_number);
        $this->fpdf->MultiCell(0, 0, 'Asos: _____________ dagi ______ - sonli buyruq' ,0,'L');
        }
        // $this->fpdf->Ln( 4 );
        // $this->fpdf->SetFont('Times', 'B', 10);
        // $this->fpdf->MultiCell(0, 0, "",1,'L');

        $this->fpdf->Ln( 10 );
        $this->fpdf->SetFont('Times', '', 15);
        $this->fpdf->MultiCell(0, 0, $business_trip_pdf->employee_passport. ' raqamli passport taqdim etilgan taqdirda haqiqiy' ,0,'L');

        $this->fpdf->Ln( 15 );
        $this->fpdf->SetFont('Times', 'B', 15);
        $employee_responsible_name = iconv('UTF-8','cp1254//TRANSLIT//IGNORE', $business_trip_pdf->employee_responsible_name);

        $employee_responsible_position = iconv('UTF-8','cp1254//TRANSLIT//IGNORE', $business_trip_pdf->employee_responsible_position);

        $this->fpdf->MultiCell(90, 0, $employee_responsible_position,0,'C');
        $this->fpdf->MultiCell(300, 0, $employee_responsible_name,0,'C');

        $this->fpdf->Ln( 15 );
        $this->fpdf->SetFont('Times', 'B', 15);
        $m_o = iconv('UTF-8','cp1254//TRANSLIT//IGNORE','M. O‘.');
        $this->fpdf->MultiCell(0, 0, $m_o,0,'L');

        $this->fpdf->Ln( 5 );
        $this->fpdf->SetFont('Times', 'B', 15);
        $this->fpdf->MultiCell(0, 0, "",1,'L');

        $this->fpdf->Ln( 7 );
        $this->fpdf->SetFont('Times', '', 13);

        $eslatma = iconv('UTF-8','cp1254//TRANSLIT//IGNORE','Belgilangan manzilga yetib borish va u yerdan qaytish belgilari:');
        $this->fpdf->MultiCell(0, 0, $eslatma,0,'L');
        $this->fpdf->Ln( 8 );
        $shipping_date = date('d-m-Y', strtotime($business_trip_pdf->shipping_date));
        $arrival_date =date('d-m-Y', strtotime($business_trip_pdf->arrival_date));

        $shipping_adress = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"Jo‘nadi: ".$business_trip_pdf->shipping_adress);
        $this->fpdf->MultiCell(0,0, $shipping_adress ,0,'L');
        $this->fpdf->MultiCell(0,0, "Keldi:_______________ " ,0,'R');

        $this->fpdf->Ln( 7 );

        $this->fpdf->MultiCell(0,0, $shipping_date ,0,'L');
        $this->fpdf->MultiCell(0,0, "Sana:_______________" ,0,'R');
        $this->fpdf->Ln( 10 );

        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'L');
        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'R');

        $this->fpdf->Ln( 10 );
        
        $shipping_adress = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"Jo‘nadi:_______________");
        $this->fpdf->MultiCell(0,0, $shipping_adress ,0,'L');
        $this->fpdf->MultiCell(0,0, "Keldi:_______________ " ,0,'R');

        $this->fpdf->Ln( 7 );

        $this->fpdf->MultiCell(0,0, "Sana:_______________" ,0,'L');
        $this->fpdf->MultiCell(0,0, "Sana:_______________" ,0,'R');
        $this->fpdf->Ln( 10 );

        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'L');
        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'R');

        $this->fpdf->Ln( 10 );
        
        $shipping_adress = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',"Jo‘nadi:_______________");
        $this->fpdf->MultiCell(0,0, $shipping_adress ,0,'L');
        $this->fpdf->MultiCell(0,0, "Keldi:_______________ " ,0,'R');

        $this->fpdf->Ln( 7 );

        $this->fpdf->MultiCell(0,0, "Sana:_______________" ,0,'L');
        $this->fpdf->MultiCell(0,0, "Sana:_______________" ,0,'R');

        $this->fpdf->Ln( 10 );

        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'L');
        $this->fpdf->MultiCell(0,0, "Muhr.  Imzo_______________" ,0,'R');

        $this->fpdf->Ln( 9 );
        $this->fpdf->SetFont('Times', 'B', 13);
        $this->fpdf->MultiCell(0,0, 'ESLATMA',0,'');

        $this->fpdf->Ln( 5 );
        $this->fpdf->SetFont('Times', '', 13);
        $first_str = iconv('UTF-8','cp1254//TRANSLIT//IGNORE','Bir necha yo‘nalishlarga safarga borilganda ularning har birida alohida keldi va chiqdi belgilanishlari');

        $second_str = iconv('UTF-8','cp1254//TRANSLIT//IGNORE','alohida amalga oshiriladi hamda guvohnoma safardan qaygandan so‘ng 3 (uch) kun ichida');

        $this->fpdf->MultiCell(0, 0, $first_str ,0,'B');

        $this->fpdf->Ln( 5 );

        $this->fpdf->MultiCell(0, 0, $second_str ,0,'B');

        $this->fpdf->Ln( 5 );

        $this->fpdf->MultiCell(0, 0, 'buxgalteriyaga hisobot bilan topshiriladi.' ,0,'B');

        $this->fpdf->Ln( 8 );
        $this->fpdf->SetFont('Times', 'B', 13);
        $this->fpdf->MultiCell(0,0, 'ASOS',0,'');

        $this->fpdf->Ln( 5 );
        $this->fpdf->SetFont('Times', '', 13);
        $first_str = iconv('UTF-8','cp1254//TRANSLIT//IGNORE','Xizmat safari guvohnomasi O‘zbekiston Respublikasi Moliya vazirligi va Mehnat va aholini ijtimoiy');
        $this->fpdf->MultiCell(0, 0, $first_str ,0,'B');

        $this->fpdf->Ln( 5 );

        $this->fpdf->MultiCell(0, 0, 'muhofaza qilish vazirligining 2003 yil 24 iyuldagi 83-son va 7/12-sonli qarori bilan tasdiqlangan' ,0,'B');

        $this->fpdf->Output('D',"$full_name2.pdf");

        exit;
    }
    public function business_trip_edit($id)
    {
        $employee_add = Employee::all();
        $system_logo = SystemLogo::all();
        $position = Position::all();
        $business_trip = BusinessTrip::find($id);
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('business-trip.business-trip-date.business-trip-edit',$data,compact('system_logo','employee_add','position','business_trip'));
    }
    public function business_trip_update(Request $request,$id)
    {
        $request->validate([
            // 'employee_id'=>'required',
            // 'employee_position'=>'required',
            'trip_adress'=>'required',
            'trip_day'=>'required',
            'trip_days'=>'required',
            'trip_begin_date'=>'required',
            'trip_end_date'=>'required',
            // 'employee_passport'=>'required',
            'employee_responsible_position'=>'required',
            'employee_responsible_name'=>'required',
            'shipping_adress' => 'required',
            'shipping_date'=>'required'
        ]);

        $business_trip = BusinessTrip::find($id);
        $business_trip->employee_id= $request->employee_id;
        $business_trip->employee_position= $request->employee_position;
        $business_trip->trip_adress= $request->trip_adress;
        $business_trip->trip_days= $request->trip_days;
        $business_trip->trip_day= $request->trip_day;
        $business_trip->trip_begin_date= $request->trip_begin_date;
        $business_trip->trip_end_date= $request->trip_end_date;
        $business_trip->employee_passport= $request->employee_passport;
        $business_trip->order_date= $request->order_date;
        $business_trip->order_number= $request->order_number;
        $business_trip->employee_responsible_position= $request->employee_responsible_position;
        $business_trip->employee_responsible_name= $request->employee_responsible_name;
        $business_trip->shipping_adress= $request->shipping_adress;
        $business_trip->shipping_date= $request->shipping_date;
        $save = $business_trip->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    
    public function faculty_published(Request $request)
    {
        $published = BusinessTrip::find($request->id)->update(['status'=> 1]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function faculty_unpublished(Request $request)
    {
        $published = BusinessTrip::find($request->id)->update(['status'=> 0]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function business_trip_export()
    {
        $date = date('d-m-Y-H-i-s');
        return Excel::download(new BusinessTripExport, "$date-xizmat_safari.xlsx");
    }
}
