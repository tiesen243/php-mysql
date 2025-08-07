<?php

class PostsController extends Controller
{
  public function index()
  {
    global $db;
    try {
      $stmt = $db->query('SELECT * FROM posts ORDER BY createdAt DESC');
      $posts = $stmt->fetchAll();
      $this->render('posts', [
        'posts' => $posts,
      ]);
    } catch (PDOException $e) {
      die('Error fetching posts: ' . $e->getMessage());
    }
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db;
      $title = $_POST['title'] ?? '';
      $content = $_POST['content'] ?? '';

      try {
        $stmt = $db->prepare(
          'INSERT INTO posts (title, content) VALUES (:title, :content)',
        );
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        header('Location: /posts');
        exit();
      } catch (PDOException $e) {
        die('Error creating post: ' . $e->getMessage());
      }
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      global $db;

      try {
        $stmt = $db->prepare('DELETE FROM posts WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: /posts');
        exit();
      } catch (PDOException $e) {
        die('Error deleting post: ' . $e->getMessage());
      }
    }
  }
}
