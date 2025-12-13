<?php
require_once APPPATH . 'controllers/MainController.php';

class HookController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('line');
        $this->load->model('ReplyModel', 'reply');
        $this->load->model('BroadcastModel', 'broadcast');
    }

    public function index()
    {
        $datas = file_get_contents('php://input');
        $deCode = json_decode($datas, true);
        $eventType = $deCode['events'][0]['type'];
        $replyToken = $deCode['events'][0]['replyToken'];

        $userId = $deCode['events'][0]['source']['userId'];
        // $groupId = $deCode['events'][0]['source']['groupId'];

        $messages = [];
        $messages['replyToken'] = $replyToken;

        if ($eventType == 'message') {
            $text = $deCode['events'][0]['message']['text'];
            if ($text == '/renew') {
                // $date_find = date('Y-m-d', strtotime('+2 months'));
                $date_find = "2025-06-08";
                $data = $this->broadcast->getAlertMonth($date_find);
                // $txt = '';
                // foreach ($data as $key => $value) {
                //     $txt .= "Vehicle: {$value->vehicle_regis}, Province: {$value->province_name}, Model: {$value->car_model}, Insurance Type: {$value->insurance_type_name}, Payment Type: {$value->payment_type}, Sum Insured: {$value->sum_insured}, Insurance Price: {$value->insurance_price}, ACT Price: {$value->act_price}\n---------\n";
                // }
                // $messages['messages'][0] = $this->line->getFormatTextMessage($txt);
                
                
                foreach ($data as $key => $value) {
                    $follow = $value->folow_1 !== null ? $value->folow_1 : '-';
                    $insurance_type_name = $value->insurance_type_name !== null ? $value->insurance_type_name : '-';
                    $insurance_total = $value->insurance_price + $value->act_price;
                    $check_ins = ' ';
                    $check_act = ' ';
                    if ($value->insurance_end == $date_find) {
                        $check_ins = "- ประกันภัย";
                    }

                    if ($value->act_date_end == $date_find) {
                        $check_act = "- พรบ.";
                    }
                    if ($key == 2) {
                        $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow);
                        break;
                    }
                }
                
            }elseif ($text == '/house') {
                $txt_test = "ปีนี้ขอเสนอ ประกัน ป.2+ *รับอายุรถถึง35ปี(คุ้มครองซ่อมรถเรา รถคู่กรณี หาย ไฟไหม้)\nทุน 100,000 บ.\nคุ้มครองน้ำท่วม 10,000 บ.\nค่าประกัน 5,900 บ. (ไม่รวม พรบ.)\nผ่อน 0%\n✅บริการช่วยเหลือฉุกเฉิน รถสไลด์ 24 ชม.\n✅ฟรีบริการต่อภาษีประจำปี";
                $messages['messages'][0] = $this->line->getFormatTextMessage($txt_test);
            }elseif ($text == '/checkcar') {
                // $messages['messages'][0] = $this->line->getFormatTextMessage("ทดสอบประกันบ้าน");
                // $date_find = date('Y-m-d', strtotime('+2 months +1 day'));
                $date_find = "2025-05-13";
                $data = $this->broadcast->getCarCheckV2($date_find);
                // $data = $this->broadcast->getCarCheckV2();
                foreach ($data as $key => $value) {
                    if ($key == 4) {
                        $messages['messages'][0] = $this->line->setFlexMessageCarCheck($value,$date_find);
                        break;
                    }
                }
                // $txt = '';
                // foreach ($data as $key => $value) {
                //     $txt .= "cust_name: {$value->cust_name}, cust_telephone_1: {$value->cust_telephone_1}, vehicle_regis: {$value->vehicle_regis}, date_regist: {$value->date_regist}\n";
                // }
                // $messages['messages'][0] = $this->line->getFormatTextMessage($txt);
            }elseif ($text == '/logistic') {
                // $messages['messages'][0] = $this->line->getFormatTextMessage("ทดสอบประกันขนส่ง");
                // $date_find = date('Y-m-d', strtotime('+60 days'));
                $date_find = "2025-12-12";
                $data = $this->broadcast->getLogisticInsurance($date_find);
                // $txt = '';
                // foreach ($data as $key => $value) {
                //     $txt .= "Policy Number: {$value->policy_number}, Register: {$value->register}, Company: {$value->company_name}\n";
                // }
                // $messages['messages'][0] = $this->line->getFormatTextMessage($txt);
                foreach ($data as $key => $value) {
                    $follow = $value->folow_1 !== null ? $value->folow_1 : '-';
                    $messages['messages'][0] = $this->line->getFlexMessageLogistic($value->policy_number, $value->register, $value->company_name, $this->convertToBuddhistYear($date_find),$follow);
                    
                }
            }elseif ($text == '/installment') {
                // $date_find = date('Y-m-d', strtotime('+7 days'));
                // $data = $this->broadcast->getInstallment($date_find);
                // foreach ($data as $key => $value) {
                //     if ($key == 2) {
                //         $messages['to'] = 'U2b42ca0250eb7fd96ac4200e76f41188';
                //         $messages['messages'][0] = $this->line->getFormatFlexMessageInstallment($value->vehicle_regis,$value->province_name,$value->car_model,$value->period,$value->total_period,$value->amount,$this->convertToBuddhistYear($date_find),$value->bank_acc_name,$value->bank_name,$value->bank_acc_no);
                //         break;
                //     }
                // }
                // $encodeJson = json_encode($messages);
                // $results = $this->line->pushMessage($encodeJson);
                // return;
            } else {
                $sql = $this->reply->matchQuestions($text);
                $num = $sql->num_rows();
                if ($num > 0) {
                    $row = $sql->row();
                    if ($row->answer_type == 1) {
                        $messages['messages'][0] = $this->line->getFormatTextMessage($row->answer);
                    } else {
                        $messages['messages'][0] = $this->line->getFormatImgMessage($row->answer);
                    }
                }
            }
        }
        $encodeJson = json_encode($messages);
        $results = $this->line->replyMessage($encodeJson);
        
        http_response_code(200);
    }
}


// $jayParsedAry['contents']['body']['contents'][4]['contents'][5]['text']