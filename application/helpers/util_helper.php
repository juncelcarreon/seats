<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('pagination'))
{
	function pagination($current, $counts, $limit = 10, $show = 5)
	{
		$pages[] = null;
		$start = 1;
		$end = $show + $start - 1;
		$total_pages = (int)($counts / $limit);
		if ($counts % $limit != 0) {
			$total_pages++;
		}

		if ($total_pages >= $show) {
			$temp = $current - (int)($show / 2);
			$start = ($temp <= 0) ? 1 : $temp;
			$end = $show + $start - 1;

			if ($end > $total_pages) {
				$start = $start - ($end - $total_pages);
			}
		}

		for ($i = 0; $i < $show; $i++) {
			$pages[$i] = $start++;
			if ($start > $end || $start > $total_pages) break;
		}

		return $pages;
	}
}
