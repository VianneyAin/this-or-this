<?php
  class Post_View {
      function list_all_posts($posts){
          ?>
          <p>Here is a list of all posts:</p>

          <?php foreach($posts as $post) { ?>
            <p>
              <?php echo $post['author']; ?>
              <a href='jokes-app-mvc/posts?id=<?php echo $post['id']; ?>'>See content</a>
            </p>
          <?php }
      }
  }
?>
