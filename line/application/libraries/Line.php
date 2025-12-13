<?php
class Line
{
    protected $access_token = "NYlG5ZH8JHqedcnKF2SlLVp7Xi46tpFYGhqhGTWcdrJsdnieAC1/I3iaV48/tH+DWln7nRdCZG9NyjP1riulD+Y6JeZ4v4bxpLw6uXt8GfPOZSyOp9SUL5sJXL52YlSEcfZrVSuhMq6Q6I2+0i3rDgdB04t89/1O/w1cDnyilFU=";

    function LinkRichMenuMember($userId)
    {

        $channelAccessToken = $this->access_token; // Replace with your actual token

        // API URL
        $url = "https://api.line.me/v2/bot/user/$userId/richmenu/richmenu-33ff3ae4fd6616acec92352628f83404";

        // Initialize cURL
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $channelAccessToken",
            "Content-Length: 0" // No body required
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        // Execute request
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch); // Capture cURL errors

        // Close cURL
        curl_close($ch);

        $res = [];

        // Debugging
        if ($error) {
            $res['result'] = 'E';
            $res['message'] = $error;
        } elseif ($httpCode == 200) {
            $res['result'] = 'S';
            $res['message'] = 'Success';
        } else {
            $res['result'] = 'E';
            $res['message'] = $response;
        }

        return $res;

    }

    function UnlinkRichMenuMember($userId)
    {

        $channelAccessToken = $this->access_token; // Replace with your actual token

        // API URL
        $url = "https://api.line.me/v2/bot/user/$userId/richmenu";

        // Initialize cURL
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $channelAccessToken",
            "Content-Length: 0" // No body required
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        // Execute request
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch); // Capture cURL errors

        // Close cURL
        curl_close($ch);

        $res = [];

        // Debugging
        if ($error) {
            $res['result'] = 'E';
            $res['message'] = $error;
        } elseif ($httpCode == 200) {
            $res['result'] = 'S';
            $res['message'] = 'Success';
        } else {
            $res['result'] = 'E';
            $res['message'] = $response;
        }

        return $res;

    }

    function getFormatTextMessage($text)
    {
        $datas = [];
        $datas['type'] = 'text';
        $datas['text'] = $text;

        return $datas;
    }

    function getFormatImgMessage($text)
    {
        $datas = [];
        $url = base_url() . 'uploads/' . $text;
        $datas['type'] = 'image';
        $datas['originalContentUrl'] = $url;
        $datas['previewImageUrl'] = $url;

        return $datas;
    }

    function convertToBuddhistYear($date) {
        // แปลงวันที่เป็น DateTime object
        $datetime = new DateTime($date);
        
        // ดึงปีจากวันที่
        $year = $datetime->format('Y');

        $thaiMonthName = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $month = $thaiMonthName[ $datetime->format('m') -1 ];
        
        // เพิ่ม 543 ปีเพื่อแปลงเป็นพุทธศักราช
        $buddhistYear = $year + 543;
        
        // แสดงวันที่ในรูปแบบ พ.ศ. (วัน, เดือน, ปี)
        $formattedDate = $datetime->format('d '.$month.' ') . $buddhistYear;
        
        return $formattedDate;
    }


    function setFlexMessageCarCheck($arrBody,$date_find)
    {
        $cust_name = $arrBody->cust_name;
        $tel = $arrBody->cust_telephone_1;
        $car_code = $arrBody->vehicle_regis;
        $province_name = $arrBody->province_name;
        $car_brand = $arrBody->car_brand_name;
        // รุ่นรถ
        $car_model = '-';
        $date_end = null;
        $act_date_end = $arrBody->act_date_end;
        $date_registration_end = $arrBody->date_registration_end;
        if ($act_date_end == $date_find) {
            $date_end = $act_date_end; 
        } else if ($date_registration_end == $date_find) {
            $date_end = $date_registration_end;
        }
        $date_end = $this->convertToBuddhistYear($date_end);
        $tax_price = $arrBody->tax_price;
        $tax_service = $arrBody->tax_service;
        $car_check_price = $arrBody->car_check_price;
        $act_price = $arrBody->act_price;
        $is_act = false;
        $is_tax = false;
        $is_check_car = false;
        $num_of_amount_car_year = 0;
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

        if($act_date_end == $date_find && $date_registration_end == $date_find){
            $alert_message .= "|ACT";
            $alert_message .= "|TAX";
            $is_act = true;
            $is_tax = true;
        }else if($date_registration_end == $date_find){
            $is_tax = true;
            $alert_message .= "|TAX";
        }else if($act_date_end == $date_find){
            $is_act = true;
            $alert_message .= "|ACT";
        }else{
            $is_check_car = true;
            $alert_message .= "|CHECK";
        }




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
        $pushArray = $jayParsedAry['contents']['body']['contents'][4]['contents'];
        $pushFooterArray = $jayParsedAry['contents']['footer']['contents'];
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
            array_push($jayParsedAry['contents']['body']['contents'][4]['contents'],[
                "type" => "box",
                "layout" => "horizontal",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => "ค่าบริการต่อภาษี",
                        "size" => "sm",
                        "color" => "#000000",
                        "weight" => "bold"
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($tax_service, 2) . " บาท",
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

    function getFormatFlexMessage($car_code, $province_name, $car_model, $date_end, $ins, $act)
    {
        $url = "line://app/2006839693-nxy1B56w?carinfo=" . urlencode($car_code . " " . $province_name);
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
                            "text" => "ใบแจ้งต่ออายุ",
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
                                            "text" => $car_code,
                                            "size" => "lg",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $province_name,
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
                                            "size" => "sm",
                                            "color" => "#555555",
                                            "text" => " "
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_model,
                                            "size" => "md",
                                            "color" => "#111111",
                                            "align" => "end"
                                        ]
                                    ]
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
                                [
                                    "type" => "text",
                                    "text" => $ins,
                                    "size" => "lg",
                                    "color" => "#0500a2",
                                    "weight" => "bold",
                                    "margin" => "md",
                                    "align" => "start"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $act,
                                    "size" => "lg",
                                    "color" => "#0500a2",
                                    "weight" => "bold",
                                    "margin" => "none",
                                    "align" => "start"
                                ]
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
        // if (!empty($ins)) {
        //     // แก้ไขข้อความใน body
        //     $jayParsedAry['contents']['body']['contents'][4]['contents'][5]['text'] = "- ประกันภัย"; // แก้ไขข้อความใน field นี้
        // }
        // if (!empty($act)) {
        //     // แก้ไขข้อความใน body
        //     $jayParsedAry['contents']['body']['contents'][4]['contents'][6]['text'] = "- พรบ."; // แก้ไขข้อความใน field นี้
        // }        
        return $jayParsedAry;
    }

    function getFlexMessageRenew($car_code, $province_name, $car_model, $date_end, $ins, $act, $tax, $insurance_type_name, $payment_type, $sum_insured, $insurance_price, $act_price, $insurance_total, $follow, $company_name)
    {
        $url = "line://app/2006839693-nxy1B56w?carinfo=" . urlencode($car_code . " " . $province_name);
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
                            "text" => "ใบแจ้งต่ออายุ",
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
                                            "text" => $car_code,
                                            "size" => "lg",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $province_name,
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
                                            "size" => "sm",
                                            "color" => "#555555",
                                            "text" => " "
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_model,
                                            "size" => "md",
                                            "color" => "#111111",
                                            "align" => "end"
                                        ]
                                    ]
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
                                [
                                    "type" => "text",
                                    "text" => $ins." ".($company_name ? $company_name : ""),
                                    "size" => "lg",
                                    "color" => "#0500a2",
                                    "weight" => "bold",
                                    "margin" => "md",
                                    "align" => "start"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $act,
                                    "size" => "lg",
                                    "color" => "#0500a2",
                                    "weight" => "bold",
                                    "margin" => "none",
                                    "align" => "start"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $tax,
                                    "size" => "lg",
                                    "color" => "#0500a2",
                                    "weight" => "bold",
                                    "margin" => "none",
                                    "align" => "start"
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
                                ],
                                [
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
                                ],
                                [
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
                                //             "text" => $follow,
                                //             "size" => "sm",
                                //             "color" => "#111111",
                                //             "align" => "end"
                                //         ]
                                //     ],
                                //     "margin" => "md"
                                // ]
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
                        ],
                        [
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

    function getFormatFlexMessageInstallment($car_code, $province_name, $car_model, $period, $total_period, $amount, $date_find,$bank_acc_name,$bank_name,$bank_acc_no)
    {
        $date_now = date('d-m-Y') . " | " . date('H:i');
        $arrayVar = [
            "type" => "flex",
            "altText" => "แจ้งเตือนค่างวด",
            "contents" => [
                "type" => "bubble",
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "ใบแจ้งชำระ",
                            "weight" => "bold",
                            "color" => "#1DB446",
                            "size" => "sm",
                        ],
                        [
                            "type" => "text",
                            "text" => "ทรัพย์เจริญเซอร์วิส",
                            "weight" => "bold",
                            "size" => "xl",
                            "margin" => "md",
                        ],
                        [
                            "type" => "text",
                            "text" => "536 ถ.รัถการ ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา",
                            "size" => "xxs",
                            "color" => "#aaaaaa",
                            "wrap" => true,
                        ],
                        ["type" => "separator", "margin" => "xxl"],
                        [
                            "type" => "text",
                            "text" => "ข้อมูลรถ",
                            "weight" => "bold",
                            "color" => "#1DB446",
                            "size" => "sm",
                            "margin" => "lg",
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "lg",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => $car_code,
                                            "size" => "md",
                                            "color" => "#555555",
                                            "flex" => 0,
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $province_name,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "align" => "end",
                                        ],
                                    ],
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => " ",
                                            "size" => "sm",
                                            "color" => "#555555",
                                            "flex" => 0,
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $car_model,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "align" => "end",
                                        ],
                                    ],
                                ],
                                ["type" => "separator", "margin" => "lg"],
                                [
                                    "type" => "text",
                                    "text" => "ข้อมูลการชำระ",
                                    "weight" => "bold",
                                    "color" => "#0023bf",
                                    "size" => "sm",
                                    "margin" => "lg",
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "margin" => "lg",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "งวด",
                                            "size" => "sm",
                                            "color" => "#555555",
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $period . '/' . $total_period,
                                            "size" => "sm",
                                            "color" => "#0023bf",
                                            "align" => "end",
                                            "weight" => "bold",
                                        ],
                                    ],
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "เป็นเงิน",
                                            "size" => "sm",
                                            "color" => "#555555",
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => number_format($amount, 2) . " บาท",
                                            "size" => "sm",
                                            "color" => "#0023bf",
                                            "align" => "end",
                                            "weight" => "bold",
                                        ],
                                    ],
                                ],
                                ["type" => "separator", "margin" => "lg"],
                                [
                                    "type" => "text", 
                                    "text" => "โอนบัญชีชื่อ", 
                                    "weight" => "bold", 
                                    "color" => "#555555", 
                                    "size" => "sm", 
                                    "margin" => "lg", 
                                    "align" => "center" 
                                ], 
                                [
                                    "type" => "text", 
                                    "text" => $bank_acc_name, 
                                    "weight" => "bold", 
                                    "color" => "#0023bf", 
                                    "size" => "sm", 
                                    "margin" => "sm", 
                                    "align" => "center" 
                                ],
                                [
                                    "type" => "box", 
                                    "layout" => "horizontal", 
                                    "margin" => "lg", 
                                    "contents" => [
                                        [
                                            "type" => "text", 
                                            "text" => "ธนาคาร", 
                                            "size" => "sm", 
                                            "color" => "#555555" 
                                        ], 
                                        [
                                            "type" => "text", 
                                            "text" => $bank_name, 
                                            "size" => "sm", 
                                            "color" => "#0023bf", 
                                            "align" => "end", 
                                            "weight" => "bold" 
                                        ] 
                                    ] 
                                ], 
                                [
                                    "type" => "box", 
                                    "layout" => "horizontal", 
                                    "margin" => "sm", 
                                    "contents" => [
                                        [
                                            "type" => "text", 
                                            "text" => "เลขทีบัญชี", 
                                            "size" => "sm", 
                                            "color" => "#555555" 
                                        ], 
                                        [
                                            "type" => "text", 
                                            "text" => $bank_acc_no, 
                                            "size" => "sm", 
                                            "color" => "#0023bf", 
                                            "align" => "end", 
                                            "weight" => "bold" 
                                        ] 
                                    ] 
                                ],
                                ["type" => "separator", "margin" => "lg"], 
                                [
                                    "type" => "box",
                                    "layout" => "horizontal",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "วันครบกำหนดชำระ",
                                            "size" => "sm",
                                            "color" => "#d00410",
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $date_find,
                                            "size" => "sm",
                                            "color" => "#d00410",
                                            "align" => "end",
                                            "weight" => "bold",
                                        ],
                                    ],
                                    "margin" => "lg",
                                ],
                            ],
                        ],
                        ["type" => "separator", "margin" => "lg"],
                        [
                            "type" => "box",
                            "layout" => "horizontal",
                            "margin" => "md",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ข้อมูลวันที่",
                                    "size" => "xs",
                                    "color" => "#aaaaaa",
                                    "flex" => 0,
                                ],
                                [
                                    "type" => "text",
                                    "text" => $date_now,
                                    "color" => "#aaaaaa",
                                    "size" => "xs",
                                    "align" => "end",
                                ],
                            ],
                        ],
                    ],
                ],
                "styles" => ["footer" => ["separator" => true]],
            ],
        ];
        return $arrayVar;
    }

    function getFlexMessageLogistic($policy_number, $register, $company_name,$date_end,$follow)
    {
        $url = "tel:074244952";
        $arrayVar = [
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
                            "text" => "ใบแจ้งต่ออายุประกันขนส่ง",
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
                            "margin" => "xl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "lg",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "วันที่หมดอายุ :",
                                    "size" => "sm",
                                    "color" => "#555555",
                                    "flex" => 0,
                                    "weight" => "bold"
                                ],
                                [
                                    "type" => "text",
                                    "text" => $date_end,
                                    "color" => "#ee0c02",
                                    "size" => "md",
                                    "align" => "center",
                                    "weight" => "bold",
                                    "margin" => "md"
                                ]
                            ]
                        ],
                        [
                            "type" => "separator",
                            "margin" => "xl"
                        ],
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "margin" => "xl",
                            "spacing" => "sm",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "รายละเอียด",
                                    "weight" => "bold",
                                    "color" => "#0500a2",
                                    "size" => "md"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "vertical",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "กรมธรรม์เลขที่ :",
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $policy_number,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "align" => "center",
                                            "wrap" => true
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "vertical",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "ทะเบียนเลขที่ :",
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $register,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "align" => "center",
                                            "wrap" => true
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "vertical",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "บริษัทประกัน :",
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $company_name,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "align" => "center",
                                            "wrap" => true
                                        ]
                                    ],
                                    "margin" => "md"
                                ],
                                [
                                    "type" => "box",
                                    "layout" => "vertical",
                                    "contents" => [
                                        [
                                            "type" => "text",
                                            "text" => "โน๊ต :",
                                            "size" => "sm",
                                            "color" => "#000000",
                                            "weight" => "bold"
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $follow,
                                            "size" => "sm",
                                            "color" => "#111111",
                                            "wrap" => true
                                        ]
                                    ],
                                    "margin" => "md"
                                ]
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
                                "uri" => $url
                            ],
                            "style" => "primary",
                            "color" => "#0500a2"
                        ]
                    ]
                ],
                "styles" => [
                    "footer" => [
                        "separator" => true
                    ]
                ]
            ]
        ];
        return $arrayVar;
    }


    function replyMessage($encodeJson)
    {
        $datasReturn = [];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/message/reply",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encodeJson,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $this->access_token,
                "cache-control: no-cache",
                "content-type: application/json; charset=UTF-8",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $datasReturn['result'] = 'E';
            $datasReturn['message'] = $err;
        } else {
            if ($response == "{}") {
                $datasReturn['result'] = 'S';
                $datasReturn['message'] = 'Success';
            } else {
                $datasReturn['result'] = 'E';
                $datasReturn['message'] = $response;
            }
        }

        return $datasReturn;
    }

    function pushMessage($encodeJson)
    {
        $datasReturn = [];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encodeJson,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $this->access_token,
                "cache-control: no-cache",
                "content-type: application/json; charset=UTF-8",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $datasReturn['result'] = 'E';
            $datasReturn['message'] = $err;
        } else {
            if ($response == "{}") {
                $datasReturn['result'] = 'S';
                $datasReturn['message'] = 'Success';
            } else {
                $datasReturn['result'] = 'E';
                $datasReturn['message'] = $response;
            }
        }

        return $datasReturn;
    }
}

?>