<?php

namespace Github\Api\Issue;

use Github\Api\Abstract_Api;
use Github\Exception\Exception_Argument_Missing;

/**
 * @link   http://developer.github.com/v3/issues/comments/
 * @author Ross Tweedie <ross.tweedie at gmail dot com>
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Comments extends Abstract_Api
{
    public function all($username, $repository, $issue, $page = 1)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/'.urlencode($issue).'/comments', array(
            'page' => $page
        ), array( 'include_headers' => true ) );
    }

    public function show($username, $repository, $comment)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/comments/'.urlencode($comment));
    }

    public function create($username, $repository, $issue, array $params)
    {
        if (!isset($params['body'])) {
            throw new Exception_Argument_Missing('body');
        }

        return $this->post('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/'.urlencode($issue).'/comments', $params);
    }

    public function update($username, $repository, $comment, array $params)
    {
        if (!isset($params['body'])) {
            throw new Exception_Argument_Missing('body');
        }

        return $this->patch('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/comments/'.urlencode($comment), $params);
    }

    public function remove($username, $repository, $comment)
    {
        return $this->delete('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/comments/'.urlencode($comment));
    }
}
