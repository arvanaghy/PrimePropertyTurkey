<? defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('is_favored'))
{
    function is_favored($value){
        $prev_favorite_list = get_cookie('favorite');
        if ($prev_favorite_list!=null){
            $prev_favorite_list_array = explode(',',$prev_favorite_list);
            if (in_array($value,$prev_favorite_list_array)){
                 return True;
            }else{
                return False;
            }
        }
    }
}