<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like_model extends CI_Model
{
    public function doLike($tbl,$id)
    {
        $this->db->set('likeCount', 'likeCount+1', FALSE);
        if ($tbl=='blog'){
            $this->db->where('Blog_ID', $id);
        }elseif($tbl=='news'){
            $this->db->where('News_ID', $id);
        }
        $this->db->update($tbl);
    }
    public function doDislike($tbl,$id)
    {
        $this->db->set('dislikeCount', 'dislikeCount+1', FALSE);
        if ($tbl=='blog'){
            $this->db->where('Blog_ID', $id);
        }elseif($tbl=='news'){
            $this->db->where('News_ID', $id);
        }
        $this->db->update($tbl);
    }

    public function doLikeContent($type)
    {
        switch ($type){
            case 'after_sale':
                $this->db->set('afterSaleLikeCount', 'afterSaleLikeCount+1', FALSE);
                break;
            case 'area_guide':
                $this->db->set('areaGuideLikeCount', 'areaGuideLikeCount+1', FALSE);
                break;
            case 'citizenship':
                $this->db->set('citizenshipLikeCount', 'citizenshipLikeCount+1', FALSE);
                break;
            case 'buyer_guide':
                $this->db->set('buyerGuideLikeCount', 'buyerGuideLikeCount+1', FALSE);
                break;
            case 'buying_online':
                $this->db->set('buyingOnlineLikeCount', 'buyingOnlineLikeCount+1', FALSE);
                break;
            case 'privacy':
                $this->db->set('privacyLikeCount', 'privacyLikeCount+1', FALSE);
                break;
            case 'permit':
                $this->db->set('permitLikeCount', 'permitLikeCount+1', FALSE);
                break;
            case 'extension':
                $this->db->set('extensionLikeCount', 'extensionLikeCount+1', FALSE);
                break;
            case 'faq':
            $this->db->set('faqLikeCount', 'faqLikeCount+1', FALSE);
            break;
        }
        $this->db->update('contentLikes');
    }
    public function doDislikeContent($type)
    {
        switch ($type){
            case 'after_sale':
                $this->db->set('afterSaleDislikeCount', 'afterSaleDislikeCount+1', FALSE);
                break;
            case 'area_guide':
                $this->db->set('areaGuideDislikeCount', 'areaGuideDislikeCount+1', FALSE);
                break;
            case 'citizenship':
                $this->db->set('citizenshipDislikeCount', 'citizenshipDislikeCount+1', FALSE);
                break;
            case 'buyer_guide':
                $this->db->set('buyerGuideDislikeCount', 'buyerGuideDislikeCount+1', FALSE);
                break;
            case 'buying_online':
                $this->db->set('buyingOnlineDislikeCount', 'buyingOnlineDislikeCount+1', FALSE);
                break;
            case 'privacy':
                $this->db->set('privacyDislikeCount', 'privacyDislikeCount+1', FALSE);
                break;
            case 'permit':
                $this->db->set('permitDislikeCount', 'permitDislikeCount+1', FALSE);
                break;
            case 'extension':
                $this->db->set('extensionDislikeCount', 'extensionDislikeCount+1', FALSE);
                break;
            case 'faq':
                $this->db->set('faqDislikeCount', 'faqDislikeCount+1', FALSE);
                break;

        }
        $this->db->update('contentLikes');
    }
}