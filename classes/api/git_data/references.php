<?php

namespace Github\Api\Git_Data;

use Github\Api\Abstract_Api;
use Github\Exception\Exception_Argument_Missing;

/**
 * @link   http://developer.github.com/v3/git/references/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class References extends Abstract_Api
{
    public function all($username, $repository)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs');
    }

    public function branches($username, $repository)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs/heads');
    }

    public function tags($username, $repository)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs/tags');
    }

    public function show($username, $repository, $reference)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs/'.urlencode($reference));
    }

    public function create($username, $repository, array $params)
    {
        if (!isset($params['ref'], $params['sha'])) {
            throw new Exception_Argument_Missing(array('ref', 'sha'));
        }

        return $this->post('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs', $params);
    }

    public function update($username, $repository, $reference, array $params)
    {
        if (!isset($params['sha'])) {
            throw new Exception_Argument_Missing('sha');
        }

        return $this->patch('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs/'.urlencode($reference), $params);
    }

    public function remove($username, $repository, $reference)
    {
        return $this->delete('repos/'.urlencode($username).'/'.urlencode($repository).'/git/refs/'.urlencode($reference));
    }
}
