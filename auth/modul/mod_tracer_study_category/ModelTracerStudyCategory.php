<?php
    class ModelTracerStudyCategory extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_tracer_studies($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM tracer_studies")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id='{$id}' ")['data'];

            }
            
        }

        public function insert_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_desc'=> $this->post['tracer_study_desc']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into tracer_studies
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_desc'=> $this->post['tracer_study_desc']
            ];
            $where                  = [
                'tracer_study_id'=> $this->post['tracer_study_id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set tracer_studies
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_tracer_studies()
        {

        }
    }
    