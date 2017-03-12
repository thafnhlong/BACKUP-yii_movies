<?php
/**
 * Description of CVietnameseTools
 *
 * @version 1.0
 * @since 1 Nov 2011
 * @author Nguyen Chi Thuc, gthuc.nguyen@gmail.com
 * @copyright 2011
 * 
 */
 
namespace common\components;
class CVietnameseTools{
    //put your code here
    
    private static $_vi_lower         = array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'đ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ');
    private static $_vi_lower_nosigns = array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y');
    private static $_vi_upper         = array('Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Đ', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ');
    private static $_vi_upper_nosigns = array('A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'D', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'Y', 'Y', 'Y', 'Y', 'Y');
    private static $_en_lower         = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    private static $_en_upper         = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    
    private static $_vi_all_lower      = array('a', 'á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'b', 'c', 'd', 'đ', 'e', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'f', 'g', 'h', 'i', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'j', 'k', 'l', 'm', 'n', 'o', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'p', 'q', 'r', 's', 't', 'u', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'v', 'w', 'x', 'y', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'z');
    private static $_vi_all_upper      = array('A', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'B', 'C', 'D', 'Đ', 'E', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'F', 'G', 'H', 'I', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'J', 'K', 'L', 'M', 'N', 'O', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'P', 'Q', 'R', 'S', 'T', 'U', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'V', 'W', 'X', 'Y', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Z');
    
    private static $_viet_char = array(
        'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
        'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
        'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
        'đ'=>'d',  
        'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
        'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
        'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
        'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
        'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
        'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
        'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
        
        'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
        'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A',
        'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
        'Đ'=>'D',          
        'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
        'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
        'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
        'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
        'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
        'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
        'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
        'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
        'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y',
    );
    
    private static $_viet_char2 = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',  
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',  
        'd'=>'đ',  
        'D'=>'Đ',  
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',  
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',  
        'i'=>'í|ì|ỉ|ĩ|ị',  
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',  
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',  
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',  
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',  
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',  
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',  
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',  
    );
   
    /**
     *
     * @param string $str
     * @return string 
     */
    public static function removeSigns($str) {
        return str_replace(array_merge(CVietnameseTools::$_vi_lower, CVietnameseTools::$_vi_upper), array_merge(CVietnameseTools::$_vi_lower_nosigns, CVietnameseTools::$_vi_upper_nosigns), $str);
    }
    
    /**
     *
     * @param string $str
     * @return string 
     */
    public static function removeSigns2($str) {
        $patterns = array();
        $replacements = array();
        foreach (CVietnameseTools::$_viet_char2 as $res=>$source) {
            $patterns[] = "/$source/";
            $replacements[] = $res;
        }
        
        $str = preg_replace($patterns, $replacements, $str);
        
        return $str;
    }
    
    /**
     * @param string $str
     * @return string
     */
    public static function toLower($str) {
        return str_replace(CVietnameseTools::$_vi_all_upper, CVietnameseTools::$_vi_all_lower, $str);        
    }
    
    /**
     * @param string $str
     * @return string
     */
    public static function toUpper($str) {
        return str_replace(CVietnameseTools::$_vi_all_lower, CVietnameseTools::$_vi_all_upper, $str);          
    }
    
    /**
     * xoa cac dau trang thua
     * @param string $str
     * @return string
     */
    public static function proper($str) {
        $str = preg_replace("/[ \t\n\r]+/", ' ', $str); // --> de \s thi bi mat mot so chu (à, Ạ...)
        return trim($str);
    }
    
    /**
     * tra lai xau viet hoa cac ky tu dau tien của mỗi từ (danh từ riêng), xoa cac dau trang thua
     * @param string $str
     * @return string
     */
    public static function properName($str) {
        $str = ' '.CVietnameseTools::proper(CVietnameseTools::toLower($str));
        
        return ltrim($str);
    }
    
    /**
     * kiểm tra xem có các dấu tiếng việt trong xâu ko
     * @param string $str
     * @return boolean
     */
    public static function hasSigns($str) {
        $pattern = join(array_merge(CVietnameseTools::$_vi_lower, CVietnameseTools::$_vi_upper));
        //return $pattern;
        return preg_match("/[$pattern]/", $str);
    }
    
    /**
     * bỏ hết các ký tự đặc biệt, chỉ để lại chữ cái
     * * @param string $str 
     * @return string
     */
    public static function lettersOnly($str) {
        $pattern = join(array_merge(CVietnameseTools::$_en_lower, CVietnameseTools::$_en_upper, CVietnameseTools::$_vi_lower, CVietnameseTools::$_vi_upper));
        $pattern = "/[^\s$pattern]/";
        //return $pattern;
        return preg_replace($pattern, '', $str);
    }
    
    /**
     * bỏ hết các ký tự đặc biệt, chỉ để lại chữ cái và số
     * * @param string $str 
     * @return string
     */
    public static function alphanumericOnly($str) {
        $pattern = join(array_merge(CVietnameseTools::$_en_lower, CVietnameseTools::$_en_upper, CVietnameseTools::$_vi_lower, CVietnameseTools::$_vi_upper));
        $pattern = "/[^\s${pattern}1234567890]/";
        //return $pattern;
        return preg_replace($pattern, '', $str);
        return $str;
    }
    
    /**
     * bỏ hết dấu, bỏ khoảng trắng thừa, khoảng trắng ở đầu, cuối, chuyển về lower case 
     * và bỏ các dấu đặc biệt (.,!@#$)
     * @param string $str 
     * @return string
     */
    public static function makeSearchableStr($str) {
        $str = CVietnameseTools::removeSigns($str);
        $str = strtolower($str);

        $pattern = join(array_merge(CVietnameseTools::$_en_lower));
        $pattern = "/[^\s${pattern}1234567890]/";
        //return $pattern;
        $str = preg_replace($pattern, '', $str);
        return CVietnameseTools::proper($str);

    }
   
    /**
     * bỏ dấu, bỏ các khoảng trắng, lower case, bỏ ký tự đặc biệt, nối các từ = '_'
     * @param string $str
     * @return string 
     */
    public static function makeCodeName($str) {
        $str = CVietnameseTools::removeSigns($str);
        $str = strtolower($str);
        $pattern = join(array_merge(CVietnameseTools::$_en_lower));
        $pattern = "/[^\s${pattern}1234567890]/";
        //return $pattern;
        $str = preg_replace($pattern, '', $str);
        $str .= '_'.time();
        //return implode('_',explode(' ',  CVietnameseTools::proper($str)));
        return str_replace(" ", "_", CVietnameseTools::proper($str));
    }
    
    /**
     * bỏ dấu, bỏ các khoảng trắng, lower case, bỏ ký tự đặc biệt, nối các từ = '-'
     * @param string $str
     * @return string 
     */
    public static function makeUrlFriendly($str) {
        $str = CVietnameseTools::removeSigns($str);
        $str = strtolower($str);
        $pattern = join(array_merge(CVietnameseTools::$_en_lower));
        $pattern = "/[^\s${pattern}1234567890.-]/";
        //return $pattern;
        $str = preg_replace($pattern, '', $str);
        //return implode('_',explode(' ',  CVietnameseTools::proper($str)));
        return str_replace(array(' ',','),array('-','-'), CVietnameseTools::proper($str));
    }
    
    /**
     * 
     * Đọc thành chữ đơn vị tiền tệ
    */
    public static function readCurrentcy($number){
      if($number == null){
         return 'Liên hệ';  
      }
      if($number/1000000000 > 1) // Nếu lớn hơn 1 tỷ
         return round($number/1000000000,2) . ' tỷ';
      if($number/1000000 > 1) // Nếu lơn hơn 1 triệu
         return round($number/1000000,1) . ' triệu'; 
      if($number/1000 > 1) // Nếu lơn hơn 1 nghìn
         return round($number/1000,0) . ' nghìn';
      else
         return $number . ' đồng';
    }
    public static function formatVNDate($dateStr) {
        $search  = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $replace = array('Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy');
        return str_replace($search, $replace,date('g:i A, D \n\g\à\y j\/n', strtotime($dateStr)));
    }
    public static function time_elapsed_string($ptime)
    {
        $etime = time() - $ptime;

        if ($etime < 1)
        {
            return 'Vừa mới đây';
        }

        $a = array( 365 * 24 * 60 * 60  =>  'năm',
            30 * 24 * 60 * 60  =>  'tháng',
            24 * 60 * 60  =>  'ngày',
            60 * 60  =>  'giờ',
            60  =>  'phút',
            1  =>  'giây'
        );
        foreach ($a as $secs => $str)
        {
            $d = $etime / $secs;
            if ($d >= 1)
            {
                $r = round($d);
                return $r . ' ' . $str . ' trước';
            }
        }
    }
	public static function getVttPath($file_srt)
    {
        $explode = explode('/',$file_srt);
		$file_name = end($explode);
		$file_vtt_name = md5($file_name.'abcxyz').'.vtt';
		$file_sub = str_replace($file_name,$file_vtt_name,$file_srt);
		return $file_sub;
    }
    
    
    private static function getListIP(){
        
        $list = Yii::app()->cache->get('list_ip_vn');
        if($list === false){
            $sql = "SELECT a,b FROM ipvn";
            $list = Yii::app()->db->createCommand($sql)->queryAll();
            Yii::app()->cache->set('list_ip_vn',$list,86400*30);
        }
        
        return $list;
    }
    
    /**
     * Kiem tra ip Viet Nam
    */
    public static function isIpVN($ip = null){
        //Kiểm tra trong cookie nếu đã là IP VN thì return luôn
        $cookie = isset($_COOKIE['_isipvn']) ? $_COOKIE['_isipvn'] : null;
        $check = 0;
        if($cookie == null){
            $list_ip = self::getListIP();
            if($ip == null){
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $iplong = ip2long($ip);
            
            foreach($list_ip as $value){
                if($iplong >= $value['a'] && $iplong <= $value['b']){
                    $check = 1;
                    break;
                }
            }
            setcookie('_isipvn',$check,time()+86400,'/');
            return ($check == 1);
        }else{
            return ($cookie == 1);
        }
        
    }
}

?>
