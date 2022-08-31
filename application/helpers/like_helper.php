<? defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('is_blogLiked'))
{
    function is_blogLiked($value){
        $prev_like_blog = get_cookie('like_blog');
        if ($prev_like_blog!=null){
            $prev_blogLike_list_array = explode(',',$prev_like_blog);
                if (in_array($value,$prev_blogLike_list_array)){
                    return True;
                }else{
                    return False;
                }
            }
        }
}
if ( ! function_exists('is_blogDisliked'))
{
    function is_blogDisliked($value){
        $prev_like_blog = get_cookie('dislike_blog');
        if ($prev_like_blog!=null){
            $prev_blogLike_list_array = explode(',',$prev_like_blog);
            if (in_array($value,$prev_blogLike_list_array)){
                return True;
            }else{
                return False;
            }
        }
    }
}

if ( ! function_exists('is_newsLiked'))
{
    function is_newsLiked($value){
        $prev_like_news = get_cookie('like_news');
        if ($prev_like_news!=null){
            $prev_newsLike_list_array = explode(',',$prev_like_news);
            if (in_array($value,$prev_newsLike_list_array)){
                return True;
            }else{
                return False;
            }
        }
    }
}
if ( ! function_exists('is_newsDisliked'))
{
    function is_newsDisliked($value){
        $prev_like_news = get_cookie('dislike_news');
        if ($prev_like_news!=null){
            $prev_newsLike_list_array = explode(',',$prev_like_news);
            if (in_array($value,$prev_newsLike_list_array)){
                return True;
            }else{
                return False;
            }
        }
    }
}

if ( ! function_exists('is_afterSaleLiked'))
{
    function is_afterSaleLiked(): bool
    {
        $prev_like = get_cookie('like_after_sale');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_afterSaleDisliked'))
{
    function is_afterSaleDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_after_sale');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_areaGuideLiked'))
{
    function is_areaGuideLiked(): bool
    {
        $prev_like = get_cookie('like_area_guide');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_areaGuideDisliked'))
{
    function is_areaGuideDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_area_guide');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_citizenshipLiked'))
{
    function is_citizenshipLiked(): bool
    {
        $prev_like = get_cookie('like_citizenship');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_citizenshipDisliked'))
{
    function is_citizenshipDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_citizenship');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_buyer_guideLiked'))
{
    function is_buyer_guideLiked(): bool
    {
        $prev_like = get_cookie('like_buyer_guide');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_buyer_guideDisliked'))
{
    function is_buyer_guideDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_buyer_guide');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_buying_onlineLiked'))
{
    function is_buying_onlineLiked(): bool
    {
        $prev_like = get_cookie('like_buying_online');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_buying_onlineDisliked'))
{
    function is_buying_onlineDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_buying_online');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_privacyLiked'))
{
    function is_privacyLiked(): bool
    {
        $prev_like = get_cookie('like_privacy');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_privacyDisliked'))
{
    function is_privacyDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_privacy');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_permitLiked'))
{
    function is_permitLiked(): bool
    {
        $prev_like = get_cookie('like_permit');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_permitDisliked'))
{
    function is_permitDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_permit');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_extensionLiked'))
{
    function is_extensionLiked(): bool
    {
        $prev_like = get_cookie('like_extension');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_extensionDisliked'))
{
    function is_extensionDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_extension');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('is_faqLiked'))
{
    function is_faqLiked(): bool
    {
        $prev_like = get_cookie('like_faq');
        if ($prev_like!=null and $prev_like=='True'){
            return true;
        }
        return false;
    }
}
if ( ! function_exists('is_faqDisliked'))
{
    function is_faqDisliked(): bool
    {
        $prev_disLike = get_cookie('dislike_faq');
        if ($prev_disLike!=null and $prev_disLike=='True'){
            return true;
        }
        return false;
    }
}

if ( ! function_exists('star_rate'))
{
    function star_rate($like,$dislike){
        $total = $like+$dislike;
        if ($total!=0){
            $like_percent = ($like * 100) / $total;
            return round(($like_percent * 5) /100);
        }else {
            return 0;
        }
    }
}
