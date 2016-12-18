<?php
/**
 * Created by PhpStorm.
 * User: Sebastien
 * Date: 18/12/2016
 * Time: 10:35
 */

namespace MyBooksCMS\Domain;

class Book
{
    /**
     * Book id.
     *
     * @var integer
     */
    private $id;

    /**
     * Book author.
     *
     * @var \MyBooksCMS\Domain\Author
     */
    private $author;

    /**
     * Book title.
     *
     * @var string
     */
    private $title;

    /**
     * Book isbn.
     *
     * @var string
     */
    private $isbn;

    /**
     * Book summary.
     *
     * @var string
     */
    private $summary;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor(Author $author) {
        $this->author = $author;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn( $isbn) {
        $this->isbn = $isbn;
        return $this;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
        return $this;
    }
}