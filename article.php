<?php include_once("./header.php"); ?>

<body>

    <h1>Article page</h1>
    <div class="article-container">
        <?php


        $title = mysqli_real_escape_string($conn, $_GET['title']);
        $date = mysqli_real_escape_string($conn, $_GET['date']);

        $article_query = "SELECT * FROM article WHERE ";
        $article_query .= "article_title = '$title' AND ";
        $article_query .= "article_date = '$date' ";
        $article_result = mysqli_query($conn, $article_query);

        $row = mysqli_fetch_assoc($article_result);
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

    </div>


</body>

<?php include_once("./footer.php"); ?>