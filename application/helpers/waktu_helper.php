<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('rupiah')) {
	function rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}
}
if (!function_exists('tanggal_human')) {
	function tanggal_human($dateOriginal){
		$timestamp = strtotime($dateOriginal);
		$new_date = date("d-m-Y", $timestamp);
		$ex = explode("-", $new_date);
		$tgl = $ex[0];
		$bln = bulan($ex[1]);
		$thn = $ex[2];
		return $tgl.' '.$bln.' '.$thn;
	}
}
if (!function_exists('tglYYYYMMDD')) {
	function tglYYYYMMDD($dateOriginal){
		$timestamp = strtotime($dateOriginal);
		$new_date = date("Y-m-d", $timestamp);
		return $new_date;
	}
}
if (!function_exists('tanggal_human2')) {
	function tanggal_human2($dateOriginal){
		$timestamp = strtotime($dateOriginal);
		$new_date = date("d-m-Y", $timestamp);
		$ex = explode("-", $new_date);
		$tgl = $ex[0];
		$bln = bulan2($ex[1]);
		$thn = $ex[2];
		return $tgl.' '.$bln.' '.$thn;
	}
}

if (!function_exists('formatJam')) {
    function formatJam($jam){
      return date('H:i:s', strtotime($jam));
    }
}
if (!function_exists('terbilang')) {
	function terbilang($number){
		$words = "";
		$arr_number = array(
			"",
			"Satu",
			"Dua",
			"Tiga",
			"Empat",
			"Lima",
			"Enam",
			"Tujuh",
			"Delapan",
			"Sembilan",
			"Sepuluh",
			"Sebelas"
		);

		if ($number < 12) {
			$words = " " . $arr_number[$number];
		} else if ($number < 20) {
			$words = terbilang($number - 10) . " Belas";
		} else if ($number < 100) {
			$words = terbilang($number / 10) . " Puluh " . terbilang($number % 10);
		} else if ($number < 200) {
			$words = "Seratus " . terbilang($number - 100);
		} else if ($number < 1000) {
			$words = terbilang($number / 100) . " Ratus " . terbilang($number % 100);
		} else if ($number < 2000) {
			$words = "Seribu " . terbilang($number - 1000);
		} else if ($number < 1000000) {
			$words = terbilang($number / 1000) . " Ribu " . terbilang($number % 1000);
		} else if ($number < 1000000000) {
			$words = terbilang($number / 1000000) . " Juta " . terbilang($number % 1000000);
		} else if ($number < 1000000000000) {
			$words = terbilang($number / 1000000000) . " Milyar " . terbilang($number % 1000000000);
		} else if ($number < 1000000000000000) {
			$words = terbilang($number / 1000000000000) . " Trilyun " . terbilang($number % 1000000000000);
		} else {
			$words = "undefined";
		}
		return $words;
	}
}

if (!function_exists('bulan')) {
	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if (!function_exists('bulan2')) {
	function bulan2($bln)
	{
		switch ($bln) {
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Agu";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}

if (!function_exists('romawi')) {
	function romawi($rm)
	{
		switch ($rm) {
			case 1:
				return "I";
				break;
			case 2:
				return "II";
				break;
			case 3:
				return "III";
				break;
			case 4:
				return "IV";
				break;
			case 5:
				return "V";
				break;
			case 6:
				return "VI";
				break;
			case 7:
				return "VII";
				break;
			case 8:
				return "VIII";
				break;
			case 9:
				return "IX";
				break;
			case 10:
				return "X";
				break;
			case 11:
				return "XI";
				break;
			case 12:
				return "XII";
				break;
		}
	}
}


if (!function_exists('umur')) {
	function umur($tanggal)
	{
		//explode the date to get month, day and year
		$tanggal = explode("-", $tanggal);
		//get age from date or tanggal
		$age = (date("md", date("U", mktime(0, 0, 0, $tanggal[0], $tanggal[1], $tanggal[2]))) > date("md")
			? ((date("Y") - $tanggal[2]) - 1)
			: (date("Y") - $tanggal[2]));
		return $age . ' Tahun';
	}
}

if (!function_exists('umur_2')) {
	function umur_2($tanggal)
	{
		$tgl = explode("/", $tanggal);
		$dob = $tgl[1] . "/" . $tgl[0] . "/" . $tgl[2];
		$arr = explode('/', $dob);
		$dateTs = strtotime($dob);
		$now = strtotime('today');
		if (sizeof($arr) != 3) die('ERROR:please entera valid date');
		if (!checkdate($arr[0], $arr[1], $arr[2])) die('PLEASE: enter a valid dob');
		if ($dateTs >= $now) die('ENTER a dob earlier than today');
		$ageDays = floor(($now - $dateTs) / 86400);
		$ageYears = floor($ageDays / 365);
		$ageMonths = floor(($ageDays - ($ageYears * 365)) / 30);
		return $ageYears . ' Tahun';
	}
}

if (!function_exists('ultah')) {
	function ultah($tanggal)
	{
		$tgl = explode("/", $tanggal);
		$dob = $tgl[1] . "/" . $tgl[0] . "/" . $tgl[2];
		$arr = explode('/', $dob);
		$dateTs = strtotime($dob);
		$now = strtotime('today');
		if (sizeof($arr) != 3) die('ERROR:please entera valid date');
		if (!checkdate($arr[0], $arr[1], $arr[2])) die('PLEASE: enter a valid dob');
		if ($dateTs >= $now) die('ENTER a dob earlier than today');
		$ageDays = floor(($now - $dateTs) / 86400);
		$ageYears = floor($ageDays / 365);
		$ageMonths = floor(($ageDays - ($ageYears * 365)) / 30);
		return $ageYears . ' Tahun';
	}
}

if (!function_exists('pensiunan')) {
	function pensiunan($tanggal)
	{
		$tgl = explode("/", $tanggal);
		$dob = $tgl[1] . "/" . $tgl[0] . "/" . $tgl[2];
		$arr = explode('/', $dob);
		$dateTs = strtotime($dob);
		$now = strtotime('today');
		if (sizeof($arr) != 3) die('ERROR:please entera valid date');
		if (!checkdate($arr[0], $arr[1], $arr[2])) die('PLEASE: enter a valid dob');
		if ($dateTs >= $now) die('ENTER a dob earlier than today');
		$ageDays = floor(($now - $dateTs) / 86400);
		$ageYears = floor($ageDays / 365);
		$ageMonths = floor(($ageDays - ($ageYears * 365)) / 30);
		if ($ageYears >= 55) {
			$status = 'WAKTU PENSIUNAN';
		} else if ($ageYears > 53 && $ageYears < 55) {
			$status = 'MENJELANG PENSIUNAN';
		} else {
			$status = 'KARYAWAN AKTIF';
		}
		return $status;
	}
}


if (!function_exists('nama_hari')) {
	function nama_hari($hari)
	{
		switch ($hari) {
			case 'Sun':
				return 'Minggu';
				break;
			case 'Mon':
				return 'Senin';
				break;
			case 'Tue':
				return 'Selasa';
				break;
			case 'Wed':
				return 'Rabu';
				break;
			case 'Thu':
				return 'Kamis';
				break;
			case 'Fri':
				return 'Jumat';
				break;
			case 'Sat':
				return 'Sabtu';
				break;
			default:
				# code...
				break;
		}
	}
}
