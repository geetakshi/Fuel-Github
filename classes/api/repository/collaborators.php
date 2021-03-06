<?php

namespace Github\Api\Repository;

use Github\Api\Abstract_Api;

/**
 * @link   http://developer.github.com/v3/repos/collaborators/
 * @author Ross Tweedie <ross.tweedie at gmail dot com>
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Collaborators extends Abstract_Api
{
    public function all($username, $repository, $params = null )
    {
        // The all method supports pagination, so let's also retrieve the response headers
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/collaborators', $params, array( 'include_headers' => true ) );
    }

    public function check($username, $repository, $collaborator)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/collaborators/'.urlencode($collaborator));
    }

    public function add($username, $repository, $collaborator)
    {
        return $this->put('repos/'.urlencode($username).'/'.urlencode($repository).'/collaborators/'.urlencode($collaborator));
    }

    public function remove($username, $repository, $collaborator)
    {
        return $this->delete('repos/'.urlencode($username).'/'.urlencode($repository).'/collaborators/'.urlencode($collaborator));
    }
}
