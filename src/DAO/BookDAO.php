<?php
/**
 * Created by PhpStorm.
 * User: Sebastien
 * Date: 18/12/2016
 * Time: 10:45
 */

namespace MyBooksCMS\DAO;

use MyBooksCMS\Domain\Book;

class BookDAO extends DAO
{
    /**
     * @var \MyBooksCMS\DAO\AuthorDAO
     */
    private $authorDAO;

    public function setAuthorDAO(AuthorDAO $authorDAO) {
        $this->$authorDAO = $authorDAO;
    }

    /**
     * Returns a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all comments.
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['book_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }

    /**
     * Return a list of all books for an author, sorted by date (most recent last).
     *
     * @param integer $authorId The author id.
     *
     * @return array A list of all books for the author.
     */
    public function findAllByAuthor($authorId) {
        // The associated author is retrieved only once
        $author = $this->authorDAO->find($authorId);
        $sql = "select * from book where auth_id = ? order by book_id";
        $result = $this->getDb()->fetchAll($sql, array($authorId));
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $book = $this->buildDomainObject($row);
            $book->setAuthor($author);
            $books[$bookId] = $book;
        }
        return $books;
    }

    /**
     * Returns a book matching the supplied id.
     *
     * @param integer $id The book id
     *
     * @return \MyBooksCMS\Domain\Book|throws an exception if no matching book is found
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MyBooksCMS\Domain\Book
     */
    protected function buildDomainObject($row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        if (array_key_exists('auth_id', $row)) {
            // Find and set the associated author
            $authorId = $row['auth_id'];
            $author = $this->authorDAO->find($authorId);
            $book->setAuthor($author);
        }

        return $book;
    }
}