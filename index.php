<?php include_once("./header.php"); ?>

<body>

    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Search form...">
        <button type="submit" name="submit-search">Search</button>
    </form>
    <h1>Article Front page</h1>
    <h2>All article</h2>
    <div class="article-container">
        <?php
        $article_query = "SELECT * FROM article";
        $article_result = mysqli_query($conn, $article_query);
        if (mysqli_num_rows($article_result) > 0) {
            while ($row = mysqli_fetch_assoc($article_result)) {
                $article_id = $row['article_id'];
                $article_title = $row['article_title'];
                $article_content = $row['article_content'];
                $article_date = $row['article_date'];
                $article_author = $row['article_author'];
                ?>
        <div class="article">
            <h3><?php echo $article_title; ?></h3>
            <p><?php echo $article_content; ?></p>
            <p><?php echo $article_date; ?></p>
            <p><?php echo $article_author; ?></p>
        </div>
        <hr>


        <?php
            }
        } else {
            echo "No articles yet!";
        }
        ?>

    </div>


</body>

<?php include_once("./footer.php"); ?>