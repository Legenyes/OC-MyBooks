<?php
/**
 * Created by PhpStorm.
 * User: Sebastien
 * Date: 18/12/2016
 * Time: 10:35
 */

namespace MyBooksCMS\Domain;

class Author
{
    /**
     * Author id.
     *
     * @var integer
     */
    private $id;

    /**
     * Author Firstname.
     *
     * @var string
     */
    private $firstname;

    /**
     * Author lastName.
     *
     * @var string
     */
    private $lastname;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->title = $firstname;
        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastName = $lastname;
        return $this;
    }
}