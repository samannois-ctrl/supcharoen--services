<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReplyModel extends CI_Model
{
    public function matchQuestions($text){
        $this->db->from('tb_questions');
        $this->db->join('tb_answers', 'tb_answers.answer_id = tb_questions.answer_id');
        $this->db->where('question', $text);
        return $this->db->get();
    }

    public function fetchAnswers(){
        $this->db->select('tb_answers.*');
        $this->db->select('( SELECT COUNT(id) FROM `tb_questions` WHERE `tb_questions`.`answer_id` =  `tb_answers`.`answer_id`) AS count_question');
        $this->db->from('tb_answers');
        $this->db->order_by('create_at', 'DESC');
        // $this->db->join('tb_questions', 'tb_questions.answer_id = tb_answers.answer_id');
        // $this->db->group_by('tb_answers.answer_id');
        return $this->db->get();
    }

    public function getQuestionAnswer($answer_id){
        $this->db->from('tb_questions');
        $this->db->where('answer_id', $answer_id);
        return $this->db->get();
    }

    public function addKeyword($data){
        return $this->db->insert('tb_questions', $data);
    }

    public function addKeywords($data){
        return $this->db->insert_batch('tb_questions', $data);
    }

    public function delKeyword($data){
        return $this->db->delete('tb_questions', $data);
    }

    public function delAllKeyword($data){
        return $this->db->delete('tb_questions', $data);
    }

    public function addAnswer($data){
        return $this->db->insert('tb_answers', $data);
    }

    public function getReplyMessage($answer_id){
        $this->db->from('tb_answers');
        $this->db->where('answer_id', $answer_id);
        return $this->db->get();
    }

    public function updateReplyMessage($answer_id, $data){
        $this->db->where('answer_id', $answer_id);
        return $this->db->update('tb_answers', $data);
    }

    public function delReplyMessage($data){
        return $this->db->delete('tb_answers', $data);
    }
}

?>