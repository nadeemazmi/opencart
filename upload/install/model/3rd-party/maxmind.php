<?php
class Model3rdPartyMaxmind extends Model {
	public function mysql() {
		
		$db->query("REPLACE INTO `" . DB_PREFIX . "setting` SET `maxmind_key` = '" . $db->escape($this->request->post['maxmind_key']) . "', `maxmind_score` = '" . (int)$this->request->post['maxmind_score'] . "', `maxmind_order_status_id` = '" . (int)$this->request->post['maxmind_order_status_id'] . "'  WHERE `store_id` = '0' AND `code` = 'maxmind'");

		$db->query("INSERT INTO `oc_extension` (`type`, `code`) VALUES ('fraud', 'maxmind')");
	}
	
	public function getOrderStatuses() {
		$query = $db->query("SELECT * FROM " . DB_PREFIX . "order_status WHERE language_id = '1'  ORDER BY name ASC");
		
		return $query->rows;
	}
}