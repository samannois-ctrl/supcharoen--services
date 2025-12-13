<?php
require_once APPPATH . 'controllers/MainController.php';
class BroadcastController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->load->model('BroadcastModel','broadcast');
        $this->load->library('line');
    }

    public function index(){
        $final = array();
        $date_find = date('Y-m-d', strtotime('+60 days'));
        $data = $this->broadcast->getAlertMonth($date_find);
        foreach($data as $key => $value){
            $final[$key] = (array) $value;
            $final[$key]['list'] = [];
            // $final[$key]['list']['INS'] = false;
            // $final[$key]['list']['ACT'] = false;
            $final[$key]['list']['INS'] = '';
            $final[$key]['list']['ACT'] = '';
            if($value->insurance_end == $date_find){
                // $final[$key]['list']['INS'] = true;
                $final[$key]['list']['INS'] = '- ประกันภัย';
            }

            if($value->act_date_end == $date_find){
                // $final[$key]['list']['ACT'] = true;
                $final[$key]['list']['ACT'] = '- พรบ.';
            }
        }
        echo '<pre>';
        print_r($final);
        echo '</pre>';
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function testAlertMonth($id){
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        // $data = $this->broadcast->getAlertMonth($$date_find);
        $data = $this->broadcast->get_valid_car_data($date_find);
        echo $date_find;
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAlertMonth(){
        // $date_find = date('Y-m-d', strtotime('+60 days'));
        $date_find = date('Y-m-d', strtotime('+2 months'));
        $data = $this->broadcast->getAlertMonth($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $file_path = FCPATH . 'uploads/month.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันรถ.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        // เปิดไฟล์เพื่อเขียน (ถ้าไม่มีไฟล์จะสร้างใหม่)
        $file = fopen($file_path, 'w');
        
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันรถ\n";
            $message .= "จำนวน " . count($data) . " รายการ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            foreach ($data as $key => $value) {
                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($key+1).". ".$value->vehicle_regis." ".$value->province_name." ".$icon;
                $message .= "\n บริษัท ".($value->company_name ? $value->company_name : '-');
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;
                // $message .= "\n 💬 ".$value->uid_line;
                    $check_ins = ' ';
                    $check_act = ' ';
                if($value->insurance_end == $date_find){
                    $message .= "\n ➤ ประกันภัย";
                    $check_ins = "- ประกันภัย";
                }
                
                if($value->act_date_end == $date_find){
                    $message .= "\n ➤ พรบ.";
                    $check_act = "- พรบ.";
                }

                $follow = $value->folow_1 !== null ? $value->folow_1 : '-';
                $insurance_total = $value->insurance_price + $value->act_price;

                if ($value->uid_line != null) {
                    $messages = [];
                    $messages['to'] = $value->uid_line;
                    $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $value->insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow, $value->company_name);
                    $encodeJson = json_encode($messages);
                    $results = $this->line->pushMessage($encodeJson);
                    echo json_encode($results);
                }

                

            }
            $notify = $this->sendTelegramNotify($message);
            echo json_encode($notify);
        } else {
            echo "Failed to create the file.";
        }
    }

    function getAlertMonthV2($id){
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        
        // $date_find = "2025-06-28";
        $data = $this->broadcast->getAlertMonthV2($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // exit($Data);
        $file_path = FCPATH . 'uploads/month.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันรถ.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        // เปิดไฟล์เพื่อเขียน (ถ้าไม่มีไฟล์จะสร้างใหม่)
        $file = fopen($file_path, 'w');
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันรถ\n";
            $message .= "จำนวน " . count($data) . " รายการ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            foreach ($data as $key => $value) {
                // $value->uid_line = "U2b42ca0250eb7fd96ac4200e76f41188";
                // $value->date_registration_end = "2025-06-28";
                // $date_find = "2025-06-28";


                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($key+1).". ".$value->vehicle_regis." ".$value->province_name." ".$icon;
                $message .= "\n บริษัท : ".($value->company_name ? $value->company_name : '-');
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;
                // $message .= "\n 💬 ".$value->uid_line;
                    $check_ins = ' ';
                    $check_act = ' ';
                if($value->insurance_end == $date_find){
                    $message .= "\n ➤ ประกันภัย";
                    $check_ins = "- ประกันภัย";
                }
                
                if($value->act_date_end == $date_find){
                    $message .= "\n ➤ พรบ.";
                    $check_act = "- พรบ.";
                }
                $date_registration_end = $value->date_registration_end;
                if($date_registration_end == $date_find){
                    $message .= "\n ➤ ภาษี";
                }
                $date_regist = $value->date_regist;
                if($date_regist != '-x-'){
                    $num_of_amount_car_year = date_diff(date_create($date_regist), date_create())->y;
                    if($num_of_amount_car_year > 7){
                        $message .= "\n ➤ ตรวจสภาพรถ";
                    }
                }
                // $follow = $value->folow_1 !== null ? $value->folow_1 : '-';
                // $insurance_total = $value->insurance_price + $value->act_price;

                if ($value->uid_line != null) {
                    $messages = [];
                    $messages['to'] = $value->uid_line;
                    $messages['messages'][0] = $this->setFlexMessageRenew($value,$date_find);

                    if ($value->insurance_type_name == 'ป.3+' || $value->insurance_type_name == 'ป.3') {
                        $msg_noti = "ปีนี้ขอเสนอ ประกัน ป.2+ *รับอายุรถถึง35ปี(คุ้มครองซ่อมรถเรา รถคู่กรณี หาย ไฟไหม้)\nทุน 100,000 บ.\nคุ้มครองน้ำท่วม 10,000 บ.\nค่าประกัน 5,900 บ. (ไม่รวม พรบ.)\nผ่อน 0%\n✅บริการช่วยเหลือฉุกเฉิน รถสไลด์ 24 ชม.\n✅ฟรีบริการต่อภาษีประจำปี";
                        $messages['messages'][1] = $this->line->getFormatTextMessage($msg_noti);
                    }
                    // $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $value->insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow);
                    $encodeJson = json_encode($messages);
                    // echo json_encode($encodeJson);
                    // exit($encodeJson);
                    $results = $this->line->pushMessage($encodeJson);
                    echo json_encode($results);
                    // exit(json_encode($results));
                } 

                

            }
            // echo json_encode($checkArrayData);
            $notify = $this->sendTelegramNotify($message);
            echo json_encode($notify);
        } else {
            echo "Failed to create the file.";
        }
    }

    private function setFlexMessageRenew($arrBody,$date_find)
    {
        // $car_code, $province_name, $car_model, $date_end, $ins, $act, $tax, $insurance_type_name, $payment_type, $sum_insured, $insurance_price, $act_price, $insurance_total, $follow
        $car_code = $arrBody->vehicle_regis;
        $province_name = $arrBody->province_name;
        $car_brand = $arrBody->car_brand_name;
        $car_model = $arrBody->car_model;
        $date_regist = $arrBody->date_regist;
        $insurance_end = $arrBody->insurance_end;
        $act_date_end = $arrBody->act_date_end;
        $date_registration_end = $arrBody->date_registration_end;
        $date_end = null;
        if ($insurance_end == $date_find) {
            $date_end = $insurance_end;
        } else if ($act_date_end == $date_find) {
            $date_end = $act_date_end; 
        } else if ($date_registration_end == $date_find) {
            $date_end = $date_registration_end;
        }
        $date_end = $this->convertToBuddhistYear($date_end);
        $company = ($arrBody->company_name) ? $arrBody->company_name : '';
        $insurance_type_name = $arrBody->insurance_type_name;
        $payment_type = $arrBody->payment_type;
        $sum_insured = $arrBody->sum_insured;
        $insurance_price = $arrBody->insurance_price;
        $act_price = $arrBody->act_price;
        $insurance_total = $arrBody->insurance_total;
        $tax_price = $arrBody->tax_price;
        $car_check_price = $arrBody->car_check_price;
        // $follow = $arrBody->follow;
        $follow = $arrBody->follow_to_customer;
        $is_insurance = false;
        $is_act = false;
        $is_tax = false;
        $is_check_car = false;
        $num_of_amount_car_year = 0;
        $cust_name = $arrBody->cust_name;
        $tel = $arrBody->cust_telephone_1;
        // Check if all dates are equal (not null and same value)
        $alert_message = "";
        $alert_message = "MSJ";
        $alert_message .= "|NM";
        $alert_message .= "|".$cust_name;
        $alert_message .= "|TEL";
        $alert_message .= "|".$tel;
        $alert_message .= "|PLT";
        $alert_message .= "|".$car_code." ".$province_name;
        $alert_message .= "|BRD";
        $alert_message .= "|".$car_brand." ".$car_model;
        $alert_message .= "|INTS";
        if ($insurance_end && $act_date_end && $date_registration_end && 
            $insurance_end == $date_find && $act_date_end == $date_find && $date_registration_end == $date_find) {
            $is_insurance = true;
            $is_act = true;
            $is_tax = true;
            $alert_message .= "|INS";
            $alert_message .= "|ACT";
            $alert_message .= "|TAX";
            if($date_regist != '-x-'){
                $num_of_amount_car_year = date_diff(date_create($date_regist), date_create())->y;
                if($num_of_amount_car_year > 7){
                    $is_check_car = true;
                    $alert_message .= "|CHCK";
                }
            }
        } else if($insurance_end && $act_date_end && 
            $insurance_end == $date_find && $act_date_end == $date_find){
            $is_insurance = true;
            $is_act = true;
            $alert_message .= "|INS";
            $alert_message .= "|ACT";
        } else if($insurance_end && $insurance_end == $date_find) {
            $is_insurance = true;
            $alert_message .= "|INS";
        } else if($act_date_end && $act_date_end == $date_find){
            $is_act = true;
            $alert_message .= "|ACT";
        }else {
            $is_tax = true;
            $alert_message .= "|TAX";
            if($date_regist != '-x-'){
                $num_of_amount_car_year = date_diff(date_create($date_regist), date_create())->y;
                if($num_of_amount_car_year > 7){
                    $is_check_car = true;
                    $alert_message .= "|CHCK";
                }
            }
        }
        // $url = "line://app/2006839693-nxy1B56w?carinfo=" . urlencode($car_code . " " . $province_name);
        $url = "line://app/2006839693-nxy1B56w?carinfo=".base64_encode(urlencode($alert_message));
        $jayParsedAry = [
            "type" => "flex",
            "altText" => "แจ้งต่ออายุ",
            "contents" => [
                "type" => "bubble",
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "วันสิ้นสุดกรมธรรม์",
                            "weight" => "bold",
                            "color" => "#0500a2",
                            "size" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "ทรัพย์เจริญเซอร์วิส",
                            "weight" => "bold",
                            "size" => "xl",
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา",
                            "size" => "xxs",
                            "color" => "#aaaaaa",
                            "wrap" => true
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "xxl",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ข้อมูลรถ",
                                    "size" => "sm",
                                    "color" => "#0500a2",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "ทะเบียนรถ",
                                            "size" => "md",
                                            "color" => "#000000",
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_code." ".$province_name,
                                            "size" => "md",
                                            "color" => "#111111",
                                            "align" => "end"
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "ยี่ห้อรถ",
                                            "size" => "sm",
                                            "color" => "#555555"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_brand." ".$car_model,
                                            "size" => "md",
                                            "color" => "#111111",
                                            "align" => "end"
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "separator",
                                    "margin" => "xxl"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "วันที่หมดอายุ",
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $date_end,
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "align" => "end",
                                            "weight" => "bold"
                                        ]
                                    ],
                                    "margin" => "xl"
                                ],
                            ]
                        ]
                    ]
                ],
                "footer" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "button",
                            "action" => [
                                "type" => "uri",
                                "label" => "สนใจต่ออายุ",
                                "uri" => $url,
                            ],
                            "style" => "primary",
                            "color" => "#0d02ee"
                        ]
                    ]
                ],
                "styles" => [
                    "header" => [
                        "backgroundColor" => "#0440fa"
                    ],
                    "footer" => [
                        "separator" => true
                    ]
                ]
            ]
        ];
        // $pushArray = $jayParsedAry['contents']['body']['contents']['contents'];
        $pushArray = $jayParsedAry['contents']['body']['contents'][4]['contents'];
        $pushFooterArray = $jayParsedAry['contents']['footer']['contents'];
        if($is_insurance){
            $item = [
                "type" => "text",
                "text" => "- ประกันภัย",
                "size" => "lg",
                "color" => "#0500a2",
                "weight" => "bold",
                "margin" => "md",
                "align" => "start"
            ];
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'], $item);
            array_push($jayParsedAry['contents']['footer']['contents'], [
                "type" => "text",
                "text" => "หมายเหตุ :-",
                "size" => "xs",
                "color" => "#111111",
                "margin" => "xl",
                "weight" => "bold",
                "wrap" => true
            ],
            [
                "type" => "text",
                "text" => "   ในการแจ้งต่ออายุกรมธรรม์ ขอให้รถยังคงอยู่ในสภาพเดิมตามที่ได้ถ่ายรูปไว้ตอนทำประกัน หากมีการตกแต่งหรือเปลี่ยนแปลงใด ๆ กรุณาถ่ายรูปในส่วนที่มีการแก้ไขเพิ่มเติมและแจ้งมาเป็นข้อความ เพื่อให้ความคุ้มครองสอดคล้องกับสภาพรถปัจจุบันค่ะ",
                "size" => "xs",
                "color" => "#111111",
                "wrap" => true
            ]);
        }
        if($is_act){
            $item = [
                "type" => "text",
                "text" => "- พรบ.",
                "size" => "lg",
                "color" => "#0500a2",
                "weight" => "bold",
                "margin" => "md",
                "align" => "start"
            ];
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'], $item);
        }
        if($is_tax){
            $item = [
                "type" => "text",
                "text" => "- ภาษี",
                "size" => "lg",
                "color" => "#0500a2",
                "weight" => "bold",
                "margin" => "md",
                "align" => "start"
            ];
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'], $item);
        }
        if($is_check_car){
            $item = [
                "type" => "text",
                "text" => "- ตรวจสภาพรถ",
                "size" => "lg",
                "color" => "#0500a2",
                "weight" => "bold",
                "margin" => "md",
                "align" => "start"
            ];
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'], $item);
        }
        
        array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
            "type" => "separator",
            "margin" => "xxl"
        ],
        [
            "type" => "text",
            "text" => "รายละเอียด",
            "size" => "sm",
            "color" => "#0500a2",
            "weight" => "bold",
            "margin" => "xl"
        ]);
        if($is_insurance){
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],
            [
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "บริษัทประกัน",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => $company,
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ],
            [
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ประเภทประกัน",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => $insurance_type_name,
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ],
            [
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ประเภทชำระเงิน",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => $payment_type,
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ],
            [
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ทุน",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($sum_insured, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ],
            [
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "เบี้ยกรมธรรม์รวม",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($insurance_price, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ]);
        }
        if($is_act){
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "เบี้ย พ.ร.บ. รวม",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($act_price, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ]);
        }
        if($is_insurance){
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "เบี้ยรวมทั้งหมด",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($insurance_total, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ],
            [
                "type" => "text",
                "text" => "โน๊ตติดตาม",
                "size" => "sm",
                "color" => "#000000",
                "weight" => "bold",
                "margin" => "sm"
            ],
            [
                "type" => "text",
                "text" => ($follow !== null) ? $follow : '-',
                "size" => "sm",
                "color" => "#000000",
                "weight" => "bold",
                "wrap" => true,
                "margin" => "sm"
            ]
            // [
            //     "type" => "box",
            //     "layout" => "horizontal",
            //     "contents" => [
            //         [
            //             "type" => "text",
            //             "text" => "โน๊ตติดตาม",
            //             "size" => "sm",
            //             "color" => "#000000",
            //             "weight" => "bold"
            //         ],
            //         [
            //             "type" => "text",
            //             "text" => ($follow !== null) ? $follow : '-',
            //             "size" => "sm",
            //             "color" => "#111111",
            //             "align" => "end"
            //         ]
            //     ],
            //     "margin" => "md"
            // ]
        );
        }
        if($is_tax){
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ค่าภาษี",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($tax_price, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ]);
        }
        if($is_check_car){
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ค่าตรวจสภาพ",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($car_check_price, 2) . " บาท",
                        "size" => "sm",
                        "color" => "#111111",
                        "align" => "end"
                    ]
                ],
                "margin" => "md"
            ]);
        }
        return $jayParsedAry;
    }

    public function getAlertMonthTransport($id) {
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        // $date_find = "2025-12-12";
        $data = $this->broadcast->notifyInsuranceTransport($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // exit($Data);
        $file_path = FCPATH . 'uploads/month.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันขนส่ง.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        $file = fopen($file_path, 'w');
        $checkArrayData = [];
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันขนส่ง\n";
            $message .= "จำนวน " . count($data) . " รายการ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            foreach ($data as $key => $value) {
                // $value->uid_line = "U2b42ca0250eb7fd96ac4200e76f41188";
                // $value->date_registration_end = "2025-06-28";
                // $date_find = "2025-12-04";


                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($key+1).". ".$value->registration_number." ".$icon;
                $message .= "\n บริษัท : ".($value->company_name ? $value->company_name : '-');
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;

                if ($value->uid_line != null) {
                    $messages = [];
                    $messages['to'] = $value->uid_line;
                    $messages['messages'][0] = $this->setFlexMessageRenewTransport($value,$date_find);
                    // array_push($checkArrayData,$messages);
                    // $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $value->insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow);
                    $encodeJson = json_encode($messages);
                    // echo json_encode($encodeJson);
                    // exit($encodeJson);
                    $results = $this->line->pushMessage($encodeJson);
                    // echo json_encode($results);
                    // exit(json_encode($results));
                }

                

            }
            // echo json_encode($checkArrayData);
            $notify = $this->sendTelegramNotify($message);
            // echo json_encode($notify);
        } else {
            echo "Failed to create the file.";
        }
    }

    private function setFlexMessageRenewTransport($arrBody,$method){
        $car_code = $arrBody->registration_number;
        $insurance_end = $arrBody->insurance_end;
        $date_end = $this->convertToBuddhistYear($insurance_end);
        $payment_type = $arrBody->payment_type;
        $sum_insured = $arrBody->sum_insured;
        $insurance_price = $arrBody->total_price;
        // $follow = $arrBody->follow;
        $follow = $arrBody->follow_to_customer;
        $cust_name = $arrBody->cust_name;
        $tel = $arrBody->cust_telephone_1;

        $company = ($arrBody->company_name) ? $arrBody->company_name : '';
        
        $alert_message = "TSP";
        $alert_message .= "|".$cust_name;
        $alert_message .= "|TEL";
        $alert_message .= "|".$tel;
        $alert_message .= "|PLT";
        $alert_message .= "|".$car_code;

        $url = "line://app/2006839693-nxy1B56w?carinfo=".base64_encode(urlencode($alert_message));
        $jayParsedAry = [
            "type" => "flex",
            "altText" => "แจ้งต่ออายุประกันขนส่ง",
            "contents" => [
                "type" => "bubble",
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "วันสิ้นสุดกรมธรรม์ ประกันขนส่ง",
                            "weight" => "bold",
                            "color" => "#0500a2",
                            "size" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "ทรัพย์เจริญเซอร์วิส",
                            "weight" => "bold",
                            "size" => "xl",
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา",
                            "size" => "xxs",
                            "color" => "#aaaaaa",
                            "wrap" => true
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "xxl",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ข้อมูลรถ",
                                    "size" => "sm",
                                    "color" => "#0500a2",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "ทะเบียนรถ",
                                            "size" => "md",
                                            "color" => "#000000",
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_code,
                                            "size" => "md",
                                            "color" => "#111111",
                                            "align" => "end"
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "separator",
                                    "margin" => "xxl"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "วันที่หมดอายุ",
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $date_end,
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "align" => "end",
                                            "weight" => "bold"
                                        ]
                                    ],
                                    "margin" => "xl"
                                ],
                            ]
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "text",
                            "text" => "รายละเอียด",
                            "size" => "sm",
                            "color" => "#0500a2",
                            "weight" => "bold",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "บริษัทประกัน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $company,
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ประเภทชำระเงิน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $payment_type,
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ทุน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($sum_insured, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "เบี้ยกรมธรรม์รวม",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($insurance_price, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "โน๊ตติดตาม",
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "margin" => "sm"
                        ],
                        [
                            "type" => "text",
                            "text" => ($follow !== null) ? $follow : '-',
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "wrap" => true,
                            "margin" => "sm"
                        ]
                        // [
                        //     "type" => "box",
                        //     "layout" => "horizontal",
                        //     "contents" => [
                        //         [
                        //             "type" => "text",
                        //             "text" => "โน๊ตติดตาม",
                        //             "size" => "sm",
                        //             "color" => "#000000",
                        //             "weight" => "bold"
                        //         ],
                        //         [
                        //             "type" => "text",
                        //             "text" => ($follow !== null) ? $follow : '-',
                        //             "size" => "sm",
                        //             "color" => "#111111",
                        //             "align" => "end"
                        //         ]
                        //     ],
                        //     "margin" => "md"
                        // ]
                    ]
                ],
                "footer" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "button",
                            "action" => [
                                "type" => "uri",
                                "label" => "สนใจต่ออายุ",
                                "uri" => $url,
                            ],
                            "style" => "primary",
                            "color" => "#0d02ee"
                        ]
                    ]
                ],
                "styles" => [
                    "header" => [
                        "backgroundColor" => "#0440fa"
                    ],
                    "footer" => [
                        "separator" => true
                    ]
                ]
            ]
        ];
        return $jayParsedAry;
    }

    public function getAlertMonthAccident($id) {
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        // $date_find = "2025-05-08";
        $data = $this->broadcast->notifyInsuranceAccident($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // exit($Data);
        $file_path = FCPATH . 'uploads/month.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันอุบัติเหตุ.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        $file = fopen($file_path, 'w');
        $checkArrayData = [];
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันอุบัติเหตุ\n";
            $message .= "จำนวน " . count($data) . " รายการ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            foreach ($data as $key => $value) {
                // $value->uid_line = "U2b42ca0250eb7fd96ac4200e76f41188";
                // $value->date_registration_end = "2025-06-28";
                // $date_find = "2025-06-28";


                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($key+1).$icon;
                $message .= "\n บริษัท ".($value->company_name ? $value->company_name : '-');
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;

                if ($value->uid_line != null) {
                    $messages = [];
                    $messages['to'] = $value->uid_line;
                    $messages['messages'][0] = $this->setFlexMessageRenewAccident($value,1);
                    // array_push($checkArrayData,$messages);
                    // $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $value->insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow);
                    $encodeJson = json_encode($messages);
                    // echo json_encode($encodeJson);
                    // exit($encodeJson);
                    $results = $this->line->pushMessage($encodeJson);
                    // echo json_encode($results);
                    // exit(json_encode($results));
                }

                

            }
            // echo json_encode($checkArrayData);
            $notify = $this->sendTelegramNotify($message);
            // echo json_encode($notify);
        } else {
            echo "Failed to create the file.";
        }
    }

    private function setFlexMessageRenewAccident($arrBody,$method){
        $insurance_end = $arrBody->insurance_end;
        $date_end = $this->convertToBuddhistYear($insurance_end);
        $payment_type = $arrBody->payment_type;
        $sum_insured = $arrBody->sum_insured;
        $insurance_price = $arrBody->total_price;
        // $follow = $arrBody->follow;
        $follow = $arrBody->follow_to_customer;
        $cust_name = $arrBody->cust_name;
        $tel = $arrBody->cust_telephone_1;

        $company = ($arrBody->company_name) ? $arrBody->company_name : '';

        $alert_message = "ACD";
        $alert_message .= "|".$cust_name;
        $alert_message .= "|TEL";
        $alert_message .= "|".$tel;
        $url = "line://app/2006839693-nxy1B56w?carinfo=".base64_encode(urlencode($alert_message));
        $jayParsedAry = [
            "type" => "flex",
            "altText" => "แจ้งต่ออายุประกันอุบัติเหตุ",
            "contents" => [
                "type" => "bubble",
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "วันสิ้นสุดกรมธรรม์ ประกันอุบัติเหตุ",
                            "weight" => "bold",
                            "color" => "#0500a2",
                            "size" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "ทรัพย์เจริญเซอร์วิส",
                            "weight" => "bold",
                            "size" => "xl",
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา",
                            "size" => "xxs",
                            "color" => "#aaaaaa",
                            "wrap" => true
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "sm",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "ชื่อ-นามสกุล",
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $cust_name,
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "align" => "end",
                                            "weight" => "bold"
                                        ]
                                    ],
                                    "margin" => "xl"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "วันที่หมดอายุ",
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $date_end,
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "align" => "end",
                                            "weight" => "bold"
                                        ]
                                    ],
                                    "margin" => "xl"
                                ],
                            ]
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "text",
                            "text" => "รายละเอียด",
                            "size" => "sm",
                            "color" => "#0500a2",
                            "weight" => "bold",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "บริษัทประกัน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $company,
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ประเภทชำระเงิน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $payment_type,
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ทุน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($sum_insured, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "เบี้ยกรมธรรม์รวม",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($insurance_price, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "โน๊ตติดตาม",
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "margin" => "sm"
                        ],
                        [
                            "type" => "text",
                            "text" => ($follow !== null) ? $follow : '-',
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "wrap" => true,
                            "margin" => "sm"
                        ]
                        // [
                        //     "type" => "box",
                        //     "layout" => "horizontal",
                        //     "contents" => [
                        //         [
                        //             "type" => "text",
                        //             "text" => "โน๊ตติดตาม",
                        //             "size" => "sm",
                        //             "color" => "#000000",
                        //             "weight" => "bold"
                        //         ],
                        //         [
                        //             "type" => "text",
                        //             "text" => ($follow !== null) ? $follow : '-',
                        //             "size" => "sm",
                        //             "color" => "#111111",
                        //             "align" => "end"
                        //         ]
                        //     ],
                        //     "margin" => "md"
                        // ]
                    ]
                ],
                "footer" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "button",
                            "action" => [
                                "type" => "uri",
                                "label" => "สนใจต่ออายุ",
                                "uri" => $url,
                            ],
                            "style" => "primary",
                            "color" => "#0d02ee"
                        ]
                    ]
                ],
                "styles" => [
                    "header" => [
                        "backgroundColor" => "#0440fa"
                    ],
                    "footer" => [
                        "separator" => true
                    ]
                ]
            ]
        ];
        return $jayParsedAry;
    }

    public function getAlertMonthHome($id) {
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        // $date_find = "2025-05-22";
        $data = $this->broadcast->notifyInsuranceHome($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // exit($Data);
        $file_path = FCPATH . 'uploads/month.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันอัคคีภัย.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        $file = fopen($file_path, 'w');
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันอัคคีภัย\n";
            $message .= "จำนวน " . count($data) . " รายการ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            foreach ($data as $key => $value) {
                // $value->uid_line = "U2b42ca0250eb7fd96ac4200e76f41188";
                // $value->date_registration_end = "2025-06-28";
                // $date_find = "2025-06-28";


                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($key+1).$icon;
                $message .= "\n บริษัท ".($value->company_name ? $value->company_name : '-');
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;
                $message .= "\n สถานที่ ".$value->location_insured;

                if ($value->uid_line != null) {
                    $messages = [];
                    $messages['to'] = $value->uid_line;
                    $messages['messages'][0] = $this->setFlexMessageRenewHome($value,1);
                    // $messages['messages'][0] = $this->line->getFlexMessageRenew($value->vehicle_regis, $value->province_name, $value->car_model, $this->convertToBuddhistYear($date_find), $check_ins, $check_act, $value->insurance_type_name, $value->payment_type, $value->sum_insured, $value->insurance_price, $value->act_price, $insurance_total, $follow);
                    $encodeJson = json_encode($messages);
                    // echo json_encode($encodeJson);
                    // exit($encodeJson);
                    $results = $this->line->pushMessage($encodeJson);
                    // echo json_encode($results);
                    // exit(json_encode($results));
                }

                

            }
            // echo json_encode($checkArrayData);
            $notify = $this->sendTelegramNotify($message);
            // echo json_encode($notify);
        } else {
            echo "Failed to create the file.";
        }
    }

    public function setFlexMessageRenewHome($arrBody){
        $insurance_end = $arrBody->insurance_end;
        $date_end = $this->convertToBuddhistYear($insurance_end);
        // $payment_type = $arrBody->payment_type;
        $sum_insured = $arrBody->sum_insured;
        $insurance_price = $arrBody->total_price;
        // $follow = $arrBody->follow;
        $follow = $arrBody->follow_to_customer;
        $location_insured = $arrBody->location_insured;
        $cust_name = $arrBody->cust_name;
        $tel = $arrBody->cust_telephone_1;

        $company = ($arrBody->company_name) ? $arrBody->company_name : '';

        $alert_message = "HOME";
        $alert_message .= "|".$cust_name;
        $alert_message .= "|TEL";
        $alert_message .= "|".$tel;
        $alert_message .= "|ST";
        $alert_message .= "|".$location_insured;
        $url = "line://app/2006839693-nxy1B56w?carinfo=".base64_encode(urlencode($alert_message));
        $jayParsedAry = [
            "type" => "flex",
            "altText" => "แจ้งต่ออายุประกันอัคคีภัย",
            "contents" => [
                "type" => "bubble",
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "วันสิ้นสุดกรมธรรม์ ประกันอัคคีภัย",
                            "weight" => "bold",
                            "color" => "#0500a2",
                            "size" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "ทรัพย์เจริญเซอร์วิส",
                            "weight" => "bold",
                            "size" => "xl",
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา",
                            "size" => "xxs",
                            "color" => "#aaaaaa",
                            "wrap" => true
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "sm",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "วันที่หมดอายุ",
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $date_end,
                                            "size" => "sm",
                                            "color" => "#ee0c02",
                                            "align" => "end",
                                            "weight" => "bold"
                                        ]
                                    ],
                                    "margin" => "xl"
                                ],
                            ]
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xxl"
                        ],
                        [
                            "type" => "text",
                            "text" => "สถานที่เอาประกันภัย",
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "text",
                            "text" => $location_insured,
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "text",
                            "text" => "รายละเอียด",
                            "size" => "sm",
                            "color" => "#0500a2",
                            "weight" => "bold",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "บริษัทประกันภัย",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $company,
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ทุน",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($sum_insured, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "เบี้ยกรมธรรม์รวม",
                                    "size" => "sm",
                                    "color" => "#000000",
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($insurance_price, 2) . " บาท",
                                    "size" => "sm",
                                    "color" => "#111111",
                                    "align" => "end"
                                ]
                            ],
                            "margin" => "md"
                        ],
                        [
                            "type" => "text",
                            "text" => "โน๊ตติดตาม",
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "margin" => "sm"
                        ],
                        [
                            "type" => "text",
                            "text" => ($follow !== null) ? $follow : '-',
                            "size" => "sm",
                            "color" => "#000000",
                            "weight" => "bold",
                            "wrap" => true,
                            "margin" => "sm"
                        ]
                        // [
                        //     "type" => "box",
                        //     "layout" => "horizontal",
                        //     "contents" => [
                        //         [
                        //             "type" => "text",
                        //             "text" => "โน๊ตติดตาม",
                        //             "size" => "sm",
                        //             "color" => "#000000",
                        //             "weight" => "bold"
                        //         ],
                        //         [
                        //             "type" => "text",
                        //             "text" => ($follow) ? $follow : '-',
                        //             "size" => "sm",
                        //             "color" => "#111111",
                        //             "align" => "end"
                        //         ]
                        //     ],
                        //     "margin" => "md"
                        // ]
                    ]
                ],
                "footer" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "button",
                            "action" => [
                                "type" => "uri",
                                "label" => "สนใจต่ออายุ",
                                "uri" => $url,
                            ],
                            "style" => "primary",
                            "color" => "#0d02ee"
                        ]
                    ]
                ],
                "styles" => [
                    "header" => [
                        "backgroundColor" => "#0440fa"
                    ],
                    "footer" => [
                        "separator" => true
                    ]
                ]
            ]
        ];
        return $jayParsedAry;
    }

    public function notify_message_interested() {
        $message = $this->input->post('message');
        if($message == ""){
            return false;
        }
        $set_array = explode("|",$message);
        $new_message = "--- สนใจต่ออายุ ---";
        foreach ($set_array as $key => $value) {
            $checkText = $this->matchText($value);
            $new_message .= "\n".$checkText;
        }
        $array = array(
            'success' => true,
            'message' => $message,
            'new_message' => $new_message
        );
        $this->sendTelegramNotify($new_message);
        echo json_encode($array);
    }

    private function matchText($code) {
        $msgCode = [
            "MSJ" => "ประกันภัยภาคสมัครใจ",
            "TSP" => "ประกันขนส่ง",
            "ACD" => "ประกันอุบัติเหตุ",
            "HOME" => "ประกันอัคคีภัย",
            "NM" => "ชื่อ-นามสกุล: ",
            "TEL" => "เบอร์โทร: ",
            "PLT" => "ทะเบียนรถ: ",
            "BRD" => "ยี่ห้อรถ: ",
            "INTS" => "สนใจทำรายการ",
            "INS" => "- ประกันภัย",
            "ACT" => "- พรบ.",
            "TAX" => "- ภาษี",
            "CHCK" => "- ตรวจสภาพรถ",
            "ST" => "สถานที่ตั้งทรัพย์สิน"
        ];
    
        if (isset($msgCode[$code])) {
            return $msgCode[$code];
        } else {
            // Optionally, log an error here if needed
            return $code;
        }
    }

    public function getInstallments(){
        // $date_find = date('Y-m-d');
        $date_find = date('Y-m-d', strtotime('+7 days'));
        $data = $this->broadcast->getInstallment($date_find);

        // echo json_encode($data,JSON_PRETTY_PRINT);
        // exit();

        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $file_path = FCPATH . 'uploads/installment.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนค่างวด.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        // เปิดไฟล์เพื่อเขียน (ถ้าไม่มีไฟล์จะสร้างใหม่)
        $file = fopen($file_path, 'w');
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนค่างวด\n";
            if(count($data) > 0){
                $message .= "จำนวน " . count($data) . " รายการ\n";
                $message .= "วันที่ครบกำหนด " . $this->convertToBuddhistYear($date_find) . "\n";
                $message .= '====================';
                foreach ($data as $key => $value) {
                    $icon = $value->uid_line != null ? '✅' : '⚠️';
                    $message .= "\n".($key+1).". ".$value->vehicle_regis." ".$value->province_name." ".$icon;
                    $message .= "\n 👤 ".$value->cust_name;
                    $message .= "\n 📞 ".$value->cust_telephone_1;
                    // $message .= "\n 💬 ".$value->uid_line;
                    $message .= "\n 💰 งวด ".$value->period."/".$value->total_period;
                    $message .= "\n 💰 ค่างวด ".$value->amount." บาท";
                    $message .= "\n--------------------------\n";
                    if ($value->uid_line != null) {
                        $messages = [];
                        $messages['to'] = $value->uid_line;
                        $messages['messages'][0] = $this->line->getFormatFlexMessageInstallment($value->vehicle_regis,$value->province_name,$value->car_model,$value->period,$value->total_period,$value->amount,$this->convertToBuddhistYear($date_find),$value->bank_acc_name,$value->bank_name,$value->bank_acc_no);
                        $encodeJson = json_encode($messages);
                        $results = $this->line->pushMessage($encodeJson);
                        echo json_encode($results);
                    }
                }
                $notify_installment = $this->sendTelegramNotify($message);
                echo json_encode($notify_installment);
            } else {
                $message .= "ไม่มีรายการค่างวด";
            }
        } else {
            $message = "Failed to create the file.";
        }
        $notify = $this->testSendTelegramNotify($message);
        echo json_encode($notify,JSON_PRETTY_PRINT);
    }

    public function getAlertLogistic($id){
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        if ($id == 30) {
            $date_find = date('Y-m-d', strtotime('+30 days'));
        }

        if ($id == 15) {
            $date_find = date('Y-m-d', strtotime('+15 days'));
        }
        $data = $this->broadcast->getLogisticInsurance($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $file_path = FCPATH . 'uploads/logistic.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนต่ออายุประกันขนส่ง.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล
        // เปิดไฟล์เพื่อเขียน (ถ้าไม่มีไฟล์จะสร้างใหม่)
        $file = fopen($file_path, 'w');
        if ($file) {
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนต่ออายุประกันขนส่ง\n";
            if(count($data) > 0){
                $message .= "จำนวน " . count($data) . " รายการ\n";
                $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
                $message .= '====================';
                foreach ($data as $key => $value) {
                    $icon = $value->uid_line != null ? '✅' : '⚠️';
                    $message .= "\n".($key+1).". กรมธรรม์เลขที่ : ".$value->policy_number." ".$icon;
                    $message .= "\n บริษัท : ".$value->company_name;
                    $message .= "\n 👤 ".$value->cust_name;
                    $message .= "\n 📞 ".$value->tel1;
                    $message .= "\n 🏷️ ทะเบียนเลขที่ : ".$value->register;
                    $message .= "\n 🏢 บริษัทประกัน : ".$value->company_name;
                    $message .= "\n--------------------------\n";
                    
                    if ($value->uid_line != null) {
                        $follow = $value->folow_1 !== null ? $value->folow_1 : '-';
                        $messages = [];
                        $messages['to'] = $value->uid_line;
                        $messages['messages'][0] = $this->line->getFlexMessageLogistic($value->policy_number,$value->register,$value->company_name,$this->convertToBuddhistYear($date_find),$follow);
                        $encodeJson = json_encode($messages);
                        $results = $this->line->pushMessage($encodeJson);
                        echo json_encode($results);
                    }
                }
                $notify_logistic = $this->sendTelegramNotify($message);
                echo json_encode($notify_logistic);
            } else {
                $message .= "ไม่มีรายการประกันขนส่ง";
            }
        } else {
            $message = "Failed to create the file.";
        }
        $notify = $this->testSendTelegramNotify($message);
        echo json_encode($notify,JSON_PRETTY_PRINT);
    }

    public function getCheckCar(){
        // $date_find = date('Y-m-d', strtotime('+2 months'));
        $date_find = date('Y-m-d', strtotime('+45 days'));
        $data = $this->broadcast->getCarCheckV2($date_find);
        $Data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $file_path = FCPATH . 'uploads/car_check.txt'; // กำหนดพาธไฟล์
        $current_datetime = date('Y-m-d H:i:s'); // ดึงวันเวลาปัจจุบัน
        $content = "ไฟล์, รายการการแจ้งเตือนตรวจสภาพรถ.\n";
        $content .= "วันที่สร้างรายการ : " . $current_datetime . "\n"; // เพิ่มวันเวลา
        $content .= "ข้อมูล : " . $Data . "\n"; // เพิ่มข้อมูล

        $file = fopen($file_path, 'w');
        if($file){
            fwrite($file, $content); // เขียนข้อมูลลงไฟล์
            fclose($file); // ปิดไฟล์
            $message = "แจ้งเตือนตรวจสภาพรถ\n";
            $message .= "วันที่หมดอายุ " . $this->convertToBuddhistYear($date_find) . "\n";
            $message .= '====================';
            $i = 1;
            foreach ($data as $key => $value) {

                if ($value->act_date_end !== $date_find && $value->date_registration_end !== $date_find && strlen($value->date_regist) != 10) {
                    continue;
                    
                }

                if ($value->act_date_end !== $date_find && $value->date_registration_end !== $date_find && strlen($value->date_regist) == 10) {
                    $year_diff = date('Y', strtotime($date_find)) - ( date('Y', strtotime($value->date_regist)) - 543);
                    if ($year_diff < 8) {
                        continue;
                    }
                }
                $icon = $value->uid_line != null ? '✅' : '⚠️';
                $message .= "\n".($i).". ".$value->vehicle_regis." ".$value->province_name." ".$icon;
                $message .= "\n 👤 ".$value->cust_name;
                $message .= "\n 📞 ".$value->cust_telephone_1;
                // $message .= "\n 📆 ".$value->date_regist;
                if($value->act_date_end == $date_find){
                    $message .= "\n ➤ พรบ.";
                    $check_act = "- พรบ.";
                }

                if($value->date_registration_end == $date_find){
                    $message .= "\n ➤ ภาษี";
                    $check_tax = "- พรบ.";
                }

                if (strlen($value->date_regist) == 10) {
                    $year_diff = date('Y', strtotime($date_find)) - ( date('Y', strtotime($value->date_regist)) - 543);
                    $message .= "\n 🚘 อายุรถ ".$year_diff." ปี";
                    if ($year_diff > 7) {
                        $message .= "\n ➤ ตรวจสภาพรถ";
                        $check_car = "- ตรวจสภาพรถ.";
                    }
                }

                // แจ้งเตือน Flex Message Line
                // if ($value->uid_line != null) {
                //     $messages = [];
                //     $messages['to'] = $value->uid_line;
                //     $messages['messages'][0] = $this->line->setFlexMessageCarCheck($value,$date_find);
                //     $encodeJson = json_encode($messages);
                //     $results = $this->line->pushMessage($encodeJson);
                //     echo json_encode($results);
                // }

                $i++;
            }
            $message .= "\n====================";
            $message .= "\nจำนวน " . ($i-1) . " รายการ";

            // Send Telegram Notify
            $notify = $this->sendTelegramNotify($message);
            echo json_encode($notify);
        }else {
            echo "Failed to create the file.";
        }
    }
}

?>