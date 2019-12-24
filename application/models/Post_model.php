<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function get_posts($slug = FALSE){
            if ($slug === FALSE){
                $query = $this->db->query("SELECT p.id, p.user_id, p.title, p.slug, p.body, p.created_at, u.name AS poster  FROM posts p JOIN users u WHERE p.user_id = u.id ORDER BY created_at DESC");
                //$this->db->order_by('id', 'DESC');
                //$query = $this->db->get('posts');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'user_id' => $this->session->userdata('user_id')
            );

            // XSS filter
            html_escape($data);
            $data = $this->security->xss_clean($data);
            // str_replace("[removed]", "", $data['title']);
            //str_replace("[removed]", "", $data['body']);

            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );

            // XSS filter
            html_escape($data);
            $data = $this->security->xss_clean($data);
            // str_replace("[removed]", "", $data['title']);
            //str_replace("[removed]", "", $data['body']);

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }
    }