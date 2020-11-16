<?php 

/**
 * Get active team for current authenticated user
 *
 * @return void
 */
function active_team()
{
    return auth()->user()->getActiveTeam();
}

/**
 * Check logged in user is active team owner
 *
 * @return boolean
 */
function is_team_owner()
{
    return active_team()->created_by === auth()->id();
}

/**
 * Make a url
 *
 * @param array $params
 * @return string
 */
function make_url($params = []) 
{
    $url = '/';

    if ($params) {
        foreach($params as $param) {
            $url .= $param . '/';
        }
    }

    return url($url);
}