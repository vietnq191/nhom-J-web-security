<?php
require_once 'BaseModel.php';
class PostModel extends BaseModel
{
    /**
     * Delete posts
     * @param $id
     * @return mixed
     */
    public function deletePost($id, $token)
    {
        $sql = 'DELETE FROM post WHERE post_id  = "' . $id . '" AND token = "' . $token . '"';
        // var_dump($sql);
        // die();
        return $this->delete($sql);
    }
    /**
     * Search posts
     * @param array $params
     * @return array
     */
    public function getPosts($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM post WHERE post_url LIKE "%' . $params['keyword'] . '%"';
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM post';
            $users = $this->select($sql);
        }

        return $users;
    }
}
