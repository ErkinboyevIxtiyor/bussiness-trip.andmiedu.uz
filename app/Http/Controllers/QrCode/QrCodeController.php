<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;
use App\Models\BusinessTrip\BusinessTrip;
use App\Models\Employee\Employee;
use App\Models\System\SystemLogo;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function qr_code($id)
    {
        $employee = Employee::all();
        $business_trip = BusinessTrip::find($id);
        $system_logo = SystemLogo::all();
        return view('qr_code.qr_code',compact('system_logo','employee','business_trip'));
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
                $fullname = iconv('UTF-8','cp1254//TRANSLIT//IGNORE',$employee->second_name." ".$employee->first_name. " " .$employee->third_name);
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
        $this->fpdf->MultiCell(0, 0, $trip_adress. 'ga xizmat safariga yuborilgan' ,0,'C');

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
        $order_number = iconv('UTF-8','cp1258//TRANSLIT//IGNORE',$business_trip_pdf->order_number);
        $this->fpdf->MultiCell(0, 0, 'Asos: '. $date_order_date. ' dagi ' .$order_number. ' - sonli buyruq '  ,0,'L');

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

        $this->fpdf->Output('D',"$fullname.pdf");

        exit;
    }
}
