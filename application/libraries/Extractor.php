<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	Class to filter arrays to get where the information can be found
 */

class Extractor {
	
	public function __construct()
	{
	}

	/**
	 * Extracts the header's information i.e. the header index and its value
	 * regarding siswa information. Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	public function extract_info_siswa_k2013 ($header)
	{
		function _extract_callback ($var)
		{
			//	Configurable array
			$try_to_find = array (
				'nama_siswa',
				'nis',
				'nisn'
			);

			foreach ($try_to_find as $ttf)
				if (strcasecmp ($var, $ttf) == 0)
					return TRUE;
			
			return FALSE;
		}
		
		return array_filter ($header, '_extract_callback');
	}

	/**
	 * Integral function for extracting solely information about semester ganjil.
	 * Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	private function extract_info_semester_ganjil_k2013 ($header)
	{
		/*	Configurable rule

			Default: ((S|s)em1|1)$
			Explanation: Stands for string 'Sem1' (case insensitive) OR string '1'.
			Either token must be located in the end of the searched string.
		*/
		$rule = '/((S|s)em1|1)$/';
		return preg_grep ($rule, $header);
	}

	/**
	 * Integral function for extracting solely information about semester genap.
	 * Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	private function extract_info_semester_genap_k2013 ($header)
	{
		/*	Configurable rule

			Default: ((S|s)em2|2)$
			Explanation: Stands for string 'Sem2' (case insensitive) OR string '2'.
			Either token must be located in the end of the searched string.
		*/
		$rule = '/((S|s)em2|2)$/';
		return preg_grep ($rule, $header);
	}

	/**
	 * Extracts the header's information i.e. the header index and its value
	 * regarding semester (ganjil & genap) information. Expected
	 * format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	public function extract_info_semester_k2013 ($header)
	{
		function _extract_callback ($var)
		{
			//	Configurable array
			$try_to_find = array (
				'kode_rapot',
				'kelas',
				'tahun',
				'sem_ganjil',
				'sem_genap'
			);

			foreach ($try_to_find as $ttf)
				if ( strcasecmp ($var, $ttf) == 0 )
					return TRUE;
			
			return FALSE;
		}

		$general_information = array_filter ($header, '_extract_callback');

		//	Ganjil
		$output['ganjil'] 	= $this->extract_info_semester_ganjil_k2013 ($header);
		$output['ganjil'] 	= array_merge ($output['ganjil'], array_diff ($general_information, array ('sem_genap')));

		//	Genap
		$output['genap'] 	= $this->extract_info_semester_genap_k2013 ($header);
		$output['genap'] 	= array_merge ($output['ganjil'], array_diff ($general_information, array ('sem_ganjil')));

		return $output;
	}

	/**
	 * Extracts the header's information i.e. the header index and its value
	 * regarding ekskul information. Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	public function extract_info_ekskul_k2013 ($header)
	{
		/*	Configurable rule

			Default: (E|e)kskul
			Explanation: Stands for string 'Ekskul' (case insensitive)
		*/
		$rule = '/(E|e)kskul/';
		return preg_grep ($rule, $header);
	}

	/**
	 * Extracts the header's information i.e. the header index and its value
	 * regarding lintas minat information. Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	public function extract_info_lintas_minat_k2013 ($header)
	{
		/*	Configurable rule

			Default: (LintasMinat)|LM(\d)
			Explanation: Stands for string 'LintasMinat' OR string 'LM' followed
			with a digit of number
		*/
		$rule = '/(LintasMinat)|LM(\d)/';
		return preg_grep ($rule, $header);
	}

	/**
	 * Extracts the header's information i.e. the header index and its value
	 * regarding nilai information. Expected format is K2013 csv format
	 *
	 * @param array $header Array containing the csv header
	 * @return array The key => value represents the index and what information can be found
	 */
	public function extract_info_nilai_k2013 ($header)
	{
		/*	Configurable rule
		
			Default: [A-Za-z]+KI\d
			Explanation: Stands for alphabet(s) (must non-empty) followed with 'KI'
			and a digit of number
		*/
		$rule = '/[A-Za-z]+KI\d/';
		return preg_grep ($rule, $header);
	}
}
