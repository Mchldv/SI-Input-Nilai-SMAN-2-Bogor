<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	Class for managing csv input and output
 */

class Csv {
	
	public function __construct()
	{
	}
	
	public function import_master_file_k2013 ($filename)
	{
		$content = file_get_contents($filename);

		//	Such file not exist or an error happened when fetching the content
		if ($content === FALSE)
			return FALSE;
		
		$row = explode ("\n", $content);

		//	Check whether the given codename is present in DB or not (add if not)
		#	...

		//	Fetch data regarding the codename
		# 	...

		for ($i = 2; $i < $count ($row); $i++)
		{
			//	Update the score only if it is newer
			# ...

			//	Insert otherwise
			# ...
		}

		return TRUE;
	}

	public function export_master_file_k2013 ($filename)
	{
		
	}
	
}
