<?php 

	class Mobil_model extends CI_Model
	{
		
		public function getMobil($brand = null, $type = null, $id = null)
		{
			if($brand === null && $type === null && $id === null)
			{
				return $this->db->get('tbl_mobil')->result_array();
			}
			elseif ($brand === null && $type === null && $id)
			{
				return $this->db->get_where('tbl_mobil', ['id'=> $id])->result_array();
			}
			elseif ($brand && $type ===null)
			{
				return $this->db->get_where('tbl_mobil',['merek'=> $brand])->result_array();
			}
			else
			{
				return $this->db->get_where('tbl_mobil',['merek'=> $brand, 'tipe'=>$type])->result_array();
			}
		}

		public function deleteMobil($id)
		{
			$this->db->delete('tbl_mobil', ['id'=>$id]);

			return $this->db->affected_rows();
		}


		public function createMobil($data)
		{
			$this->db->insert('tbl_mobil', $data);

			return $this->db->affected_rows();
		}
		public function updateMobil($data, $id)
		{
			$this->db->update('tbl_mobil', $data, ['id'=>$id]);

			return $this->db->affected_rows();
		}

	}