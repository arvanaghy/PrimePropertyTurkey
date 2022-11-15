<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsLetterCron extends CI_Controller
{
    public function sendRestEmails()
    {
            $this->load->model('NewsLetterCronModel');
            $data = $this->NewsLetterCronModel->FetchMailContext();
            if ($data){
                $restMail = $this->NewsLetterCronModel->FetchRestMail();
                if ($restMail){
                    $i=0;
                    foreach ($restMail as $clientsInfo):
                        $i++;
                        if ($i==200):
                            break;
                        endif;
                        $this->load->library('email');
                        if ($data['attachmentFile']){
                            $this->email->attach('./uploads/mailAttachment/'.$data['attachmentFile']);
                        }
                        $this->email->to($clientsInfo->email);
                        $this->email->from('admin@primepropertyturkey.com');
                        $this->email->subject($clientsInfo->first_name.' '.$clientsInfo->second_name.' | '.$data['subject']);
                        $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                            "<br/>".
                            "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/logonew.png'>
                </div>".
                            "<br/>".
                            date('l jS \of F Y h:i:s A').
                            "<br/><br/>".
                            $data['context'].
                            "<br/><br/>".
                            "<table cellpadding='0' cellspacing='0'
                       style='color: rgb(68, 68, 68); font-family: Arial, sans-serif; font-size: 10pt; text-align: center; background-color: transparent; border-spacing: 0px; text-indent: 0px; width: 400px; line-height: normal;'>
                    <tbody>
                    <tr>
                        <td width='400' colspan='2' style='margin: 0px; padding: 10px 0px 0px; width: 400px;'>
                            <table cellpadding='0' cellspacing='0'
                                   style='border-spacing: 0px; background-color: transparent; text-indent: 0px; width: 400px; font-size: 10pt; line-height: normal;'>
                                <tbody>
                                <tr>
                                    <td width='400' colspan='2' style='margin: 0px; text-align: left; padding: 0px; width: 400px;'><span
                                            style='background-color: transparent; color: rgb(7, 55, 99); font-size: 12pt; font-weight: bold;'><font
                                            face='arial black, sans-serif'>Prime Property Turkey Team<span
                                            style='font-family: arial, sans-serif;'></span>&nbsp;</font></span><span
                                            style='background-color: transparent; color: rgb(7, 55, 99); font-size: 12pt; font-weight: bold;'>&nbsp; &nbsp; &nbsp;</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width='400' colspan='2' style='margin: 0px; padding: 0px; width: 400px;'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width='162' valign='top'
                            style='margin: 0px; padding: 0px 15px 0px 0px; border-right: 1px solid rgb(0, 22, 195);'>
                            <div style='text-align: right;'><a href='http://www.primepropertyturkey.com/' target='_blank'
                                                               data-saferedirecturl='https://www.google.com/url?q=http://www.primepropertyturkey.com/&amp;source=gmail&amp;ust=1668267506724000&amp;usg=AOvVaw1KV-X3eH4aBPzaac5jfItz'
                                                               style='color: rgb(51, 122, 183);'><img width='162' border='0' alt='Logo'
                                                                                                      src='https://ci4.googleusercontent.com/proxy/zWjD_YixatpDjvvAskTtOz6oTnmBf3yIhhRk2hTpTZlQ--RFJtAGTUfewiA-BaS6kVZ6PZ6r=s0-d-e1-ft#https://i.ibb.co/ZXVVKG1/aaaaaa.png'
                                                                                                      class='CToWUd' data-bit='iit'
                                                                                                      style='border: 0px; max-width: 162px;'></a>
                            </div>
                        </td>
                        <td valign='top' style='margin: 0px; padding: 0px 0px 0px 15px; vertical-align: top;'>
                            <div style='text-align: left;'><b><font color='#999999'><span
                                    style='text-align: right;'>+90&nbsp;</span><span
                                    style='text-align: right; font-family: arial, sans-serif;'>552 754 44 93</span></font></b><br></div>
                            <font color='#999999'>
                                <div style='text-align: left;'><a href='mailto:admin@primepropertyturkey.com' target='_blank'
                                                                  style='color: rgb(17, 85, 204);'>admin@primepropertyturkey.com</a><br>
                                </div>
                            </font>
                            <div style='text-align: left;'><a href='http://www.primepropertyturkey.com/' target='_blank'
                                                              data-saferedirecturl='https://www.google.com/url?q=http://www.primepropertyturkey.com/&amp;source=gmail&amp;ust=1668267506724000&amp;usg=AOvVaw1KV-X3eH4aBPzaac5jfItz'
                                                              style='color: rgb(17, 85, 204);'>www.primepropertyturkey.com</a></div>
                            <a href='https://g.page/primepropertyturkey?share' target='_blank'
                               data-saferedirecturl='https://www.google.com/url?q=https://g.page/primepropertyturkey?share&amp;source=gmail&amp;ust=1668267506724000&amp;usg=AOvVaw1DBJABz-ZlUn9G7B3K2HG2'
                               style='color: rgb(17, 85, 204); text-align: left;'>DAP Vadi, S-Blok, Ofis No:108-109 Merkez Mah,
                                Kağıthane / İSTANBUL</a><br></td>
                    </tr>
                    <tr>
                        <td width='400' colspan='2' style='margin: 0px; text-align: left; padding: 15px 0px 0px; width: 400px;'><span
                                style='font-size: 13.3333px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><img
                                border='0' alt='Banner'
                                src='https://ci5.googleusercontent.com/proxy/MwF9GITOB5hE__xVHwoQDraJ6DKIIOwcqbIvWMBJYVbRMAG1_CV6YBxITrq-o2DixwuvHtlOlyd2rVNxSAVU=s0-d-e1-ft#https://i.ibb.co/k3zMGtX/Untitled-1-copy.png'
                                width='200' height='41' class='CToWUd' data-bit='iit'
                                style='font-size: 13.3333px; border: 0px; max-width: 400px; height: auto;'><br
                                style='font-size: 13.3333px;'>
                            <div style='font-size: 13.3333px; text-align: center;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <font size='4'><a href='https://www.instagram.com/primepropertyturkey/' target='_blank'
                                              data-saferedirecturl='https://www.google.com/url?q=https://www.instagram.com/primepropertyturkey/&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw1rw8QUOZ-b2REXUKtXR0fG'
                                              style='color: rgb(17, 85, 204);'><img
                                    src='https://ci3.googleusercontent.com/proxy/uYKKAXk3d6j2CWRydwCIgUI7LWBsV_DUI2FRtJn2hOLoOlwDy0LgwKcqO7hmC37Ksuk-ov6ta62U0pGNLnNinHAdb0A8_zPVZXiLC0Xk0PmiFF9LBUiANpVK9yKI=s0-d-e1-ft#https://cdn.gifo.wisestamp.com/social/instagram/E4405F/32/0/background.png'
                                    width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                    style='text-align: right; float: left; border-width: initial; border-color: initial;'></a><a
                                    href='https://www.linkedin.com/company/prime-property-turkey' target='_blank'
                                    data-saferedirecturl='https://www.google.com/url?q=https://www.linkedin.com/company/prime-property-turkey&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw3NA43qXaOX05vztb1OaSdP'
                                    style='color: rgb(17, 85, 204);'><img
                                    src='https://ci6.googleusercontent.com/proxy/a4py0VtaTWDfgSxiJo52uLicllJdhNVx7OniTOvmv4aqHpGs-eEJlLWDbXyZHWwppsRMKLBdtpHmqYkrmKbBNnliJ6_liTZbRq0c_zIclQNTvNRSEb2CprQtjsE=s0-d-e1-ft#https://cdn.gifo.wisestamp.com/social/linkedin/0077b5/32/0/background.png'
                                    width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                    style='text-align: right; float: left; border-width: initial; border-color: initial;'></a><a
                                    href='https://www.facebook.com/primepropertyturkeyistanbul' target='_blank'
                                    data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/primepropertyturkeyistanbul&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw1MVaTCWr_Dee-amdXGWZNe'
                                    style='color: rgb(17, 85, 204);'><img
                                    src='https://ci5.googleusercontent.com/proxy/Ih6PL4wqhWq526ZaMrkfC68owL9ofCSQ52d4Ysn1_m4nPWygW9BX9ztVg5-zj7u4pi2CUCP4FOzYYvU3RXwzcTPeJ_NS7SKVyaa1j4o-2c0ZK8CvwD1A7euAwrw=s0-d-e1-ft#https://cdn.gifo.wisestamp.com/social/facebook/3b5998/32/0/background.png'
                                    width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                    style='text-align: right; float: left; border-width: initial; border-color: initial;'></a><font
                                    color='#1155cc'><span style='border-width: initial; border-color: initial;'><span
                                    style='border-width: initial; border-color: initial;'>
                                <a href='https://twitter.com/turkey_prime' target='_blank'
                                   data-saferedirecturl='https://www.google.com/url?q=https://twitter.com/turkey_prime&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw0Ca1bj9z_pgeQz2_TIoyOb'
                                   style='color: rgb(17, 85, 204);'><img
                                        src='https://ci4.googleusercontent.com/proxy/qqI_vHZG7Gq_0xaGVJlReh6j1grJkPsU2QLKAV4YD_CN7G2a9zwYcnmlzY0faUCEHwkN7qMLP3nB-H8XF38MhPsYDY_g1-m-2wz6FTBP531ZoGBJqkCiLxWUOQ=s0-d-e1-ft#https://cdn.gifo.wisestamp.com/social/twitter/55acee/32/0/background.png'
                                        width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                        style='text-align: right; float: left; border-width: initial; border-color: initial;'></a>
                                <a href='https://www.youtube.com/channel/UC4TpjIKGt7Yj8ykGKpQ6GOQ' target='_blank'
                                   data-saferedirecturl='https://www.google.com/url?q=https://www.youtube.com/channel/UC4TpjIKGt7Yj8ykGKpQ6GOQ&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw0Ca1bj9z_pgeQz2_TIoyOb'
                                   style='color: rgb(17, 85, 204);'><img
                                        src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/YouTube_social_red_square_%282017%29.svg/2048px-YouTube_social_red_square_%282017%29.svg.png'
                                        width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                        style='text-align: right; float: left; border-width: initial; border-color: initial;'></a>
                                    <a href='https://t.me/PrimePropertyTurkeyprime' target='_blank'
                                       data-saferedirecturl='https://www.google.com/url?q=https://t.me/PrimePropertyTurkey&amp;source=gmail&amp;ust=1668267506725000&amp;usg=AOvVaw0Ca1bj9z_pgeQz2_TIoyOb'
                                       style='color: rgb(17, 85, 204);'><img
                                            src='https://cdn-icons-png.flaticon.com/512/124/124019.png'
                                            width='25' height='25' border='0' class='CToWUd' data-bit='iit'
                                            style='text-align: right; float: left; border-width: initial; border-color: initial;'></a>
                
                                <br><br>
                            </span></span>
                            </font>
                            </font>
                        </td>
                    </tr>
                    </tbody>
                </table>".
                            "</div>";
                        $this->email->message($message);
                        $this->email->set_mailtype("html");
                        $this->email->send();
                        $this->email->clear(TRUE);
                        $this->User_Model->UpdateLeadsNewsLetterStatus($clientsInfo->Lead_id,2);
                    endforeach;
                }else{
                    $this->NewsLetterCronModel->resetAllToZero();
                }
            }
    }

}