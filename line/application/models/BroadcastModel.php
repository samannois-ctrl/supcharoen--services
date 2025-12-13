<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BroadcastModel extends CI_Model
{
    public function getAlertMonth($date)
    {
        $this->db->select('
            t_id.id,
            (SELECT company_name FROM tbl_insurance_company s_ic WHERE s_ic.id=t_id.corp_id) company_name,
            t_id.cust_name,
            t_id.cust_telephone_1,
            t_id.vehicle_regis,
            t_p.province_name,
            t_id.car_model,
            t_id.insurance_end,
            t_id.act_date_end,
            t_id.date_registration_end,
            IF(t_id.is_installment="0", "สด", "ผ่อน") AS payment_type,
            t_it.insurance_type_name,
            t_id.sum_insured,
            t_id.insurance_price,
            t_id.act_price,
            t_id.insurance_total,
            t_fuc.folow_1,
            (SELECT t_m.uid 
            FROM tb_members t_m 
            WHERE REPLACE(t_id.cust_telephone_1, "-", "") = t_m.phone_number) as uid_line
        ');
        $this->db->from('tbl_insurance_data t_id');
        $this->db->join('tbl_province t_p', 't_p.id = t_id.province_regis');
        $this->db->join('tbl_insurance_type t_it', 't_it.id = t_id.insurance_type_id', 'left');
        $this->db->join('tbl_follow_up_customer t_fuc', 't_fuc.work_id = t_id.id', 'left');
        $this->db->where('t_id.insurance_end', $date);
        $this->db->or_where('t_id.act_date_end', $date);
        // $this->db->or_where('t_id.date_registration_end', $date);
        $this->db->where_not_in('t_id.car_type_id', ['4', '0']);
        return $this->db->get()->result();
    }

    public function getAlertMonthV2($date)
    {
        // $date = date('Y-m-d', strtotime($date . ' -1 day'));
        // $date = "2025-06-28";
        $sql = "SELECT 
            t_id.id,
            (SELECT company_name FROM tbl_insurance_company s_ic WHERE s_ic.id=t_id.corp_id) company_name,
            t_id.cust_name,
            t_id.cust_telephone_1,
            t_id.vehicle_regis,
            t_p.province_name,
            t_cb.car_brand_name,
            t_id.car_model,
            IF(t_id.date_regist != '-x-', DATE_FORMAT(DATE_SUB(t_id.date_regist, INTERVAL 543 YEAR), '%Y-%m-%d'), t_id.date_regist) AS date_regist,
            t_id.insurance_end,
            t_id.act_date_end,
            t_id.date_registration_end,
            IF(t_id.is_installment='0', 'สด', 'ผ่อน') AS payment_type,
            t_it.insurance_type_name,
            t_fuc.sum_insured,
            t_fuc.insurance_price AS insurance_price,
            t_fuc.act_price,
            t_fuc.insurance_total AS insurance_total,
            t_fuc.folow_1 follow,
            t_id.note_to_customer follow_to_customer,
            (SELECT t_m.uid 
            FROM tb_members t_m 
            WHERE REPLACE(t_id.cust_telephone_1, '-', '') = t_m.phone_number) as uid_line,
            t_id.tax_price AS tax_price,
            t_id.car_check_price AS car_check_price
        FROM tbl_insurance_data t_id
        LEFT JOIN tbl_province t_p ON t_p.id = t_id.province_regis
        LEFT JOIN tbl_insurance_type t_it ON t_it.id = t_id.insurance_type_id
        LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_id.id
        LEFT JOIN tbl_car_brand t_cb ON t_id.brand_id = t_cb.id
        WHERE (t_id.insurance_end = ? OR t_id.act_date_end = ? OR t_id.date_registration_end = ?)
        AND t_id.car_type_id NOT IN ('4', '0')
        ";
        // is real
        // WHERE (t_id.insurance_end = ? OR t_id.act_date_end = ? OR t_id.date_registration_end = ?)
        // AND t_id.car_type_id NOT IN ('4', '0')

        // AND t_id.cust_telephone_1 = '0918477762'
        //0899757108 | 0968232351 | 095-6419845 | 0918477762

        return $this->db->query($sql, array($date, $date, $date))->result();

        // return $this->db->get()->result();
    }

    public function notifyInsuranceTransport($date)
    {
        // $sql = "SELECT 
        //     t_id.id,
        //     t_id.work_id,
        //     t_ic.company_name,
        //     t_id.policy_number,
        //     t_id.cust_name,
        //     t_main.cust_telephone_1,
        //     t_id.registration_number,
        //     t_id.insurance_start,
        //     t_id.insurance_end,
        //     t_fuc.sum_insured,
        //     t_fuc.insurance_price total_price,
        //     t_fuc.folow_1 follow,
        //     (SELECT t_m.uid 
        //     FROM tb_members t_m 
        //     WHERE REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number) as uid_line,
        //     IF(t_main.is_installment='0', 'สด', 'ผ่อน') AS payment_type
        // FROM tbl_insurance_shpping_data t_id
        // LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
        // LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
        // LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number
        // LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_id.work_id
        // WHERE t_id.insurance_end = '$date'";



        $sql = "
        SELECT
    id,
    work_id,
    company_name,
    policy_number,
    cust_name,
    cust_telephone_1,
    registration_number,
    insurance_start,
    insurance_end,
    follow_to_customer,
    sum_insured,
    total_price,
    follow,
    fuc_id,
    uid_line,
    payment_type
FROM (
    SELECT
        t_id.id,
        t_id.work_id,
        t_ic.company_name,
        t_id.policy_number,
        t_id.cust_name,
        t_main.cust_telephone_1,
        t_id.registration_number,
        t_id.insurance_start,
        t_id.insurance_end,
        t_id.note_to_customer AS follow_to_customer,
        t_fuc.sum_insured,
        t_fuc.insurance_price AS total_price,
        CONCAT(t_fuc.folow_1, ' ', t_fuc.folow_2, ' ' , t_fuc.folow_3, ' ', t_fuc.folow_4, ' ', t_fuc.folow_5 ) AS follow,
        t_fuc.id AS fuc_id,
        (SELECT t_m_sub.uid
         FROM tb_members t_m_sub
         WHERE REPLACE(t_main.cust_telephone_1, '-', '') = t_m_sub.phone_number) AS uid_line,
        IF(t_main.is_installment = '0', 'สด', 'ผ่อน') AS payment_type,
        ROW_NUMBER() OVER (PARTITION BY t_id.work_id ORDER BY t_fuc.id DESC) AS rn
    FROM tbl_insurance_shpping_data t_id
    LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
    LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
    -- This LEFT JOIN to tb_members might be redundant if uid_line is always from the subquery.
    -- If 't_m' is used elsewhere in the main SELECT, keep it. Otherwise, consider removing.
    LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number
    LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_id.work_id
    WHERE t_id.insurance_end = '$date'
) AS ranked_data
WHERE rn = 1
ORDER BY work_id; -- Optional: Order the final result by work_id for readability
        ";
        // is real
        // WHERE t_id.insurance_end = '$date'

        return $this->db->query($sql)->result();
    }

    public function notifyInsuranceAccident($date)
    {
        // $sql = "SELECT 
        //     t_id.id,
        //     t_id.work_id,
        //     t_ic.company_name,
        //     t_id.policy_number,
        //     t_id.cust_name,
        //     t_main.cust_telephone_1,
        //     t_id.insurance_start,
        //     t_id.insurance_end,
        //     t_fuc.sum_insured,
        //     t_fuc.insurance_price total_price,
        //     t_fuc.folow_1 follow,
        //     (SELECT t_m.uid 
        //     FROM tb_members t_m 
        //     WHERE REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number) as uid_line,
        //     IF(t_main.is_installment='0', 'สด', 'ผ่อน') AS payment_type
        // FROM tbl_insurance_accident_data t_id
        // LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
        // LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
        // LEFT JOIN tb_members t_m ON REPLACE(t_main.cust_telephone_1, '-', '') = t_m.phone_number
        // LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_id.id
        // WHERE t_id.insurance_end = '$date'";


        $sql = "
        SELECT
    id,
    work_id,
    company_name,
    policy_number,
    cust_name,
    cust_telephone_1,
    insurance_start,
    insurance_end,
    follow_to_customer,
    sum_insured,
    total_price,
    follow,
    fuc_id,
    uid_line,
    payment_type
FROM (
    SELECT
        t_id.id,
        t_id.work_id,
        t_ic.company_name,
        t_id.policy_number,
        t_id.cust_name,
        t_main.cust_telephone_1,
        t_id.insurance_start,
        t_id.insurance_end,
        t_id.note_to_customer AS follow_to_customer,
        t_fuc.sum_insured,
        t_fuc.insurance_price AS total_price,
     CONCAT(t_fuc.folow_1, ' ', t_fuc.folow_2, ' ' , t_fuc.folow_3, ' ', t_fuc.folow_4, ' ', t_fuc.folow_5 ) AS follow,
        t_fuc.id AS fuc_id,
        (SELECT t_m_sub.uid
         FROM tb_members t_m_sub
         WHERE REPLACE(t_main.cust_telephone_1, '-', '') = t_m_sub.phone_number) AS uid_line,
        IF(t_main.is_installment = '0', 'สด', 'ผ่อน') AS payment_type,
        ROW_NUMBER() OVER (PARTITION BY t_id.work_id ORDER BY t_fuc.id DESC) AS rn
    FROM tbl_insurance_accident_data t_id
    LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
    LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
    -- Removed the direct LEFT JOIN to tb_members here as it's handled in the subquery for uid_line
    LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_id.work_id
    WHERE t_id.insurance_end = '$date'
) AS ranked_data
WHERE rn = 1
ORDER BY work_id
        ";






        // is real
        // WHERE t_id.insurance_end = '$date'
        return $this->db->query($sql)->result();
    }

    public function notifyInsuranceHome($date)
    {
        // $sql = "SELECT 
        //     t_id.id,
        //     t_id.work_id,
        //     t_ic.company_name,
        //     t_id.policy_number,
        //     t_id.cust_name,
        //     t_id.tel1 cust_telephone_1,
        //     t_id.insurance_start,
        //     t_id.insurance_end,
        //     t_id.insurance_limit insurance_limit,
        //     t_id.total_price total_price,
        //     t_id.location_insured,
        //     t_fuc.sum_insured,
        //     t_fuc.insurance_price total_price,
        //     t_fuc.folow_1 follow,
        //     (SELECT t_m.uid 
        //     FROM tb_members t_m 
        //     WHERE REPLACE(t_id.tel1, '-', '') = t_m.phone_number) as uid_line
        // FROM tbl_insurance_home_data t_id
        // LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
        // LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
        // LEFT JOIN tb_members t_m ON REPLACE(t_id.tel1, '-', '') = t_m.phone_number
        // LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_main.id
        // WHERE t_id.insurance_end = '$date'";


        $sql = "
        SELECT
    id,
    work_id,
    company_name,
    policy_number,
    cust_name,
    cust_telephone_1,
    insurance_start,
    insurance_end,
    follow_to_customer,
    insurance_limit,
    total_price,
    location_insured,
    sum_insured,
    follow,
    fuc_id,
    uid_line
FROM (
    SELECT
        t_id.id,
        t_id.work_id,
        t_ic.company_name,
        t_id.policy_number,
        t_id.cust_name,
        t_id.tel1 AS cust_telephone_1, -- Using t_id.tel1 as requested
        t_id.insurance_start,
        t_id.insurance_end,
        t_id.note_to_customer AS follow_to_customer,
        t_id.insurance_limit,
        -- t_id.total_price, -- Removed or renamed to avoid ambiguity with t_fuc.insurance_price
        t_id.location_insured,
        t_fuc.sum_insured,
        t_fuc.insurance_price AS total_price, -- Chosen for total_price, adjust if needed
        CONCAT(t_fuc.folow_1, ' ', t_fuc.folow_2, ' ' , t_fuc.folow_3, ' ', t_fuc.folow_4, ' ', t_fuc.folow_5 ) AS follow,
        t_fuc.id AS fuc_id,
        (SELECT t_m_sub.uid
         FROM tb_members t_m_sub
         WHERE REPLACE(t_id.tel1, '-', '') = t_m_sub.phone_number) AS uid_line, -- Using t_id.tel1 here
        ROW_NUMBER() OVER (PARTITION BY t_fuc.work_id ORDER BY t_fuc.id DESC) AS rn
    FROM tbl_insurance_home_data t_id
    LEFT JOIN tbl_insurance_data t_main ON t_main.id = t_id.work_id
    LEFT JOIN tbl_insurance_company t_ic ON t_ic.id = t_id.corp_id
    -- Removed the direct LEFT JOIN to tb_members t_m as uid_line is handled by a subquery
    LEFT JOIN tbl_follow_up_customer t_fuc ON t_fuc.work_id = t_main.id -- Ensure this join condition is correct
    WHERE t_id.insurance_end = '$date'
) AS ranked_data
WHERE rn = 1
ORDER BY work_id;
        ";
        // is real
        // WHERE t_id.insurance_end = '$date'
        return $this->db->query($sql)->result();
    }

    public function getInstallment($date)
    {
        $this->db->select('t_id.id, cust_name, cust_telephone_1, vehicle_regis, t_p.province_name, car_model, insurance_end, act_date_end, (SELECT t_m.uid FROM tb_members t_m WHERE REPLACE(t_id.cust_telephone_1, "-", "")=t_m.phone_number) uid_line, t_ip.due_date payment_due, t_ip.period,(SELECT COUNT(s_ip.id) FROM tbl_insurance_payment s_ip WHERE s_ip.work_id=t_ip.work_id) total_period, t_ip.amount, t_ic.company_name,t_ic.bank_acc_name,
        t_ic.bank_name,
        t_ic.bank_acc_no');
        $this->db->from('tbl_insurance_data t_id');
        $this->db->join('tbl_insurance_payment t_ip', 't_ip.work_id=t_id.id');
        $this->db->join('tbl_province t_p', 't_p.id = t_id.province_regis');
        $this->db->join('tbl_insurance_company t_ic', 't_ic.id = t_id.insurance_corp_id');
        $this->db->where('t_id.is_installment', '1');
        $this->db->where('t_id.data_status', '1');
        $this->db->where('t_ip.due_date', $date);
        return $this->db->get()->result();
    }

    public function getLogisticInsurance($date)
    {
        $this->db->select('
            t_id.id,
            t_id.work_id,
            t_ic.company_name,
            t_id.policy_number,
            t_id.register,
            t_id.cust_name,
            t_id.tel1,
            t_id.insurance_end,
            t_id.premium,
            t_id.revenue_stamp,
            t_id.total_price,
            t_id.payment_amount,
            t_fuc.folow_1,
            (SELECT t_m.uid FROM tb_members t_m WHERE REPLACE(t_id.tel1, "-", "") = t_m.phone_number) AS uid_line
        ');

        $this->db->from('tbl_insurance_shpping_data t_id');
        $this->db->join('tbl_follow_up_customer t_fuc', 't_fuc.work_id = t_id.work_id', 'left');
        $this->db->join('tbl_insurance_company t_ic', 't_ic.id = t_id.corp_id', 'left');
        $this->db->where('t_id.insurance_end', $date);
        return $this->db->get()->result();
    }

    public function getCarCheck($date)
    {
        $this->db->select('
    wd.cust_id,
    cd.id as car_id,
    wd.id as work_id,
    cmd.cust_name,
    cmd.cust_telephone_1,
    cd.vehicle_regis,
    pv.province_name,
    cb.car_brand_name,
    cd.date_regist, 
    cd.year_car,
    cd.car_type_id,
    wd.date_add,
    cc.car_check_price,
    cad.act_date_end,
    cad.act_price,
    ctd.date_registration_end,
    ctd.tax_price,
    ctd.tax_service
');
        $this->db->from('tbl_work_data wd');
        $this->db->join('tbl_car_data cd', 'wd.car_id = cd.id', 'left');
        $this->db->join('tbl_car_check cc', 'cc.work_id = wd.id', 'left');
        $this->db->join('tbl_car_act_data cad', 'cad.work_id = wd.id', 'left');
        $this->db->join('tbl_car_tax_data ctd', 'ctd.work_id = wd.id', 'left');
        $this->db->join('tbl_car_brand cb', 'cb.id = cd.car_brand', 'left');
        $this->db->join('tbl_province pv', 'pv.id = cd.province_regis', 'left');
        $this->db->join('tbl_customer_data cmd', 'cmd.id = wd.cust_id', 'left');

        // ใช้ group start เพื่อจัดกลุ่ม WHERE อย่างถูกต้อง
// $this->db->group_start();
// $this->db->where('cad.act_date_end', $date);
// $this->db->or_where('ctd.date_registration_end', $date);
// $this->db->group_end();

        $this->db->where_not_in('cd.car_type_id', ['4', '0']);
        // เงื่อนไขความยาว string == 10
        $this->db->where('CHAR_LENGTH(cd.date_regist) =', 10);

        // เงื่อนไขไม่เท่ากับ '0000-00-00'
        $this->db->where('cd.date_regist !=', '0000-00-00');
        return $this->db->get()->result();
    }



    public function get_valid_car_data($futureDate)
    {
        $this->db->select('
    wd.cust_id,
    cd.id AS car_id,
    wd.id AS work_id,
    cmd.cust_name,
    cmd.cust_telephone_1,
    cd.vehicle_regis,
    pv.province_name,
    cb.car_brand_name,
    cd.date_regist,
    YEAR(cd.date_regist) - 543 AS regist_year_ad,
    TIMESTAMPDIFF(YEAR, DATE_SUB(cd.date_regist, INTERVAL 543 YEAR), CURDATE()) AS car_age,
    cd.year_car,
    cd.car_type_id,
    wd.date_add,
    cc.car_check_price,
    cad.act_date_end,
    cad.act_price,
    ctd.date_registration_end,
    ctd.tax_price,
    ctd.tax_service
');

        $this->db->from('tbl_work_data wd');
        $this->db->join('tbl_car_data cd', 'wd.car_id = cd.id', 'left');
        $this->db->join('tbl_car_check cc', 'cc.work_id = wd.id', 'left');
        $this->db->join('tbl_car_act_data cad', 'cad.work_id = wd.id', 'left');
        $this->db->join('tbl_car_tax_data ctd', 'ctd.work_id = wd.id', 'left');
        $this->db->join('tbl_car_brand cb', 'cb.id = cd.car_brand', 'left');
        $this->db->join('tbl_province pv', 'pv.id = cd.province_regis', 'left');
        $this->db->join('tbl_customer_data cmd', 'cmd.id = wd.cust_id', 'left');
        $this->db->join('tb_members t_m', 'REPLACE(cmd.cust_telephone_1, "-", "") = t_m.phone_number', 'left');

        // WHERE เงื่อนไข
        $this->db->where_not_in('cd.car_type_id', ['4', '0']);
        $this->db->where('CHAR_LENGTH(cd.date_regist) =', 10);
        $this->db->where('cd.date_regist !=', '0000-00-00');

        // กำหนดตัวแปรวันที่ล่วงหน้า 2 เดือน
// $futureDate = date('Y-m-d', strtotime('+2 months'));

        // ดึงเฉพาะเดือน-วันจากตัวแปร (สำหรับใช้ใน WHERE)
        $futureMonthDay = date('m-d', strtotime($futureDate));

        // เงื่อนไข WHERE ที่ใช้ตัวแปรแทน DATE_ADD(CURDATE(), INTERVAL 2 MONTH)
        $this->db->where("TIMESTAMPDIFF(YEAR, DATE_SUB(cd.date_regist, INTERVAL 543 YEAR), '{$futureDate}') >", 7, false);
        $this->db->where("DATE_FORMAT(cd.date_regist, '%m-%d') = '{$futureMonthDay}'", null, false);

        // เงื่อนไขวัน-เดือนของวันที่ทำรายการย้อนหลัง 1 ปี
        $this->db->where('wd.date_add >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)', null, false);
        // รัน query
        $query = $this->db->get();

        return $query->result();
    }

    public function getCarCheckV2($date)
    {
        $this->db->select("
            wd.cust_id,
            (SELECT t_m.uid 
            FROM tb_members t_m 
            WHERE REPLACE(cmd.cust_telephone_1, '-', '') = t_m.phone_number) AS uid_line,
            cd.id AS car_id,
            wd.id AS work_id,
            cmd.cust_name,
            cmd.cust_telephone_1,
            cd.vehicle_regis,
            pv.province_name,
            cb.car_brand_name,
            cd.date_regist,
            YEAR(cd.date_regist) - 543 AS regist_year_ad,
            TIMESTAMPDIFF(YEAR, DATE_SUB(cd.date_regist, INTERVAL 543 YEAR), CURDATE()) AS car_age,
            cd.year_car,
            cd.car_type_id,
            wd.date_add,
            cc.car_check_price,
            cad.act_date_end,
            cad.act_price,
            ctd.date_registration_end,
            ctd.tax_price,
            ctd.tax_service
        ");

        $this->db->from('tbl_work_data wd');
        $this->db->join('tbl_car_data cd', 'wd.car_id = cd.id', 'left');
        $this->db->join('tbl_car_check cc', 'cc.work_id = wd.id', 'left');
        $this->db->join('tbl_car_act_data cad', 'cad.work_id = wd.id', 'left');
        $this->db->join('tbl_car_tax_data ctd', 'ctd.work_id = wd.id', 'left');
        $this->db->join('tbl_car_brand cb', 'cb.id = cd.car_brand', 'left');
        $this->db->join('tbl_province pv', 'pv.id = cd.province_regis', 'left');
        $this->db->join('tbl_customer_data cmd', 'cmd.id = wd.cust_id', 'left');
        $this->db->join('tb_members t_m', 'REPLACE(cmd.cust_telephone_1, "-", "") = t_m.phone_number', 'left');

        // เงื่อนไข WHERE
        $this->db->where_not_in('cd.car_type_id', array('4', '0'));

        // เริ่มกลุ่ม WHERE แบบซับซ้อน (ใช้ group_start และ group_end)
        $this->db->group_start();
        $this->db->where('DAY(cd.date_regist)', date('d', strtotime($date)));
        $this->db->where('MONTH(cd.date_regist)', date('m', strtotime($date)));
        $this->db->or_where('cad.act_date_end', $date);
        $this->db->or_where('ctd.date_registration_end', $date);
        $this->db->group_end();

        return $this->db->get()->result();
    }

}



?>