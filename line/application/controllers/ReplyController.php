<?php
require_once APPPATH . 'controllers/MainController.php';
class ReplyController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReplyModel', 'reply');
    }

    public function fetch_answer(){
        $sql = $this->reply->fetchAnswers();
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        }else{
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row,
                'rows' => $num
            );
        }
        echo json_encode($array);
    }

    public function get_question_answer(){
        $sql = $this->reply->getQuestionAnswer($this->input->post('answer_id'));
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        }else{
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row,
                'rows' => $num
            );
        }
        echo json_encode($array);
    }

    public function add_keyword(){
        $this->form_validation->set_rules(
            'keyword',
            'Keyword',
            'required|max_length[30]|is_unique[tb_questions.question]',
            array(
                'is_unique' => 'คีย์เวิร์ด ' . $this->input->post('keyword') . ' มีอยู่แล้ว'
            )
        );
        $this->form_validation->set_error_delimiters('<small class="text-red-600">', '</small>');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'error_from' => true,
                'keyword_error' => form_error('keyword')
            );
        } else {
            $data = [
                'question_id' => $this->input->post('answer_key_id').rand(000000,999999),
                'question' => $this->input->post('keyword'),
                'answer_id' => $this->input->post('answer_key_id'),
                'create_by' => $this->session->admin_info->username
            ];
            $sql = $this->reply->addKeyword($data);
            if ($sql) {
                $array = [
                    'success' => true,
                    'error_from' => false,
                    'answer_key_id' => $this->input->post('answer_key_id'),
                    'msg' => 'ทำรายการสำเร็จ'
                ];
            } else {
                $array = [
                    'error' => true,
                    'error_from' => false,
                    'msg' => 'ทำรายการไม่สำเร็จ'
                ];
            }
        }
        echo json_encode($array);
        
    }

    public function del_keyword(){
        $data = [
            'question_id' => $this->input->post('question_id')
        ];
        $sql = $this->reply->delKeyword($data);
        if ($sql) {
            $array = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $array = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
    }

    public function add_reply_message(){
        $this->form_validation->set_rules(
            'answer_title',
            'answer title',
            'required|max_length[30]|is_unique[tb_answers.answer_title]',
            array(
                'is_unique' => 'หัวข้อ ' . $this->input->post('answer_title') . ' มีอยู่แล้ว'
            )
        );
        // $this->form_validation->set_rules(
        //     'question',
        //     'Question',
        //     'required|max_length[30]|is_unique[tb_questions.question]',
        //     array(
        //         'is_unique' => 'คีย์เวิร์ด ' . $this->input->post('question') . ' มีอยู่แล้ว'
        //     )
        // );
        $this->form_validation->set_error_delimiters('<small class="text-red-600">', '</small>');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error' => true,
                'error_from' => true,
                'answer_title_error' => form_error('answer_title'),
                'question_error' => form_error('question')
            );
        } else {

            $error = false;
            $answer_id = 'A'.rand(00000,99999);
            if (isset($_FILES['fileSlip']) && $_FILES['fileSlip']['error'] == 0) {
                $config['upload_path'] = './uploads/';
                $this->load->library('image_lib');
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('fileSlip')) {
                    echo json_encode(array('error' => true, 'msg' => 'อัพโหลดไม่สำเร็จ'));
                    return;
                } else {
                    $data = $this->upload->data();
                    $configer = array(
                        'image_library' => 'gd2',
                        'source_image' => $data['full_path'],
                        'maintain_ratio' => TRUE,
                        'width' => 500,
                        'height' => 500,
                    );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();

                    $name = $answer_id;
                    rename($data['full_path'], $data['file_path'] . $name . $data['file_ext']);
                    $answer = $name . $data['file_ext'];
                    $answer_type = 2;
                }
            }else{
                $answer = $this->input->post('answer');
                $answer_type = 1;
            }

            
            $data_answer = [
                'answer_id' => $answer_id,
                'answer_title' => $this->input->post('answer_title'),
                'answer' => $answer,
                'answer_type' => $answer_type,
                'create_by' => $this->session->admin_info->username
            ];
            $sql_answer = $this->reply->addAnswer($data_answer);
            if (!$sql_answer) {
                $error = true;
                $error_msg = 'เพิ่มข้อความตอบกลับไม่สำเร็จ';            
            }

            if (!$error) {

                $array = explode(",",$this->input->post('question'));
                $data_question = array();
                foreach( $array as $key => $value ){
                    if($value != ""){
                        $array_data = [
                            'question_id' => 'Q'.rand(000000,999999),
                            'question' => $value,
                            'answer_id' => $answer_id,
                            'create_by' => $this->session->admin_info->username
                        ];
                        array_push($data_question, $array_data);
                    }
                }
                // $data_question = [
                //     'question_id' => 'Q'.rand(000000,999999),
                //     'question' => $this->input->post('question'),
                //     'answer_id' => $answer_id,
                //     'create_by' => $this->session->admin_info->username
                // ];

                $sql_question = $this->reply->addKeywords($data_question);
                if (!$sql_question) {
                    $error = true;
                    $error_msg = 'เพิ่มคีย์เวิร์ดไม่สำเร็จ';  
                }
            }

            if (!$error) {
                $array = [
                    'success' => true,
                    'error_from' => false,
                    'msg' => 'ทำรายการสำเร็จ'
                ];
            } else {
                $array = [
                    'error' => true,
                    'error_from' => false,
                    'msg' => $error_msg
                ];
            }
        }
        echo json_encode($array);
    }

    public function get_reply_message(){
        $sql = $this->reply->getReplyMessage($this->input->post('answer_id'));
        $num = $sql->num_rows();
        if ($num == 0) {
            $array = array(
                'error' => true,
                'msg' => 'ไม่พบข้อมูล'
            );
        }else{
            $row = $sql->result();
            $array = array(
                'success' => true,
                'data' => $row
            );
        }
        echo json_encode($array);
    }

    public function update_reply_message(){
        $data = [
            'answer_title' => $this->input->post('answer_title_edit'),
            'answer' => $this->input->post('answer_edit'),
            'update_by' => $this->session->admin_info->username
        ];

        $sql = $this->reply->updateReplyMessage($this->input->post('answer_id_edit'),$data);
        if ($sql) {
            $array = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $array = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
        
    }

    public function update_img_reply_message(){
        $error = false;
        $answer_id = $this->input->post('answer_id_edit');
        if (isset($_FILES['fileSlipEdit']) && $_FILES['fileSlipEdit']['error'] == 0) {
            
            $config['upload_path'] = './uploads/';
            $this->load->library('image_lib');
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fileSlipEdit')) {
                echo json_encode(array('error' => true, 'msg' => 'อัพโหลดไม่สำเร็จ'));
                return;
            } else {
                $data = $this->upload->data();
                $configer = array(
                    'image_library' => 'gd2',
                    'source_image' => $data['full_path'],
                    'maintain_ratio' => TRUE,
                    'width' => 500,
                    'height' => 500,
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $name = $answer_id;
                rename($data['full_path'], $data['file_path'] . $name . $data['file_ext']);
                $answer = $name . $data['file_ext'];
            }
        }

        $data = [
            'answer' => $answer
        ];

        $sql = $this->reply->updateReplyMessage($answer_id,$data);
        if ($sql) {
            $array = [
                'success' => true,
                'msg' => 'ทำรายการสำเร็จ'
            ];
        } else {
            $array = [
                'error' => true,
                'msg' => 'ทำรายการไม่สำเร็จ'
            ];
        }
        echo json_encode($array);
        
    }

    public function del_reply_message(){
        $error = false;
        $data_keyword = [
            'answer_id' => $this->input->post('answer_id')
        ];
        $sql_keyword = $this->reply->delAllKeyword($data_keyword);
        if (!$sql_keyword) {
            $error = true;
            $error_msg = 'ลบคีย์เวิร์ดไม่สำเร็จ';
        }

        if (!$error) {
            $data = [
                'answer_id' => $this->input->post('answer_id')
            ];
            $sql = $this->reply->delReplyMessage($data);
            if (!$sql) {
                $error = true;
                $error_msg = 'ลบข้อความตอบกลับไม่สำเร็จ';
            }
        }

        if (!$error) {
            $array = array(
                'success' => true,
                'msg' => 'ลบข้อความตอบกลับสำเร็จ'
            );
        }else{
            $array = array(
                'error' => true,
                'msg' => $error_msg
            );
        }

        echo json_encode($array);
    }
}

?>