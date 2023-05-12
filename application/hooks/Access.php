<?php
class Access
{
	public function checkPermit()
	{
		$CI =& get_instance();

		if (isset($CI->access_permit)) {
			$member_level = $CI->session->userdata('member_level');

			if (in_array($member_level, $CI->access_permit)) {
				return;
			}
			redirect('error');
		}
	}
}
?>
