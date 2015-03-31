<?php
/**
 * File HomeRepository.php
 *
 * @author Jon Kamke <jon@kamke.org>
 */

namespace MyApp\Repository;

/**
 * HomeRepository
 *
 * @author Jon Kamke <jon@kamke.org>
 */
class HomeRepository
{
    /**
     * @var Doctrine Database Provider
     */
    private $db;

    /**
     * Constructor
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->db = $app['db'];
    }

    /**
     * @return mixed
     */
    public function bodyText()
    {
        $sql = 'select body from home where id = ?';

        $data = $this->db->fetchAssoc($sql, array((int) 1));

        return $data;
    }
}
