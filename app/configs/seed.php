<?php

global $db;

try {
  $createTableSQL = "
        CREATE TABLE IF NOT EXISTS posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";
  $db->exec($createTableSQL);
  $stmt = $db->query('SELECT COUNT(*) FROM posts');
  $count = $stmt->fetchColumn();

  if ($count == 0) {
    $samplePosts = [
      [
        'Getting Started with PHP',
        'PHP is a popular server-side scripting language that is especially suited for web development.',
      ],
      [
        'Understanding MySQL Databases',
        'MySQL is one of the most popular open-source relational database management systems.',
      ],
      [
        'Building Web Applications',
        'Modern web applications require a solid understanding of both frontend and backend technologies.',
      ],
      [
        'PHP Best Practices',
        'Following best practices in PHP development ensures maintainable and secure code.',
      ],
      [
        'Database Design Principles',
        'Good database design is crucial for building scalable and efficient applications.',
      ],
      [
        'Introduction to PDO',
        'PHP Data Objects (PDO) provides a consistent interface for accessing databases in PHP.',
      ],
      [
        'Web Security Fundamentals',
        'Security should be a primary concern when developing web applications.',
      ],
      [
        'RESTful API Development',
        'REST APIs are essential for modern web application architecture.',
      ],
      [
        'Frontend Integration',
        'Connecting your PHP backend with modern frontend frameworks.',
      ],
      [
        'Performance Optimization',
        'Tips and techniques for optimizing PHP and MySQL performance.',
      ],
    ];

    $insertSQL = 'INSERT INTO posts (title, content) VALUES (?, ?)';
    $stmt = $db->prepare($insertSQL);

    foreach ($samplePosts as $post) {
      $stmt->execute([$post[0], $post[1]]);
    }
  }
} catch (PDOException $e) {
  die('Table creation failed: ' . $e->getMessage());
}
