<?php if (!defined('ABSPATH')) die('No direct access allowed');

/**
 * WP BackItUp  - Utility Class
 *
 * @package WP BackItUp
 * @author  Chris Simmons <chris.simmons@wpbackitup.com>
 * @link    http://www.wpbackitup.com
 *
 */
class WPBackItUp_Utility {

    private $logger;

    function __construct($logger) {
        try {
            $this->logger = $logger;
        } catch (Exception $e) {
            //Dont do anything
            print $e;
        }
    }

    function __destruct() {

    }


    function send_email($to, $subject, $message, $attachments = array(), $reply_email = null) {
        try {
            //global $WPBackitup;
            if ($to) {

                $from_email = get_bloginfo('admin_email');
                $headers[] = 'Content-type: text/html';
                $headers[] = 'From: WP BackItUp <' . $from_email . '>';

                if (null != $reply_email) {
                    $headers[] = 'Reply-To: <' . $reply_email . '>';
                }

                wp_mail($to, $subject, nl2br($message), $headers, $attachments);
                $this->logger->log('(send_email)EMail Sent from:' . $from_email);
                $this->logger->log('(send_email)EMail Sent to:' . $to);
            }

        } catch (Exception $e) {
            //Dont do anything
            $this->logger->log('(send_email)Send Email Exception:' . $e);
        }

    }

    function send_email_v2($to, $subject, $message, $attachments = array(), $from_name = null, $from_email = null, $reply_email = null) {
        try {

            if ($to) {

                if (empty($from_name)) {
                    $from_name = 'WP BackItUp';
                }

                if (empty($from_email)) {
                    $from_email = get_bloginfo('admin_email');
                }

                $headers[] = 'Content-type: text/html';
                $headers[] = 'From: ' . $from_name . ' <' . $from_email . '>';

                if (null != $reply_email) {
                    $headers[] = 'Reply-To: ' . $from_name . ' <' . $reply_email . '>';
                }

                wp_mail($to, $subject, nl2br($message), $headers, $attachments);

                $this->logger->log('(send_email)Headers:' . var_export($headers, true));
                $this->logger->log('(send_email)EMail Sent from:' . $from_email);
                $this->logger->log('(send_email)EMail Sent to:' . $to);
            }

        } catch (Exception $e) {
            //Dont do anything
            $this->logger->log('(send_email)Send Email Exception:' . $e);
        }

    }


    //Function for PHP version 5.2
    //Diff Approximation only
    function date_diff_days($date1, $date2) {

        $date_diff_seconds = $this->date_diff_seconds($date1, $date2);
        $days = round($date_diff_seconds / 86400);
        return $days;
    }

    //Function for PHP version 5.2
    //Diff Approximation only
    function date_diff_seconds($date1, $date2) {
        // the necessary way using PHP 5.2
        $date1_string = $date1->format('U');
        $date2_string = $date2->format('U');

        // get a difference represented as an int, number of seconds
        $date_diff_seconds = abs($date1_string - $date2_string);

        return $date_diff_seconds;
    }

    function timestamp_diff_seconds($timestamp1, $timestamp2) {
        // get a difference represented as an int, number of seconds
        $timestamp_diff_seconds = abs($timestamp1 - $timestamp2);

        return $timestamp_diff_seconds;
    }

    function date_diff_array(DateTime $oDate1, DateTime $oDate2) {
        $aIntervals = array('year' => 0, 'month' => 0, 'week' => 0, 'day' => 0, 'hour' => 0, 'minute' => 0, 'second' => 0,);

        foreach ($aIntervals as $sInterval => &$iInterval) {
            while ($oDate1 <= $oDate2) {
                $oDate1->modify('+1 ' . $sInterval);
                if ($oDate1 > $oDate2) {
                    $oDate1->modify('-1 ' . $sInterval);
                    break;
                } else {
                    $iInterval++;
                }
            }
        }

        return $aIntervals;
    }

    public static function encode_items(&$item, $key) {
        //If not string convert to one.
        //If this happens it could be an error on backup job.
        if (!is_string($item)) {
            $item = var_export($item, true);
        }

        $item = utf8_encode($item);
    }

    public static function decode_items(&$item, $key) {
        $item = utf8_decode($item);
    }


    /**
     * Compare major and minor versions
     *
     * @param $version1
     * @param $version2
     *
     * @return bool
     */
    public static function version_compare($version1, $version2) {
        //Check major and minor versions only

        $version1_array = explode('.', $version1);
        $version2_array = explode('.', $version2);

        if (isset ($version1_array[0]) && is_numeric($version1_array[0]) && isset ($version2_array[0]) && is_numeric($version2_array[0]) && isset ($version1_array[1]) && is_numeric($version1_array[1]) && isset ($version2_array[1]) && is_numeric($version2_array[1])) {

            //If major  or minor version is different
            if ($version1_array[0] === $version2_array[0] && $version1_array[1] === $version2_array[1]) {
                return true;
            }

        }

        return false;
    }

}

