<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
require_once BASEPATH . 'libraries\Session.php';
class MY_Session extends CI_Session
{

    function __construct()
    {
        parent::__construct();

        $this->CI->session = $this;
    }

    function sess_update()
    {
        // We only update the session every five minutes by default
        if (($this->userdata['last_activity'] + $this->sess_time_to_update) >= $this->now || $this->CI->input->is_ajax_request())
        {
            return;
        }

        // _set_cookie() will handle this for us if we aren't using database sessions
        // by pushing all userdata to the cookie.
        $cookie_data = NULL;

        /* Changing the session ID during an AJAX call causes problems,
         * so we'll only update our last_activity
         */
        if ($this->CI->input->is_ajax_request())
        {
            $this->userdata['last_activity'] = $this->now;

            // Update the session ID and last_activity field in the DB if needed
            if ($this->sess_use_database === TRUE)
            {
                // set cookie explicitly to only have our session data
                $cookie_data = array();
                foreach (array('session_id','ip_address','user_agent','last_activity') as $val)
                {
                    $cookie_data[$val] = $this->userdata[$val];
                }

                $this->CI->db->query($this->CI->db->update_string($this->sess_table_name,
                                            array('last_activity' => $this->userdata['last_activity']),
                                            array('session_id' => $this->userdata['session_id'])));
            }

            return $this->_set_cookie($cookie_data);
        }

        // Save the old session id so we know which record to
        // update in the database if we need it
        $old_sessid = $this->userdata['session_id'];
        $new_sessid = '';
        do
        {
            $new_sessid .= mt_rand(0, mt_getrandmax());
        }
        while (strlen($new_sessid) < 32);

        // To make the session ID even more secure we'll combine it with the user's IP
        $new_sessid .= $this->CI->input->ip_address();

        // Turn it into a hash and update the session data array
        $this->userdata['session_id'] = $new_sessid = md5(uniqid($new_sessid, TRUE));
        $this->userdata['last_activity'] = $this->now;

        // Update the session ID and last_activity field in the DB if needed
        if ($this->sess_use_database === TRUE)
        {
            // set cookie explicitly to only have our session data
            $cookie_data = array();
            foreach (array('session_id','ip_address','user_agent','last_activity') as $val)
            {
                $cookie_data[$val] = $this->userdata[$val];
            }

            $this->CI->db->query($this->CI->db->update_string($this->sess_table_name, array('last_activity' => $this->now, 'session_id' => $new_sessid), array('session_id' => $old_sessid)));
        }

        // Write the cookie
        $this->_set_cookie($cookie_data);
    }

}
?>